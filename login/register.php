<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
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
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started</p>
	<p>
		<a href="<?php echo $loginURL ?>" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
		
		
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="fname" class="form-control" placeholder="Full name" type="text">
        <input name="lname" class="form-control" placeholder="Last name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>

    	<input name="phno" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name ="password" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name ="cpassword" class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        
        <button class="btn btn-primary btn-block" name="submit" type="submit"> Sign Up</button>
        <?php
    include('conn.php');
    if(isset($_POST['submit'])){
        echo "lol";
        $password=0;
        $cpassword=1;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        if($password == $cpassword){
            $query = "insert into people values(NULL,'{$fname}','{$lname}','{$email}','{$phno}',NULL,0,0)";
            $result = mysqli_query($conn,$query);
            
            if(!$result){
                    echo"<script>alert('emailid or phno already exists');</script>";
                echo("Error description: " . mysqli_error($conn));
  	         }
            else{
                $query = "insert into login values('{$email}','{$password}')";
                $result1 = mysqli_query($conn,$query);
                        echo '<script type="text/javascript">'; 
                        echo 'alert("You have been successfully registered");'; 
                        echo 'window.location= "login.php";';
                        echo '</script>';
            }
        }
        else
        {
           echo "<script>alert('passwords do not match');</script>";  
        }
    }

           ?>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                               
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

