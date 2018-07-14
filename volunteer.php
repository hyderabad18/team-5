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

$sql = "SELECT * FROM book";
$result = mysqli_query($db,$sql);

echo "<table border='1'>
<tr>
<th>id</th>
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

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
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
