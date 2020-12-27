<?php
session_start();
if(!isset($_SESSION["sess_user"])){
	header("Location: login.php");
}
else
{
?>

<!doctype html>
<html>

<head>
	<title>Welcome </title>
	<meta charset="utf-8">
</head>


<body>
	<center> <h1 >Info🗲Electro</h1> </center>
	
	<h3> <?=$_SESSION['sess_user'];?> welcome to Info🗲Electro</h3>
	<nav id="nav"> <a href="logout.php" class="btn btn-danger">Logout !</a> </nav>
	

</body>
</html>
<?php
}
?>