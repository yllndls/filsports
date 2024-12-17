@extends('user.layout')

@section('content')

<!-- about us-->

<section class="about-us">
  <div class="container-abt" style="background-color: #006685">
      <div class="container-content">
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
      
      <div class="container-content">
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
              <b><a href="" class="button" data-toggle="modal" data-target="#termsModal" style="font-size: 18px;">Terms and Conditions</a>
              <br>
              <b><a href="" class="button" data-toggle="modal" data-target="#policyModal" style="font-size: 18px;">Privacy Policy</a>
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

 @endsection
