<?php
//delete product of user
include('config.php');
$ID=$_GET['id'];
mysqli_query($con,"DELETE from addcard where id=$ID");
header('location:card.php');

?>