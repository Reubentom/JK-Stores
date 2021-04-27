  <!DOCTYPE html>
  <html lang="en">
    <head>
  
      <meta charset="utf-8">
      <title>Example 2</title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css" media="all" />
    </head>
    <body>
      <header class="clearfix">
    
        <div id="logo">
          <img src="<?php echo base_url();?>assets/images/logo/logo.png">
        </div>
        <center><div>
         <a href="<?php echo base_url();?>/Productshow">Go Back To Products-></a>
        </div></center>
        
       
       
        <div id="invoice">
          <h2 class="name">JK Stores</h2>
          <div>Ground Floor</div>
          <div>Teepeyem Enclave</div>
          <div>opp Gokul Ootupura</div>
          <div>Kadavanthra, Kochi</div>
          <div>Kerala, 683456</div>
          <div>(+91) 0923467891</div>
          <div><a href="mailto:jkstores4life@example.com">jkstores4life@example.com</a></div>
        </div>
        </div>
      
      </header>
      <main>
      
        <div id="details" class="clearfix">
          <div id="client">
            <div class="to" style="color:blue">BILL TO:</div>
            <h2 class="name"><?php  echo $data['user_fname']; ?> <?php  echo $data['user_lname']; ?></h2>
            <div class="address"><?php echo $data['user_mobile']; ?></div>
            <div class="email"><?php echo $data['user_email']; ?><a href="mailto:john@example.com"></a></div>
          </div>

          <div id="invoice">
            <div class="to" style="color:orange;">SHIP TO:</div>
            <h2 class="name"><?php echo $s_housename;?></h2>
            <div class="address"><?php echo $s_city;?>
            <?php echo $s_state;?>
            <?php echo $s_pincode;?></div>
            
          </div>
        
          
          
        </div>
        <div id="details">
            <h1>Reciept</h1>
            <div class="date">Date of Billing: <b> <?php echo $order_date ;?></b></div>
            <div class="date">Mode of Payment: <b> Cash on Delivery</b></div>
            
          </div>

      
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="no">#</th>
              <th class="desc">PRODUCT TITLE AND DESCRIPTION</th>
              <th class="unit">UNIT PRICE</th>
              <th class="qty">QUANTITY</th>
              <th class="total">TOTAL</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $count=1;
          $total=0;
          ?>
        <?php  foreach($data1 as $item) 
        {
          ?>
            <tr>
              <td class="no"><?php echo $count;?></td>
              <td class="desc"><h3><?php echo $item['p_title'];?>
              </h3><?php echo $item['p_description'];?></td>
              <td class="unit"><?php echo $item['p_cost'];?></td>
              <td class="qty"><?php echo $item['qty'];?></td>
              <td class="total"><?php echo  $item['p_cost']*$item['qty'];?></td>
              <?php $total=($item['p_cost']*$item['qty'])+$total; ?>
            </tr>
  <?php $count++;} ?>
          
        
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SUBTOTAL</td>
              <td><?php echo $total; ?></td>
            </tr>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SHIPPING CHARGES</td>
              <td><?php echo "₹20" ?></td>
            </tr>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">GRAND TOTAL</td>
              <td><?php echo 20+$total; ?></td>
            </tr>
          </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
          <div>NOTICE:</div>
          <div class="notice">All Orders Reaches Destination within 7 days of from the date of purchase.
          Only cash will be accepted.</div>
        </div>
      </main>
      <footer>
        Invoice was created on a computer and is valid without the signature and seal.
     
       
      </footer>
    </body>
  </html>