<?php
require_once "../config.php";
   $did=$_GET['disposial_id'] ?? null;
   if(!$did){
      header('location:view_disposal.php');
      exit;
   }
  $statement=$pdo->prepare('DELETE FROM disposal WHERE desposial_id=:id');
  $statement->bindValue(':id',$did);
  $statement->execute();
  header('location:view_disposal.php');
  ?>