 <header class="header-yello MyAllClearFix" style=" background-color: #fa7e00;">
         <div class="header__left"><a href="index.php"><img src="image/whitelogo.png" title="InstaMart" alt="InstaMart" style="width: 83%;"></a></div>
         
         <form method="post">
         <div class="header__center_middle">   
         <div  class="mobHide">+91 9876543210</div>          
                 <input type="search" placeholder="Search products in Super Store" id="search-box" name="searchvalue">
                <button type="submit" name="search">
               <i class="mysearchbtn fa fa-search"></i>
            </button>
            <div id="suggesstion-box"></div>          
         </div>
       </form>
         <div class="header__right">
            <div class="header-item">
               <div class="account__login">
                  <a class="" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">
                  <button type="button" data-toggle="modal" data-target="#login_signup" id="login_signup_form" style=" background-color: #fa7e00;">
                    <span>My Account</span><br>
                     Login/Sign Up 
                  </button>
                  </a>
                </div>
            </div>
            <div class="basket_login" >
               
               <a onclick="myFunction()"><button type="button" data-toggle="modal" data-target="#sidebar-right" id="hideshowbt" style=" background-color: #fa7e00;"><img src="image/icon/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></button></a>
            </div>
         </div>
      </header>
      <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
               <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Login with</h4>
                  </div>
                  <div class="modal-body">  
                      <div class="box">
                           <div class="content">
                              <div class="social" style="margin:0 !important;">                     
                                  
                                  <a id="facebook_login" class="circle facebook" href="https://www.facebook.com/">
                                      <i class="fa fa-facebook fa-fw"></i>
                                  </a>
                                  <a id="google_login" class="circle google" href="https://plus.google.com">
                                      <i class="fa fa-google-plus fa-fw"></i>
                                  </a>
                              </div>
                              <div class="division">
                                  <div class="line l"></div>
                                    <span>or</span>
                                  <div class="line r"></div>
                              </div>
                              <div class="error"></div>
                              <div class="form loginBox">
							   <div class="form">
                                  <form method="post" accept-charset="UTF-8">
                                      <input class="form-control" type="text" placeholder="Username" name="email">
                                      <input class="form-control" type="password" placeholder="Password" name="password">
                                      <input class="btn btn-default btn-login" type="submit" name="loginx" value="Login">
                                  </form>
                              </div>
                             </div>
                           </div>
                      </div>
 <?php 
 include('connection.php'); 
if(isset($_REQUEST['loginx']))
{
	  $email=$_REQUEST['email'];
      $password=$_REQUEST['password'];
     $query="select * from register where email='$email' and password='$password'";  
	   $res=mysqli_query($con,$query);
	   $num=mysqli_num_rows($res);	   
    if($num>0){     
         $row=mysqli_fetch_array($res);	
      $_SESSION['firstname']=$row['first_name'];
	   $_SESSION['lastname']=$row['last_name'];
	    $_SESSION['phonenumber']=$row['phone_number']; 
         $_SESSION['email']=$row['email'];	
        echo "<script>window.location='User.php'</script>";  
		}	  
  else{  
  	echo "<script>alert('Login failed....')</script>";
  	echo "<script>window.location='index.php'</script>";
  }
}
?>
                      <div class="box">
                          <div class="content registerBox" style="display:none;">
                           <div class="form">
                              <form method="post" html="{:multipart=>true}" data-remote="true" accept-charset="UTF-8">
                                  <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                  <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                  <input id="email" class="form-control" type="text" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" size="50">
                                  <input type="text" class="form-control" name="phone_number" placeholder="Mobile Number" pattern="[0-9]{10}" required>
                                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                                  <input class="btn btn-default btn-register" type="submit" value="Create account" name="signup">
                              </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <div class="forgot login-footer">
                          <span>Don't have an account?
                               <a href="javascript: showRegisterForm();"><strong>Sign up</strong></a>
                          </span>
                      </div>
                      <div class="forgot register-footer" style="display:none">
                           <span>Already have an account?</span>
                           <a href="javascript: showLoginForm();"><strong>Login</strong></a>
                      </div>
                  </div>        
            </div>
        </div>
        </div>
        <div class="clearfix"></div>	

<?php
if(isset($_REQUEST['signup']))
{
  extract($_REQUEST);
  $query="insert into register values(NULL,'$first_name','$last_name','$email','$phone_number','$password')";	
  
  if(mysqli_query($con,$query)):
      $check="select * from register where email='$email'";
      $_SESSION['firstname']=$first_name;
	   $_SESSION['lastname']=$last_name;
	    $_SESSION['phonenumber']=$phone_number; 
         $_SESSION['email']=$email;		
  	echo "<script>alert('Register successfully')</script>";
  	echo "<script>window.location='User.php'</script>";
  else:
  	echo "<script>alert('Register failed')</script>";
  	echo "<script>window.location='index.php'</script>";
  endif;  	  
}
?>
		
		