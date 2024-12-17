<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../user/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/style.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <section class="forgotPassword">
          <div class="tab-content-forgotPassword">
            <div class="tab-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
              <br><br>
                 <h3 class="text-center mb-3 laundry-title"> 
                   Forgot Password
                  </h3>
            
                 @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                 @endif
              <form action="{{route ('user.processForgotPassword')}}" method="POST" class="form-container">
               @csrf
            
                <!-- Email input -->
                <div class="form-outline">
                  <div class="form-label">
                  Username*<span class="form-label" id="registerEmail"></span>
                  </div>
                    <input class="form-control" type="email" name="email" id="registerEmail"  placeholder="Enter username or email" >
                    @error('email')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>


                <!-- Forgot Password button -->
                <div class="btnlogin">
                  <button type="submit">Forgot Password</button>
                </div>


                <!-- Login Form -->
                  <hr>
                <div class="text-center logindetails" style="font-size: 12px">
                    <a href="{{route('user.login')}}">
                     Back to Login
                    </a>
                  
                </div>
              </form>
            </div>
          </div>
      </section>
</body>
</html>
