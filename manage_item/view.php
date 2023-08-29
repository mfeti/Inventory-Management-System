<?php
 require_once "../config.php";

 $search=$_GET['search'] ?? "";
 if($search){
  $statement=$pdo->prepare("SELECT * FROM property WHERE property_name LIKE :search");
  $statement->bindValue(':search',"%$search%");
 }else{
  $statement=$pdo->prepare("SELECT * FROM property");
 }
 
 $statement->execute();

 $items=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
    <head>
     <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <h1>List of Items</h1>
        <a href="create.php" target="ifr" type="button" class="btn btn-success">Register Items</a><br><br>
        <form>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="search here" name="search" value="<?php echo $search;?>">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </div>
  </form>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Property name</th>
      <th scope="col">Property type</th>
      <th scope="col">Property quantity</th>
      <th scope="col">Serial number</th>
      <th scope="col">Property cost</th>
      <th scope="col">Property status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($items as $i=> $item){?>
    <tr id="<?php echo $item['property_id'] ?>">
      <th scope="row"><?php echo $i + 1;?></th>
      <td><?php echo $item['property_name'];?></td>
      <td><?php echo $item['property_type'];?></td>
      <td><?php echo $item['property_quantity'];?></td>
      <td><?php echo $item['serial_number'];?></td>
      <td><?php echo $item['property_cost'];?></td>
      <td><?php echo $item['property_status'];?></td>
      <td>
        <a href="update.php?property_id=<?php echo $item['property_id'];?>" type="button" class="btn btn-outline-primary">Edit</a>
        <a href="delete.php?property_id=<?php echo $item['property_id'];?>"type="button" class="btn btn-outline-danger remove" onclick="confirmationDelete(this);return false;">Delete</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<!--onclick='javascript:confirmationDelete($(this));return false;'-->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript">
function confirmationDelete(a)
    {
      var conf = confirm('Are you sure want to delete this record?');
      if(conf)
          window.location=a.attr("href");
    }
</script>
    </body>
</html>