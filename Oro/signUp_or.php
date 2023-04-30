<!DOCTYPE>
<html>
<head>
    <title> ::Coffee Auction</title>
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
        
        
        #SignUp {
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
        #formElements input[type=text],input[type=email],input[type=tel], input[type=password] {
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
                    <input class = "searchField" type = "text" name = "text" placeholder = "barbaadi" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "Barbaadi">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
           
            <div id = "userMenu">
               
       
            <div id="change_lang">
               
                <div class="dropdown">
                        <button class="dropbtn">Loqoda Jijjiiruuf<i></i></button>
                        <div class="dropdown-content">
                            <a href="../signUp.php">English</a>
                            <a href="../Amh/signUp_am.php">አማርኛ</a>
                            <a href="signUp_or.php">Afaan Oromoo</a>
                            </div>
                   
                   </div>
           
           </div>
    
           </div> 
           
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index_or.php">Seensa</a>
            <a href = "signUp_or.php" id = "SignUp">Galmeessi</a>
            <a href = "login_or.php">Seeni</a>
            <a href = "about_or.php">Odeeffannoo</a>
            <a href = "#">Nu Quunnamaa</a>
            
        </nav>
    </div>  
<!------------------------- SignUP Form ---------------------------->   

    
    
    <div id = "signUp_form">
        
        <form method="post" action= signUp.php>
            <fieldset>
                <legend> Galmeessi </legend>
                <div id="formElements">
<div id= "result">
<?php

include 'db_connection.php';    
    
    
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

        
        $query = "INSERT INTO users (Firstname, Lastname, Gender, Birthday, Email, PhoneNo, Address, Password)
                            VALUES ('$firstname', '$lastname', '$gender', '$birthday', '$email', '$phoneNo', '$address', '$password')";

        if(mysqli_query($con, $query)){
            $msg = "Galmoofteetta! gara fuula seenii deemi";
            echo $msg;
        }
    }
    
    $con->close();
?>       
    
    </div>    
                    
                    <label for="fname">Maqaa</label>
                    <input type="text" id="fname" name="firstName">
                    <label for="lname">Maqaa Abbaa</label>
                    <input type="text" id="lname" name="lastName">
                    <label for="gender">Saala</label><br/>
                        <select name ="gender" id="gender">
                            <option></option>
                            <option>Dhiira</option>
                            <option>Dhalaa</option>
                        </select> <br/>
                    <label for="bday">Bara Dhalootaa</label><br/>
                    <input type="date" id="bday" name="bday"><br/>
                    <label for="email"> Imeeyilii </label>
                    <input type="email" id="email" name="email">
                    <label for="pNumber">Lakk Bilbilaa</label>
                    <input type="tel" id="pNumber" name="phoneNo">
                    <label for="address">Iddoo</label>
                    <input type="text" id="address" name="address">
                    <hr/>
                    <label for="pword">Jecha Darbiikee Galchi</label>
                    <input type="password" id="pword" name="pword">
                    <label for="confirm_pword">Jecha Darbiikee Mirkaneessi</label>
                    <input type="password" id="confirm_pword" name="confirm_pword">
                    <hr/><hr/>
                    <div id="formBtns">
                        <input type="submit" id="submitBtn" name="Submit">
                        <input type="button" id="cancelBtn" name="cancel" value="Cancel">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


    
    
</div>
</body>    
</html>
    


























