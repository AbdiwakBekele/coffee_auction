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
    <title> ::</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        
        #link_CreateAuction {
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
        #result {
            float:left;
            width: 100%;
            text-align: center;
            border: none;
            border-radius: 10px;
            font-size: 25px;
            color: #009933;
            background: #99ffbb;
            min-height: 0px;
        }
        
        
      
        
    </style>
    </head>
<body>
    
    
<div id = "wrapper">
   <div id = "header">
      <div id = "subheader">
          <div class = "container">
              <p>ፈጣን የኦላይን ቡና ጫራታ ለ ጅማ ከተማ</p>
              
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo">ነጻ ኦንላይን የቡና ጫራታ </div></span>
           </div>
           
            <!---------- Search Area --------->
               
           <div id = "searchArea">
               <form action = "">
                    <input class = "searchField" type = "text" name = "text" placeholder = "Search Here" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "SEARCH">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
          
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile.php" >ፕሮፋይል</a>
            <a href = "create_auction.php" id = "link_CreateAuction">ጫራታ ለመጀመር</a>
            <a href = "bid_on_other.php">ለሎች ላይ ለመጫረት</a>
            <a href = "history.php">ታሪክ</a>
            <a href = "#subFooter_2" >እኛን ለማግኘት</a>
        </nav>
    </div>  

    
 <!------------------------- Auction Form ---------------------------->   

    
    
    <div id = "auction_form">
        
        <form method="post" action= "create_auction.php"  enctype='multipart/form-data'>
            <fieldset>
                <legend>ለ ጫራታ የሚቀርቡ ምርቶች</legend>
                <div id="formElements">
<div id= "result">
<?php

include 'db_connection.php';    
    
    
    if(isset($_POST['Submit']))
    {
        
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
        
        $query = "INSERT INTO product_items (product_name,ID, product_type, product_amount, selling_price, start_date, end_date, product_description, product_img)
                            VALUES ('$prodName','$id', '$prodType', '$prodAmount', '$sellPrice', '$startDate', '$endDate', '$prodDescription', '$name')";

        if(mysqli_query($con, $query)){
            $msg = "You  Successfully Created an Auction! Go to Profile Page to see detail";
            echo $msg;
        }
    }
    
    $con->close();
?>       
    
    </div>    
                    
                    <label for="product_name">የምርት ስም</label>
                    <input type="text" id="prod_name" name="product_name">
                    
                    <label for= "product_img">የምርት ፎቶ</label>
                    <input type='file' name='product_img' />
                    
                    <label for="product_amount">የምርት መጠን </label>
                    <input type="number" id="prod_amount" name="product_amount">
                    
                    <label for="product_type">የምርት አይነት</label><br/>
                        <select name ="product_type" id="prod_type">
                            <option></option>
                            <option>ሲዳማ </option>
                            <option>ጉጂ </option>
                            <option>ድጅማ</option>
                            <option>ሃረር </option>
                            <option>ይርጋጫፈ</option>
                            <option>ሊሙ</option>
                            <option>ተፒ</option>
                            <option>ጊምቢ</option>
                            <option>ከፋ</option>
                            <option>ጫካ</option>
                            <option>ገማድሮ</option>
                            <option>በበቃ</option>
                            <option>ጎደረ</option>
                            <option>በንች</option>
                            <option>ማጂ</option>
                            <option>ባለ</option>
                            <option>አንደራጫ</option>
                            <option>ዘገ</option>
                            <option>አማሮ</option>
                            <option>አርሲ</option>
                            <option>ቆጨረ</option>
                            <option>አዩ</option>
                            <option>በንች </option>
                            <option>ፈርዳ</option>
                            <option>ሸጊቱ</option>
                            <option>ወለጋ</option>
                            <option>ገዪሻ</option>
                            <option>ገራ</option>
                            <option>የኪ</option>             
                        </select> <br/>
                    
                    <label for="selling_price">ዝቅተኛ ይምርት መሸጫ ዋጋ</label>
                    <input type="text" id="sell_price" name="selling_price">
                    
                    <label for="start_date">ጫራታ የሚጀምርበት ቀን</label><br/>
                    <input type="date" id="start_date" name="start_date"><br/>
                    
                    <label for="end_date">ጫራታ የሚያልቅበት ቀን</label><br/>
                    <input type="date" id="end_date" name="end_date"><br/>
                    
                    <label for="prod_description">የምርት ማብራሪያ</label>
                    <textarea id = "prod_description" name="prod_description" rows="20" cols="50"></textarea>
                    
                    
                    <hr/><hr/>
                    <div id="formBtns">
                        <input type="submit" id="submitBtn" name="Submit">
                        <input type="button" id="cancelBtn" name="cancel" value="Cancel">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    
    
    
    


    
</body>    

</html>
    





















