@extends('admin.layout')

@section('title', 'Create Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Product</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <!-- Hidden quantity field -->
                                <input type="hidden" id="quantity" name="quantity" value="0">

                                <div class="form-group mb-3">
                                    <label for="photo">Product Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                                </div>

                                <!-- Preview Image -->
                                <div class="form-group mb-3">
                                    <label>Photo Preview</label>
                                    <div id="imagePreview" class="mt-2" style="max-width: 200px;">
                                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons at the bottom -->
                            <div class="col-12 mt-3">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Create Product</button>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('photo').addEventListener('change', function(e) {
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

