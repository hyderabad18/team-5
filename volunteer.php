<?php 
	 

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>volunteer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>volunteer</h2>
		
	</div>
	<div class="content">
		
        <?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("mp3","wav");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="these extension not allowed";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

      
      <form action="" method="POST" enctype="multipart/form-data">
      	
      	 <br>
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

      <br>
      <br>


          <?php
$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'root', 'registration');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<center><h4>Status of uploaded books</h4></center>";
$sql = "SELECT * FROM book";
$result = mysqli_query($db,$sql);

echo "<center><table border='1'>
<tr>
<th >id</th>
<th>version</th>
<th>title</th>
<th>status</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['BID'] . "</td>";
echo "<td>" . $row['VERSION'] . "</td>";
echo "<td>" . $row['TITLE'] . "</td>";
if($row['STATUS']=='y')
echo "<td>approved</td>";
else if($row['STATUS']=='n')
echo "<td>rejected</td>";
else if($row['STATUS']=='w')
echo "<td>waiting</td>";

echo "</tr>";
}
echo "</center></table>";

mysqli_close($con);


?>
<br>
<center><h4>Requested Books</h4></center>

<?php
$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'root', 'registration');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM request";
$result = mysqli_query($db,$sql);

echo "<center><table border='1'>
<tr>
<th >rid</th>
<th>bookname</th>
<th>author</th>
<th>edition</th>
<th>category</th>
<th>status</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['rid'] . "</td>";
echo "<td>" . $row['bookname'] . "</td>";
echo "<td>" . $row['author'] . "</td>";
echo "<td>" . $row['edition'] . "</td>";
echo "<td>" . $row['category'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
if($row['STATUS']=='n')
echo "<td>not uploaded</td>";

echo "</tr>";
}
echo "</center></table>";

mysqli_close($con);


?>
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div >
				<h3>


					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>

				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>

	</div>
	
</body>
</html>	
