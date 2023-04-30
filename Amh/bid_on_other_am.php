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
    <title> ::የቡና ጫራታ</title>
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
            height: 50px;per
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
              <p> ፈጣን የኦንላይን ቡና ጫራታ ለጅማ ከተማ</p>
              <a href = "#">አግዝ</a>
              <a href = "#">እንግዳ</a>
              <a href = "#">መተግበሪያ አዉርድ</a>
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo"> ነጻ የቡና ጫራታ</div></span>
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
               <li><a href = "logout_ctrl.php">ዉጣ</a></li>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile.php">ፕሮፋይል</a>
            <a href = "create_auction.php">ጫራታ ለመጀመር</a>
            <a href = "bid_on_other.php" id = "linkHome">ለሎች ላይ ለመጫረት</a>
            <a href = "history.php">መረጃ</a>
            <a href = "#subFooter_2" >እኛን ለማግኘት</a>
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
    
    
<div id = "auction_available">
    <h1>ለጫራታ የቀረበ</h1>
    
    
    <div id="available_element">
    
     <?php
        $product = array();
        $prod_ID = array();
        $sql = "SELECT * FROM product_items WHERE ID != '$id'";
        $records = mysqli_query($con, $sql);
        $final = mysqli_num_rows($records); 
        
        if($final != 0) {
            
            for($i = 0; $i < $final; $i++){
                $ID_results = mysqli_fetch_assoc($records);
                $prod_ID[$i] = $ID_results['product_Id'];
            }
        }
        
        
        if($final == 0){
            echo " NO AUCTION AVAILABLE";   
        }
        else {
            
            for($i = 0; $i < $final; $i++){
                $sql = "SELECT * FROM product_items WHERE product_Id = '$prod_ID[$i]'";
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
                 $product['product_img'] = $products['product_img'];
                 
            }
        
     ?> 

        <article>
        <div id="auction_wrapper">
            <div id = "auction_img">
               
     <?php
            
            $image = $product['product_img'];
            $image_src = "product_imgs/".$image;
            ?>
            <img src='<?php echo $image_src; ?>'  style='width:304px;height:228px; '  />
                
                
            </div>
            
            <div id="auction_detail">
                <table>
                <tr>
                    <td>የምርት ባለበት: </td>
                    <td><?php 
                            $users = array();
                            $user_id = $product['ID'];
                            $sql_user = "SELECT Firstname, Lastname FROM users WHERE ID = '$user_id'";
                            $result_user = mysqli_query($con, $sql_user);
                
                            while($user_info = mysqli_fetch_assoc($result_user)){
                                $users['Firstname'] = $user_info['Firstname'];
                                $users['Lastname'] = $user_info['Lastname'];
                            }
                
                            echo  $users['Firstname']. ' ' . $users['Lastname']; 
                        ?>
                    
                    
                    </td>
                </tr>    
                <tr>
                    <td>የምርት ስም: </td>
                    <td><?php echo $product['product_name']; ?></td>
                </tr>
                <tr>
                    <td>የምርት አይነት: </td>
                    <td><?php echo $product['product_type']; ?></td>
                </tr>
                <tr>
                    <td>የምርት መጠን: </td>
                    <td><?php echo $product['product_amount']; ?></td>
                </tr>
                <tr>
                    <td>ዝቅተኛ የመሸጫ ዋጋ: </td>
                    <td><?php echo $product['selling_price']; ?></td>
                </tr>
                <tr>
                    <td>ጫራታ የሚጀምርበት ቀን: </td>
                    <td><?php echo $product['start_date']; ?></td>
                </tr>
                <tr>
                    <td>ጫራታ የሚያልቅበት ቀን: </td>
                    <td><?php echo $product['end_date']; ?></td>
                </tr>
               
                   
            </table>
               
            </div>
            <div id="auciton_btn">
                <form method="post" action="auction_ctrl.php">
                    
                    <input type="hidden" name="auction_id" value="<?php echo $prod_ID[$i]; ?>">
                    <input type=submit value="Detail" name="Submit"> 
                </form>
            </div>
            </div>
            
            <div id="auction_description">
                
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
   
    
    
</div>

    
</body>    

</html>
    





















