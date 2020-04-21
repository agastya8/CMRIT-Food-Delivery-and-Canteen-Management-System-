 <?php
  include('../login/config.php');
include('../login/conn.php');      
        $payment_type=$_POST['payment_type'];
        $pid=$_SESSION['pid'];


    
     $total =$_SESSION['t'];
              $query1 = "insert into orders values(NULL,$pid,NULL,'$payment_type','$total','ordered')";
     $result = mysqli_query($conn,$query1);
     		if ($result === TRUE){
		$order_id =  $conn->insert_id;
                echo $order_id;
		foreach ($_POST as $key => $value)
		{   echo $key;
			if(is_numeric($key)){
			$result = mysqli_query($conn, "SELECT * FROM items WHERE id = $key");
			while($row = mysqli_fetch_array($result))
			{
				$price = $row['price'];
                $name = $row['name'];
                $quantity = $row['quantity'];
			}
				$price = $value*$price;
			$sql = "INSERT INTO orderdetails  VALUES ( NULL,$key,$order_id,'$name', $value, $price)";
			$result = mysqli_query($conn,$sql);
           
                 //echo("Error description: " . mysqli_error($conn));
  }
			}
		}
            
		if($_POST['payment_type'] == 'Wallet'){
      echo "lol";
      $balance=$_SESSION['balance'];
		$balance = $balance - $total;
		$sql = "UPDATE people SET wallet = $balance WHERE pid = $pid";
		$conn->query($sql) === TRUE;
		}
			 echo("Error description: " . mysqli_error($conn));

	

	
                 
echo '<script type="text/javascript">'; 
                        echo 'alert("Your order is received ");'; 
                        echo 'window.location= "orders.php";';
                        echo '</script>';?>