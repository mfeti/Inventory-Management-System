<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container my-5">
        <h1>List of clients</h1>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //create connectiom
                $con=new mysqli("localhost","root","","myshopdb");
                //check connection
                if($con->connect_error){
                    die("Connection failed".$con->connect_error);
                }
                //create statement-read all row from database
                $sql="SELECT * FROM shop";
                //execute statement
                $result =$con->query($sql);
                if(!$result){
                    echo "Sthing wrong";
                }
                //read data of each row
                while($row= $result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>
                        <a class='btn btn-primary btn-sm btn-info' href='/myshop/update.php?$row[id]'>Update</a>
                        <a class='btn btn-primary btn-sm btn-danger' href='/myshop/delete.php?$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";

                }

                ?>
            </tbody>

        </table>
    </div>   

<script src="js/css">

</script>
</body>
</html>