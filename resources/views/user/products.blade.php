@extends('user.sidebar')
@section('title','Product List')
@section('content')

@foreach($products as $product)
<div class="card" style="width: 18rem;">
  <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image">

    <div class="card-body">
        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <h3>Price: {{$product->category->price}}</h3>
        <button type="button" class="btn btn-success" onclick="openModal({{$product->id}}, '{{$product->name}}', {{$product->category->price}})">Order</button>
        <p class="card-text"></p>
    </div>
</div>

<!-- Modal for each product -->
<div id="checkoutModal{{$product->id}}" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
    <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px;">
        <span onclick="closeModal({{$product->id}})" style="float: right; cursor: pointer; font-weight: bold;">&times;</span>
        <h2 style="margin-bottom: 20px;">Checkout Confirmation</h2>
        
        <form action="{{url('/addOrder')}}" method="post">
            @csrf
            <div style="margin-bottom: 15px;">
                <p><strong>Product:</strong> <span id="modalProductName{{$product->id}}"></span></p>
                <p><strong>Price:</strong> $<span id="modalPrice{{$product->id}}"></span></p>
                <div style="margin-bottom: 10px;">
                    <label><strong>Quantity:</strong></label>
                    <input type="number" 
                           id="modalQuantity{{$product->id}}" 
                           name="quantity" 
                           value="1" 
                           min="1" 
                           style="width: 80px; margin-left: 10px;"
                           onchange="updateTotal({{$product->id}}, {{$product->category->price}})">
                </div>
                <p><strong>Total:</strong> $<span id="modalTotal{{$product->id}}"></span></p>
            </div>
            
            <input type="hidden" name="product_id" value="{{$product->id}}">
            
            <button type="submit" class="btn btn-success" style="margin-right: 10px;">Confirm Order</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal({{$product->id}})">Cancel</button>
        </form>
    </div>
</div>
@endforeach

<script>
function openModal(productId, productName, price) {
    document.getElementById('modalProductName' + productId).textContent = productName;
    document.getElementById('modalPrice' + productId).textContent = price;
    updateTotal(productId, price); // Initialize total
    document.getElementById('checkoutModal' + productId).style.display = "block";
}

function updateTotal(productId, price) {
    const quantity = document.getElementById('modalQuantity' + productId).value;
    const total = price * quantity;
    document.getElementById('modalTotal' + productId).textContent = total;
}

function closeModal(productId) {
    document.getElementById('checkoutModal' + productId).style.display = "none";
}

// Close modal when clicking outside
window.onclick = function(event) {
    @foreach($products as $product)
        if (event.target == document.getElementById('checkoutModal{{$product->id}}')) {
            closeModal({{$product->id}});
        }
    @endforeach
}
</script>
@endsection