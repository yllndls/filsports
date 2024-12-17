<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../user/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/auth.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
  
  <div>
    <style>
        body {
              background-image: url('../user/img/qw2.jpg');
              background-attachment: absolute;
              background-size: cover;
          }
    </style>
</div>
      <section class="form-main">
        <div class="loginbackground">
          <div class="tab-content">
            <div class="tab-pane active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
              <div class="small-4 medium-4 large-4 columns text-left">
              <i class="fa fa-user-circle" style="font-size:60px;color:#f2ff00; margin: 10px 0px 10px 130px;"></i>
              </div>
              <br>
              <h5 class="text-left mb-0"> 
                  Login  
                  </h5>
                  <span class="text-left"> Welcome to Filsports Printing Studio. </span>
            
                 @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                 @endif
              <form action="/login" method="POST" class="form-container">
               @csrf

                <!-- Email input -->
                <div class="form-outline">
                    <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Enter username or email">
                    @error('email')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>
                <!-- Password input -->
                <div class="form-outline">
                  <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Enter Password">
                  <span id="togglePassword">
                      <i class="fas fa-eye-slash" style="position: absolute; right: 39rem; top: 44%; transform: translateY(-50%); cursor: pointer;"></i>
                  </span>
                    
                    @error('password')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>

                <br>
                <!-- Submit button -->
                <div class="text-center btnlogin">
                  <button type="submit">Login</button>
                </div>
                <!-- Forgot Password -->
                <div class="text-left forgotpass">
                  <a href="{{ route('user.forgotPassword') }}">Forgot password?</a>
                </div>
                <br><br>
                  <hr>
                <div class="text-center logindetails">
                  <p>Don't have an account? 
                    <a href="/register">
                      Register now
                    </a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('loginPassword');
            const icon = this.querySelector('i');
    
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    </script>
    
</body>
</html>