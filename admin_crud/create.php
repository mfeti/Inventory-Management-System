<?php
require_once "../config.php";

$fname=$lname=$sex=$age=$email=$phone=$utype=$passwd=$uname="";
$errors=[];

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
        $statement=$pdo->prepare("INSERT INTO users_acc (firstname, lastname ,sex ,age ,email ,phone ,user_type ,password, username)
        VALUES(:fn, :ln, :s, :a, :e, :ph, :ut, :pwd, :un)");
        $statement->bindValue(':fn',$fname);
        $statement->bindValue(':ln',$lname);
        $statement->bindValue(':s',$sex);
        $statement->bindValue(':a',$age);
        $statement->bindValue(':e',$email);
        $statement->bindValue(':ph',$phone);
        $statement->bindValue(':ut',$utype);
        $statement->bindValue(':pwd',$passwd);
        $statement->bindValue(':un',$uname);
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
    <h1>Create User Account</h1>
    <a href="view.php" type="button" class="btn btn-outline-danger">cancel</a>
    <?php if(!empty($errors))  {?>
        <div class="alert alert-danger err">
            <?php foreach($errors as $error){?>
                <?php echo $error.'<br>'?>
                <?php } ?>
        </div>
    <?php }?>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"  value="<?php echo $fname;?>">
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