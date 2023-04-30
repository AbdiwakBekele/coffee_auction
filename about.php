<!DOCTYPE>
<html>
<head>
    <title> ::Coffee Auction</title>
    <link href="css/style.css" rel="stylesheet" type = "text/css">
    <link href="css/jquery.bxslider.css" rel = "stylesheet" type = "text/css">
    <style type = "text/css">
        #aboutWrapper {
            text-align: center;
        }
        
        #aboutSection {
            width: 70%;
            display: inline-block;
            text-align:justify;
        }
        #aboutSection h1, h3 {
            text-align: center;
        }
        #aboutSection h1 {
            text-decoration: underline;
        }
        #aboutSection h3 {
            font-style: italic;
            margin-top: -20px;
        }
        #linkAbout {
            color: brown;
            background: white;
        }
        
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
                 <div id="change_lang">
               
                <div class="dropdown">
                        <button class="dropbtn">Change Language<i></i></button>
                        <div class="dropdown-content">
                            <a href="../signUp.php">English</a>
                            <a href="signUp_am.php">አማርኛ</a>
                            <a href="../Oro/signUp_or.php">Afan Oromo</a>
                            </div>
                   
                   </div>
           
           </div>
           </div> 
      </div>
   </div>
    
<!---------------------- Navigation Bar -----------------> 
<div id = "navigationBar">
        <nav>
            <a href = "index.php">Home</a>
            <a href = "signUp.php">SignUp</a>
            <a href = "login.php">Login</a>
            <a href = "about.php" id = "linkAbout">About</a>
            <a href = "#">Contact As</a>
            
        </nav>
    </div>  
    
    <div id="aboutWrapper">
    <div id = "aboutSection">
        <h1 id = "aboutH1"> MYCoffee.com </h1>
        <h3 id = "aboutH2"> The Largest Coffee Auction Website </h3>
        <p> This coffee auction website is created in December 2019. The main Aim of this
            auction website is to fascilitate and simplify the process of buying a coffee
            by connection coffee merchants and coffee customers. The web is Developed using
            basic HTML, CSS, JavaScript and other different programming languages.
        </p>
        <p>
            By signing in and accessing this largest web application anywhere you can reduce
            time wastage
        </p>
    </div>
    </div>  
    
    
    
    <!------------------- Footer Area --------------->    
    <footer>
        <hr />
        <div id="subFooter_1">
            <h2>የኦንላይን ቡና ጫረታ</h2>
            <p>ይህ የኦንላይን ቡና ጫረታ ነው፡፡ይህ የኦንላይን ቡና ጫረታ ነው፡፡ይህ የኦንላይን ቡና ጫረታ ነው.ይህ የኦንላይን ቡና ጫረታ ነው፡፡ ይህ የኦንላይን ቡና ጫረታ ነው፡፡ይህ የኦንላይን ቡና ጫረታ ነው፡፡ይህ የኦንላይን ቡና ጫረታ ነው፡፡ይህ የኦንላይን ቡና ጫረታ ነው፡፡<a href="about.html">...ሙሉ አንብብ</a></p>
        </div>
        <div id="subFooter_2">
            <h2 style="text-align: center">ለበለጠ መረጃ</h2>
            <ul>
                <li>ቦታ: ጂማ, ኢትዮፒያ </li>
                <li>ስልክ: 1234567890</li>
                <li>ስልክ : +25112345678</li>
                <li>ኢመይል: abdiwakbek3226@gmail.com</li>
            </ul>
        </div>
        <div id="subFooter_3">
            <h2 style="text-align: center">ለመከታተል</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">ፈስቡክ</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">ትዊተር</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">ተለግራም</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">Google+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">ኢንስታግራም</a></li>
            </ul>
        </div>
        <div id = "subFooter_4">
            <h2 style="text-align: center">ለመከታተል</h2>
            <ul>
                <li><img src= "images/facebook.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.facebook.com" target="_blank">ፈስቡክ</a></li>
                <li><img src= "images/twitter.png" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.twitter.com" target="_blank">ትዊተር</a></li>
                <li><img src= "images/telegram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.telegram.com" target="_blank">ተለግራም</a></li>
                <li><img src= "images/google+.jpeg" style="width:15px;height:15px; margin-right: 5px;" target="_blank"><a href="#">ጉግል+</a></li>
                <li><img src= "images/instagram.jpeg" style="width:15px;height:15px; margin-right: 5px;"><a href="http://www.instagram.com" target="_blank">ኢንስታግራም</a></li>
                
            </ul>
        </div>
    </footer>
    
    
        
</div>

</body>    

</html>
    


























