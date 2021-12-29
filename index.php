<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['phonenumber']) && isset($_SESSION['email']))
{
   session_destroy();
}
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
<?php
 include('connection.php'); 
 ?>
<html lang="en">
 <?php
       include 'Head.php';
      ?>
   <body>
      
      <?php
       include 'Header.php';
      ?>
      <!-- start -->
      <div class="main">
      <div class="container">
         <div class="row padding_left">
            <?php
       include 'Navigation.php';
      ?>
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- curousel strat -->
      <div class="">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
               <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               <div class="item active">
                  <img src="image/banner/dailyneedsproducts.jpg" alt="Los Angeles" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/milk.jpg" alt="Chicago" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/foodbanner.jpg" alt="New york" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/freshfruits.jpg" alt="New york" style="width:100%;">
               </div>
            </div>
            <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
               <span class="sr-only">Next</span>
               </a> -->
         </div>
      </div>
      <!-- carousel end -->
      <!-- whychoose strat -->  
      <div class="row extramargin mywhychoose">       
        <div class="col-sm-12" style="background:#e6fdef">
          <div class="col-sm-3" style="padding-top: 20px;">WHY CHOOSE ORGANIC AT YTLStore</div>
          <div class="col-sm-9">
            <div class="col-sm-3"><img src="image/icon/best-quality.png" alt="Best Quality"> Best Quality</div>
            <div class="col-sm-3"><img src="image/icon/food.png" alt="Organic Food"> Organic Food</div>
            <div class="col-sm-3"><img src="image/icon/free-delivery.png" alt="Free Delivery">Free Delivery</div>
            <div class="col-sm-3"><img src="image/icon/policy.png" alt="Privacy Policy">Privacy Policy</div>
          </div>
        </div>        
      </div>
      <!-- whychoose end -->
      <!-- categories start -->
      <div class="row extramargin">
        <div id="ShopImg" class="col-md-12 col-sm-12 col-xs-12 ">
            <center><h2>Shop By Categories</h2></center><br>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href=""><img src="image/Spices.png" alt="Vegetable"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href=""><img src="image/banner/Fruits.png" alt="Fruits"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href=""><img src="image/banner/Milk.png" alt="Milk"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href=""><img src="image/banner/Categories.png" alt="Categories"></a></div>
        </div>
      </div>
      <!-- categories end -->
      <!-- products strat -->      
      <div class="row extramargin productcat">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>Featured Products</h2> <br>  
			 <!--  shopping cart start -->

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div  class="cart_div">

</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM productdetail  LIMIT 0,5");
while($row = mysqli_fetch_assoc($result)){
	?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && type=<?php echo $row['type'];?>"> <img  src="api/<?php echo $row['image']; ?>" height="156" width="156" alt="demo">
                    <h4 style="height: 35px;"><?php echo $row['productname']; ?></h4>
                </a>
              &#8377; <?php echo $row['offerprice']; ?>
              <!--<select name="price">-->
              <!--     <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity']; ?> </option>-->
              <!--      <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>-->
              <!--      <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>-->
              <!--      <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>-->
              <!--      <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>-->
              <!--      <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> -->
                    
              <!--  </select>-->
                <br><br>                
                
                
                <input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>
      <!-- products end -->
      <!-- demo banner part=1 START -->
      <div class="row extramargin MTB40">
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
          <div id="resPadding" class="col-md-6 col-sm-12 col-xs-12"><a href="#"><img width="100%" src="image/banner/organic.png" alt="organic"></a></div>
          
          <div id="resPadding" class="col-md-6 col-sm-12 col-xs-12"><a href="#"><img width="100%"  src="image/banner/cod2.png" alt="Cash On Delivery"></a></div>
        </div>
      </div>
      <!-- demo banner part=1 end -->
      <!-- item strat -->      
      <div class="row extramargin productcat">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>New Arrivals</h2> <br>
             <?php 
               
$result = mysqli_query($con,"SELECT * FROM product_detail where newarrival='1' LIMIT 0,5");
while($row = mysqli_fetch_assoc($result)){
	?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && type=<?php echo $row['type'];?>"> <img  src="<?php echo $row['image']; ?>" height="152" width="152" alt="demo">
                    <h4><?php echo $row['product_name']; ?></h4>
                </a>
              &#8377; <select name="price">
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> 
                    
                </select><br><br>                
                
				<input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>
      <!-- items end -->
      <!-- demo banner part=2 START -->
      <div class="row extramargin MTB40">
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <img width="100%" src="image/banner/FooterImage.png" alt="demo">
          </div>
        </div>
        <!-- demo banner part=2 end -->
        <!-- item strat -->   
      <!-- categories strat -->      
      <div class="row extramargin productcat">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>Grocery</h2> <br> 
             <?php 
$result = mysqli_query($con,"SELECT * FROM productdetail where category='8' LIMIT 0,5");
while($row = mysqli_fetch_assoc($result)){
	?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && type=<?php echo $row['type'];?>"> <img  src="<?php echo $row['image']; ?>" height="152" width="152" alt="demo">
                    <h4><?php echo $row['product_name']; ?></h4>
                </a>
              &#8377; <select name="price">
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> 
                    
                </select><br><br>                
                
				<input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>	  
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
      <!-- categories end -->
       <!-- demo banner part=3 START -->
       <div class="row extramargin MTB40">
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 ">
            <img width="100%" src="image/banner/FREE.png" alt="demo">
          </div>
        </div>
        <!-- demo banner part=3 end -->
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
        