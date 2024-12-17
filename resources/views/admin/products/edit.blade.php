@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
            <small class="form-text text-muted">Leave blank to keep the current image.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection

