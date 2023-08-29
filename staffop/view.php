<?php
 require_once "../config.php";
 
 $statement=$pdo->prepare("SELECT * FROM property");
 $statement->execute();

 $items=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
    <head>
     <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <h1>List of Items</h1>
        <a href="request_create.php" type="button" class="btn btn-outline-success">Create request</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Property name</th>
      <th scope="col">Property type</th>
      <th scope="col">Property quantity</th>
      <th scope="col">Serial number</th>
      <th scope="col">Property status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($items as $i=> $item){?>
    <tr>
      <th scope="row"><?php echo $i + 1;?></th>
      <td><?php echo $item['property_name'];?></td>
      <td><?php echo $item['property_type'];?></td>
      <td><?php echo $item['property_quantity'];?></td>
      <td><?php echo $item['serial_number'];?></td>
      <td><?php echo $item['property_status'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
    </body>
</html>