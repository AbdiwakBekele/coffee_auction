<!DOCTYPE>
<html>
<head>
    <title> Caalbaasii Bunaa</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
   #linkHome {
            color: brown;
            background: white; 
                
            }

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
margin-top: 50px;
    margin-right: 20px;
    
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
              <p> Caalbaasii Bunaa Marsariitii Irraa Magaalaa Jimmaaf</p>
              
          </div>
       </div>
<!---------------------------Main Header-------------------------->
       <div id = "main-header">
           <!---------------------Logo ------------------>
           <div id = "logo">
               <span>MYCoffee.com<br /> <div id = "insideLogo"> Caalbaasii Bunaa Marsaritii Irraa</div></span>
           </div>
           
            <!---------- Search Area --------->
               
           <div id = "searchArea">
               <form action = "">
                    <input class = "searchField" type = "text" name = "text" placeholder = "Asitii barbadii" autocomplete="off">
                    <input class = "searchBtn" type = "submit" name= "submit" value = "BARBADUU">
               </form>
           </div>
           
           <!-----------UserMenu----------------->
           <div id = "userMenu">
               <div class="dropdown">
                        <button class="dropbtn">Looqodaa Jiijiiru <i></i></button>
                        <div class="dropdown-content">
                            <a href="../index.php">English</a>
                            <a href="../Amh/index_am.php">አማርኛ</a>
                            <a href="index_or.php">Afan Oromo</a>
                            </div>
                   
                   </div>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index.php" id = "linkHome">Seensa</a>
            <a href = "signUp_or.php">Galmeessi</a>
            <a href = "login_or.php">Seeni</a>
            <a href = "about_am.html">Odeeffannoo</a>
            <a href = "#subFooter_2" >Nu Qunnamuuf</a>
        </nav>
    </div>  
<!----------------------- Image Slider -------------->
    <div id = "imgSlider">
        <ul class = "bxslider">
            <li><img id = "slider2" src = "images/PhotoEditor_20200304_083001633.jpg"></li>
            <li><img id = "slider2" src = "images/slider2.jpg"></li>
            <li><img id = "slider3" src = "images/slider3.jpg"></li>
        </ul>
        <hr />
    </div>
<!------------------- Footer Area --------------->    
    <footer>
        <hr />
        <div id="subFooter_1">
            <h2>Caalbaasii Bunaa Marsaritii Irra</h2>
            <p>Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati.Kun Caalbaasii Bunaa Marsariitii Irrati <a href="about.html">...Bal'inaan Dubbisuf</a></p>
        </div>
        <div id="subFooter_2">
            <h2 style="text-align: center">Nu Qunnamuuf</h2>
            <ul>
                <li>Teesso: Jimma, Ethiopia</li>
                <li>Lakkofsa Bilbilaa: 1234567890</li>
                <li>Lakk bilbilaa: +25112345678</li>
                <li>Emaili: abdiwakbek3226@gmail.com</li>
            </ul>
        </div>
        <div id="subFooter_3">
            <h2 style="text-align: center">Nu Hordofuuf</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebookii</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitterii</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegramii</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagramii</a></li>
            </ul>
        </div>
        <div id = "subFooter_4">
            <h2 style="text-align: center"> Sararawwan Barbaachiso</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">Facebookii</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">Twitterii</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">Telegramii</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">Instagramii</a></li>
                
            </ul>
        </div>
    </footer>
</div>

<script src = "js/jquery.js"></script> 
<script src = "js/jquery.bxslider.min.js"></script> 
<script src = "js/JavaScriptFile.js"></script>
    
</body>    

</html>
    




















