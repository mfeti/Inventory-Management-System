<?php
    require_once "../config.php";

    $errors=[];
    $uname=$pname=$ptype=$pquantity="";
   if($_SERVER['REQUEST_METHOD']==='POST'){
    $uname=$_POST['uname'];
    $pname=$_POST['item'];
    $ptype=$_POST['itemt'];
    $pquantity=$_POST['itemq'];
    

    if(!($uname)){
        $errors[]="user name required";
    }
    if(!($pname)){
        $errors[]="Property name required";
    }
    if(!($ptype)){
        $errors[]="Property type required";
    }
    if(!($pquantity)){
        $errors[]="Property quantity required";
    }
    

    if(empty($errors)){
        $statement=$pdo->prepare("INSERT INTO request(username,property_name,property_type,property_quantity)
        VALUES(:un,:pn,:pt,:pq)");
        $statement->bindValue(':un',$uname);
        $statement->bindValue(':pn',$pname);
        $statement->bindValue(':pt',$ptype);
        $statement->bindValue(':pq',$pquantity);
        
        $statement->execute();
        header('location:view.php');

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
    <h1>Request Item</h1>
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
            <label for="uname" class="form-label">Username</label>
            <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $uname;?>">
        </div>
        <div class="mb-3">
            <label for="item" class="form-label">Property Name</label>
            <input type="text" class="form-control" id="item" name="item" value="<?php echo $pname;?>">
        </div>
        <div class="mb-3">
            <label for="itemt" class="form-label">Property type</label>
            <input type="text" class="form-control" id="itemt" name="itemt" value="<?php echo $ptype;?>">
            
        </div>
        <div class="mb-3">
            <label for="itemq" class="form-label">Property quantity</label>
            <input type="text" class="form-control" id="itemq" name="itemq" value="<?php echo $pquantity;?>">
            
        </div>
        <button type="submit" class="btn btn-primary">Request</button>
    </form>
</body>

</html>