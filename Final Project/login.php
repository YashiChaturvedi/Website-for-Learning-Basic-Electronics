<!doctype html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
  body{
	  height: 100%; 
	  background-image:url('electronic wallpaper.jpg');
	  background-position: center;
	  background-repeat: no-repeat;
      background-size: cover;
  }
  form{
	  bor
  }
  </style>
</head>
<body>
<center>
<div class="form-group w-50 ">

<form action="" method="post" class="text-center border border-dark p-5 m-5" style="background-color:#a8dadc">
<h1>Login to Info🗲Electro</h1>
<label>Username:</label><input type="text" name="user"class="form-control"><br/>
<label>Password:</label><input type="password" name="pass"class="form-control"><br/>
<input type="submit" value="Login" name="submit"class="form-control btn btn-info"><br/></br>
<!--New user Register Link -->
<p><a href="register.php" class="form-control btn btn-success">New User Registeration!</a></p>
</form>
<?php
if(isset($_POST["submit"])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		//DB Connection
		$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'test') or die("databse error");
		//Selecting database
		$query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' AND pass='".$pass."'");
		$numrows = mysqli_num_rows($query);
		if($numrows !=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername=$row['user'];
				$dbpassword=$row['pass'];
			}
			if($user == $dbusername && $pass == $dbpassword)
			{
				session_start();
				$_SESSION['sess_user']=$user;
				//Redirect Browser
				header("Location:home_page.html");
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
		}
	}
	else
	{
		echo "Required All fields!";
	}
}
?>
</center>
</body>
</html>