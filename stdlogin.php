<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="stdAdminLogin.css">
</head>
<body>


<div class="center">
	<h1>Student Login</h1>
	<form method="post">
		<div class="txt_field">
			<input type="text" name="roll" required />
			<span></span>
			<label>Student Id</label>
		</div>
		<div class="txt_field">
			<input type="password" name="pw" required />
			<span></span>
			<label>Password</label>
		</div>
		<input type="submit" name="login" value="Login">
		<div class="signup_link">
			Not a member? <a href="stdRegister1.php">Register</a>
		</div>
	</form>
</div>






<?php
if(isset($_POST['login'])){
	$stdId = $_POST['roll'];
	$stdPw = $_POST['pw'];
	$_SESSION['id'] = $stdId;
	$_SESSION['p'] = $stdPw; 
	$q = "SELECT * FROM stdreg WHERE stdRollNo = '$stdId' && stdPassword='$stdPw'";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
				echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Wrong pwd');
		window.location.href = 'stdlogin.php';
		</script>");
	}
	else{
	header('location:stdProfile.php');

	}
}
?>


<br>


</div>
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