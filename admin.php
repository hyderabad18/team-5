<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>ADMIN</h2>
		
	</div>

	<div class="content">

    <?php
    
    $username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	$db = mysqli_connect('localhost', 'root', 'root', 'registration');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<center><h4>Status of uploaded books</h4></center>";
$sql = "SELECT * FROM book where status='t'";
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

	</div>
	
</body>
</html>	
