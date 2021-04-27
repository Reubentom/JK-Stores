<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php include('header.php'); ?>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Login</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Login</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-12">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>login</h3>
                        <form action="<?php echo base_url();?>vendorLogin" method="POST">
                            <div class="default-form-box">
                                <label>Vendor Login<span>*</span></label>
                                <input type="text" name="v_id" required>
                            </div>
                            <div class="default-form-box">
                                <label>Email Id<span>*</span></label>
                                <input type="text" name="v_email" required>
                                <h1 style="color:red"><?php  $message; ?> </h1>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="offer">
                                    <span>Remember me</span>
                                </label>
                                <a href="#">Lost your password?</a>

                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->
        

    <!-- Start Footer Section -->
    <?php include('footer.php'); ?>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
</html>