<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php
$pname=$_GET['p'];
$ig=$_GET['i'];
$prcId = $_GET['prcId'];
$comments=$_POST['comments'];
if(isset($_POST['submit_comments'])){
echo "Hi";
	$s1 = "SELECT * FROM prc_comments WHERE pname='$pname' AND ig_guide='$ig'";
	$ans = mysqli_query($con,$s1);
	$k = mysqli_num_rows($ans);
	echo $k;
	if($k>0){
		$r1 = mysqli_fetch_array($ans);
		//echo "Hi";
		$m1=$r1['marks_prc1'];
		$m2=$r1['marks_prc2'];
		$m3=$r1['marks_prc3'];

	}
	else{
		$m1=0;
		$m2=0;
		$m3=0;
	}
	$sql = "INSERT INTO prc_comments(pname,ig_guide,prcId,comments,marks_prc1,marks_prc2,marks_prc3) VALUES('$pname','$ig','$prcId','$comments','$m1','$m2','$m3')";
	if(mysqli_query($con,$sql)){
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Commented successfully.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
	}
	else{
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
	}
}
else{
	echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
}
?>