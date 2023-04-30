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
    <title> ::የቡና ጫራታ</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        
        #linkHome {
            color: brown;
            background: white;
        }
        
    
        
                #auction_form {
            float: left;
            width: 70%;
            margin-left: 200px;
            margin-top: 20px;
            font-size: 20px;
        }
        #formElements {
            width: 80%;
            display: inline-block;
            background: #f2f2f2;
            padding: 40px;
            margin-left: 30px;
        }
        #formElements input[type=text], input[type=number], input[type=file], textarea {
            width: 100%;
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #formElements input[type=date] {
            width: 20%;
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-weight: bold;
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
        #formBtns {
            text-align: center;
        }
        #formElements input[type=submit], #formElements input[type=button]{
            width: 40%;
            height: 40px;
            color: white;
            background: #009933;
            border: none;
            border-radius: 5px; 
        }
        #formElements input[type=button] {
            background: #ab6a6a;
        }
        #formElements input[type=submit]:hover{
            background: #227722;
            cursor: pointer;
        }
        #formElements input[type=button]:hover {
            background: #800000;
            cursor: pointer;
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

        
        
        #history_img {
            width:  30%;
            border: 1px solid black;
            float: left;
        }
        #history_detail {
            width: 30%;
            float: left;
            margin-top: 10px; 
        }
        #history_description {
            width: 100%;
            float: left;
            text-align: left;
            border: 1px solid black;
            margin-top: 10px;
            margin-bottom: 10px;
            
        }
        #history_btn {
            float:left;
        }


        
    </style>
    </head>
<body>

<div id = "wrapper">
   <div id = "header">
      <div id = "subheader">
          <div class = "container">
              <p> ፈጣን የኦንላይን ቡና ጫራታ ለጅማ ከተማ</p>
             
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo">ነጻ ኦንላይን የቡና ጫራታ</div></span>
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
            <a href = "profile.php" id="linkHome">ፕሮፋይል</a>
            <a href = "create_auction.php">ጫራታ ለመጀመር</a>
            <a href = "bid_on_other.php" >ለሎች ላይ ለመጫረት</a>
            <a href = "about.html">መረጃ</a>
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
    
    
    
    <?php
    
    ////////// For Editing Products //////////////
$value = "";
if(isset($_POST['edit_Submit'])){
    $value = $_POST['auction_id'];
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
    
    
    
    <div id = "auction_form">
        
        <form method="post" action= "auction_edit.php"  enctype='multipart/form-data'>
            <fieldset>
                <legend> ለ ጫራታ የሚቀርብ እቃ</legend>
                <div id="formElements">

                    
                    <label for="product_name">የምርት ስም</label>
                    
                    <input type="text" id="prod_name" name="product_name" value="<?php echo $product['product_name']; ?>">
                    
                    <label for= "product_img">የምርት አይነት</label>
                    <input type='file' name='product_img' />
                    
                    <label for="product_amount">የምርት መጠን</label>
                    <input type="number" id="prod_amount" name="product_amount" value="<?php echo $product['product_amount']; ?>">
                    
                    <label for="product_type">የምርት አይነት</label><br/>
                        <select name ="product_type" id="prod_type"
                                value=" <?php echo $product['product_type']; ?>" >
                            
                            <option></option>
                            <option>ሲዳማ</option>
                            <option>ጉጂ</option>
                            <option>ጅማ</option>
                            <option>ሃረር</option>
                            <option>ይርጋጨፈ</option>
                            <option>ሊሙ</option>
                            <option>ቴፒ</option>
                            <option>ጊምቢ</option>
                            <option>ከፋ</option>
                            <option>ጫካ</option>
                            <option>ገማድሮ</option>
                            <option>በበቃ</option>
                            <option>ጎደረ</option>
                            <option>በንች</option>
                            <option>ማጂ</option>
                            <option>ባሌ</option>
                            <option>አንደረጫ</option>
                            <option>ዘጌ</option>
                            <option>አማሮ</option>
                            <option>አርሲ</option>
                            <option>ቆጨረ</option>
                            <option>አዩ</option>
                            <option>ቤንች</option>
                            <option>ፈርዳ</option>
                            <option>ሸጊቱ</option>
                            <option>ወለጋ</option>
                            <option>ገዪሻ</option>
                            <option>ገራ</option>
                            <option>የኪ</option>             
                        </select> 
                    <br/>
                    
                    <label for="selling_price">ዝቅተኛ የምርት መሸጫ ዋጋ</label>
                    <input type="text" id="sell_price" name="selling_price"  value="<?php echo $product['selling_price']; ?>">
                    
                    <label for="start_date">ጫራታ የሚጀምርበት ቀን</label><br/>
                    <input type="date" id="start_date" name="start_date"  value="<?php echo $product['start_date']; ?>"><br/>
                    
                    <label for="end_date">ጫራታ የሚያልቅበት ቀን</label><br/>
                    <input type="date" id="end_date" name="end_date" value="<?php echo $product['end_date']; ?>"><br/>
                    
                    <label for="prod_description">የምርት ማብራሪያ</label>
                    <textarea id = "prod_description" name="prod_description" rows="20" cols="50" value="<?php echo $product['product_description']; ?>"></textarea>
                    
                    
                    <hr/><hr/>
                    <div id="formBtns">
                        <input type = "hidden" name="udp_prod_id" value="<?php echo $value; ?>">
                        <input type="submit" id="submitBtn" name="Update_Submit" value="UPDATE">
                        <input type="button" id="cancelBtn" name="cancel" value="CANCEL">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
      

    
    
    
    </div>

<?php   
 }
?>
    
    
   
    
    
    <div id= "result">
<?php

include 'db_connection.php';    
    
    
    if(isset($_POST['Update_Submit']))
    {
        
        $value = $_POST['udp_prod_id'];
        $prodName = $_POST['product_name'];
        $prodAmount = $_POST['product_amount'];
        $prodType = $_POST['product_type'];
        $sellPrice = $_POST['selling_price'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $prodDescription = $_POST['prod_description'];
        
 
        $name = $_FILES['product_img']['name'];
        $target_dir = "product_imgs/";
        $target_file = $target_dir . basename($_FILES["product_img"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
        // Insert record
       // $query = "insert into product_items(product_img) values('".$name."')";
        // mysqli_query($con,$query);
        // Upload file
        move_uploaded_file($_FILES['product_img']['tmp_name'],$target_dir.$name);
        }
        
        $email = $_SESSION['email'];
        
        $query_user = "SELECT ID FROM users WHERE Email = '$email'";
        
        $q_result = mysqli_query($con,$query_user);
        $r = mysqli_fetch_assoc($q_result );
         $id = $r['ID'];
        
        /// UPDATING PRODUCT VALUE ///////////////////
        
        $query = "UPDATE product_items SET  product_name = '$prodName', product_type = '$prodType',                         product_amount = '$prodAmount',  selling_price = '$sellPrice', 
                    start_date = '$startDate', end_date = '$endDate', product_description = '$prodDescription', product_img = '$name'  WHERE product_Id = '$value' ";

        if(mysqli_query($con, $query)){
            $msg = "You Successfully Updated your Auction! Go to Profile Page to see detail";
            echo $msg;
        }
    }

    
    if(isset($_POST['cancel'])) {
        header('location: profile.php');
    }
    
    
?>         
    </div>    
    
    
    
    <?php
    
    ///////////  For Deleting Products ////////////
    
    
if(isset($_POST['delete_Submit'])){
    $value = $_POST['auction_id'];
    
     $del_sql = "DELETE FROM product_items WHERE product_Id = '$value'";
    $records = mysqli_query($con, $del_sql);
    
    echo "Successfully Deleted";
   
 }
    
    
    $con->close();
?>    
      
   
    
</div>

    
</body>    

</html>
    


















































