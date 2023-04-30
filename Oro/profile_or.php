<?php

require("function.php");
include "db_connection.php";
SESSION_START();

if(!isset($_COOKIE['logged'])){
    
    header('location: login_or.php');
}


?>


<!DOCTYPE>
<html>
<head>
    <title> ::Coffee Auction</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        
        #linkHome {
            color: brown;
            background: white;
        }
        
        #profile {
            float: left;
            width: 70%;
            margin-top: 15px;
            margin-left: 15%;
            border: 1px solid black;
            text-align: center;
            font-size: 20px;
        }
        #profile_img{
            float: left;
            width: 30%;
            height: 30%;
            padding: 30px;
            border: 1px solid black;
            margin: 30px;
        }
        #edit_btn {
            float: none;
            display: inline-block;
            text-align: center;   
            margin: 10px;
            padding: 10px;
        }
        #edit_btn input[type=submit] {
            width = 100px;
            height = 10px;
            font-size: 25px;
            background: #ebebe0;
            
        }
        
        
        #profile_info {
            float: left;
            margin-left: 10%;
        }
        #profile_info td {
            font-size: 25px;
            padding: 10px;
            
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
        .dropdown {
  float: left;
  overflow: hidden;
 margin-top: 40px;
 margin-right: 10px;    
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
        
 #auciton_btn {
            float:left;
            margin-top: 10%;
        }
        #auciton_btn input[type = submit] {
            width: 150px;
            height: 50px;
        }
        
    </style>
    </head>
<body>

<div id = "wrapper">
   <div id = "header">
      <div id = "subheader">
          <div class = "container">
              <p> Caalbaasii Bunaa Marsariitii Irraa Magaalaa Jimmaaf</p>
            
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo"> Caalbaasii Bilisaa</div></span>
           </div>
           
            <!---------- Search Area --------->
               
           <div id = "searchArea">
               <form action = "">
                    <input class = "searchField" type = "text" name = "text" placeholder = "barbaadi" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "BARBAADI">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
           <div id = "userMenu">
               <div class="dropdown">
                        <button class="dropbtn">Loqoda Jijjiiruuf <i></i></button>
                        <div class="dropdown-content">
                            <a href="../profile.php">English</a>
                            <a href="../Amh/profile_am.php">አማርኛ</a>
                            <a href="profile_or.php">Afaan Oromo</a>
                            </div>
                   
                   </div>
               <li><a href = "logout_ctrl.php">Ba'uuf</a></li>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile_or.php" id = "linkHome">Profaayilii</a>
            <a href = "create_auction_or.php">Caarrachuuf</a>
            <a href = "bid_on_other_or.php">Dorgomuuf</a>
            <a href = "history.php">Odeeffannoo</a>
            <a href = "#subFooter_2" >Nu Quunnamaa</a>
        </nav>
    </div>  

<?php    
    $id = '';

   if(isset($_SESSION['email'])) { 
      // $userData = getUsersData(getId($_SESSION['email']));
       $Email = $_SESSION['email']; 
        
                $array = array();
                $q = "SELECT * FROM users WHERE Email = '$Email'";
                $q_result = mysqli_query($con,$q);
       
              while ($r = mysqli_fetch_assoc($q_result )){
                $array['ID'] = $r['ID'];
                $array['Firstname'] = $r['Firstname'];
                $array['Lastname'] = $r['Lastname'];
                $array['Email'] = $r['Email'];
                $array['Gender'] = $r['Gender'];
                $array['Birthday'] = $r['Birthday'];
                $array['PhoneNo'] = $r['PhoneNo'];
                $array['Address'] = $r['Address'];
                $array['profile_img'] = $r['profile_img'];
                $id = $array['ID'];
               }
       
      ?> 
    <div id = "profile">
        
        <div id="profile_img">
            
       <?php
          
                $prof_image = $array['profile_img'];
                $prof_image_src = "User_Profile/".$prof_image;
                
                //echo '<img src ="images/default_profile.jpg" />';
            
     
            
            
        ?>
            <img src='<?php echo $prof_image_src; ?>'  style='width:250px;height:250px; '  />
       
              
         
        
        </div>
        
       
            
        
        <div id="profile_info">
            <table>
                <tr>
                    <td>Maqaa: </td>
                    <td><?php echo $array['Firstname']; ?></td>
                </tr>
                <tr>
                    <td>Maqaa Abbaa: </td>
                    <td><?php echo $array['Lastname']; ?></td>
                </tr>
                <tr>
                    <td>Imeeyilii: </td>
                    <td><?php echo $array['Email']; ?></td>
                </tr>
                
                <tr>
                    <td>Saala: </td>
                    <td><?php echo $array['Gender']; ?></td>
                </tr>
                
                <tr>
                    <td>Bara Dhalootaa: </td>
                    <td><?php echo $array['Birthday']; ?></td>
                </tr>
                
                <tr>
                    <td>Lakk Bilbilaa: </td>
                    <td><?php echo $array['PhoneNo']; ?></td>
                </tr>
                
                <tr>
                    <td>Iddoo</td>
                    <td><?php echo $array['Address']; ?></td>
                </tr>
                   
            </table>
           
    <div id="edit_btn"> 
        <form method="post" action = "profile_edit_or.php">
             <input type="hidden" name= "edit_user_ID" value="<?php  echo $id ;  ?>" >
             <input type="submit" name="edit_submit" value ="Profaayilii Jijjiiruuf">
        </form>
    </div>
        
        </div>
        
    </div>
       
<?php
   }
    ?> 
    
    
<div id = "history">
    <h1>Odeeffannoo Caalbaasii</h1>
    
    
    <div id="history_element">
     <?php
        $product = array();
        $prod_ID = array();
        $sql = "SELECT * FROM product_items WHERE ID = '$id'";
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
            <img src='<?php echo $image_src; ?>'  style='width:350px;height:350px; '  />
                
                
            </div>
            
            <div id="history_detail">
                <table>
                <tr>
                    <td>Maqaa Oomishaa: </td>
                    <td><?php echo $product['product_name']; ?></td>
                </tr>
                <tr>
                    <td>Gosa Oomishaa: </td>
                    <td><?php echo $product['product_type']; ?></td>
                </tr>
                <tr>
                    <td>Hamma Oomishaa: </td>
                    <td><?php echo $product['product_amount']; ?></td>
                </tr>
                <tr>
                    <td>Gatii Gurgurtaa: </td>
                    <td><?php echo $product['selling_price']; ?></td>
                </tr>
                <tr>
                    <td>Guyyaa Caalbaasiin Eegalu: </td>
                    <td><?php echo $product['start_date']; ?></td>
                </tr>
                <tr>
                    <td>Guyyaa Caalbaasiin Xummuramu: </td>
                    <td><?php echo $product['end_date']; ?></td>
                </tr>
               
                   
            </table>
                
                <div id="auciton_btn">
                <form method="post" action="auction_edit_or.php">
                    
                    <input type="hidden" name="auction_id" value="<?php echo $prod_ID[$i]; ?>">
                    
                    <input type=submit value="Jijjiiruuf" name="edit_Submit">
                    
                    <input type=submit value="Balleessuuf" name="delete_Submit">
                    
                </form>
            </div>
               
            </div>
            
            <div id="history_description">
                 
                    <u>Ibsa Oomishaa: </u>
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
    
    
</div>

    
</body>    

</html>
    





















