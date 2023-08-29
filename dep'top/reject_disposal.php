<?php
    require_once "../config.php";
    $did=$_GET['disposal_id'] ?? null;
   if(!$did){
      header('location:view_disposal.php');
      exit;
   }

   $dp="Rejected";
   $statement=$pdo->prepare("UPDATE disposal SET status=:st WHERE disposal_id=:id");
   $statement->bindValue(':st',$dp);
   $statement->bindValue(':id',$did);
   $statement->execute();
   header('location:view_disposal.php');

?>