<nav class="navbar navbar-inverse">
                  <div class="navbar-header">
                     <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  </div>
                  <div class="collapse navbar-collapse js-navbar-collapse padding_left">
                     <ul class="nav navbar-nav">
                        <li class="dropdown mega-dropdown">
                           <a id="myclor" href="#" class="dropdown-toggle" data-toggle="dropdown">Shop by Category <span class="caret"></span></a> 
                           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop by Category <strong>Fruits & Vegetables</strong> <span class="caret"></span></a>-->
                           <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header"><a href="">Spices</a></li>
                                   <ul>
								   <?php
                                   $query="select * from categories where parent_id='3'";         
                                   $res=mysqli_query($con,$query);         
                                   while($row=mysqli_fetch_array($res)){         
                                   ?>
                                     <li><?php echo $row['name']; ?></li>
                                     <?php
                                   }
                                   ?>
                                   </ul>
                                </ul>
                             </li>
                             <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header"><a href="">Dry Fruits</a></li>
                                   <ul>
                                     <?php
                                   $query="select * from categories where parent_id='4'";         
                                   $res=mysqli_query($con,$query);         
                                   while($row=mysqli_fetch_array($res)){         
                                   ?>
                                     <li><?php echo $row['name']; ?></li>
                                     <?php
                                   }
                                   ?>
                                    </ul>
                                </ul>
                             </li>
                             <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header"><a href="">Personal Care</a></li>
                                   <ul>
                                    <?php
                                   $query="select * from categories where parent_id='5'";         
                                   $res=mysqli_query($con,$query);         
                                   while($row=mysqli_fetch_array($res)){         
                                   ?>
                                     <li><?php echo $row['name']; ?></li>
                                     <?php
                                   }
                                   ?>
                                    </ul>
                                </ul>
                             </li>
                             <li class="col-sm-3">
                                <ul>
                                   <li class="dropdown-header"><a href="">Dairy & Bread</a></li>
                                   <ul>
                                 <?php
                                   $query="select * from categories where parent_id='7'";         
                                   $res=mysqli_query($con,$query);         
                                   while($row=mysqli_fetch_array($res)){         
                                   ?>
                                     <li><?php echo $row['name']; ?></li>
                                     <?php
                                   }
                                   ?>
                                    </ul>
                                </ul>
                             </li>
                        </ul>
                        </li>
                        <li class="ordermenu">For Order <i class="fa fa-phone"></i><a id="spclclr" href="tel+91 9876543210">+91 9876543210</a><i style="margin: 13px 0 0 0;" class="fa fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=+91 9876543210" id="spclclr">+91 9876543210</a> </li>
                     </ul>
                  </div>
                  <!-- /.nav-collapse --> 
               </nav>