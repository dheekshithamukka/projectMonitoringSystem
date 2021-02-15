<?php
$con=mysqli_connect('localhost','student','gnits','project_monitoring_copy');
$pname=$_GET['p'];
$int_guide=$_GET['i'];
if(isset($_POST['approve1']))
{
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		}

	}
	else{
	$sql10="UPDATE ig SET appdisapp_abs=1 WHERE pname='$pname' AND ig_name='$int_guide'";
	if(mysqli_query($con,$sql10))
	{
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
	}
}
}
if(isset($_POST['approve2']))
{
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		}

	}else{
		$sql1="UPDATE ig SET appdisapp_doc=1 WHERE pname='$pname' AND ig_name='$int_guide'";

	mysqli_query($con,$sql1);
	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Documents approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
}
}
if(isset($_POST['approve3']))
{
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		}

	}
	else{
		$sql2="UPDATE ig SET appdisapp_vid=1 WHERE pname='$pname' AND ig_name='$int_guide'";
mysqli_query($con,$sql2);
echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Videos approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
}
}
?>