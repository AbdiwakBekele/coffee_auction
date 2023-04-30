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
        
    </style>
    </head>
<body>

<div id = "wrapper">
   <div id = "header">
      <div id = "subheader">
          <div class = "container">
              <p> Fastest Online Coffee Auction for Jimma Town</p>
              <a href = "#">Help</a>
              <a href = "#">Guest</a>
              <a href = "#">Download App</a>
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
            <a href = "bid_on_other.php" id = "linkHome">Bid on Other</a>
            <a href = "about.html">About</a>
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
    
    
    


<div id="auction_header">
        <h1>Auction Available</h1>
        <a href = "bid_on_other.php" id="back_link"> Back</a>
    </div>

<?php 

if (isset($_POST['Submit_offer'])){
                        
                        $offer_value = $_POST['offer'];
                        $user_id = $_POST['user_id'];
                        $prod_id = $_POST['prod_id'];
                        
                        $bid_query = "INSERT INTO bid_info (ID, product_Id, bid_amount)
                        VALUES ('$id', '$prod_id', $offer_value)
                        ";
                        
                        $bid_result = mysqli_query($con, $bid_query);
                        
                        if($bid_result){
                            
                        ?>
                        <div id="result_out">Offer Sumbitted Successfully </div>
                        
                        <?php
                        }
                        
                    }



                
                ?>
   
    
    
</div>

    
</body>    

</html>
    






















