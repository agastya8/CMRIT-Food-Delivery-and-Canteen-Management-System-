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
      $id=$_GET['edit'];
      

        $sql = "SELECT * FROM items WHERE id='{$id}'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
        $name= $row['name'];
            $price= $row['price'];
            $ava= $row['ava'];
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
             <nav class="" style="background-color: #FFD033">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/2fe59190-0e43-4f50-a802-ac9edcf15cf9.jpg"  ></a> <span class="logo-text"></span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">                        

                    </ul>         
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
     <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
       
        <ul id="slide-out" class="side-nav fixed leftside-navigation">

            <li class="user-details" style='background-image: url("download.jpg");background-color:#141063;color:yellow;';>
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
         <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="../login/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l9">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['fname']?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $_SESSION['email'];?></p>
                </div>
            </div>
            </li>
            <li ><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Food Menu</a>
            </li>
            <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li ><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="current.php">Current Orders</a></li>
                                    <li><a href="cancelled.php">Cancelled Orders</a></li>
                                    <li><a href="allorders.php">All Orders</a></li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>     
    
        </ul>

        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Order</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


  <!--start container-->
        <div class="container">
          <p class="caption">Edit your details here which are required for delivery and contact.</p>
          <div class="divider"></div>
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate" id="formValidate" method="post"  novalidate="novalidate"class="col s12">
          
                      <div class="row">
                        <div class="input-field col s12">
                          
                          <input name="name" id="name" type="text" value="<?php echo $name;?>" data-error=".errorTxt2" >
                          <label for="name" class="">item name</label>
               <div class="errorTxt2"></div>
                        </div>
                      </div>


            

                     
                            <div class="custom-select" >
                    
              <select  name="ava">
                            <option value="<?php echo $ava;?>" selected hidden><?php echo $ava;?></option>
                            <option value="Available" >Available</option>
                    <option value="Not Available" >Not Available</option>
                                
              </select>
                       
                        </div>
                    <div class="row">
                        <div class="input-field col s12">
                          
                          <input name="Price" id="number" type="number" value="<?php echo $price;?>" data-error=".errorTxt3" >
                          <label for="Price" class="">Price</label>
              <div class="errorTxt3"></div>
                        </div>
                      </div>
                        <div>
                      <input name="number" id="number" type="number" value="<?php echo $email;?>" data-error=".errorTxt3" >
<label for="number" class="">Image</label>
<div class="errorTxt3"></div>
                        
                      </div>
                                                <div class="row">
                          <div class="input-field col s12">
<button class="waves-effect waves-light btn" style="background-color: #168F99;color:#FFD033"  type="submit" name="submit">Change
                                <i class="mdi-content-send right"></i>
                              </button>
                              
                        </div>
                    </form>
                      
                        <?php
 include '../includes/connect.php';
        
    
    if(isset($_POST['submit'])){
        $name1 = $_POST['name'];
         $ava1 =  $_POST['ava'];
         $Price1 = $_POST['Price'];
        
        
        
        $sql1 = "UPDATE items SET name = '$name1',ava = '$ava1',Price = '$Price1' WHERE id = '$id';";
        $result1 = mysqli_query($conn,$sql1);
        header("location:index.php");
    }
    
    
        ?>
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