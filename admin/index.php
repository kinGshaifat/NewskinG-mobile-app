<?php include('connection.php') ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<h1 align="center"><font color="Blue">Admin Panel</font></h1>
</head>

<body>
<h1 align="center"><font color="green">Log In</font></h1>
<form method="post" >
	<div align="center">
    <table>
	
    	<tr>
        	<td>Admin</td>
            <td><input type="text" name="user" placeholder="Enter your user name..."></td>
            </tr>
           <tr>
           	<td>Password</td>
            <td><input type="password" name="pwd" placeholder="Enter your password"></td>
            </tr>
            <tr>
            <td><input type="submit" name="login" value="Login"></td>
            </tr>
      </table>
      </div>
</form>

<?php 
if(isset($_POST['login'])){
	$user=$_POST['user'];
	$password=$_POST['pwd'];
	#check if email and password exists in DB->table
	$checkStr="SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
	$checkLinkExec=mysqli_query($connect,$checkStr) or die(mysqli_error($connect));
	# verify if any row matches with the above details(email/password)
	if(mysqli_num_rows($checkLinkExec)==1){
		#valid user
		$userData=mysqli_fetch_array($checkLinkExec);
		$_SESSION['user']= NULL;
		#save user details under the session var
		$_SESSION['user']= $userData;
		# redirect the user into home page
		header('location:home.php');
		}else{
			echo"<h3 style='color:red'>Invalid User.Please check your user id and password.</h3>";
			}
	}


?>
</body>
</html>