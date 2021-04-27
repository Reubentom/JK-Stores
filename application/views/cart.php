<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php include('productsHeader.php')?>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Cart</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete|update</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                       
                                        <?php
                                        $count=0;
                                        foreach($cart_item as $item)
                                        {

                                        ?>
                                        <tr>
                                        <form method=post action="<?php echo base_url() ?>cart/updateqtycart/<?php echo $item['product_id'];?>">
                                            <td class="product_remove"><a href="<?php echo base_url() ?>cart/removefromcart/<?php echo $item['product_id'];?>"><i class="fa fa-trash-o"></i></a>
                                            <input type=submit class="btn btn-xs btn-golden" value="update">
                                            </td>
                                            <td class="product_thumb"><a href="<?php echo base_url() ?>cart/removefromcart/<?php echo $item['product_id'];?>/<?php echo $item['product_id'];?>"><img
                                                        src="<?php echo $item['p_imagepath']?>"
                                                        alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html"><?php echo $item['p_title']?></a></td>
                                            <td class="product-price">₹<?php echo $item['p_cost']?></td>
                                           
                                            <td class="product_quantity"><a href="#">Show Quantity</a> 
                                            <input min="1"
                                                    max="100" value="<?php echo $item['qty'];?>" type="number" name="qty"></td>
                                            <td class="product_total">₹<?php echo $item['p_cost']*$item['qty'];
                                            $count=$count+$item['p_cost']*$item['qty'];
                                            ?></td>
                                        </tr> <!-- End Cart Single Item-->
                                        </form>
                                      <?php } ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">₹<?php echo $count; ?></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Rate:</span>₹20</p>
                                </div>
                                <a href="#">Calculate Shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">₹<?php $total=$count+20;echo $total ?></p>
                                </div>
                                <div class="checkout_btn">
                                <?php 
                                $this->load->library('session');
                                $this->session->set_userdata('current_date',date("Y/m/d")); 
                                
                                ?>
                                    <a href="<?php echo base_url()?>cart/proceedtocheckout/<?php echo $total; ?>" class="btn btn-md btn-golden" <?php if($total==20){echo "hidden";}?>>Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

     <?php include('footer.php'); ?> -->
</body>


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2021 10:39:20 GMT -->
</html>