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
          <p class="caption">Order your food here.</p>
          <div class="divider"></div>
                                              <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">search</i>
                          <input name="search" id="text" type="text" onkeyup="myFunction()">
                          <label for="phone" class="">Search</label>
                        </div>

		  <form class="formValidate" id="formValidate" method="post" action="placeorder.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header"></h4>
              </div>

              <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Photos</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($conn, "SELECT * FROM items;");
				while($row = mysqli_fetch_array($result))
				{  
                  $ava=$row["ava"];
					echo '<tr><td>'.$row["name"].'</td>';
                    echo '<td><img class="resize" src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/></td>';
                    
                    echo '<td>'.$row["price"].'</td>'; 
                    
                    
					echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
                    if($ava == 'Available'){
					
                        echo '<input id="'.$row["id"].'" name="'.$row['id'].'"type="text" data-error=".errorTxt'.$row["id"].'" ><div class="errorTxt'.$row["id"].'"></div> <button class="waves-effect waves-light btn green" style="pointer-events: none;">AVAILABLE</Button></td></tr>';
                        
                    }
                    else
                        echo '<button class="waves-effect waves-light btn red" style="pointer-events: none;">NOT AVAILABLE</Button></td></tr>';
				}
				?>
                    </tbody>
</table>
              </div>

			  <div>
			  
			  <div class="input-field col s12">
                              <button class="waves-effect waves-light btn right" style="background-color:  #168F99;color:#FFD033"  type="submit" name="action">Order
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>

      <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("text");
  filter = input.value.toUpperCase();
  table = document.getElementById("data-table-customer");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
			</form>
            <div class="divider"></div>
            
          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->


  </div>
  <!-- END MAIN -->
      </div>
    </main>


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