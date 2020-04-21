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
            $fname=$_SESSION['fname'];
            $lname=$_SESSION['lname'];
            $name = $fname." ".$lname;
            $email=$_SESSION['email'];
        $sql = "SELECT * FROM people WHERE email='{$email}'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
        $phno= $row['pno'];
            $pid= $row['pid'];
            $_SESSION['pid'] = $row['pid'];
            $_SESSION['balance']=$row['wallet'];

        }
         
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Place Order</title>

 


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
  </style> 
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
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['fname']?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
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

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Confirm Order</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
       
        <div class="container">
          
          <div class="divider"></div>
          <!--editableTable-->

<div class="row">
<div>
<ul id="issues-collection" class="collection">
<?php
    echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name:</strong>'.$name.'</p>
		<p><strong>Contact Number:</strong> '.$phno.'</p>
        <p><strong>Email:</strong> '.$email.'</p>
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';
		$stack = array();
        $stack1 = array();
        $stack2 = array();
        $stack3 = array();
	foreach ($_POST as $key => $value)
	{  $_SESSION['key']=$key;
        

		if($value == ''){
			break;
		}
		if(is_numeric($key)){
		$result = mysqli_query($conn, "SELECT * FROM items WHERE id = $key");
		while($row = mysqli_fetch_array($result))
		{
			$price = $row['price'];
			$itemname = $row['name'];
			$itemid = $row['id'];
		}
			$price = $value*$price;
			    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title">'.$itemname.'</p>
            </div>
            <div class="col s2">
                <span>'.$value.' Pieces</span>
            </div>
            <div class="col s3">
                <span>Rs. '.$price.'</span>
            </div>
        </div>
    </li>';
		$total = $total + $price;
            $_SESSION['t']=$total;

            $stack[$key]=$price;
        }
	}
    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"> Total</p>
            </div>
            <div class="col s2">
                <span>&nbsp;</span>
            </div>
            <div class="col s3">
                <span><strong>Rs. '.$_SESSION['t'].'</strong></span>
            </div>
        </div>
    </li>';
        
        
        ?>
</ul>


                </div>
				</div>
                
              

          <div class="divider"></div>
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">&nbsp;&nbsp;</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirmorder.php" >
                      <div class="row">
                        <div class="custom-select" >
							<label for="payment_type">Payment Type</label><br><br>
							<select  name="payment_type">
                                <option value="Cash" selected >Cash</option>
									<option value="Wallet" >Cmrit Wallet</option>
																
							</select>
                       
                        </div>
                      </div>					


					  
                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn  right" type="submit" name="submit" style="background-color:#168F99;color:#FFD033;" >Submit
                              <i class="mdi-content-send right">
                                  
                              </i>
                            </button>
                          </div>
                        </div>
                      </div>
					  <?php
        
        $payment_type=$_POST['payment_type'];
        
        
        
        

        foreach ($_POST as $key => $value)
{
    if($key == 'submit' || $value == ''){
        break;
    }
    echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
}
        
        
        
  ?>

					  
                    </form>
                  </div>
                </div>
              </div>
            <div class="divider"></div>
            
          </div>
        <!--end container-->

      </div>
          

      </section>
      <!-- END CONTENT -->


  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer" style="background-color:#168F99" >
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2019 <a class="grey-text text-lighten-4" href="#" target="_blank">The Three Musketeers</a> All rights reserved.</span>
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