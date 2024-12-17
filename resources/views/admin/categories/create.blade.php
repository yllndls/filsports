@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Create New Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <div class="form-group mb-3">
            <label for="cover_photo">Product Image</label>
            <input type="file" class="form-control" id="cover_photo" name="cover_photo" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
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

