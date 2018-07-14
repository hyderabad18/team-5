<?php
session_start();
$con = require_once 'dbconnect.php';
if( isset($_POST['date'])){
	
	$date=$_POST['date'];
	$description=$_POST['description'];
	$pic = $_FILES["img"]['name'];
	$amount=$_POST['amount'];
	$query = "INSERT INTO description(date,description,amount, pic) VALUES('$date','$description','$amount', '$pic')";
	 $res = mysqli_query($con, $query);

	 $uploaddir = dirname(__FILE__);
     $uploadfile = $uploaddir ."/". basename($_FILES['img']['name']);
     move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

	 
}

?>