<form action="igcomments.php?p=<?php echo $pname?>&i=<?php echo $ig?>&y=<?php echo $y?>&sec=<?php echo $sec?>&b=<?php echo $b?>" method="POST">
<textarea name="comments" rows="4" cols="50" placeholder="Enter your comments" required></textarea><br><br>
<input type="submit" name="submit_comments" value="Submit" class="submit1"/>


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
$y = $_GET['y'];
$sec = $_GET['sec'];
$b = $_GET['b'];

echo $b;

$comments=$_POST['comments'];
if(isset($_POST['submit_comments'])){
	$s1 = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
	$ans = mysqli_query($con,$s1);
	$k = mysqli_num_rows($ans);
	if($k==0){
	$sql = "INSERT INTO ig(ig_name,pname,branch,year,section,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$ig','$pname','$b','$y','$sec','$comments','0','0','0')";
	if(mysqli_query($con,$sql)){
		echo ("<script LANGUAGE='JavaScript'>
   window.alert('Commented successfully. ');
  window.location.href = 'adminProfile.php';
  </script>");
		header("Location:igdetails.php?pn=$pname");
	}
	else{
		echo "Try again";
	}
}
else{
	$s = "UPDATE ig SET comments='$comments' WHERE pname='$pname' AND ig_name='$ig'";
	if(mysqli_query($con,$s)){
		echo ("<script LANGUAGE='JavaScript'>
   window.alert('Commented successfully. ');
  window.location.href = 'adminProfile.php';
  </script>");
		header("Location:igdetails.php?pn=$pname");
	}
	else{
		echo "Try again";
	}	
}
}
else{
	echo "Try again";
}
?>