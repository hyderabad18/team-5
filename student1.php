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
        <h2>student</h2>
        
    </div>
    <div class="content">
        
    <br>


        <?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database_name = "registration";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from book where TITLE LIKE '%$search%' OR AUTHOR LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result
         if (!$query->rowCount() == 0) {
                echo "Search found :<br/>";
                echo "<table style=\"font-family:arial;color:#333333;\">";  
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Title Books</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Author</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">";             
            while ($results = $query->fetch()) {
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";            
                echo $results['title'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['author'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                
                echo "</td></tr>";              
            }
                echo "</table>";        
        } else {
            echo 'Nothing found';
        }
?>


<form action="student1.php" method="post">
Search: <input type="text" name="search" />
<input type="submit" value="Submit" />
</div>
</form>

      <br>
      <br>




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





