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
        #profile_info {
            float: left;
            margin-left: 10%;
        }
        #profile_info td {
            font-size: 25px;
            padding: 10px;
            
        }
        
        
        #auction_available {
            width: 100%;
            float: left;
            text-align: center;
            font-size: 20px;
            text-align: center;
        }
        
        #auction_available article {
            display: inline-block;
            width: 90%;
            margin: 20px;
            border: 1px solid black;
            font-size: 20px;
        }
        
        #auction_img {
            width:  30%;
            border: 1px solid black;
            float: left;
        }
        #auction_detail {
            width: 50%;
            float: left;
            margin-top: 10px; 
        }
        #auction_description {
            width: 100%;
            float: left;
            text-align: left;
            border: 1px solid black;
            margin-top: 10px;
            margin-bottom: 10px;
            
        }
        #auciton_btn {
            float:left;
            margin-top: 10%;
        }
        #auciton_btn input[type = submit] {
            width: 150px;
            height: 50px;
        }
        #auction_wrapper {
            margin-top: 10px;
        }

        #winner_result {
            float: left;
            width: 100%;
            
            text-align: center;
        }
        #address, select {
            width: 20%;
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-weight: bold;
        }
        #congra {
            height: 40px;
            background:  #66ffb3;
        }
        #warning {
            display: inline-block;
            width: 30%;
            background: #ff8080;
            padding 30px;;
        }
        #subbtn{
           
            margin-top: 40px;
            width: 20%;
            height: 50px;
            background: #66ffb3;
            border: none;
            border-radius: 10px;
            
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
            <a href = "bid_on_other.php" >Bid on Other</a>
            <a href = "history.php" id = "linkHome">History</a>
            <a href = "#subFooter_2" >Contact As</a>
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

   }
    ?> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        <?php

if(isset($_POST['auction_status'])){
    
    $prodID = $_POST['prodID'];
    $product = array();
    
     $sql = "SELECT * FROM product_items WHERE product_Id = '$prodID'";
    $records = mysqli_query($con, $sql);
    
    while($products = mysqli_fetch_assoc($records)) {   
                $product['product_name'] = $products['product_name'];
                $product['ID'] = $products['ID'];
                $product['product_img'] = $products['product_img'];
                $product['product_type'] = $products['product_type'];
                $product['product_amount'] = $products['product_amount'];
                $product['selling_price'] = $products['selling_price'];
                $product['start_date'] = $products['start_date'];
                $product['end_date'] = $products['end_date'];
                $product['product_description'] = $products['product_description'];
            }
    
    
    ?>   
    
    
    
    
    
<div id = "auction_available">
    <div id="auction_header">
        <h1>Auction Result</h1>
        <a href = "history.php" id="back_link"> Back</a>
    </div>
    
    <div id="available_element">    
    
    <article>
        <div id="auction_wrapper">
            <div id = "auction_img">
              <?php  
                $image_src = "product_imgs/".$product['product_img'];
                
                    ?>
                
            <img src='<?php echo $image_src; ?>'  style='width:300px;height:300; '  />
                
                
                
            </div>
            
            <div id="auction_detail">
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
                    <td>Minimum Selling Price: </td>
                    <td><?php echo $product['selling_price']. " Br."; ?></td>
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
            

            </div>
            
            <div id="auction_description">
                 <tr>
                     <td><u>Product Description: </br> </u></td>
                    <td><?php echo $product['product_description']; ?></td>
                </tr>
            </div>
    
    
                <div id="winner_result">
                
                    
                   <?php
                    $current_max = "SELECT MAX(bid_amount) FROM bid_info WHERE product_Id = '$prodID'";
                    $max_result = mysqli_query($con, $current_max);
    
                     while($current_maximum = mysqli_fetch_assoc($max_result)){
                                $max = $current_maximum['MAX(bid_amount)'];
                            }
    
    
    
                    $winner_query = "SELECT ID FROM bid_info WHERE bid_amount = '$max'";
                    $winner_result = mysqli_query($con, $winner_query);
            
                    while($winner = mysqli_fetch_assoc($winner_result)){
                                $winnerID = $winner['ID'];
                    }
    
                    if($winnerID == $id) {
                        
                        ?>
                            
                    <div id ="Congra">
                                <?php echo "Congradulation! You are the winner of this auction"; ?>
                    </div>
                    
                    <div id="msg">
                            <p id="warning">Please Select Shipment and Payment Methods</p>
                            <form method="post" action="final_result.php">
                                <label for="payment">Payment Method</label>
                                <select name="payment" id = "payment">
                                    <option></option>
                                    <option>Hello Cash</option>
                                    <option>CBE Birr</option>
                                    <option>Amole</option>
                                    <option>Credit Card</option>
                                
                                </select>
                                </br>
                                </br>
                                <label for="shipment">Shipment Method</label>
                                    <select name="shipment" id = "shipment">
                                    <option></option>
                                    <option>Track Load</option>
                                    <option>Air</option>
                                    <option>Train</option>
                                    <option>Ocean</option>
                                </select>
                    </br>
                            <label for="address">Shipment Place</label>
                            <input type="text" id = "address" name = "address" placeholder="Your Address">
    
    
    
    </br>
                            <input type="hidden" name="prodID" value="<?php echo $prodID; ?>">
                        
                            <input type ="submit" name="final_sub" id="subbtn" >
                        </form>
                    </div>
                    
                        <?php
                        }
                    else{
                            echo " You are not a winner";
                    }
                        
                    
                    
                    ?>
                
 
            </div>
    
    
    
        </article>
    
<?php   
}
?>  
    
    
    
</div>

    
</body>    

</html>
    





















