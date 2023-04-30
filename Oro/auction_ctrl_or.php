<?php
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
        #auction_header {
            
        }
        #back_link {
            float: right;
            
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            margin-right: 15%;
            padding: 10px;
            width: 70px;
            color: black;
            background:  lightseagreen;
            text-decoration: none;
    
        }
        #back_link a {
            float: right;
            border: 1px solid black;
            margin-right: 15%;
        }
        
        
        #auction_img {
            width:  30%;
            border: 1px solid black;
            float: left;
        }
        #auction_detail {
            width: 30%;
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
        }
        #auciton_btn input[type = submit], input[type = number]{
            float: left;
            width: 100%;
            height: 50px;
            margin: 5px;
            
        }
        #auction_wrapper {
            margin-top: 10px;
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
                    <input class = "searchField" type = "text" name = "text" placeholder = "asitti barbaadi" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "BARBAADI">
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
            <a href = "profile.php">Profaayilii</a>
            <a href = "create_auction.php">Caarrachuuf</a>
            <a href = "bid_on_other.php" id = "linkHome">Dorgomuuf</a>
            <a href = "about.html">Odeeffannoo</a>
            <a href = "#subFooter_2" >Nu Quunnamuuf</a>
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

if(isset($_POST['Submit'])){
    $value = $_POST['auction_id'];
    $bid_user_id = $value;
    $product = array();
     $sql = "SELECT * FROM product_items WHERE product_Id = '$value'";
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
        <h1>Caarrataa Jiran</h1>
        <a href = "bid_on_other.php" id="back_link"> Deebi'i</a>
    </div>
    
    <div id="available_element">    
    
    <article>
        <div id="auction_wrapper">
            <div id = "auction_img">
              <?php  
                $image_src = "product_imgs/".$product['product_img'];
                
                    ?>
                
            <img src='<?php echo $image_src; ?>'  style='width:304px;height:228px; '  />
                
                
                
            </div>
            
            <div id="auction_detail">
                <table>
                <tr>
                    <td>Abbaa Oomishaa: </td>
                    <td><?php 
    
                            $user_id = $product['ID'];
                            $sql_user = "SELECT Firstname, Lastname FROM users WHERE ID = '$user_id'";
                            $result_user = mysqli_query($con, $sql_user);
                            while($user_info = mysqli_fetch_assoc($result_user)){
                                $users_fname = $user_info['Firstname'];
                                $users_lname = $user_info['Lastname'];
                            }
                
                            echo  $users_fname. ' ' . $users_lname ; ?>
                    
                    
                    </td>
                </tr>    
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
                    <td>Gatii Gurgurtaa Gad aanaa: </td>
                    <td><?php echo $product['selling_price']. " Br."; ?></td>
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
               
            </div>
            
            <div id="auciton_btn">
                <div id="current_max">Gatii Olaanaa Ammaaf:
                    
                   <?php
                    $current_max = "SELECT MAX(bid_amount) FROM bid_info WHERE product_Id = '$value'";
                    $max_result = mysqli_query($con, $current_max);
    
                     while($current_maximum = mysqli_fetch_assoc($max_result)){
                                $max = $current_maximum['MAX(bid_amount)'];
                            }
    
                    if($max == 0) {
                        
                        $max = $product['selling_price'];
                        echo $max . " ETB";
                        
                        }
                    else{
                            echo $max . " ETB";
                    }
                        
                    
                    
                    ?>
                
                </div>
                
                <form method="post" action="bid_result.php">
                    <input type="number"  name= "offer" placeholder="Your Offer in Birr" min = "<?php echo $max + 50;  ?>">
                    
                    <input type="hidden" name="user_id" value = "<?php echo $user_id ?>">
                    
                    <input type="hidden" name="prod_id" value = "<?php echo $value ?>">
                    
                    <input type=submit value="Submit Offer" name="Submit_offer" > 
                </form>
                
                <div id = "NB"> <u>NB</u>: Gatiin Kennamu kan Ammaarraa Qarshii 50 Caaluu Qaba </div>
                
                
            </div>
            </div>
            
            <div id="auction_description">
                 <tr>
                     <td><u>Ibsa Oomishaa: </br> </u></td>
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
    


















































