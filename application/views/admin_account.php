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
                        <h3 class="breadcrumb-title">Welcome Admin</h3>
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
                                    class="nav-link btn btn-block btn-md btn-black-default-hover ">View All Order Reports</a>
                            </li>
                            <li> <a href="#orders" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">View Daily Sales</a></li>
                            <!-- <li><a href="#downloads" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Downloads</a></li> -->
                                    <li><a href="#vendors" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active" >Manage Vendors</a></li>
                            <li><a href="#products" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Manage Products</a>
                            </li>
                            <li><a href="#addnewproducts" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Add new Products</a>
                            </li>

                            <li><a href="#users" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover" hidden>Manage Users</a>
                            </li>
                            <li><a href="<?php echo base_url();?>/adminaccount/logout"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dailysale">
                        <h4>All Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>User ID</th>
                                            
                                            <th>Order Total</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($orders as $order)
                                        {

                                        ?>
                                        <tr>
                                            <td><?php echo $order['order_id'] ?></td>
                                            <td><?php echo $order['order_date'] ?></td>
                                            <td><?php echo  $order['user_id'] ?></td>

                                            <td><?php echo $order['order_total'] ?></td>
                                            <td><span class="success"><?php echo $order['order_status'] ?></span></td>
            
                                            <td>
                                            
                                            <a href="<?php echo base_url();?>adminaccount\deleteorders\<?php echo $order['order_id'];?>" class="view">Delete </a></td>
                                        </tr>
                                        <?php }?>
                                       
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h4>Today's Order Report</h4>

                            <h4>Date: <?php  echo date("Y-m-d")?></h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>User ID</th>
                                           
                                            <th>Order Total</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ord as $o)
                                        {
?>
                                        <tr>
                                            <td><?php echo $o['order_id'] ?></td>
                                            <td><?php echo $o['order_date'] ?></td>
                                            <td><?php echo $o['user_id'] ?></td>
                                            <td><?php echo $o['order_total'] ?></td>
                                            <td><?php echo $o['order_status'] ?></td>
                                           
                                            
            
                                            <td><a href="<?php  echo base_url(); ?>/adminaccount/showbilladmin/<?php echo  $o['order_id'];?>" class="view">view |</a>
                                            
                                            <a href="<?php echo base_url();?>adminaccount\deleteorders\<?php echo $order['order_id'];?>" class="view">Delete </a></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



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
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($vendor as $v)
                                        {
?>
                                        <tr>
                                            <td><?php echo $v['v_id']; ?></td>
                                            <td><?php echo $v['v_name']; ?></td>
                                            <td><?php echo $v['v_brand']; ?></td>
                                            <td><?php echo $v['p_edit_status']; ?></td>
                                            <td><?php echo $v['v_email']; ?></td>
                                            <td><?php echo $v['v_mobile']; ?></td>
                                            <?php if($v['p_edit_status']=="No Request") 
                                           echo '<td><a  class="view" >-</a>';
                                           else if($v['p_edit_status']=="Pending")
                                           echo ' <td><a href="adminaccount/accept/'.$v['v_id'].'" class="view" >Accept |</a>
                                           <a href=adminaccount/reject/'.$v['v_id'].' class="view">Reject </a>';
                                           else if($v['p_edit_status']=="Accepted")
                                           echo '<td><a href="adminaccount/reject/'.$v['v_id'].'" class="view">Reject</a></td>';
                                            else
                                            echo '<td><a href="adminaccount/accept/'.$v['v_id'].'" class="view" >Accept</a>';
                                           ?>
                                            
                                           
                                            
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
                       
                        <div class="tab-pane fade" id="products">
                            <h3>Product Details</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <br>
                                            <div class="default-form-box mb-20">
                                            
                                             <form action="<?php echo base_url()."Adminaccount/updateProductEntries";?>" method=post>
                                                <label>Enter Product Id</label>
                                                
                                                <input type="text" name="pid" id="pid" required>
                                                
                                               
                                         
                                               
                                            <div class="default-form-box mb-20" id="p">
                                               
                                            </div>
      
                                              </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <script>
	$(document).ready(function(){
        
 		$('#pid').mouseleave(function(){
            
  			var pid = $('#pid').val();
  			if(pid != '')
  			{
   				$.ajax({
    			url:'<?php echo base_url();?>Adminaccount/get_product_details',
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


                         <!-- adding new product to the table -->


                         

                         
</div>            


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

                        <!-- adding new product -->
                        <div class="tab-pane fade" id="addnewproducts">
                            <h3>Add New Products</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <br>
                                        <form method=post action="<?php base_url();?>adminaccount/addnewproduct" >

                                        </div> 
    <div class="default-form-box mb-20">
    <label hidden>Product Id</label>
    <input type="text" name="product_id" id="product_id" hidden>
    <div id="check"></div>
</div>
        <div class="default-form-box mb-20">
        <label hidden>Product Category</label>
        <select name="p_category" id="" required>
            <option value="" selected disabled>Category List</option>
            <option value="Men's Formal Shoes">Men's Formal Shoes</option>
            <option value="Women's Sports and Outdoor Shoes">Women's Sports and Outdoor Shoes</option>
            <option value="Mens Sport And Outdoors">Mens Sport And Outdoors</option>
            <option value="Mens Casual Shoes">Mens Casual Shoes</option>
            
        </select>
    </div>
    <br><br>
    <div class="default-form-box mb-20">
<label>Product cost</label>
<input type="number" min=1 max=1000000 name="p_cost" id="p_cost" required>
</div> 
    <div class="default-form-box mb-20">
    <label>Product Title</label>
    <input type="text" name="p_title" id="p_category" required>
</div>
<div class="default-form-box mb-20">
    <label>Product Brand</label>
    <select name="brand" id="" required>
            <option value="" selected disabled class=required>Brand List</option>
            <option value="Addidas">Addidas</option>
            <option value="Nike">Nike</option>
            <option value="Woodlands">Woodlands</option>
            <option value="Hush Puppies">Hush Puppies</option>
            <option value="Skechers">Skechers</option>
        </select>
</div> 
<br><br>
<div class="default-form-box mb-20">
<label>Product Description</label>
<textarea height=100 name="p_description" id="p_category" required></textarea>
</div> 
<div class="default-form-box mb-20">
<label>Product Imagepath</label>
<input type="text" name="p_imagepath" id="p_category" required>
</div> 
<div class="default-form-box mb-20">
<label>Product Size</label>
<input type="number" name="p_size" id="p_category" max=14 required>
</div> 
<div class="default-form-box mb-20">
<label>Product Type</label>
<input type="text" name="p_type" id="p_category" required>
</div> 
<div class="save_button mt-3">
<input type=submit class="btn btn-md btn-black-default-hover"
value="Add new Product" >
</div>
                                        </form>
                                    </div>
                                </div>                                            


                                


                            </div>
                        </div>



<script>select = document.getElementById('select'); // or in jQuery use: select = this;
if (select.value) {
  // value is set to a valid option, so submit form
  return true;
}
return false; </script>




                    </div>
                </div>
            </div>
        </div>
    <script>
	$(document).ready(function(){
     
 		$('#product_id').mouseleave(function(){
            
  			var product_id = $('#product_id').val();
  			if(product_id != '')
  			{
   				$.ajax({
    			url:'<?php echo base_url();?>Adminaccount/checkproductid',
				method:"POST",
				data:{product_id:product_id},
    			success:function(data,status)
				{
					$('#check').html(data);
                    
				}
   				});
  			}
 		});	
	});
	</script>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
<br>
<br>
<br>
<br><br><br><br><br><br>
   
    <?php include('footer.php'); ?>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:21 GMT -->
</html>