<?php
 require_once "../config.php";

 $search="damage";
 $statement=$pdo->prepare("SELECT * FROM property WHERE property_status LIKE :damage");
 $statement->bindValue(':damage',"%$search%");
 $statement->execute();

 $items=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
    <head>
     <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
    <h1>Status of Item</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-gray" id="navbarTogglerDemo01">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item me-3">
                        <a class="nav-link  btn btn-outline-info " href="new.php">New</a></a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link btn btn-outline-info" aria-current="" href="used.php">Used</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info active" href="damage.php">Dameged</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Property name</th>
      <th scope="col">Property type</th>
      <th scope="col">Property quantity</th>
      <th scope="col">Serial number</th>
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
    </tr>
    <?php }?>
  </tbody>
</table>
        <div class="input-group-append">
        <button class="btn btn-outline-secondary" onclick="window.print();">Print</button>
      </div>
    </body>
</html>