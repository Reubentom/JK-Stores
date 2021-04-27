<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Datamodel extends CI_Model{

    function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    	//$this->load->model('Logindatamodel');
    }
	
    public function keepincart($table,$data)
    {
	
      $query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'"AND user_id="'.$data['user_id'].'" ');
      if($query->num_rows()>0)
      {
        echo "it works ";
        
         $query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'" and user_id="'.$data['user_id'].'"  ');
          $qty=$query->row('qty')+1;
         // echo $data['qty'];
        $whereclause=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id']);
        $data1=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id'],'qty'=>$qty);
      //  $value=array('name'=>$name,'email'=>$email);
        $this->db->where($whereclause);
        $this->db->update('cart',$data1);
      }
      else{
        // echo "this product is added for the first time ";
          $data['qty']=1;
          $this->db->insert($table,$data);    
          }
    }


    public function showcartdetails($table)
    {
       
            $id=$this->session->userdata('user_id');
            // $res=$this->db->where('user_id',$id)->get($table);
            $query=$this->db->query('select products.product_id,products.p_imagepath,products.p_title,products.p_cost,cart.qty from(products inner join cart on products.product_id=cart.product_id)where cart.user_id='.$id.'');

            //$query= $this->db->query('select products.p_title,products.p_cost,cart.qty from(products inner join cart on products.product_id=cart.product_id)where user_id='.$id.'');
          // $query=$this->db->query->('select products.product_title,products.p_cost,cart.qty');
             //result set method to get the all the data of the table to be send to the controller
            //Select count(*) from table where name = @name and id = @id
           
            return $query->result_array();
        
    }



    public function updateEditStatus()
    {
      $id=$this->session->userdata('v_id');
      $this->db->where('v_id',$id);
      $data1['p_edit_status']="Pending";
      $this->db->update('vendor',$data1);
    }

    public function deleteproductfromcart($table,$data)
    {
       
            $id=$this->session->userdata('user_id');
            // $res=$this->db->where('user_id',$id)->get($table);
            $query=$this->db->query('delete from cart where user_id='.$id.' and product_id="'.$data['product_id'].'"');
            echo "product deleted from the cart";
            //$query= $this->db->query('select products.p_title,products.p_cost,cart.qty from(products inner join cart on products.product_id=cart.product_id)where user_id='.$id.'');
          // $query=$this->db->query->('select products.product_title,products.p_cost,cart.qty');
             //result set method to get the all the data of the table to be send to the controller
            //Select count(*) from table where name = @name and id = @id
           
            //return $query->result_array();
        
    }


    public function showqty($table)
    {
       
            $id=$this->session->userdata('user_id');
            // $res=$this->db->where('user_id',$id)->get($table);
             $query=$this->db->query('select * from cart  where user_id ='.$id.'');
           
             //result set method to get the all the data of the table to be send to the controller
            //Select count(*) from table where name = @name and id = @id
           // var_dump($query->result_array);
            return $query->result_array();
        
    }





    public function addorder($table,$data)
    {
	
      $query=$this->db->query('select order_id from orders where user_id="'.$data['user_id'].'" AND order_status="pending"');
      if($query->num_rows()>0)
      {
       // echo "no repeats for today";
         
        
        $order_id=$query->row()->order_id;
        echo $order_id;
        $query=$this->db->query('select * from cart where user_id="'.$data['user_id'].'" ');
        $this->db->where('order_no',$order_id)->delete('orderproduct');
        $this->db->where('order_id',$order_id)->delete('orders');
        $data['order_status']="pending";
        $data['order_id']=$order_id;
        $this->db->insert('orders',$data);
        $query=$this->db->query('select order_id from orders where user_id="'.$data['user_id'].'"AND order_date="'.$data['order_date'].'" AND order_status="pending"'); 
        $order_id=$query->row()->order_id;
        $query=$this->db->query('select * from cart where user_id="'.$data['user_id'].'"');
        $this->db->where('order_no',$order_id);
        foreach($query->result_array() as $row)
        {
          $data1['product_id']=$row['product_id'];
          $data1['qty']=$row['qty'];
          $data1['order_no']=$order_id;
          
         
          $this->db->insert("orderproduct",$data1);
         
        }
         // echo $data['qty'];
       // $whereclause=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id']);
       // $data1=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id'],'qty'=>$qty);
      //  $value=array('name'=>$name,'email'=>$email);
       // $this->db->where($whereclause);
      //  $this->db->update('cart',$data1);
      }
      else{
        echo "this order is added for the first time ";
          $data['order_status']="pending";
          $this->db->insert($table,$data); 
          $query=$this->db->query('select * from orders where user_id="'.$data['user_id'].'"AND order_date="'.$data['order_date'].'" AND order_status="pending"');
         $data1['order_no']=$query->row()->order_id;
         $this->session->set_userdata('order_no',$data1['order_no']);
          $query=$this->db->query('select * from cart where user_id="'.$data['user_id'].'"');
          //var_dump($query->row());
          foreach($query->result_array() as $row)
           {
             $data1['product_id']=$row['product_id'];
             $data1['qty']=$row['qty'];
             //$data1['order_no']=$order_id;
             $this->db->insert("orderproduct",$data1);
           }
         //$this->db->insert($table,$data);    
          }
    }

    public function checkoutdata($table)
    {
       
            $id=$this->session->userdata('user_id');
            $query=$this->db->query('select products.p_title,products.p_cost,cart.qty from(products inner join cart on products.product_id=cart.product_id)where cart.user_id='.$id.'');
            return $query->result_array();
        
    }


    public function aboutuserdata($table)
    {
       
            $id=$this->session->userdata('user_id');
            $query=$this->db->query('select * from user where user_id='.$id.'');
           // var_dump($query->result_array());
           // return $query->result_array(0);
           $data['user_id']=$query->row()->user_id;
           $data['user_password']=$query->row()->user_password;
           $data['user_mobile']=$query->row()->user_mobile;
           $data['user_fname']=$query->row()->user_fname;
           $data['user_lname']=$query->row()->user_lname;
           $data['user_email']=$query->row()->user_email;
           return $data;
        
    }

    public function aboutuserdataadmin($d)
    {
       
            $id=$d;
            $query=$this->db->query('select * from user where user_id='.$id.'');
           // var_dump($query->result_array());
           // return $query->result_array(0);
           $data['user_id']=$query->row()->user_id;
           $data['user_password']=$query->row()->user_password;
           $data['user_mobile']=$query->row()->user_mobile;
           $data['user_fname']=$query->row()->user_fname;
           $data['user_lname']=$query->row()->user_lname;
           $data['user_email']=$query->row()->user_email;
           return $data;
        
    }

    public function updateqtyincart($table,$data)
    {
		
     // $query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'"AND user_id="'.$data['user_id'].'" ');
      
      //  echo "it works ";
         // 
         //$query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'" and user_id="'.$data['user_id'].'"  ');
          $data['qty'];
        // echo $data['qty'];
        $whereclause=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id']);
        $data1=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id'],'qty'=>$data['qty']);
      //  $value=array('name'=>$name,'email'=>$email);
       $this->db->where($whereclause);
      $this->db->update('cart',$data1);
      //echo "Quantity is updated";
     
    }
   
    public function productpageqty($table,$data)
    {
	
      $query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'"AND user_id="'.$data['user_id'].'" ');
      if($query->num_rows()>0)
      {
      //  echo "it works ";
        
         $query=$this->db->query('select qty from cart where product_id="'.$data['product_id'].'" and user_id="'.$data['user_id'].'"  ');
          $qty=$data['qty'];
       //  echo $data['qty'];
        $whereclause=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id']);
        $data1=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id'],'qty'=>$qty);
      //  $value=array('name'=>$name,'email'=>$email);
        $this->db->where($whereclause);
        $this->db->update('cart',$data1);
      }
      else{
        // echo "this product is added for the first time ";
          $data['qty']=$data['qty'];
          $this->db->insert($table,$data);    
          }
    }
	
    public function userinfobill($data)
    {
       
            $id=$this->session->userdata('user_id');
            // $res=$this->db->where('user_id',$id)->get($table);
            $query=$this->db->query('select * from user where user_id='.$data['user_id'].'');

            return $query->result_array();
        
    }



    public function ordersbill($table,$data)
    {
   //   $id=$this->session->userdata('user_id');
   //  $query=$this->db->query('select order_id from orders where user_id='.$id.' and order_status="confirmed"');
  // $data1=$query->row()->order_id;
  $data['order_id']=$this->session->userdata('order_no');
   //  echo $data1;
    $query=$this->db->query('select products.p_description, products.p_title,products.p_cost,orderproduct.qty from(products inner join orderproduct on products.product_id=orderproduct.product_id)where orderproduct.order_no='.$data['order_id'].'');
    // foreach($query->result_array() as $row)
    //        {
    //         $data['p_title']=$row['p_title'];
    //         $data['qty']=$row['qty'];
        
    //       echo $data['p_title'];
    //        echo $data['qty'];
           
    //        }
  
  return $query->result_array();
  
  
  }



  public function ordersdate()
  {
    $id=$this->session->userdata('user_id');
    $data=$this->session->userdata('order_no');
  //echo $data;
  $query=$this->db->query('select * from orders where order_id='.$data.'');
  // foreach($query->result_array() as $row)
  //        {
  //         $data['p_title']=$row['p_title'];
  //         $data['qty']=$row['qty'];
      
  //       echo $data['p_title'];
  //        echo $data['qty'];
         
  //        }

return $query->row()->order_date;
}

public function ordersdateadmin()
  {
    //$id=$this->session->userdata('user_id');
    $data=$this->session->userdata('order_no');
  //echo $data;
  $query=$this->db->query('select * from orders where order_id='.$data.'');
  // foreach($query->result_array() as $row)
  //        {
  //         $data['p_title']=$row['p_title'];
  //         $data['qty']=$row['qty'];
      
  //       echo $data['p_title'];
  //        echo $data['qty'];
         
  //        }

return $query->row()->order_date;
}

public function ordersconfirmation()
{
  $id=$this->session->userdata('user_id');

$whereclause=array('user_id'=>$id,'order_status'=>"pending");
$data1=array('order_status'=> "confirmed",'order_date'=>date("Y/m/d"));
$this->db->where($whereclause);
$this->db->update('orders',$data1);


$where=array('user_id'=>$id);
$this->db->where($where);
$this->db->delete('cart');




}

public function usershipping()
{
  $data['user_id']=$this->session->userdata('user_id');
  $query=$this->db->query('select * from shippingdetails where  user_id = "'.$data['user_id'].'" ');
// echo $query->row()->s_firstname;
error_reporting(0);
  if($query->row()->s_firstname!=null)
  {
  $d['hasval']=1;
    $d['s_firstname']=$query->row()->s_firstname;
    $d['s_lastname']=$query->row()->s_lastname;
  
    $d['s_state']=$query->row()->s_state;
  
    $d['s_city']=$query->row()->s_city;
  
    $d['s_housename']=$query->row()->s_housename;
  
    $d['s_pincode']=$query->row()->s_pincode;
  }
  else{
    $d['hasval']=0;
    $d['s_firstname']="";
    $d['s_lastname']="";
  
    $d['s_state']="";
  
    $d['s_city']="";
  
    $d['s_housename']="";
  
    $d['s_pincode']="";
  }
 

  error_reporting(1);

  return $d;
}


public function ship_details_save($data)
{
  $data['user_id']=$this->session->userdata('user_id');
  $this->db->insert('shippingdetails',$data);
      
      //  $query=$this->db->query('select * from shippingdetails where');
       // $data['user_id']=$query->row()->user_id;

        return "Saved Entries";
}


public function userorders()
{
  $id=$this->session->userdata('user_id');

$query=$this->db->query('select * from orders where user_id='.$id.'');
//echo "it works fine";
return $query->result_array();
}

public function showuserorderreciept($data)
{
//echo $data['order_no'];
  $query=$this->db->query('select products.p_description, products.p_title,products.p_cost,orderproduct.qty from(products inner join orderproduct on products.product_id=orderproduct.product_id)where orderproduct.order_no='.$data['order_no'].'');
  //$data['']=$res->row()->p_category;
  return $query->result_array();
}


//sample ajax working 
public function get_product_det($pid)
    {
       // $query = $this->db->query("select * from products where product_id='.$pid.'");
        $res=$this->db->where('product_id',$pid)->get("products");
        if($res->num_rows()>0)
        {
   // foreach($query->result() as $row)
   $data['p_category']=$res->row()->p_category;
   $data['p_title']=$res->row()->p_title;
   $data['p_cost']=$res->row()->p_cost;
   $data['p_brand']=$res->row()->p_brand;
   $data['p_description']=$res->row()->p_description;
   $data['p_imagepath']=$res->row()->p_imagepath;
   $data['p_size']=$res->row()->p_size;
   $data['p_type']=$res->row()->p_type;
   // $data['p_cat']; 
    //  $data['text']="hi";
           return '
           <div class="default-form-box mb-20">
          
               <label>Product Category</label>
               <input type="text" name="p_category" id="p_category" value="'.$data['p_category'].'" required>
           </div>
           <div class="default-form-box mb-20">
          
           <img src="'.$data['p_imajgepath'].'" height=400 width=300>
       </div>
           
           <div class="default-form-box mb-20">
<label>Product cost</label>
<input type="number"  min=5 max= 100000 name="p_cost" id="p_cost" value="'.$data['p_cost'].'" required>
</div> 
           <div class="default-form-box mb-20">
           <label>Product Title</label>
           <input type="text" name="p_title" id="p_category" value="'.$data['p_title'].'" required>
       </div>
       <div class="default-form-box mb-20">
           <label>Product Brand</label>
           <input type="text" name="p_brand" id="p_category" value="'.$data['p_brand'].' " required>
       </div> 
       <div class="default-form-box mb-20">
       <label>Product Description</label>
       <textarea height=100 name="p_description" id="p_category" '.$data['p_description'].' required>'.$data['p_description'].'</textarea>
   </div> 
   <div class="default-form-box mb-20">
   <label>Product Imagepath</label>
  
   <input type="text" name="p_imagepath" id="p_category" value="'.$data['p_imagepath'].'" required>
</div> 
<div class="default-form-box mb-20">
<label>Product Size</label>
<input type="number" min=5 max=13 name="p_size" id="p_category" value="'.$data['p_size'].'" required>
</div> 
<div class="default-form-box mb-20">
<label>Product Type</label>
<input type="text" name="p_type" id="p_category" value="'.$data['p_type'].'" required>
</div> 
<div class="save_button mt-3">
<input type=submit class="btn btn-md btn-black-default-hover"
   value="update Entries" >
</div>';
        }
    
        
        return '<h4 style="color:red;">Invalid Product Id</h4>';
    }



    public function get_vendorproduct_det($pid)
    {
       // $query = $this->db->query("select * from products where product_id='.$pid.'");
        $res=$this->db->where('product_id',$pid)->get("products");
        if($res->num_rows()>0)
        {
          if($this->session->userdata('v_brand')==$res->row()->p_brand)
          {

          
   // foreach($query->result() as $row)
   $data['p_category']=$res->row()->p_category;
   $data['p_title']=$res->row()->p_title;
   $data['p_cost']=$res->row()->p_cost;
   $data['p_brand']=$res->row()->p_brand;
   $data['p_description']=$res->row()->p_description;
   $data['p_imagepath']=$res->row()->p_imagepath;
   $data['p_size']=$res->row()->p_size;
   $data['p_type']=$res->row()->p_type;
   // $data['p_cat']; 
    //  $data['text']="hi";
           return '
           <div class="default-form-box mb-20">
          
               <label>Product Category</label>
               <input type="text" name="p_category" id="p_category" value="'.$data['p_category'].'" required>
           </div>
           <div class="default-form-box mb-20">
          
           <img src="'.$data['p_imagepath'].'" height=400 width=300>
       </div>
           
           <div class="default-form-box mb-20">
<label>Product cost</label>
<input type="number" min=1 max=100000 name="p_cost" id="p_cost" value="'.$data['p_cost'].'" required>
</div> 
           <div class="default-form-box mb-20">
           <label>Product Title</label>
           <input type="text" name="p_title" id="p_category" value="'.$data['p_title'].'" required>
       </div>
       <div class="default-form-box mb-20">
           <label>Product Brand</label>
           <input type="text" name="p_brand" id="p_category"  value="'.$data['p_brand'].'" required>
       </div> 
       <div class="default-form-box mb-20">
       <label>Product Description</label>
       <textarea required height=100 name="p_description" id="p_category" '.$data['p_description'].'>'.$data['p_description'].'</textarea>
   </div> 
   <div class="default-form-box mb-20">
   <label>Product Imagepath</label>
  
   <input type="text" name="p_imagepath" id="p_category" value="'.$data['p_imagepath'].'" required>
</div> 
<div class="default-form-box mb-20">
<label>Product Size</label>
<input type="number" min=5 max=13 name="p_size" id="p_category" value="'.$data['p_size'].'" required>
</div> 
<div class="default-form-box mb-20">
<label>Product Type</label>
<input type="text" name="p_type" id="p_category" value="'.$data['p_type'].'" required>
</div> 
<div class="save_button mt-3">
<input type=submit class="btn btn-md btn-black-default-hover"
   value="update Entries" >
</div>';
        }}
    
        
        return '<h4 style="color:red;">Invalid Product Id</h4>';
      
    }

    public function checkpid($pid)
    {
       // $query = $this->db->query("select * from products where product_id='.$pid.'");
       
        $res=$this->db->where('product_id',$pid)->get("products");
        if($res->num_rows()>0)
        {
   // foreach($query->result() as $row)
 
   // $data['p_cat']; 
    //  $data['text']="hi";
           return '<h5 style="color:red;">Product Id used</h5>';
        }
    
        
        return '';
    }



    public function check_email($user_email)
    {
       // $query = $this->db->query("select * from products where product_id='.$pid.'");
        $res=$this->db->where('user_email',$user_email)->get("user");
        if($res->num_rows()>0)
        {
         // echo '<script>alert("hii");</script>'
           return '<h5 style="color:red;">Email is used</h5>';
        }
    
        
        return '<h1>hello</h1>';
    }
 

    public function check_mobile($user_mobile)
    {
       // $query = $this->db->query("select * from products where product_id='.$pid.'");
        $res=$this->db->where('user_mobile',$user_mobile)->get("user");
        if($res->num_rows()>0)
        {
   // foreach($query->result() as $row)
 
   // $data['p_cat']; 
    //  $data['text']="hi";
           return '<h5 style="color:red;">Mobile no is used</h5>';
        }
    
        
        return '<h1>hello</h1>';
    }


public function addnewproduct($data1)
{
  $this->db->insert("products",$data1);
}


public function update_product_details($data)
{
 // $whereclause=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id']);
 // $data1=array('user_id'=>$data['user_id'],'product_id'=>$data['product_id'],'qty'=>$data['qty']);
//  $value=array('name'=>$name,'email'=>$email);
 $this->db->where('product_id',$data['product_id']);
$this->db->update('products',$data);

}


public function allorders()
{
  $query=$this->db->query('select * from orders');

return $query->result_array();
}

public function monthlyorders()
{
 // $date=date();
  $query=$this->db->query('select * from orders where ');

return $query->result_array();
}


public function allorderstoday($table)
{
 $date=date("Y-m-d");
 //echo $date;
  $query=$this->db->query('select * from orders where order_date="'.$date.'"');
return $query->result_array();
}


public function rejectvendorstatus($data)
{
    $this->db->where('v_id',$data['v_id']);
    $data1['p_edit_status']="Rejected";
    $this->db->update('vendor',$data1);
    echo "updated";

}

public function acceptvendorstatus($data)
{
    $this->db->where('v_id',$data['v_id']);
    $data1['p_edit_status']="Accepted";
    $this->db->update('vendor',$data1);
    //echo "updated";

}


public function vendorlist($table)
{
 
  $query=$this->db->query('select * from vendor');
return $query->result_array();
}




public function deleteorderdetails($data)
{
 
 $this->db->query('delete from orderproduct where order_no='.$data['order_id'].' ');
 $this->db->query('delete from orders where order_id='.$data['order_id'].' ');

}


public function updateAboutInfo()
{
  
}

}
