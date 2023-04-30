<!DOCTYPE>
<html>
<head>
    <title>Coffee Auction</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        #linkHome {
            color: brown;
            background: white; 
                
            }
        
        
                #history {
            width: 100%;
            float: left;
            text-align: center;
            font-size: 20px;
        }
        
        #history_article {
            display: inline-block;
            width: 80%;
            margin: 10px;
            border: 1px solid black;
            font-size: 20px;
        }
        
        #history_img {
            width: 350;
            height: 350;
            border: 1px solid black;
            float: left;
            margin: 10px;
        }
        #history_detail {
            width: 50%;
            margin-left: 10%;
            float: left;
        }
        #history_description {
            width: 80%;
            float: left;
            text-align: justify;
            margin-left: 20px;
        }
        

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
    width: 160px;
    padding: 5px;
  border: none;
  outline: none;
  color: black;
  background-color: #ebebe0;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover {
    background: #d6d6c2;
        } 
/* Add a grey background color to dropdown links on hover */


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
        
    </style>
    </head>
<body>

<div id = "wrapper">
   <div id = "header">
      <div id = "subheader">
          <div class = "container">
              <p> Fastest Online Coffee Auction for Jimma Town</p>
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo"> Free Online Auction</div></span>
           </div>
           
            <!---------- Search Area --------->
               
           <div id = "searchArea">
               <form action = "">
                    <input class = "searchField" type = "text" name = "text" placeholder = "Search Here" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "SEARCH">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
   
           <div id = "userMenu">
               
       
            <div id="change_lang">
               
                <div class="dropdown">
                        <button class="dropbtn">Change Language <i></i></button>
                        <div class="dropdown-content">
                            <a href="index.php">English</a>
                            <a href="Amh/index_am.php">አማርኛ</a>
                            <a href="Oro/index_or.php">Afan Oromo</a>
                            </div>
                   
                   </div>
           
           </div>
    
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index.php" id = "linkHome">Home</a>
            <a href = "signUp.php">SignUp</a>
            <a href = "login.php">Login</a>
            <a href = "about.php">About</a>
            <a href = "#subFooter_2" >Contact As</a>
        </nav>
    
  
    </div>  
<!----------------------- Image Slider -------------->
    <div id = "imgSlider">
        <ul class = "bxslider">
            <li><img id = "slider1" src = "images/PhotoEditor_20200304_083001633.jpg"></li>
            <li><img id = "slider2" src = "images/slider2.jpg"></li>
            <li><img id = "slider3" src = "images/slider3.jpg"></li>
        </ul>
        <hr />
    </div>
    
    
    
<div id = "history">
    <h1>Available Auctions</h1>

    <div id="history_element">
     <?php
        include "db_connection.php";
        $product = array();
        $prod_ID = array();
        $sql = "SELECT * FROM product_items ";
        $records = mysqli_query($con, $sql);
        $final = mysqli_num_rows($records); 
        
        if($final != 0) {
            
            for($i = 0; $i < $final; $i++){
                $ID_results = mysqli_fetch_assoc($records);
                $prod_ID[$i] = $ID_results['product_Id'];
            }
        }
        
        
        if($final == 0){
            echo "There is NO HISTORY";   
        }
        else {
            
            for($i = 0; $i < $final; $i++){
                $sql = "SELECT * FROM product_items WHERE product_Id = '$prod_ID[$i]'";
                $records = mysqli_query($con, $sql);

             while($products = mysqli_fetch_assoc($records)) {   
                $product['product_name'] = $products['product_name'];
                 
                $product['product_type'] = $products['product_type'];
                 
                $product['product_amount'] = $products['product_amount'];
                 
                $product['selling_price'] = $products['selling_price'];
                 
                $product['start_date'] = $products['start_date'];
                 
                $product['end_date'] = $products['end_date'];
                 
                $product['product_description'] = $products['product_description'];
                 
                $product['product_img'] = $products['product_img'];
            }
        
     ?> 

        <article id="history_article">
            <div id = "history_img">
                <?php
            
            $image = $product['product_img'];
            $image_src = "product_imgs/".$image;
            ?>
            <img src='<?php echo $image_src; ?>'  style='width:250px;height:250px; '  />
                
                
            </div>
            
            <div id="history_detail">
                <table>
                <tr>
                    <td>Product Name: </td>
                    <td><?php echo $product['product_name']; ?></td>
                </tr>
                <tr>
                    <td>Product Type: </td>
                    <td><?php echo $product['product_type']; ?></td>
                </tr>
                <tr>
                    <td>Product Amount: </td>
                    <td><?php echo $product['product_amount']; ?></td>
                </tr>
                <tr>
                    <td>Selling Price: </td>
                    <td><?php echo $product['selling_price']; ?></td>
                </tr>
                <tr>
                    <td>Auction Start Date: </td>
                    <td><?php echo $product['start_date']; ?></td>
                </tr>
                <tr>
                    <td>Auction End Date: </td>
                    <td><?php echo $product['end_date']; ?></td>
                </tr>
               
                   
            </table>
               
            </div>
            
            <div id="history_description">
                 
                    <u>Product Description: </u>
                <table>
                   <tr> 
                       <td><?php echo $product['product_description']; ?></td>
                    </tr>
                </table>    
            </div>
        </article>

    <?php 
        
        }
    
        }
     ?>    
        
        
    </div>

    
    
    </div>    
    
    
    
    
    
    
    
    
    
    
    
    
<!------------------- Footer Area --------------->    
    <footer>
        <hr />
        <div id="subFooter_1">
            <h2>E-commerce Coffee Auction</h2>
            <p>This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site <a href="about.html">...Read More</a></p>
        </div>
        <div id="subFooter_2">
            <h2 style="text-align: center">Contact As</h2>
            <ul>
                <li>Address: Jimma, Ethiopia</li>
                <li>Phone No: 1234567890</li>
                <li>Tel No: +25112345678</li>
                <li>Email: abdiwakbek3226@gmail.com</li>
            </ul>
        </div>
        <div id="subFooter_3">
            <h2 style="text-align: center">Follow As</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebook</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitter</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegram</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagram</a></li>
            </ul>
        </div>
        <div id = "subFooter_4">
            <h2 style="text-align: center"> Important Links</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebook</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitter</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegram</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagram</a></li>
                
            </ul>
        </div>
    </footer>
</div>

<script src = "js/jquery.js"></script> 
<script src = "js/jquery.bxslider.min.js"></script> 
<script src = "js/JavaScriptFile.js"></script>
    
</body>    

</html>
    




















