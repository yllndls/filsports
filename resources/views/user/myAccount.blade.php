@extends('user.sidebar')

@section('title', 'My Account')
@section('content')
<div class="container-myAccount">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <br><br>
    <div class="row">
        <!-- Profile Image Section -->
        <div class="col-md-2 text-center mb-4">
            <div class="profile-image-container">
                @if($user->profile_image)
                    <img src="{{ asset('profile_images/' . $user->profile_image) }}" 
                         alt="Profile Picture" 
                         class="profile-image rounded-circle"
                         id="preview-image">
                @else
                    <img src="{{ asset('default-profile.png') }}" 
                         alt="Default Profile" 
                         class="profile-image rounded-circle"
                         id="preview-image">
                @endif
            </div>
            <h4 class="mt-2 user-name">{{ $user->name }}</h4>
        </div>

        <!-- Profile Form Section -->
        <div class="col-md-8">
            <form action="{{ route('user.updateAccount') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3 ">
                    <label for="profile_image" class="form-label">Update Profile Picture:</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" 
                           onchange="previewImage(this)">
                </div>

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-3">
                        <div class="form-group mb-3" style="width: 205%;">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ $user->name }}" required>
                        </div>
                        
                        <div class="form-group mb-3" style="width: 205%;">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ $user->email }}" required>
                        </div>
                        
                        <div class="form-group mb-3"  style="width: 205%;">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" 
                                   value="{{ $user->contact }}">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-5">
                        <div class="form-group mb-3" style="width: 135%;">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" 
                                   value="{{ $user->location }}">
                        </div>
                        
                        <div class="form-group mb-3"  style="width: 135%;">
                            <label for="delivery_address">Delivery Address:</label>
                            <textarea class="form-control" id="delivery_address" name="delivery_address" 
                                      rows="4">{{ $user->delivery_address }}</textarea>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <button type="button" class="btn btn-danger" 
                            onclick="document.getElementById('id01').style.display='block'">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div id="id01" class="modal-id01">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Account</h5>
                <span onclick="document.getElementById('id01').style.display='none'" 
                      class="close">&times;</span>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" 
                        onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('preview-image').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    var modal = document.getElementById('id01');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

@endsection

