<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../user/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/auth.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body>
    <div>
        <style>
        body {
            background-image: url('../user/img/qw2.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
    }
        </style>
    </div>
        <section class="register">
            <div class="register-background">
                <div class="tab-content-register">
                    <div class="register-pane active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <div class="text-center mb-4">
                            <i class="fa fa-user-circle text-warning" style="font-size: 55px; margin-top: 1%"></i>
                        </div>
                        <h4 class="text-center" style="font-size: 25px; color:  rgb(174, 233, 255); font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">FILSPORTS PRINTING STUDIO</h4>
                        <p class="text-center text-muted" style="font-size: 13px">Create your account by filling the form below.</p>
                        
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form action="/register" method="POST" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" id="registerName" class="form-control" style="border-radius: 0" placeholder="Enter Full Name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" name="email" id="registerEmail" class="form-control" style="border-radius: 0" placeholder="Enter Username or Email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="contact" id="registerContact" class="form-control" style="border-radius: 0" placeholder="Enter Contact Number">
                                        @error('contact')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="location" id="registerLocation" class="form-control" style="border-radius: 0" placeholder="Enter Location">
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <textarea name="delivery_address" id="registerAddress" class="form-control" style="border-radius: 0" placeholder="Enter Delivery Address"></textarea>
                                        @error('delivery_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="profile_image" class="text-muted" style="font-size: 13px">Profile Image (Optional)</label>
                                        <input type="file" name="profile_image" id="profile_image" class="form-control" style="border-radius: 0">
                                        @error('profile_image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 position-relative">
                                        <input type="password" name="password" id="registerPassword" class="form-control" style="border-radius: 0" placeholder="Enter Password" required>
                                        <span class="toggle-password" data-target="registerPassword">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 position-relative">
                                        <input type="password" name="confirm_password" id="confirmPassword" class="form-control" style="border-radius: 0" placeholder="Confirm Password" required>
                                        <span class="toggle-password" data-target="confirmPassword">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="role" value="user">
                            <p class="text-center text-muted mt-3" style="font-size: 13px">
                                By signing up, you agree to our <a href="" data-toggle="modal" data-target="#termspolicyModal">Terms and Privacy Policy.</a>
                            </p>
                            <button type="submit" class="btn btn-primary btn-block">Create account</button>
                        </form>
                        <div class="text-center mt-5">
                            <p class="text-muted" style="font-size: 13px">Already have an account? <a href="/login">Login now</a></p>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Modal Terms & Conditions / Privacy Policy -->
    <div class="modal fade" id="termspolicyModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" style="margin-right: -90rem;">&times;</button>
            <h3 class="modal-title" id="termspolicyModal" style="margin-right: -23rem;"><b>Terms and Conditions*</b></h3>
        </div>
            <div class="modal-body">
                1. Introduction
                <p>These Terms & Conditions govern your use of the Filsports Printing Studio website. By accessing and using the Website,
                you agree to be bound by these terms and conditions. If you do not agree to these terms, please do not use the Website.</p>   
                2. Website Use
                <p>You may use the Website to browse our products, place orders, and access other information. You agree to use the Website
                only for lawful purposes and in accordance with these Terms & Conditions.</p>
                3. Product Information
                <p>We strive to provide accurate information about our products on the Website. However, we do not guarantee the
                accuracy, completeness, or timeliness of the product information.</p>   
                4. Orders
                <p>When you place an order on the Website, you agree to provide accurate and complete information.
                We reserve the right to cancel any order for any reason,
                including but not limited to errors in pricing or product availability.</p>   
                5. Payment
                <p>We currently only accept Cash on Delivery as a payment method. Please ensure that you have the necessary
                cash available when your order is delivered.</p>
                6. Shipping
                <p>We offer shipping to various locations. Shipping costs will be calculated based on your order and shipping address.</p>
                7. Returns & Exchanges
                <p>Our return and exchange policy is outlined on the Website. Please review our policy for more information.</p>
                8. Intellectual Property
                <p>All content on the Website, including but not limited to text, images, and logos, is protected by copyright and other
                intellectual property laws. You may not use any content from the Website without our prior written consent.</p>   
                9. Limitation of Liability
                <p>In no event shall Filsports Printing Studio be liable for any indirect, incidental, special,
                or consequential damages arising out of or in connection with your use of the Website.</p>
                10. Governing Law
                <p>These Terms & Conditions shall be governed by and construed in accordance with the laws of the Philippines.</p>
                11. Changes to Terms & Conditions
                <p>We may update these Terms & Conditions from time to time.
                Your continued use of the Website after any changes have been made constitutes your acceptance of the revised terms.</p>
            
                <br><br>
                <h3 class="modal-title" style="margin-right: -15rem;"><b>Privacy Policy*</b></h3>
                <hr>
                1. Introduction
                    <p>Filsports Printing Studio is committed to protecting your privacy.
                    This Privacy Policy explains how we collect, use, and protect your personal information.   </p>   
                    2. Information Collection
                    <p>We may collect personal information from you when you use the Website,
                    including but not limited to your name, email address, phone number, and shipping address.</p>
                    3. Information Use
                    <p>We may use your personal information to:</p> 
                        <ul style="font-size: 12px">
                            <li>Process your orders</li>
                            <li>Communicate with you</li>
                            <li>Improve our Website and services</li>
                            <li>Protect against fraud</li>
                        </ul>
                    4. Information Sharing
                    <p>We may share your personal information with third parties who assist us in operating the Website and processing orders.
                    We will not sell or rent your personal information to third parties for marketing purposes.</p>   
                    5. Security
                    <p>We take reasonable measures to protect your personal information from unauthorized access or disclosure.</p>
                    6. Your Rights
                    <p>You have the right to access, rectify, or erase your personal information. You can contact us to exercise these rights.</p>
                    7. Changes to Privacy Policy
                    <p>We may update this Privacy Policy from time to time. Your continued use of the
                    Website after any changes have been made constitutes your acceptance of the revised privacy policy.</p>


                </div>
            </div>
        </div>
        </div>

        </section>

        <script>
            document.querySelectorAll('.toggle-password').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    const input = document.getElementById(target);
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('fa-eye-slash', 'fa-eye');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('fa-eye', 'fa-eye-slash');
                    }
                });
            });
        </script>

    </body>
    </html>