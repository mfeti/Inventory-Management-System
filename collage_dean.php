<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST' and isset($_POST['logout'])){
        unset($_SESSION['dean']);
        session_destroy();
        header('location:login.php');
    }
    if(isset($_SESSION['dean'])==false){
        header('location:login.php');
    }
    if(isset($_SESSION['dean'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    
    <link rel="stylesheet" href="css/fontawesome-free-6.2.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.1-web/css/solid.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.1-web/css/solid.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mycss.css">
    <title>Collage Dean</title>   
</head>
<body>
    
    <div class="d-flex" id="wrapper">
        <!--Sidebar start here-->
          <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fa-solid fa-user"></i>Collage Dean
            </div>
            <div class="list-group list-group-flush my-3 secondary-bg" style="height:100%;">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>view request

                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Approve request

                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>View Item

                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>approve disposal
                </a>    
                <form action="" method="post">      
                    <button name="logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                        <i class="fas fa-power-off me-2"></i>Log out
                    </button>
                </form>
            </div>
          </div>
        <!--Sidebar end here-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
              <div class="d-flex align-items-center">
                  <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                  <h2 class="fs-2 m-0">Dashboard</h2>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
               aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Collage Dean
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                <form action="" method="post">
                                   <button type="submit" class="dropdown-item" name="logout">Logout</button>
                                </form>
                              </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="container-fluid px-4 blue">
                <iframe src="" width="100%" height="100%"  name="ifr">
                    
                </iframe>
            </div>
            </div>
        
    </div>
        

<script src="js/bootstrap.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton=document.getElementById("menu-toggle");
    toggleButton.onclick=function(){
        el.classList.toggle("toggled");
    };
</script>


</body>
</html>
<?php }?>