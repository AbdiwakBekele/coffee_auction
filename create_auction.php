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
    <title> Coffee Auction</title>
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
        
        /* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
    margin-top: 35px;
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
               <div class="dropdown">
                        <button class="dropbtn">Change Language <i></i></button>
                        <div class="dropdown-content">
                            <a href="index.php">English</a>
                            <a href="index_Am.php">አማርኛ</a>
                            <a href="index_OR.php">Afan Oromo</a>
                            </div>
                   
                   </div>
               <li><a href = "logout_ctrl.php">Log out</a></li>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile.php" >Profile</a>
            <a href = "create_auction.php" id = "link_CreateAuction">Create Auction</a>
            <a href = "bid_on_other.php">Bid on Other</a>
            <a href = "history.php">History</a>
            <a href = "#subFooter_2" >Contact As</a>
        </nav>
    </div>  

    
 <!------------------------- Auction Form ---------------------------->   

    
    
    <div id = "auction_form">
        
        <form method="post" action= "create_auction.php"  enctype='multipart/form-data'>
            <fieldset>
                <legend> Create Auction Items</legend>
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
                    
                    <label for="product_name">Product Name</label>
                    <input type="text" id="prod_name" name="product_name" required>
                    
                    <label for= "product_img"> Product Image</label>
                    <input type='file' name='product_img' required />
                    
                    <label for="product_amount">Product Amount</label>
                    <input type="number" id="prod_amount" name="product_amount" required>
                    
                    <label for="product_type">Product Type</label><br/>
                        <select name ="product_type" id="prod_type" required>
                            <option></option>
                            <option>Sidama</option>
                            <option>Guji</option>
                            <option>Djimmma</option>
                            <option>Harrar</option>
                            <option>Yirgacheffe</option>
                            <option>Limmu</option>
                            <option>Teppi</option>
                            <option>Ghimbi</option>
                            <option>Keffa</option>
                            <option>forest</option>
                            <option>Gemadro</option>
                            <option>Bebeka</option>
                            <option>Godere</option>
                            <option>Bench</option>
                            <option>Maji</option>
                            <option>Bale</option>
                            <option>Anderacha</option>
                            <option>Zege</option>
                            <option>Amaro</option>
                            <option>Arsi</option>
                            <option>Kochere</option>
                            <option>Ayu</option>
                            <option>Bench</option>
                            <option>Ferda</option>
                            <option>Shegitu</option>
                            <option>Wellega</option>
                            <option>Geisha</option>
                            <option>Gera</option>
                            <option>Yeki</option>             
                        </select> <br/>
                    
                    <label for="selling_price">Product Minimum Selling Price</label>
                    <input type="text" id="sell_price" name="selling_price" required>
                    
                    <label for="start_date">Auction Start Date</label><br/>
                    <input type="date" id="start_date" name="start_date" required><br/>
                    
                    <label for="end_date">Auction End Date</label><br/>
                    <input type="date" id="end_date" name="end_date" required><br/>
                    
                    <label for="prod_description">Product Descirption</label>
                    <textarea id = "prod_description" name="prod_description" rows="20" cols="50" required></textarea>
                    
                    
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
    





















