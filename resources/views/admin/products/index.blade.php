@extends('admin.layout')

@section('title', 'Manage Products')

@section('content')
<div class="container-products">
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" style="max-width: 50px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

