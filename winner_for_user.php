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
        select {
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
            <a href = "profile.php" id = "linkHome">Profile</a>
            <a href = "create_auction.php">Create Auction</a>
            <a href = "bid_on_other.php" >Bid on Other</a>
            <a href = "history.php" >History</a>
            <a href = "#subFooter_2" >Contact As</a>
        </nav>
    </div>  

<?php    
    $id = '';

   if(isset($_SESSION['email'])) { 
      // $userData = getUsersData(getId($_SESSION['email']));
       $Email = $_SESSION['email']; 
        
               
 

   }
    
    
    if(isset($_POST['final_sub'])){
         $array = array();
        
        $prodID = $_POST['prodID'];
        
        $IDqry ="SELECT ID FROM bid_history WHERE product_Id ='$prodID'";
        
        $IDfinal = mysqli_query($con,$IDqry);
        while ($ID = mysqli_fetch_assoc($q_result )){
            $id_result = $ID['ID']; 
        }
        
       
        
        
        $finalqry = "SELECT * FROM users WHERE ID = '$id_result'";   
        
         $q_final = mysqli_query($con,$finalqry);
       
              while ($r = mysqli_fetch_assoc($q_final )){
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
    
               <div id="profile_info">
            <table>
                <tr>
                    <td>Firstname: </td>
                    <td><?php echo $array['Firstname']; ?></td>
                </tr>
                <tr>
                    <td>Lastname: </td>
                    <td><?php echo $array['Lastname']; ?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo $array['Email']; ?></td>
                </tr>
                
                <tr>
                    <td>Gender: </td>
                    <td><?php echo $array['Gender']; ?></td>
                </tr>
                
                <tr>
                    <td>Birthday: </td>
                    <td><?php echo $array['Birthday']; ?></td>
                </tr>
                
                <tr>
                    <td>Phone No: </td>
                    <td><?php echo $array['PhoneNo']; ?></td>
                </tr>
                
                <tr>
                    <td>Address</td>
                    <td><?php echo $array['Address']; ?></td>
                </tr>
                   
            </table>
        
        </div>

<?php
    
     }
    
    ?>
    
    
    
</div>

    
</body>    

</html>
    





















