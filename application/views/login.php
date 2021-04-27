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
                        <form action="<?php echo base_url();?>login1" method="POST">
                            <div class="default-form-box">
                                <label>USER ID<span>*</span></label>
                                <input type="text" name="user_id" required  pattern="u.+" placeholder="Starts with u">
                            </div>
                            <div class="default-form-box">
                                <label>Password <span>*</span></label>
                                <input type="password" name="user_password" required>
                                <h1><?php  $message; ?> </h1>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                                
                                <a href="<?php echo base_url();?>login1/lost_password">Lost your password?</a>

                            </div>
                        </form>
                        </div>
                    </div>
                    <div  class="default-form-box mb-20" id="p">
                            
                            </div>
                            </div></div>
           
                <!--login area start-->
        

    <!-- Start Footer Section -->
    <?php include('footer.php'); ?>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
</html>