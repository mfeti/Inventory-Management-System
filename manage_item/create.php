<?php
    require_once "../config.php";

    $errors=[];
    $pname=$ptype=$pcost=$pserial=$pquantity="";
   if($_SERVER['REQUEST_METHOD']==='POST'){
    $pname=$_POST['item'];
    $ptype=$_POST['itemt'];
    $pquantity=$_POST['itemq'];
    $pserial=$_POST['serial'];
    $pcost=$_POST['itemc'];

    if(!($pname)){
        $errors[]="Property name required";
    }
    if(!($ptype)){
        $errors[]="Property type required";
    }
    if(!($pquantity)){
        $errors[]="Property quantity required";
    }
    if(!($pserial)){
        $errors[]="Property serial number required";
    }
    if(!($pcost)){
        $error="Property cost required";
    }

    if(empty($errors)){
        $statement=$pdo->prepare("INSERT INTO property(property_name,property_type,property_quantity,serial_number,property_cost)
        VALUES(:pn,:pt,:pq,:sn,:pc)");
        $statement->bindValue(':pn',$pname);
        $statement->bindValue(':pt',$ptype);
        $statement->bindValue(':pq',$pquantity);
        $statement->bindValue(':sn',$pserial);
        $statement->bindValue(':pc',$pcost);
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
    <h1>Register Item</h1>
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
        <div class="mb-3">
            <label for="serial" class="form-label">Serial number</label>
            <input type="text" class="form-control" id="serial" name="serial" value="<?php echo $pserial;?>">
        </div>
        <div class="mb-3">
            <label for="itemc" class="form-label">Property cost</label>
            <input type="text" class="form-control" id="itemc" name="itemc" value="<?php echo $pcost;?>">
           
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>

</html>