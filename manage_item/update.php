
<?php
    require_once "../config.php";
    $pid=$_GET['property_id'] ?? null;
    if($pid==null){
        header('location:view.php');
        exit;
    }
    $statement=$pdo->prepare("SELECT * FROM property WHERE property_id=:id");
    $statement->bindValue(':id',$pid);
    $statement->execute();
    $item=$statement->fetch(PDO::FETCH_ASSOC);
    
    $errors=[];
    $pname=$item['property_name'];
    $ptype=$item['property_type'];
    $pcost=$item['property_cost'];
    $pserial=$item['serial_number'];
    $pquantity=$item['property_quantity'];
    $pstatus=$item['property_status'];
   if($_SERVER['REQUEST_METHOD']==='POST'){
    $pname=$_POST['item'];
    $ptype=$_POST['itemt'];
    $pquantity=$_POST['itemq'];
    $pserial=$_POST['serial'];
    $pcost=$_POST['itemc'];
    $pstatus=$_POST['items'];

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
    if(!($pstatus)){
        $error="Property status required";
    }

    if(empty($errors)){
        $statement=$pdo->prepare("UPDATE property SET
         property_name=:pn, property_type=:pt, property_quantity=:pq, serial_number=:sn,property_cost=:pc,property_status=:ps WHERE property_id=:id");
        $statement->bindValue(':pn',$pname);
        $statement->bindValue(':pt',$ptype);
        $statement->bindValue(':pq',$pquantity);
        $statement->bindValue(':sn',$pserial);
        $statement->bindValue(':pc',$pcost);
        $statement->bindValue(':ps',$pstatus);
        $statement->bindValue(':id',$pid);
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
    <h1>Update Items</h1>
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
        <div class="mb-3">
            <label for="items" class="form-label">Property status</label>
            <input type="text" class="form-control" id="items" name="items" value="<?php echo $pstatus;?>">
           
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>

</html>