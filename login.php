<?php
require_once "config.php";
$errors = [];
$uname = $passwd = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$passwd = $_POST['passwd'];

	if (empty($uname)) {
		$errors[] = "pls enter username";
	}
	if (empty($passwd)) {
		$errors[] = "pls enter Password";
	}

	if (empty($errors)) {
		$statement = $pdo->prepare("SELECT * FROM users_acc WHERE username=:un and password=:passwd");
		$statement->bindValue(':un', $uname);
		$statement->bindValue(':passwd', $passwd);
		$statement->execute();
		$count = $statement->rowCount();
		$user = $statement->fetch(PDO::FETCH_ASSOC);
		if ($count > 0) {
			if ($user['user_type'] === 'admin') {
				session_start();
				$_SESSION['admin'] = $uname;
				header('Location:system_admin.php');
			}
			if ($user['user_type'] === 'clerk') {
				session_start();
				$_SESSION['clerk'] = $uname;
				header('Location:store_clerk.php');
			}
			if ($user['user_type'] === 'manager') {
				session_start();
				$_SESSION['manager'] = $uname;
				header('Location:store_manager.php');
			}
			if ($user['user_type'] === 'department head') {
				session_start();
				$_SESSION['head'] = $uname;
				header('Location:department_head.php');
			}
			if ($user['user_type'] === 'collage dean') {
				session_start();
				$_SESSION['dean'] = $uname;
				header('Location:collage_dean.php');
			}
			if ($user['user_type'] === 'techenician') {
				session_start();
				$_SESSION['tech'] = $uname;
				header('Location:technician.php');
			}
			if ($user['user_type'] === 'staff member') {
				session_start();
				$_SESSION['staff'] = $uname;
				header('Location:staff_member.php');
			}
		} else {
			$errors[] = "invalid username and password";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">


	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
	<link href="css/styleH.css" rel="stylesheet" />
	<style>
		* {
			box-sizing: border-box;
			font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
			font-size: 16px;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		body {
			background-color: #435165;
		}

		.login {
			width: 400px;
			background-color: #ffffff;
			box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
			margin: 100px auto;
		}

		.login h1 {
			text-align: center;
			color: #5b6574;
			font-size: 24px;
			padding: 20px 0 20px 0;
			border-bottom: 1px solid #dee0e4;
		}

		.login form {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			padding-top: 20px;
		}

		.login form label {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 50px;
			height: 50px;
			background-color: #3274d6;
			color: #ffffff;
		}

		.login form input[type="password"],
		.login form input[type="text"] {
			width: 310px;
			height: 50px;
			border: 1px solid #dee0e4;
			margin-bottom: 20px;
			padding: 0 15px;
		}

		.login form input[type="submit"] {
			width: 50%;
			padding: 15px;
			margin-top: 15px;
			margin-bottom: 15px;
			background-color: #3274d6;
			border: 0;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
			transition: background-color 0.2s;
		}

		.login form input[type="submit"]:hover {
			background-color: #2868c7;
			transition: background-color 0.2s;
			border-radius: 4px;


		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<ul class="navbar-nav ms-auto">
					<li><a href="home.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="group.html">Group</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
		</nav>
	</div>
	<div class="login">
		<h1>Login</h1>
		<?php if (!empty($errors)) { ?>
			<div class="alert alert-danger err">
				<?php foreach ($errors as $error) { ?>
					<?php echo $error . '<br>' ?>
				<?php } ?>
			</div>
		<?php } ?>
		<form action="" method="POST">
			<label for="username">
				<i class="fa fa-user"></i>
			</label>
			<input type="text" name="uname" placeholder="Username" id="username" required>
			<label for="password">
				<i class="fa fa-lock"></i>
			</label>
			<input type="password" name="passwd" placeholder="Password" id="password" required>
			<input type="submit" class="btn-btn warning-feedback" value="Login" name="login">
		</form>
	</div>

	<script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 footer-info">
            <h3>The Haramaya University IMS</h3>
            <p>This Is A Website where Haramaya university maneges inventory.&nbsp;This Website is developed by 3rd year CS Students Of haramaya universtiy.</p>
            
          </div>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <div class="col-lg-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="home.html">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="about.html">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
            
              <li><i class="ion-ios-arrow-right"></i> <a href="group.html">group</a></li>
            </ul>
          </div>
  
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
             HU IMS <br>
              <strong>Phone:</strong> +91 9007525203.<br>
              <strong>Email:</strong>haramaya@gmail.com.<br>
            </p>

            <div class="social-links">
              <a href="https://www.twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/scanitjsr/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.facebook.com/scanitjsr/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://www.linkedin.com" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright © 2023 <a href="https://www.haramaya.edu.et/">Haramaya University</a> | <a href="https://www.haramaya.edu.et/" target="_parent">HU Inventory Management System</a>
		</div>
    </div>
  </footer>
</body>
</html>