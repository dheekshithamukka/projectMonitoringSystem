<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="stdAdminLogin.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head><body>

<div class="center">
	<h1>Admin Login</h1>
	<form method="post">
		<div class="txt_field">
			<input type="text" name="roll" required />
			<span></span>
			<label>Admin Id</label>
		</div>
		<div class="txt_field">
			<input type="password" name="pw" required />
			<span></span>
			<label>Password</label>
		</div>
		<input type="submit" name="login" value="Login">
		<div class="signup_link">
			Not a member? <a href="adminregister.php">Register</a>
		</div>
	</form>
</div>




<?php
if(isset($_POST['login'])){
	$adminId = $_POST['roll'];
	$adminPw = $_POST['pw'];
	$_SESSION['id'] = $adminId;
	$_SESSION['p'] = $adminPw; 
	$q = "SELECT * FROM adminreg WHERE adminRoll = '$adminId' && adminPassword='$adminPw'";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
				echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Wrong pwd');
		window.location.href = 'adminlogin.php';
		</script>");
	}
	else{
	header('location:adminProfile.php');

	}
}
?>
<br>

<center>
<a href="index.php">
<input type="submit" value="Back" name="submit" style="
    background-color: #2691d9;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin-top: 550px;
    margin-left: 48px;
    cursor: grab;
    border-radius: 25px;
    width: 115px;
    height: 44px;
    font-size: 14px;

">
</a>
</center>


</body>
</html>