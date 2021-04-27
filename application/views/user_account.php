<!DOCTYPE html>
<html lang="zxx">

    <?php include('productsHeader.php'); ?>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Welcome, <?php echo $data['user_fname'];?> <?php echo $data['user_lname'];?></h3>
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
                           
                            <li> <a href="#orders" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover ">View Orders</a></li>
                            <!-- <li><a href="#downloads" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Downloads</a></li> -->
                            <li><a href="#address" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Shipping Addresses</a></li>
                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
                            </li>
                            <li><a href="<?php echo base_url();?>Productshow" 
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active">continue Shopping</a>
                            </li>
                            <li><a href="<?php echo base_url();?>login1"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover ">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                       
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $count=0; ?>
                                    <?php foreach($allorders as $ord)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo ++   $count; ?></td>
                                            <td><?php echo $ord['order_date']; ?></td>
                                            <td><span class="success"><?php echo $ord['order_status']; ?></span></td>
                                            <td><?php echo $ord['order_total']; ?></td>
                                            <?php if($ord['order_status']=="pending"){?>
                                            <td><a href="<?php echo base_url()?>useraccount/gotocart" class="view"> Proceed to Payment</a></td><?php }else{ ?>
                                                <td><a href="<?php  echo base_url(); ?>/useraccount/showbill/<?php echo  $ord['order_id']; ?>" class="view">View Bill</a></td><?php } ?>
                                            
                                           
                                        </tr>
                                        <?php } ?>
                                      
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
                        <div class="tab-pane" id="address">
                        
                            <h3>Shipping Details</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="<?php if($ship['s_firstname']!="") {echo base_url()."Useraccount/updateshipdetails";} else {echo base_url();}  ?>" method=post>
                                            <!-- <p>Already have an account? <a href="#">Log in instead!</a></p>
                                            <div class="input-radio">
                                                <span class="custom-radio"><input type="radio" value="1"
                                                        name="id_gender"> Mr.</span>
                                                <span class="custom-radio"><input type="radio" value="1"
                                                        name="id_gender"> Mrs.</span>
                                            </div>  -->
                                            <br>
                                            <div class="default-form-box mb-20">
                                                <label>First Name</label>
                                                <input type="text" name="s_firstname"  value="<?php echo $ship['s_firstname']?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Last Name</label>
                                                <input type="text" name="s_lastname" value="<?php echo $ship['s_lastname'];?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>House Name</label>
                                                <input type="text" name="s_housename" value="<?php echo $ship['s_housename']?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>City</label>
                                                <input type="text" name="s_city" value="<?php  echo $ship['s_city']?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>State</label>
                                                <input type="text" name="s_state" value="<?php  echo $ship['s_state']?>" required>
                                            </div>


                                            <div class="default-form-box mb-20">
                                                <label>Pincode</label>
                                                <input type="number" name="s_pincode" value="<?php  echo $ship['s_pincode']?>" required>
                                            </div>
                                            <!-- <span class="example">
                                                (E.g.: 05/31/1970)
                                            </span> -->
                                            <br>
                                           
                                            <!-- <br>
                                            <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                                <input type="checkbox" id="newsletter">
                                                <span>Sign up for our newsletter<br><em>You may unsubscribe at any
                                                        moment. For that purpose, please find our contact info in the
                                                        legal notice.</em></span>
                                            </label> -->
                                            <div class="save_button mt-3">
                                            <?php if($ship['value']==1)
                                                echo '<input type="submit" class="btn btn-md btn-black-default-hover"
                                                    value="Update Entries">';
else
echo '<input type="submit" class="btn btn-md btn-black-default-hover"
value="Save">';
                                                   ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details </h3>
                            <div class="login"> 
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="<?php echo base_url();?>/Useraccount/updateDetails" name =f1 method=post>
                                            <!-- <p>Already have an account? <a href="#">Log in instead!</a></p>
                                            <div class="input-radio">
                                                <span class="custom-radio"><input type="radio" value="1"
                                                        name="id_gender"> Mr.</span>
                                                <span class="custom-radio"><input type="radio" value="1"
                                                        name="id_gender"> Mrs.</span>
                                            </div> <br> --><br>
                                            <div class="default-form-box mb-20">
                                                <label>User Id</label>
                                                <input type="text" name="user_id" value="u<?php echo $this->session->userdata('user_id');?>" disabled>
                                            </div>

                                            <div class="default-form-box mb-20">
                                                <label>Password</label>
                                                <input type="text" name="user_password" value="<?php echo $data['user_password'];?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>First Name</label>
                                                <input type="text" name="user_fname"  value="<?php echo $data['user_fname'];?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Last Name</label>
                                                <input type="text" name="user_lname" value="<?php echo $data['user_lname'];?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email</label>
                                                <input type="email" name="user_email"  value="<?php echo $data['user_email'];?>" required>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Mobile</label>
                                                <input type="number" length=10 name="user_mobile"  value="<?php echo $data['user_mobile'];?>" required>
                                            </div>
                                            <!-- <div class="default-form-box mb-20">
                                                <label>Birthdate</label>
                                                <input type="date" name="birthday">
                                            </div>
                                            <span class="example">
                                                (E.g.: 05/31/1970)
                                            </span>
                                            <br>
                                            <label class="checkbox-default" for="offer">
                                                <input type="checkbox" id="offer">
                                                <span>Receive offers from our partners</span>
                                            </label>
                                            <br>
                                            <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                                <input type="checkbox" id="newsletter">
                                                <span>Sign up for our newsletter<br><em>You may unsubscribe at any
                                                        moment. For that purpose, please find our contact info in the
                                                        legal notice.</em></span>
                                            </label> -->
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