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
    <title>የቡና ጫራታ</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        .dropdown {
  float: left;
  overflow: hidden;
    
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
        
        
        #linkProfile {
            color: brown;
            background: white;
        }    
        #signUp_form {
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
        #formElements input[type=text],input[type=email],input[type=tel], input[type=password], input[type=file] {
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
              <p>ፈጣን የኦንላይን ቡና ጫራታ ለጅማ ከተማ </p>
              <a href = "#">አግዝ</a>
              <a href = "#">እንግዳ</a>
              <a href = "#">መተግበሪያ አዉርድ</a>
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo">ነጻ የኦንላይን ጫራታ</div></span>
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
               
       
            <div id="change_lang">
               
                <div class="dropdown">
                        <button class="dropbtn">ቋንቋ ለመቀየር<i></i></button>
                        <div class="dropdown-content">
                            <a href="index.php">English</a>
                            <a href="index_Am.php">አማርኛ</a>
                            <a href="index_OR.php">Afan Oromo</a>
                            </div>
                   
                   </div>
           
           </div>
    
           </div> 
           
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "profile.php" id= "linkProfile">ፕሮፋይል</a>
            <a href = "#">ጫራታ ለመጀመር</a>
            <a href = "#">ለሎች ላይ ለመጫረት</a>
            <a href = "#">መረጃ</a>
            <a href = "#">እኛን ለማግኘት </a>
            
        </nav>
    </div>  
<!------------------------- SignUP Form ---------------------------->   

    
    
    <div id = "signUp_form">
        
        
        
        
        
    <?php

include 'db_connection.php';   
    
    if(isset($_POST['edit_submit'])){
        $edit_user_id = $_POST['edit_user_ID'];
        
        $array = array();
                $q = "SELECT * FROM users WHERE ID = '$edit_user_id'";
                $q_result = mysqli_query($con,$q);
       
              while ($r = mysqli_fetch_assoc($q_result )){
                $array['Firstname'] = $r['Firstname'];
                $array['Lastname'] = $r['Lastname'];
                $array['Email'] = $r['Email'];
                $array['Gender'] = $r['Gender'];
                $array['Birthday'] = $r['Birthday'];
                $array['PhoneNo'] = $r['PhoneNo'];
                $array['Address'] = $r['Address'];
               }
        
    
    


?>           
        
        <form method="post" action= profile_edit.php enctype='multipart/form-data'>
            <fieldset>
                <legend> የአካዉንት ማስተካከያ</legend>
                <div id="formElements">


        
                    <label for="fname">ስም</label>
                    <input type="text" id="fname" name="firstName" value=" <?php echo $array['Firstname']; ?>">
                    
                    <label for="lname">የአባት ስም</label>
                    <input type="text" id="lname" name="lastName" value=" <?php echo $array['Lastname']; ?>">
                    
                    
                    <label for= "profile_pic">የፕሮፋይል ፎቶ</label>
                    <input type='file' name='profile_pic' />
                    
                    
                    <label for="gender">ጾታ</label><br/>
                        <select name ="gender" id="gender" value=" <?php echo $array['Gender']; ?>">
                            <option></option>
                            <option>ወንድ</option>
                            <option>ሴት</option>
                        </select> <br/>
                    
                    <label for="bday">የልደት ቀን</label><br/>
                    <input type="date" id="bday" name="bday" value=" <?php echo $array['Birthday']; ?>"><br/>
                    <label for="email">ኢሜይል </label>
                    <input type="email" id="email" name="email" value=" <?php echo $array['Email']; ?>">
                    
                    <label for="pNumber">የስልክ ቁጥር</label>
                    <input type="tel" id="pNumber" name="phoneNo" value=" <?php echo $array['PhoneNo']; ?>">
                    
                    <label for="address">ቦታ</label>
                    <input type="text" id="address" name="address" value=" <?php echo $array['Address']; ?>">
                    <hr/>
                    
                    <label for="pword">የመጀመሪያ የይለፍ ቃል</label>
                    <input type="password" id="pword" name="pword_prev">
                    
                    <label for="pword">አዲስ የይለፍ ቃል</label>
                    <input type="password" id="pword" name="pword">
                    
                    <label for="confirm_pword">አዲስ የይለፍ ቃል አረጋግጥ</label>
                    <input type="password" id="confirm_pword" name="confirm_pword">
                    <hr/><hr/>
                    
                    <div id="formBtns">
                        <input type="hidden"  name="edit_user_ID_input"value = "<?php echo $edit_user_id ;?>">
                        
                        <input type="submit" id="submitBtn" name="Submit" value="UPDATE">
                        <input type="button" id="cancelBtn" name="cancel" value="CANCEL">
                    </div>
                </div>
            </fieldset>
        </form>
        
        
        
<?php
        
    }    
            
    if(isset($_POST['Submit']))
    {
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $gender = $_POST['gender'];
        $birthday = $_POST['bday'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $address = $_POST['address'];
        $password = md5($_POST['pword']);
        $cfrm_password = $_POST['confirm_pword'];
        $edit_user_id = $_POST['edit_user_ID_input'];

        $name = $_FILES['profile_pic']['name'];
        $target_dir = "User_Profile/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
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
        move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_dir.$name);
        }
        
        
        $query = "UPDATE users SET Firstname = '$firstname', Lastname = '$lastname',profile_img = '$name', Gender = '$gender', Birthday = '$birthday', Email = '$email',  PhoneNo = '$phoneNo', Address='$address', Password = '$password' WHERE ID = '$edit_user_id' ";
        
        

        if(mysqli_query($con, $query)){
            $msg = "You Successfully Updated your Profile!";
            echo $msg;
        }
    }
    
    $con->close();
        
        
?>        
        
    </div>


    
    
</div>
</body>    
</html>
    


























