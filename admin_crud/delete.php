<?php
    require_once "../config.php";
    $id=$_GET['id'] ?? null;
    if(!$id){
        header('Location:view.php');
        exit;
    }
    $statement=$pdo->prepare("DELETE FROM users_acc WHERE id=:id");
    $statement->bindValue('id',$id);
    $statement->execute();
    header('Location:view.php');
?>