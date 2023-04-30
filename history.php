<?php

require("function.php");
include "db_connection.php";
SESSION_START();

if(!isset($_COOKIE['logged'])){
    
    header('location: login.php');
}

?>


<!DOCTYPE>
<html>
<head>
    <title> ::Coffee Auction</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        
        #linkHistory {
            color: brown;
            background: white;
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
               <li><a href = "logout_ctrl.php">Log out</a></li>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile.php">Profile</a>
            <a href = "create_auction.php">Create Auction</a>
            <a href = "bid_on_other.php">Bid on Other</a>
            <a href = "history.php" id="linkHistory">History</a>
            <a href = "#subFooter_2" >Contact As</a>
        </nav>
    </div>  

<?php    
    $id = '';

   if(isset($_SESSION['email'])) { 
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
   }
      
    $history = array();
    $product_ID = array();
    $product = array();
    $bid_ID = array();
    $bid_historys = array();
    $bid_history = "SELECT * FROM bid_info WHERE ID = '$id'";
    $history_query = mysqli_query($con, $bid_history);
    $history_rows = mysqli_num_rows($history_query); 
        
    for($i = 0; $i < $history_rows; $i++){
        
        $r = mysqli_fetch_assoc($history_query);
        $product_ID[$i] = $r['product_Id'];
        $bid_ID[$i] = $r['bid_id'];
       
   /*     
      while ($r = mysqli_fetch_assoc($q_result )){
                $history['bid_id'] = $r['bid_id'];
                $history['ID'] = $r['ID'];
                 $history['product_Id'] = $r['product_Id'];
                 $history['bid_date'] = $r['bid_date'];
                 $history['bid_amount'] = $r['bid_amount'];
                 $history['bid_status'] = $r['bid_status'];
                
        } 
        */
        
    }
    
    for($i = 0; $i < $history_rows; $i++){
        
        $sql = "SELECT * FROM product_items WHERE product_Id= '$product_ID[$i]'";
        $records = mysqli_query($con, $sql);
        
        while($products = mysqli_fetch_assoc($records)) {   
                $product['product_name'] = $products['product_name'];
                $product['ID'] = $products['ID'];
                $product['product_type'] = $products['product_type'];
                $product['product_amount'] = $products['product_amount'];
                $product['selling_price'] = $products['selling_price'];
                $product['start_date'] = $products['start_date'];
                $product['end_date'] = $products['end_date'];
                $product['product_description'] = $products['product_description'];
                $product['product_Id'] = $products['product_Id'];
                 $product['product_img'] = $products['product_img'];
                
            }
        $offer = "SELECT * FROM bid_info WHERE bid_id = '$bid_ID[$i]'";
        $offer_result = mysqli_query($con, $offer);
        
        while ($offer_r = mysqli_fetch_assoc($offer_result )){
                $history['bid_id'] = $offer_r['bid_id'];
                $history['ID'] = $offer_r['ID'];
                 $history['product_Id'] = $offer_r['product_Id'];
                 $history['bid_date'] = $offer_r['bid_date'];
                 $history['bid_amount'] = $offer_r['bid_amount'];
                 $history['bid_status'] = $offer_r['bid_status'];
                
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
                    <tr>
                    <td>Your Offer: </td>
                    <td><?php echo $history['bid_amount']; ?></td>
                </tr>
               
                   
            </table>
               
            </div>
            
            <div id="auction_status">
                <?php
                
                    $currentDateTime = date("Y/m/d");
                    $auctionStart = $product['start_date'];
                    $auctionEnd = $product['end_date'];
        
                    $currentTimespan = strtotime($currentDateTime);
                    $startTimespan = strtotime($auctionStart);
                    $endTimespan = strtotime($auctionEnd);
        
                    if($endTimespan <= $currentTimespan){
                        echo "Auction Ended";
                        ?>
                        
                        <form method="post" action="winner.php">
                            
                        <input type="hidden" name = "prodID" value="<?php  echo $product['product_Id']; ?>" >
                            
                        <input type="submit" name = "auction_status" value = "Detail">
                
                </form>
                <?php
                        
                    }
                    else {
                        echo "Auction Ongoing";
                        
                    }
                
                ?>
            
            </div>
            
            <div id="history_description">
                 <tr>
                    <td><u>Product Description: </u></td>
                    <td><?php echo $product['product_description']; ?></td>
                </tr>
            </div>
        </article>

<?php
        
    }       
 ?>
    
    
    
    
    
</div>

    
</body>    

</html>
    








