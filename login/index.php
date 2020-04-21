<?php
	session_start();


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login With Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-3">
			<img style="width: 80%;" src="<?php echo $_SESSION['picture'] ?>">
		</div>
<?php
            include('conn.php');
    
        $fname = $_SESSION['fname'];
       $lname = $_SESSION['lname'];
        $email = $_SESSION['email'];
        $pic = $_SESSION['picture'];
            
         //        

     $sql = "SELECT * FROM people WHERE email='{$email}'";
    $result = mysqli_query($conn,$sql);
                 
    if(mysqli_num_rows($result) == 0){
        $q = "insert into people values(NULL,'{$fname}','{$lname}','{$email}',NULL,'{$pic}',1,0)";
            $result = mysqli_query($conn,$q);
        echo("Error description: " . mysqli_error($conn));

    }
    else{
        echo "data is there";
        
    }
       
                 if($email=='admin@cmrit.ac.in')
                 {
                     header('Location:../restaurant/index.php');
                 }
                 else
                     header('Location:../student/index.php');
                 
                 
        ?>





		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>

					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['fname'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['lname'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email'] ?></td>
					</tr>
					<tr>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>

</html>