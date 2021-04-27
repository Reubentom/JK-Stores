<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php include('header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Register</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <script>
	$(document).ready(function(){
        
 		$('#user_mobile').mouseleave(function(){
            
  			var user_mobile = $('#user_mobile').val();
  			if(user_mobile !="")
  			{
   				$.ajax({
    			url:'<?php echo base_url();?>Register/chekmobile',
				method:"POST",
				data:{user_mobile:user_mobile},
    			success:function(data,status)
				{
					$('#p').html(data);
                    
				}
   				});
  			}
 		});	
	});
	</script>


    

	</script>
                <!--login area start-->
        <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-12">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Register Now</h3>
                        <form action="<?php echo base_url();?>Register/addnewuser" method="post">
                            <div class="default-form-box">
                                <label>User Password<span>*</span></label>
                                <input type="text" name="user_password" required>
                            </div>

                            <div class="default-form-box">
                                <label>Confirm Password</label>
                                <input type="password" name="user_cpassword" required>
                                <label style="color:red;"><?php echo $check;?></label>
                            </div>
                            <div class="default-form-box">
                                <label>First Name<span>*</span></label>
                                <input type="text" name="user_fname" required>
                            </div>
                            <div class="default-form-box">
                                <label>Last Name<span>*</span></label>
                                <input type="text" name="user_lname" required>
                            </div>

                            <div class="default-form-box">
                                <label>Mobile<span>*</span></label>
                                <input type="text" name="user_mobile" id="user_mobile" required>
                                <label style="color:red;"><?php echo $check2;?></label>
                                
                            </div>

                            <div class="default-form-box">
                                <label>Email<span>*</span></label>
                                <input type="email" name="user_email" id="user_email" required>
                                <label style="color:red;"><?php echo $check1;?></label>
                                
                            </div>
                           
                            <div class="save_button mt-3">
                                                <input type=submit class="btn btn-md btn-black-default-hover"
                                                  value="Save Entries">
                                            </div>
                            
                            </div>
                           
                            
                           
                           
                        </form>
                    </div>
                </div>
                <div  class="default-form-box mb-20" id="p">
                            
                 </div>
                 </div></div>

    










                       


                

    <!-- Start Footer Section -->
    <?php include('footer.php'); ?>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
</html>