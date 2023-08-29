<?php
 require_once "../config.php";

 $pid=$_GET['property_id'] ?? null;
 if(!$pid){
    header('location:view.php');
    exit;
 }
 
$statement=$pdo->prepare('DELETE FROM property WHERE property_id=:id');
$statement->bindValue(':id',$pid);
$statement->execute();
header('location:view.php');

?>