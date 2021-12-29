<!DOCTYPE html>
<?php
session_start();
 include('connection.php'); 
 ?>
<?php
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM product_detail WHERE code='$code'");
$row = mysqli_fetch_assoc($result);
$product_name = $row['product_name'];
$code = $row['code'];
$price = $_REQUEST['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'product_name'=>$product_name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "";
	}

	}
}
?>

<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		// $status = "<div class='box' style='color:red;'>
		// Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Ramu Ki Mandi</title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- custom links start -->
	  
      <link href="css/login-register.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/VFMC.css">
      <script src="js/myJs.js"></script>
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
       <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  	  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet" />
      <!-- shopping cart start -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
       <link rel='stylesheet' href='css/ShoppingCart.css' type='text/css' media='all' />
      <!-- shopping cart  end -->
      <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	  <script src="js/login-register.js" type="text/javascript"></script>
	  </head>
   <body>
      <!-- header start -->
      
      <?php
       include 'Header.php';
      ?>
      <div class="clearfix"></div>
      <!-- nvaigation start -->
      <div class="main">
         <div class="container">
            <div class="row padding_left">
              <?php
                include 'Navigation.php';
               ?>
               <!-- <div class="ordermenu mobile">For Order <i class="fa fa-phone"></i> <i class="fa fa-whatsapp"></i><a href="tel:+919109109830">9109109830</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=+919109109830">9109109850</a> </div> -->
            </div>
         </div>
      </div>
      <!-- nvaigation end -->
      <div class="clearfix"></div>
      <!-- Vegetables start -->
      <div class="sub-banner my-banner02">
      </div>
      <div class="content content_margin">
         <div class="container">
            <div class="col-md-12 col-sm-12 women-dresses">
               <div class="product_heading">
                  <center>
                     <h3>Vegetables</h3>
                  </center>
                  <br>
               </div>
               <div  class="women-set1">
                  <!--  shopping cart start -->

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div  class="cart_div">

</div>
<?php
}
$result = mysqli_query($con,"SELECT * FROM product_detail where type='Vegetable' LIMIT 0,20");
while($row = mysqli_fetch_assoc($result)){
	?>
			 <form method='post' action=''>
			  <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
                  <div class="col-md-3 women-grids wp1 animated wow slideInUp" data-wow-delay=".5s">
                     <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && type=<?php echo $row['type'];?>">
                        <div class="product-img">
                           <img src="<?php echo $row['image']; ?>" alt="" />
                           <div class="p-mask">
                              <!-- cart code start -->                                
                              <div class="occasion-cart">
                                 <div class="shoe single-item single_page_b">
                                 </div>
                              </div>
                              <!-- cart code end --> 
                           </div>
                     
                     <h4><?php echo $row['product_name']; ?></h4></a> 
					
                     &#8377; <select name="price" id="dropdesign" >
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option>                     
                </select>                     
                      <br/>
                       <input class="button mycartbtn add" type="submit" class='buy' value="Add to Cart" name="submit">                      
                     </div>
                    </form>  					 
                  </div>
                    <?php
                }
            ?>
               </div>
            </div>
         </div>
      </div>
      <!-- Vegetables end -->	  
<div style="clear:both;"></div>
<?php echo $status; ?>
</div>
<!-- start -->
<div class="nwCart">
<!-- cart png img start -->
<br><br><br>
<div style="clear:both;"></div>
<!-- cart png img end -->
<div  class="mynewcart">
	
<div class="cart" >
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table id="myDIV" class="table">
<tbody>
<tr id="mydiffclr">
<td>PRODUCT</td>
<td style="min-width: 24% !important;">ITEM NAME</td>
<td>QTY.</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["product_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs. ".$product["price"]; ?></td>
<td><?php echo "Rs. ".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
// Add product Process
$first_name=$_SESSION['firstname'];
$price=$product["price"];
$product_name=$product["product_name"];
$code=$product["code"];
$quantity=$product["quantity"];
$query="insert into order_product values(NULL,'$first_name','$product_name','$code','$price','$quantity','$status')";	
  
  $res=mysqli_query($con,$query);
}
$_SESSION['total_price']=$total_price;
?>
<tr>
<td id="checkoutbtn" align="left"><a href="CheckOut.php">Check Out</a></td>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs. ".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	// echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>


<?php echo $status; ?>
</div>

</div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<!-- shopping cart end -->
        <!-- footer start -->
       <?php
       include 'Footer.php';
       ?>
      <!-- footer end  -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>
<?php
if(isset($_REQUEST['search']))
{
$searchvalue=$_REQUEST['searchvalue']; 
$query="SELECT * FROM product_detail where product_name='$searchvalue'";
$res=mysqli_query($con,$query);
	if($res){            
        echo "<script>window.location='Search.php?product_name=$searchvalue'</script>";
		}
 else {        
        echo "<script> alert('not')</script>";
        echo "<script>window.location='index.php'<script>";     
 }
}
?>