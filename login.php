<!DOCTYPE>
<html>
<head>
    <title> ::Coffee Auction</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        #linkLogin {
            color: brown;
            background: white;
        }    
        
        /* The dropdown container */
        .dropdown {
        float: left;
        overflow: hidden;
            margin-top: 35px;
            margin-right: 5px;
            
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
        
        
        #login_div {
            float: left;
            width: 50%;
            margin: 50px 0px 10px 300px;
            font-size: 20px;
        }
        #loginFormElements {
            padding: 30px;
            background: #f2f2f2;
            margin: auto 50px;
        }
        #loginFormElements input {
            width: 100%;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        #formBtns {
            text-align: center;
        }
        #formBtns input {
            width: 70%;
            background: #009933;
            color: white;
        }
        #formBtns input:hover {
            cursor: pointer;
        }
        #formBtns a{
            text-decoration: none;
            font-style: italic;
            font-size: 17px;
            color: #4d4d33;
        }
        #formBtns a:hover {
            text-decoration: underline;
            color: #5275e0;
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
                            <a href="login.php">English</a>
                            <a href="Amh/login_am.php">አማርኛ</a>
                            <a href="Oro/login_or.php">Afan Oromo</a>
                            </div>
                   
                   </div>
       <li><a href = "admin/index.php">Admin</a></li>
           </div> 
           
           
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index.php">Home</a>
            <a href = "signUp.php">SignUp</a>
            <a href = "login.php" id = "linkLogin">Login</a>
            <a href = "about.php">About</a>
            <a href = "#">Contact As</a>
            
        </nav>
</div>  

    <!-- ----------------- Main Body --------------- -->
    
<div id = "login_div">
    <form action = "login_ctrl.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <div id="loginFormElements">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email Address" autocomplete="on" required>
                <label for="pword">Password</label>
                <input type="password" id="pword" name="pword" placeholder="*********" required>
                <div id="formBtns">
                    <input type="submit" value="Login">
                    <hr/>
                    <input type="button" value="Create New Account" onclick='window.location.href= "signUp.php"'><br/>
                    <a href="#">Forget your password</a>
                </div>
            </div>    
        </fieldset>
    </form>
</div>
    
    
    
    
      
    
    
<!------------------- Footer Area --------------->    
    <footer>
        <hr />
        <div id="subFooter_1">
            <h2>E-commerce Coffee Auction</h2>
            <p>This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site.This is the Ecommerce Coffee Ecommerce Site <a href="about.html">...Read More</a></p>
        </div>
        <div id="subFooter_2">
            <h2 style="text-align: center">Contact As</h2>
            <ul>
                <li>Address: Jimma, Ethiopia</li>
                <li>Phone No: 1234567890</li>
                <li>Tel No: +25112345678</li>
                <li>Email: abdiwakbek3226@gmail.com</li>
            </ul>
        </div>
        <div id="subFooter_3">
            <h2 style="text-align: center">Follow As</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebook</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitter</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegram</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagram</a></li>
            </ul>
        </div>
        <div id = "subFooter_4">
            <h2 style="text-align: center"> Important Links</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebook</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitter</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegram</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagram</a></li>
                
            </ul>
        </div>
    </footer>
    
    
</div>

</body>    

</html>
    


























