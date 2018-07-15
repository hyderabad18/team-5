<?php
$dbh=new PDO("mysql:host=localhost;dbname=uploads","root","root");
$id=isset($GET['id'])? $_GET['id'] : "";
$stat=$dbh->prepare("select * from uploads where id=?");
$stat->bindParam(1,$id);
$stat=execute();
$row=$stat->fetch();
header('Content-Type:'.$row['mime']);
echo "<li><a target='_blank' href='listen.php?id=".$row['id']. " '>" .$row['name']."</a></li>";

?>