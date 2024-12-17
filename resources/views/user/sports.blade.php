@extends('user.layout')

@section('content')
<section class="sports" id="sports">
  <div class="container-sports">
    <h1>Sports Products for you. Buy Now!</h1>
    <div class="row mt-5">
        @foreach($categories as $category)
        <div class="col-md-1 mb-4">
            <div class="card">
                @if($category->cover_photo && Storage::disk('public')->exists($category->cover_photo))
                    <img src="{{ asset('storage/' . $category->cover_photo) }}" 
                         class="card-img-top" 
                         alt="{{ $category->name }}"
                         style="height: 250px; width: 100%; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default-product.jpg') }}" 
                         class="card-img-top" 
                         alt="Default Product Image"
                         style="height: 100px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">Price: ₱{{ number_format($category->price, 2) }}</p>
                    <form action="{{ url('/getProducts/' . $category->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success">View Products</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="productList">
                <!-- Products will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="checkout()">Checkout</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
let selectedProducts = [];

function openProductModal(categoryId) {
    fetch(`/api/categories/${categoryId}/products`)
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('productList');
            productList.innerHTML = '';
            data.products.forEach(product => {
                productList.innerHTML += `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="${product.id}" id="product${product.id}" onchange="toggleProduct(${product.id}, '${product.name}')">
                        <label class="form-check-label" for="product${product.id}">
                            ${product.name}
                        </label>
                        <input type="number" class="form-control mt-2" id="quantity${product.id}" value="1" min="1" onchange="updateQuantity(${product.id}, this.value)">
                    </div>
                `;
            });
            $('#productModal').modal('show');
        });
}

function toggleProduct(productId, productName) {
    const index = selectedProducts.findIndex(p => p.id === productId);
    if (index > -1) {
        selectedProducts.splice(index, 1);
    } else {
        selectedProducts.push({ id: productId, name: productName, quantity: 1 });
    }
}

function updateQuantity(productId, quantity) {
    const product = selectedProducts.find(p => p.id === productId);
    if (product) {
        product.quantity = parseInt(quantity);
    }
}

function checkout() {
    if (selectedProducts.length === 0) {
        alert('Please select at least one product');
        return;
    }
    
    fetch('/api/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ products: selectedProducts })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        } else {
            alert('Checkout failed. Please try again.');
        }
    });
}
</script>


@endsection

