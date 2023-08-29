<?php 
    require_once "../config.php";
    $rid=$_GET['request_id'] ?? null;
    if(!$rid){
        header('location:view.php');
        exit;
    }
    $statement=$pdo->prepare("UPDATE  FROM request WHERE request_id=:id");
    $statement->bindValue(':id',$rid);
    $statement->execute();
?>