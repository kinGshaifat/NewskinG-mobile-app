<?php include('connection.php');
if(!isset($_SESSION['user'])){
	header('location:index.php');
	exit;
	}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<h1 align="center"><font color="green">Admin panel</font></h1>
</head>

<body >
<?php  include('menu.php')?>
</body>
</html>