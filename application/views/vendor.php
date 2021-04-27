<!DOCTYPE html>
<html lang="zxx">

    <?php include('header.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Welcome Vendor</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">My Account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dailysale" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active">Check Product Update Permission</a>
                            </li>
                            <li> <a href="#products" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Update Product</a></li>
                                    <li> <a href="#vendors" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Vendor Information</a></li>
                            <!-- <li><a href="#downloads" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Downloads</a></li> -->
                                    
                            <li><a href="<?php echo base_url();?>vendorLogin/open"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dailysale">
                        <h1><u>Product Update Permission</u></h1>
                        <br>
                        <h4 style="color:blue"><?php echo $info["p_edit_status"];?></h4>
                        <div class="save_button mt-3">
                            <?php if($info["p_edit_status"]=="No Request"){?>
                                <form method=post action="<?php echo base_url();?>Vendor/update_p_status ">                
                                <input class="btn btn-md btn-black-default-hover"
                                                    type="submit" value="Request for Product update" >
                            </form>
                                            </div>
                                            <?php } elseif($info["p_edit_status"]=="Rejected") {?>
                                                <form method=post action="<?php echo base_url();?>Vendor/update_p_status ">
                                            <input class="btn btn-md btn-black-default-hover"
                                                    type="submit" value="Request Again" >
                                            </form>     
                                            </div>
                                            <?php }else {?>
                                                <input class="btn btn-md btn-black-default-hover"
                                                    type="submit" value="" hidden>

                                            </div>
                                            <?php }?>
                        </div>
                          
<?php if($info['p_edit_status']=="Accepted") { ?>
  
 <?php    $this->session->set_userdata('v_brand',$info["v_brand"]); ?>
   
<?php } ?>
    

                        <div class="tab-pane fade" id="vendors">
                            <h4>Manage Vendors</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Vendor ID</th>
                                            <th>Vendor Name</th>
                                            <th>Vendor Brand</th>
                                            <th>Product Edit Staus</th>
                                            <th>Vendor Email</th>
                                            <th>Vendor Mobile</th>
                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $info['v_id']?></td>
                                            <td><?php echo $info['v_name']?></td>
                                            <td><?php echo $info['v_brand']?></td>
                                            <td><?php echo $info['p_edit_status']?></td>
                                            <td><?php echo $info['v_email']?></td>
                                            <td><?php echo $info['v_mobile']?></td>
                                           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="downloads">
                            <h4>Downloads</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div> -->


                        <div class="tab-pane fade" id="products">
                            <h3>Product Details</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <br>
                                            <div class="default-form-box mb-20">
                                            
                                             <form action="<?php echo base_url()."Vendor/updateProductEntries";?>" method=post>
                                                
                                               
                                             <?php if($info['p_edit_status']=="Accepted"){?>
                                                <label>Enter Product Id</label>
                                                <input type="text" name="pid" id="pid" required>
                                                <?php }else{ ?>
                                                <label><h4>Status: <?php echo $info['p_edit_status']?> </h4></label>
                                                <?php } ?>

                                               
                                         
                                               
                                            <div class="default-form-box mb-20" id="p">
                                               
                                            </div>
      
                                              </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <script>
	$(document).ready(function(){
       
 		$('#pid').change(function(){
        
  			var pid = $('#pid').val();
  			if(pid != '')
  			{
   				$.ajax({
    			url:'<?php echo base_url();?>Vendor/get_vendorproduct_details',
				method:"POST",
				data:{pid:pid},
    			success:function(data,status)
				{
					$('#p').html(data);
                    
				}
   				});
  			}
 		});	
	});
	</script>




                        <div class="tab-pane fade" id="users">
                            <h3>User Details</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <br>
                                            <div class="default-form-box mb-20">
                                                <label>Enter User Id</label>
                                                
                                                <input type="text" name="first-name" required>
                                                
                                                <div class="save_button mt-3">
                                                <button class="btn btn-md btn-black-default-hover"
                                                    type="submit">Get User Details</button>
                                                
                                            </div>
                                            </div>

                                            <div class="default-form-box mb-20">
                                                <label>User Password</label>
                                                <input type="text" name="first-name">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>First Name</label>
                                                <input type="password" name="user-password">
                                            </div>

                                            <div class="default-form-box mb-20">
                                                <label>Last Name</label>
                                                <input type="password" name="user-password">
                                            </div>
                                         
                                            <div class="default-form-box mb-20">
                                                <label>Mobile</label>
                                                <input type="text" name="last-name">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>User Email</label>
                                                <input type="text" name="email-name">
                                            </div>
                                            

                                            

                                        
                                            <div class="save_button mt-3">
                                                <button class="btn btn-md btn-black-default-hover"
                                                    type="submit">Update Entries</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                


                            </div>
                        </div>








                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
<br>
<br>
<br>
<br><br><br><br><br><br>


    <?php include('footer.php'); ?>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
</html>