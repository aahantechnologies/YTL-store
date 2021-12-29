<footer>
   <div class="container">
      <div class="row">
         <div class="">
            <div class="col-md-4 col-xs-12 p-0 first wdth_res">
               <h4>Categories</h4>
               <ul>
                    <?php
                                   $query="select * from categories where parent_id='0'";         
                                   $res=mysqli_query($con,$query);         
                                   while($row=mysqli_fetch_array($res)){         
                                   ?>
                                     <li><a href=""><?php echo $row['name']; ?><a></a></li>
                                     <?php
                                   }
                                   ?>
                  <!--<li><a href="">Fresh Vegetables</a></li>-->
                  <!--<li><a href="">Grocery</a></li>-->
                  <!--<li><a href="">Fresh  Fruits</a></li>                 -->
                  <!--<li><a href="">Dairy Products</a></li>-->
               </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 second wdth_res">
               <h4>Useful Links</h4>
               <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Terms &amp; Conditions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#" target="_blank">Blog</a></li>
                  <li><a href="#" target="_blank">Gallery</a></li>
                  <li><a href="ContactUs.php">Contact Us</a></li>
                  
               </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 third wdth_res">
               <h4>Follow us</h4>
               <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-f"></i></a>
              
               <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
            
               <a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
               <div style="clear:both;" class="res_display_n"></div>
			   <br>
			   <br>
			   <div class="minus_m">
			   Support
			   <h4><a href="https://accounts.google.com/signin">support@ytlstore.com</a></h4>
			   
			   </div>
            </div>
         </div>
         <div style="clear:both;"></div>
         
         <div class="payment">
         <h3>Payment Options</h3>
         <br>
           <span>Cash on Delivery</span>
         </div>
         <p id="ad">copyright © ytlstore.com, 2018
         </p>
      </div>
   </div>
</footer>