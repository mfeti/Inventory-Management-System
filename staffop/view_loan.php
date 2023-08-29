<?php
    require_once "../config.php";
    session_start();
    if(isset($_SESSION['staff'])){
        $uname=$_SESSION['staff'];
        $statement=$pdo->prepare("SELECT * FROM request WHERE username=:un");
        $statement->bindValue(':un',$uname);
        $statement->execute();
        $loans=$statement->fetchAll(PDO::FETCH_ASSOC);
    }

?>
<html>
    <head>
     <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <h1>List of loan Items</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Property name</th>
      <th scope="col">Property type</th>
      <th scope="col">Property quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($loans as $i=> $loan){?>
    <tr>
      <th scope="row"><?php echo $i + 1;?></th>
      <td><?php echo $loan['username'];?></td>
      <td><?php echo $loan['property_name'];?></td>
      <td><?php echo $loan['property_type'];?></td>
      <td><?php echo $loan['property_quantity'];?></td>
      <td>
        <a href="disposal.php?request_id=<?php echo $loan['request_id'];?>" type="button" class="btn btn-danger">Disposal</a>
      </td> 
    </tr>
    <?php }?>
  </tbody>
</table>
    </body>
</html>