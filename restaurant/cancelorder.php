 <?php
  include('../login/config.php');
include('../login/conn.php'); 
$status = $_POST['status'];
$id = $_POST['id'];
$sql = "UPDATE orders SET status='$status' WHERE oid=$id;";
mysqli_query($conn, $sql);
 

$sql = mysqli_query($conn, "SELECT * FROM orders where oid=$id");
while($row1 = mysqli_fetch_array($sql)){
$pid = $row1['pid'];
$total = $row1['total'];
}

$sql = mysqli_query($conn, "SELECT * FROM people where pid=$pid");
while($row1 = mysqli_fetch_array($sql)){
$balance = $row1['wallet'];


}


	$balance = $balance+$total;
	$sql = "UPDATE people SET wallet = $balance WHERE pid = $pid;";
	$conn->query($sql);

 echo("Error description: " . mysqli_error($conn));
  
echo '<script type="text/javascript">'; 
                        echo 'alert("The order is  cancelled ");'; 
                        echo 'window.location= "allorders.php";';
                        echo '</script>';;
?>