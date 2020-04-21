<?php
session_start();
error_reporting(0);
include('../login/config.php');
include('../login/conn.php');
if(strlen($_SESSION['email'])==0)
  { 
header('location:login/login.php');
}
  else{
    $email=$_SESSION['email'];
            $sql = "SELECT * FROM people WHERE email= '$email'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
          
        $phno= $row['pno'];
            $pid= $row['pid'];
            $_SESSION['pid'] = $row['pid'];
            $_SESSION['balance']=$row['wallet'];

        }
?>
<?php
session_start();
if(isset($_POST['action'])){
    include('conn.php');
    $money=$_POST['money'];
    $email=$_SESSION['email'];
    $sql = "Update people set wallet=wallet+$money where email='$email'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
    else{
       echo '<script type="text/javascript">'; 
                        echo 'alert("Money successfully added to wallet");'; 
                        echo 'window.location= "orders.php";';
                        echo '</script>';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Order Food</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
   <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
         body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
       img.resize {
  width:200px;
  height:200px;
}
  </style> 
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="" style="background-color: #FFD033; ">
                <div class="nav-wrapper">
                    <ul class="left">                      
<li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/2fe59190-0e43-4f50-a802-ac9edcf15cf9.jpg"  ></a> <span class="logo-text"></span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">                        
                        <li ><a href="wallet.php"  class="waves-effect waves-block waves-light"><i>&#x20b9; <?php echo $_SESSION['balance'];?></i></a>
                        </li>
                    </ul>       
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <main>
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
       
        <ul id="slide-out" class="side-nav fixed leftside-navigation">

            <li class="user-details" style='background-image: url("download.jpg");background-color:#141063;color:yellow;';>
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="<?php echo $_SESSION['picture'] ?>" alt="" class="circle responsive-img valign profile-image">
                </div>
         <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="../login/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l9">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['fname'];?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $_SESSION['email'];?></p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Order Food</a>
            </li>
            <li class="bold"><a href="orders.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> My Orders</a>
            </li>    
          
            <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a>
            </li>       
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

 <!--start container-->
        <div class="container">
          <p class="caption">Add money to the wallet.</p>
          <div class="divider"></div>
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="wallet.php" novalidate="novalidate">
        
                      <div class="row">
                        <div class="input-field col s12">
                          
              <input name="money" id="text" type="text" data-error=".errorTxt3" required>
              <label for="cvv_number" class="">Add money</label>               
              <div class="errorTxt3"></div>
                        </div>
                      </div>     
                                            <div class="row">
                        <div class="input-field col s12">
                          
              <input name="noc" id="text" type="text" data-error=".errorTxt3" required>
              <label for="noc" class="">Name on that card</label>               
              <div class="errorTxt3"></div>
                        </div>
                      </div>     

                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-credit-card prefix"></i>
              <input name="cc_number" id="cc_number" type="text" data-error=".errorTxt2" required>
              <label for="cc_number" class="">Card Number</label>
              <div class="errorTxt2"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-vpn-key prefix"></i>  
              <input name="cvv_number" id="cvv_number" type="password" data-error=".errorTxt3" required>
              <label for="cvv_number" class="">CVV Number</label>               
              <div class="errorTxt3"></div>
                        </div>
                      </div>            
                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div> 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer" style="background-color: #168F99" >
    <div class="footer-copyright">
      <div class="container">
       
        <span>Copyright © 2019 <a class="grey-text text-lighten-4" href="#" target="_blank">The The Three Musketeers</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Reddy</a></span>
        </div>
    </div>
    
  </footer>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
  
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
     
</body>

</html>
<?php
  }




?>