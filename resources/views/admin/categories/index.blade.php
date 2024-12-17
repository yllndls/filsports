@extends('admin.layout')

@section('title', 'Manage Categories')

@section('content')
<div class="container-categories">
    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                    @if($category->cover_photo)
                        <img src="{{ asset('storage/' . $category->cover_photo) }}" alt="{{ $category->name }}" style="max-width: 50px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $category->name }}</td>
                <td>${{ number_format($category->price, 2) }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
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

