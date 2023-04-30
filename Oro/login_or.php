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
                    <input class = "searchBtn" type = "submit" name= "submit" value = "BARBAADI">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
      <div id = "userMenu">
               
                <div class="dropdown">
                        <button class="dropbtn">Loqoda Jijjiiruuf <i></i></button>
                        <div class="dropdown-content">
                            <a href="../login.php">English</a>
                            <a href="../Amh/login_am.php">አማርኛ</a>
                            <a href="login_or.php">Afaan Oromoo</a>
                            </div>
                   
                   </div>
           
    
    <li><a href = "admin/index.php">To'ataa</a></li>
           </div> 
           
           
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index_or.php">Seensa</a>
            <a href = "signUp_or.php">Galmeessi</a>
            <a href = "login_or.php" id = "linkLogin">Seeni</a>
            <a href = "about_or.html">Odeeffannoo</a>
            <a href = "#">Nu Quunnamuuf</a>
            
        </nav>
    </div>  
    
    <div id = "login_div">
        <form action = "login_ctrl.php" method="post">
            <fieldset>
                <legend>Seeni</legend>
                <div id="loginFormElements">
                    <label for="email">Imeeyilii</label>
                    <input type="email" id="email" name="email" placeholder="imeeyilii galchi" autocomplete="on">
                    <label for="pword">Jecha Darbii</label>
                    <input type="password" id="pword" name="pword" placeholder="*********">
                    <div id="formBtns">
                        <input type="submit" value="Seeni">
                        <hr/>
                        <input type="button" value="Akkaawuntii Haaraa Bani" onclick='window.location.href= "signUp.php"'><br/>
                        <a href="#">Jecha Darbiin Irraanfadhe</a>
                    </div>
                </div>    
            </fieldset>
        </form>
    </div>
</div>

</body>    

</html>
    


























