<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../welcome/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('welcome/style.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Filsports Printing Studio Website</title>
</head>
<body>
<header>
<div class="main-section">
    <nav class="navbar-fixed-top navbar-expand-sm">
      <div class="navbar-collapse collapse" id="navbar1">
          <ul class="navbar-nav">
              <li class="nav-item ms-5 me-lg-0 ">
                  <a class="nav-text"><i class="fa fa-phone fa-lg"></i>CALL US! +63 991-314-6785</a>
              </li>
              <li class="nav-item ms-5 me-lg-0">
                  <a class="nav-text"><i class="fa fa-envelope fa-lg"></i>FILSPORTSHOP.TAILORING@GMAIL.COM</a>
              </li>
              <li class="nav-item ms-5 me-lg-0">
                <a class="nav-text"><i class="fa fa-facebook fa-lg"></i>FILSPORTS TAILORING SHOP</a>
              </li>
          </ul>
      </div>
    </nav>
    
    <!-- fixed-top black -->
    <div class="fixed-top">
      <nav class="navbar navbar-expand-sm py-0">
          <div class="navbar-collapse collapse" id="navbar2">
            <a class="navbar-brand" href="{{ url('/') }}" id="logo"><img src="../welcome/img/fsp.png" style="width:40px;height:40px; margin-left: 20px; margin-top: -9px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
    
    
            <div class="collapse navbar-collapse" id="mynavbar">
              <ul class="navbar-nav me-auto mb-lg-0">
                <a class="navbar-brand" href="/" style="font-size: 23px; color:aliceblue; margin-left: -20px; margin-top: 2px">FILSPORTS PRINTING STUDIO</a>
                <li class="nav-item ms-5 me-lg-5 mt-4">
                <a href="/" style="color:aliceblue; font-size: 18px; margin-left: 20rem">HOME</a>
                </li>
                <li class="nav-item ms-3 me-lg-5 mt-4">
                <a href="#services" style="color:aliceblue; font-size: 18px">SERVICES</a>
                </li>
                <li class="nav-item ms-3 me-lg-5 mt-4">
                <a href="#sports" style="color:aliceblue; font-size: 18px">SPORTS</a>
                </li>
                <li class="nav-item ms-3 me-lg-5 mt-4">
                <a href="#about-us" style="color:aliceblue; font-size: 18px">ABOUT US</a>
                </li>  
              </ul>

                    <!--login/signup-->
                    <div class="login">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/login" style="color: aliceblue">Login/Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
 </div>
</header>


<!-- WELCOME PAGE CONTENTS -->
 <!-- HOME -->
<section class="home" id="home">
            <div class="main-text">
                <h6> CUSTOM SPORTSWEAR </h6>
                    <br>
                        <h1> Customised sportswear </h1>
                        <h1> for you and your team </h1>
                    <br>
            </div>
        <div class="img">
            <img src="{{asset('welcome/img/tshirt.png')}}" alt="">
        </div>
</section>


<!-- SERVICES -->
<section class="services" id="services">
  <div class="img">
      <img src="{{asset('welcome/img/services.png')}}" alt="">
  </div>

<div class="servicesbackground">
  <h2>1</h2>
  <hr>
  <h3><b>Design & Print</b></h3>
      <p style="text-align: left;"><b>
      We print and customised
      your preferred design.</p>
  </div>

<div class="servicesbackground">
  <h2>2</h2>
  <hr>
  <h3><b>Made by Us</b></h3>
      <p style="text-align: left;">
      High quality materials and
      excellent printing quality.</p>
  </div>

<div class="servicesbackground">
  <h2>3</h2>
  <hr>
  <h3><b>Deliver</b></h3>
      <p style="text-align: left;">
      Long waiting times are a thing
      of the past! We set new
      standards in logistics.</p>
      </div>
</section>


<!-- SPORTS -->
<section class="sports" id="sports">
  <div class="container">
		<div class="product-wrapper">
			<div class="product">
				<div class="img">
					<img src="{{asset('welcome/img/jersey3.jpg')}}">
				</div>
				<div class="info">
					<div class="details">
						<h1>JERSEY</h1>
						<p>₱650 <del>₱700</del></p>
					</div>
					<div class="buy-btn">
						<button type="submit"><a href="/login">More</a></button>
					</div>
				</div>
			</div>
		</div>
		<div class="product-wrapper">
			<div class="product">
				<div class="img">
					<img src="{{asset('welcome/img/red.png')}}">
				</div>
				<div class="info">
					<div class="details">
						<h1>TEE SHIRT</h1>
						<p>₱300 <del>₱350</del></p>
					</div>
					<div class="buy-btn">
						<button><a href="/login">More</a></button>
					</div>
				</div>
			</div>
		</div>
		<div class="product-wrapper">
			<div class="product">
				<div class="img">
					<img src="{{asset('welcome/img/hoodie.jpg')}}">
				</div>
				<div class="info">
					<div class="details">
						<h1>HOODIE</h1>
						<p>₱600 <del>₱700</del></p>
					</div>
					<div class="buy-btn">
						<button><a href="/login">More</a></button>
					</div>
				</div>
			</div>
		</div>
		<div class="product-wrapper">
			<div class="product">
				<div class="img">
					<img src="{{asset('welcome/img/polo1.jpg')}}">
				</div>
				<div class="info">
					<div class="details">
						<h1>POLO SHIRT</h1>
						<p>₱550 <del>₱600</del></p>
					</div>
					<div class="buy-btn">
						<button><a href="/login">More</a></button>
					</div>
				</div>
			</div>
		</div>
    <div class="product-wrapper">
			<div class="product">
				<div class="img">
					<img src="{{asset('welcome/img/pants1.jpg')}}">
				</div>
				<div class="info">
					<div class="details">
						<h1>PANTS</h1>
						<p>₱350 <del>₱370</del></p>
					</div>
					<div class="buy-btn">
						<button><a href="/login">More</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ABOUT US -->
<section class="about-us" id="about-us">
        <div class="container">
            <div class="container-content" style="background-color: #006685;">
                <h2>Contact Us</h2>
                <hr>
                    <p style="text-align: left;"><b>
                    SITIO MASIWA, MARIGONDON
                    M.L. QUEZON NATIONAL HIGHWAY, LAPU-LAPU CITY,
                    CEBU 6015
                    <br><br>
                    <i class="fa fa-calendar"></i>   MONDAY - SUNDAY 8:00 AM - 9:00 PM
                    <br>
                    <i class="fa fa-phone"></i>   0991 - 314 - 6785
                    <br>
                    <i class="fa fa-envelope"></i>   FILSPORTSHOP.TAILORING@GMAIL.COM</b></p>
                </div>

            <div class="container-content" style="background-color: #006685;">
                <h2>About Us</h2>
                <hr>
                    <p style="text-align: left;">
                    Filsports Printing Studio Website is a digital platform designed
                    to showcase and facilitate the services provided by
                    Filsports Printing Studio, a company likely located in the Philippines.
                    The website may provide information about the company's
                    printing services, which could include printing of sports-related
                    materials such as jerseys, banners, and more.
                    <br><br><br>
                    <b><a href="" class="button" data-toggle="modal" data-target="#termsModal">Terms and Conditions</a>
                    <br>
                    <b><a href="" class="button" data-toggle="modal" data-target="#policyModal">Privacy Policy</a>
                    <br><br>
                </div>
        </div>

        <!-- Modal Terms & Conditions -->
  <div class="modal fade" id="termsModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-right: -90rem;">&times;</button>
          <h3 class="modal-title" id="termsModal" style="margin-right: -23rem;"><b>Terms and Conditions</b></h3>
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
        </div>
      </div>
    </div>
  </div>
  

  <!-- Modal Privacy Policy -->
  <div class="modal fade" id="policyModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-right: -90rem;">&times;</button>
          <h3 class="modal-title" style="margin-right: -15rem;"><b>Privacy Policy</b></h3>
        </div>
        <div class="modal-body">
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

     <footer class="footer">
         <p><br>
            @ 2024 Filsports Printing Studio Website
        </p>
     </footer>

<script>
  document.addEventListener("DOMContentLoaded", function () {
	const images = document.querySelectorAll("img");
	images.forEach(image => {
		image.addEventListener("mouseenter",
			function () {
				this.style.transform = "scale(1.1) translateY(-15px)";
				this.style.boxShadow = "5px 20px 30px rgba(0, 0, 0, 0.2)";
			});
		image.addEventListener("mouseleave",
			function () {
				this.style.transform = "scale(1) translateY(0)";
				this.style.boxShadow = "none";
			});
	});
});
</script>

</body>
</html>