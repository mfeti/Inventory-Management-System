<?php
require_once "../config.php";

$search = $_GET['search']?? "";
if($search){
  $statement = $pdo->prepare("SELECT * FROM users_acc WHERE firstname LIKE :search");
  $statement->bindValue(':search',"%$search%");
}
else{
  $statement = $pdo->prepare("SELECT * FROM users_acc");
}

$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<html>

<head>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
  <h1>User Account Management</h1>
  <a href="create.php" type="button" class="btn btn-success">Create User Account</a><br><br>
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
      <!--firstname,lastname,sex,age,email,phone,user_type,password,username-->
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Sex</th>
        <th scope="col">Age</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">User-type</th>
        <th scope="col">Password</th>
        <th scope="col">Username</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $i => $user) { ?>
        <tr>
          <th scope="row"><?php echo $i + 1; ?></th>
          <td><?php echo $user['firstname']; ?></td>
          <td><?php echo $user['lastname']; ?></td>
          <td><?php echo $user['sex']; ?></td>
          <td><?php echo $user['age']; ?></td>
          <th><?php echo $user['email']; ?></th>
          <td><?php echo $user['phone']; ?></td>
          <td><?php echo $user['user_type']; ?></td>
          <td><?php echo $user['password']; ?></td>
          <td><?php echo $user['username']; ?></td>
          <td>
            <a href="update.php?id=<?php echo $user['id']; ?>" type="button" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="delete.php?id=<?php echo $user['id']; ?>" type="button" class="btn btn-outline-danger btn-sm" onclick="confirmationDelete(this);return false;">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
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