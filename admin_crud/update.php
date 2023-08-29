<?php
require_once "../config.php";


$errors=[];
$id=$_GET['id'] ?? null;
if(!$id){
    header('Location:view.php');
    exit;
}
$statement=$pdo->prepare("SELECT * FROM users_acc WHERE id=:id");
$statement->bindValue(':id',$id);
$statement->execute();
$user=$statement->fetch(PDO::FETCH_ASSOC);

$fname=$user['firstname'];
$lname=$user['lastname'];
$sex=$user['sex'];
$age=$user['age'];
$email=$user['email'];
$phone=$user['phone'];
$utype=$user['user_type'];
$passwd=$user['password'];
$uname=$user['username']; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $utype=$_POST['user_type'];
    $passwd=$_POST['password'];
    $uname=$_POST['username']; 

    if(!$fname){
        $errors[]="First name is empty";
    }
    if(!$lname){
        $errors[]="Last name is empty";
    }
    if(!$sex){
        $errors[]="Sex name is empty";
    }
    if(!$age){
        $errors[]="Age is empty";
    }
    if(!$email){
        $errors[]="Email is empty";
    }
    if(!$phone){
        $errors[]="Phone is empty";
    }
    if(!$utype){
        $errors[]="User Type is empty";
    }
    if(!$passwd){
        $errors[]="Password is empty";
    }
    if(!$uname){
        $errors[]="User Name is empty";
    }

    if(empty($errors)){
        $statement=$pdo->prepare("UPDATE users_acc SET firstname=:fn,lastname=:ln ,sex=:s ,age=:a ,email=:e ,phone=:ph ,user_type=:ut ,password=:pwd, username=:un WHERE id=:id");
        $statement->bindValue(':fn',$fname);
        $statement->bindValue(':ln',$lname);
        $statement->bindValue(':s',$sex);
        $statement->bindValue(':a',$age);
        $statement->bindValue(':e',$email);
        $statement->bindValue(':ph',$phone);
        $statement->bindValue(':ut',$utype);
        $statement->bindValue(':pwd',$passwd);
        $statement->bindValue(':un',$uname);
        $statement->bindValue(':id',$id);
        $statement->execute();
        header('Location:view.php');
    }

}

?>
<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        form,.err{
            width:30%;
            margin:auto;
        }
    </style>
</head>

<body>
    <h1>Updat User account</h1>
    <!-- <a href="create.php" type="button" class="btn btn-success">Create User Account</a> -->
    <?php if(!empty($errors))  {?>
        <div class="alert alert-danger err">
            <?php foreach($errors as $error){?>
                <?php echo $error.'<br>'?>
                <?php } ?>
        </div>
    <?php }?>
    <form action="" method="POST">
        <!-- <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" name="id">
        </div> -->
        <div class="mb-3">
            <label for="firstname" class="form-label" >First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $fname;?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lname;?>">
            
        </div>
        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex;?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">
           
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
            
        </div>
        <div class="mb-3">
            <label for="user_type" class="form-label">User-type</label>
            <input type="text" class="form-control" id="user_type" name="user_type" value="<?php echo $utype;?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $passwd;?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $uname;?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>