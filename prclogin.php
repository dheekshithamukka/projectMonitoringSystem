<!-- <div class="navbar">
<div class="image" style="margin-left: 190px"><img src="http://103.44.2.84/ecap/CollegeImages/title_head.jpg" style="margin-left: -200px; width: 1500px; height: 180px"/></div>
</div> -->

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="prclogin2.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head><body>
<!-- <div class="std">
<form method="post">
<div class="headcol">
<center><p><b>PRC LOGIN</b></p></center>
<hr></hr>
</div>
<center><input type="text" placeholder="Enter PRC Id" class="log" name="roll" required ></input></center><br/>
<center><input type ="password" placeholder="Enter password" name="pw" required></input></center>
<center><input type="submit" name="login" <input type="submit" name="login" value="Login" style="
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 14px 2px;
    cursor: grab;
    border-radius: 5px;
    width: 95px;
    height: 44px;
    font-size: 14px;

"><//></center>
<center><p style="color: white; font-size: 20px">Not a user?<a href="prcRegister.php">Register here</a></p></center>
<br/>
<br/>
</form>
</div> -->






<div class="center">
	<h1>PRC Login</h1>
	<form method="post">
		<div class="txt_field">
			<input type="text" name="roll" required />
			<span></span>
			<label>PRC Id</label>
		</div>
		<div class="txt_field">
			<input type="password" name="pw" required />
			<span></span>
			<label>Password</label>
		</div>
		<input type="submit" name="login" value="Login">
		<div class="signup_link">
			Not a member? <a href="prcRegister.php">Register</a>
		</div>
	</form>
</div>






<?php
if(isset($_POST['login'])){
	$prcId = $_POST['roll'];
	$prcPw = $_POST['pw'];
	$_SESSION['id'] = $prcId;
	$_SESSION['p'] = $prcPw; 
	$q = "SELECT * FROM prcreg WHERE prcRollNo = '$prcId' && prcPassword='$prcPw'";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
				echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Wrong pwd');
		window.location.href = 'prclogin.php';
		</script>");
	}
	else{
	header('location:prcProfile.php');

	}
}
?>
<br>


<!-- <a href="index.php"><img class="image" src="https://i2.wp.com/www.matuloo.com/wp-content/uploads/2017/02/backbutton.png?fit=800%2C400" style="width: 70px; height: 40px; margin-top: 20px; margin-left: 630px;"/>
</a> -->


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