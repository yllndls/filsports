@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $category->price }}" required>
        </div>
        <div class="form-group">
            <label for="cover_photo">Cover Photo</label>
            @if($category->cover_photo)
                <div class="mb-2">
                    <label>Current Image:</label>
                    <img src="{{ asset('storage/' . $category->cover_photo) }}" alt="Current Cover" style="max-width: 200px; height: auto;">
                </div>
            @endif
            <input type="file" class="form-control-file" id="cover_photo" name="cover_photo" accept="image/*">
            <small class="form-text text-muted">Leave blank to keep the current image.</small>
            <div id="imagePreview" class="mt-2" style="max-width: 200px;">
                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('cover_photo').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        const file = e.target.files[0];
        
        if (file) {
            preview.style.display = 'block';
            preview.src = URL.createObjectURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection

