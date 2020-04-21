<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: ../customer/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();


include('conn.php');
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $sql = "SELECT * FROM login WHERE email='{$email}'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
    
    while($row = mysqli_fetch_array($result)){
        $dbemail = $row['email'];
        $dbpassword = $row['password'];

    }
    if($email == $dbemail && $password == $dbpassword){
        $sql = "SELECT * FROM people WHERE email='{$email}'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
        $_SESSION['email'] = $row['email'];
            $_SESSION['pid'] = $row['pid'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['fname'] = $row['fname'];

    }
        echo"lololo";
            header('Location: index.php');
        
         


    }
    else{
  
        echo "<script>alert('Invalid Details');</script>";

    }
    
}


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">


<style>
    .divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}


.btn-twitter {
    background-color: #f44336;
    color: #fff;
}</style>



<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Log In</h4>
	
	<p>
		<a href="<?php echo $loginURL ?>" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
		
		
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="post">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->

    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name= "password" class="form-control" placeholder="password" type="password">
    </div> <!-- form-group// -->
                                      
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="login"> Log In </button>
    </div> <!-- form-group// -->      
 <p class="text-center">Don't have an account? <a href="register.php">Sign up</a> </p> 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->



