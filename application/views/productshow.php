<!DOCTYPE html>
<html lang="zxx">

    <?php include('productsHeader.php')?>


    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Product Shop</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Shop Grid Left Sidebar</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            <!-- Start Single Menu Collapse List -->
                                            <li class="sidebar-menu-collapse-list">
                                                <div class="accordion">
                                                
                                                    <div id="men-fashion" class="collapse">
                                                        <ul class="accordion-category-list">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Jackets &amp; Coats</a></li>
                                                            <li><a href="#">Sweaters</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Blouses &amp; Shirts</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> <!-- End Single Menu Collapse List -->
                                        </ul>
                                    </li>
                                    <li><a href="<?php base_url();?>MensSportsAndOutdoors">Mens Sports And Outdoors</a></li>
                                   
                                    <li><a href="<?php base_url();?>MensFormalShoes"> Mens Formal Shoes</a></li>
                                    <li><a href="<?php base_url();?>WomensSportsAndOutdoors">Women's Sports and Outdoor Shoes</a></li>
                                   
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                       

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SORT BY BRANDS</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                
                                                <span><li><a href="<?php base_url();?>Addidas">ADDIDAS</a></li></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                
                                                <span><li><a href="<?php base_url();?>Nike">NIKE</a></li></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                
                                                <span><li><a href="<?php base_url();?>Woodlands">WOODLANDS</a></li></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                
                                                <span><li><a href="<?php base_url();?>hushpuppies">HUSH PUPIES</a></li></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                
                                                <span><li><a href="<?php base_url();?>skechers">SKECHERS</a></li></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                        <form action="<?php echo base_url();?>Refine" method=post>
                            <h6 class="sidebar-title">SORT BY TYPE</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black" name=c1 value="Sports">
                                                <span>RUNNING SHOES</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue" name=c2 value="shoe">
                                                <span>SPORTS SHOES</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown" name=c3 value="Running">
                                                <span>RUNNING SHOES</span>
                                            </label>
                                        </li>
                                        
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink" name=c1 >
                                                <span>SEMI FORMAL SHOES</span>
                                            </label>
                                        </li>
                                        <li>
                                         <br>
                                        </li>   

                                        <li>
                                           
                                                
                                                <span><label>   <input class="btn btn-md btn-black-default-hover mb-4" type="Submit" value="Refine Search"></label></span>
                                            
                                        </li>

</form>


                                       
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">PRODUCT PRICE</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">ALL PRICES</a>
                                    <a href="<?php echo base_url(); ?>under500">UNDER ₹500</a>
                                    <a href="<?php echo base_url(); ?>bw5001000">₹500 - ₹1000</a>
                                    <a href="<?php echo base_url(); ?>bw10002500">₹1000 - ₹2500</a>
                                    <a href="<?php echo base_url(); ?>bw25005000">₹2500 - ₹5000</a>
                                    <a href="<?php echo base_url(); ?>abv5000">OVER ₹5000</a>
                                    <a href="#"></a>
                                 
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="assets/images/banner/add1.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                         <!-- Start Single Sidebar Widget -->
                         <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="assets/images/banner/woods.png" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->


                       
                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                     <!-- End Sort tab Button -->

                                   <!-- Start Sort Select Option --> 
                                    <!-- <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sort By:</label>
                                        <form action="#">
                                            <fieldset>
                                                <select name="speed" id="speed">
                                                    <option>Sort by average rating</option>
                                                    <option>Sort by popularity</option>
                                                    <option selected="selected">Sort by newness</option>
                                                    <option>Sort by price: low to high</option>
                                                    <option>Sort by price: high to low</option>
                                                    <option>Product Name: Z</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option --! -->



                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <?php 
                                                                    $this->session->set_userdata('previous_url',current_url());
                                                                    ?>
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
<?php 
$count=0;
foreach($product as $p)
{
    $count+=1;
    
?>


                                                <div class="col-xl-4 col-sm-6 col-12">
                                                  <!-- Start Product Default Single Item -->
                                                  <div class="product-default-single-item product-color--golden"
                                                        data-aos="fade-up" data-aos-delay="200">
                                                        <div class="image-box">
                                                            <a href="<?php echo base_url();?>Productsdescription/find/<?php echo $p['product_id'];?>" class="image-link">
                                                                <img src="<?php echo $p['p_imagepath'];?>"
                                                                    alt="">
                                                                
                                                            </a>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                   
                                                                    
                                                                       <a href="<?php echo base_url(); ?>cart/addproducttocart/<?php echo $p['product_id'];?>" 
                                                        data-bs-target="#modalAddcart">Add to Cart</a>
                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h1 class="title"><?php echo $p['p_title']?>
                                                                        </h1>


                                                                        <h9 class="sub-title"><?php echo $p['p_description']?>
                                                                        </h9>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="empty"><i class="ion-android-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right">
                                                                <span class="price">₹<?php echo $p['p_cost']?></span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->  
                                                  </div>
                                                 <?php }?>
                                                <mark><b> <div class="page-amount ml-2">Showing <?php echo $count; ?> Products<br<br></h5></b></mark>
                                        </span>
                                        </div>
                                                 


                                                  
                                   


   

    <!-- material-scrolltop button -->
    



    
             
     


    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/shop-grid-sidebar-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:20 GMT -->
</html>