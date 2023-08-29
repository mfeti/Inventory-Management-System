<?php
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
                        <a class="nav-link btn btn-outline-info"  href="used.php">Used</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info" href="damage.php">Dameged</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
</body>

</html>