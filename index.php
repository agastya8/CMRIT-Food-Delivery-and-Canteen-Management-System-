<?php
    require_once "login/config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        
        .mySlides {display: none}
img {vertical-align: middle;}
        
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
    left:0px;
  float: right;
  margin: auto;

}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text 
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}*/

The dots/bullets/indicators 
/*.dot {
  cursor: pointer;
  height:15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}*/

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #FFCC00;
}

li {
  float: right;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: white;
}
        .navbar {
  background-color:#330099;
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
 height: 7%;
}

    </style>
</head>
<body>
    <ul>
      <li><a href="http://www.cmrit.ac.in/student-clubs/">STUDENT CLUBS</a></li>
      <li><a href="http://www.cmrit.ac.in/about-cmrit/">ABOUT</a></li>
      <li><a href="login/login.php">LOGIN</a></li>
    </ul>
   
    <div class="slideshow-container">
        <div class="mySlides fade">    
      <img src="pic5.jpeg" style="width:100%;box-sizing: border-box;">
        </div>
        <div class="mySlides fade">  
      <img src="pic1.jpg" style="width:100%;box-sizing: border-box;">
        </div>
        <div class="mySlides fade">  
      <img src="pic3.jpg" style="width:100%;box-sizing: border-box">
        </div>
        <div class="mySlides fade">  
      <img src="pic4.jpg" style="width:100%;box-sizing: border-box">
     </div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 

</div>   
     <img src="login/images/logo2.png">
<br>
    <p style="width:30%;">The CMR logo is rooted in Indian tradition, yet rendered in the contemporary form of the Hamsa, the Swan. The swan is the carrier of Goddess Saraswathi – the Goddess of Learning.

It is said that the Swan with its sensitive beak has the power of discrimination – an ability to distinguish pure milk from a mixture of milk and water. The wings of the Swan rendered in the alternating flowing lines of blue and white represent the metaphor of milk and water. The blue stands for clarity of purpose and the white for purity of vision. The overall form of the logo radiates and sparkles in the calm, self-contained posture of the Swan gliding on water.</p>
<div class="navbar">
  <a href="#home" ></a>
  <a href="#news"></a>
  <a href="#contact"></a>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 1000); // Change image every 2 seconds

    
}
</script>


</body>
</html>