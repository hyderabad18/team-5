<html>
<head>
<title> How To Create A Database Search With MySQL & PHP Script | Tutorial.World.Edu </title>
</head>
<body>
<form action="search-database.php" method="post">
Search: <input type="text" name="search" placeholder=" Search here ... "/>
<input type="submit" value="Submit" />
</form>
<p><a href="http://tutorial.world.edu/web-development/how-to-create-database-search-mysql-php-script/">PHP MySQL Database Search</a> by <a href="http://tutorial.world.edu">Tutorial.World.Edu</a></p>
</body>
</html> 
<?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "databasename";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from book where title LIKE '%$search%' OR author LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result
         if (!$query->rowCount() == 0) {
		 		echo "Search found :<br/>";
				echo "<table style=\"font-family:arial;color:#333333;\">";	
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Title Books</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Author</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Price</td></tr>";				
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";			
                echo $results['title'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['author'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo "$".$results['price'];
				echo "</td></tr>";				
            }
				echo "</table>";		
        } else {
            echo 'Nothing found';
        }
?>