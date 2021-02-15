<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
$conn = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php

$prcId = $_GET['prcId'];

if (isset($_POST['approve'])) { // if save button on the form is clicked
	$pname = $_GET['pn'];
	$s = "UPDATE employee_table SET appDisapp=1 WHERE pname='$pname'";
	$s1 = "UPDATE prcreg SET approve=1 WHERE prcRollNo='$prcId'";
	$ans = mysqli_query($conn,$s);
	$ans1 = mysqli_query($conn,$s1);
	if(mysqli_query($conn,$s) && mysqli_query($conn,$s1)){
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Approved successfully');
		window.location.href = 'prcprofile.php';
		</script>");
	}
	else{
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Try again. ');
		window.location.href = 'prcprofile.php';
		</script>");
	}

}
?>