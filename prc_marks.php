<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
$con = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
if (mysqli_connect_errno()) {
	echo "Failed to connect " . mysqli_connect_error();
}
session_start();
?>
<?php

$pname = $_GET['p'];
$ig = $_GET['i'];
$roll = $_GET['roll'];
$branch = $_GET['branch'];
$year = $_GET['year'];
$section = $_GET['section'];
$prcId = $_GET['prcId'];



$s1 = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
$r1 = mysqli_query($con, $s1);
$row = mysqli_fetch_array($r1);
$n1 = mysqli_num_rows($r1);
if (isset($_POST['submit_marks_1'])) {
	if ($n1 > 0) {
		$s = "SELECT * FROM prc_marks WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc1'";
		$r = mysqli_query($con, $s);
		if (mysqli_num_rows($r) <= 0) {
			$marks1 = $_POST['marks1'];
			
			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc1', '$marks1')";
			if (mysqli_query($con, $sql)) {
				
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks1 = $_POST['marks1'];
			$sql = "UPDATE prc_marks SET marks='$marks1' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc1'";
			if (mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			} else {
				echo ("<script LANGUAGE='JavaScript'>
					window.alert('Try again.');
					window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
				</script>");
			}
		}

		$query1 = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc1'";
		$re1 = mysqli_query($con, $query1);
		$rs1 = mysqli_fetch_array($re1);
		$prc1 = $rs1['marks'];

		$query2 = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc2'";
		$re2 = mysqli_query($con, $query2);
		$rs2 = mysqli_fetch_array($re2);
		$prc2 = $rs2['marks'];

		$query3 = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc3'";
		$re3 = mysqli_query($con, $query3);
		$rs3 = mysqli_fetch_array($re3);
		$prc3 = $rs3['marks'];

		$sum = $prc1 + $prc2 + $prc3;
		echo $sum;



		$s1 = "SELECT marks FROM prc_marks WHERE rollNo='$roll' AND prc='prc1' AND ig_id='$ig' AND pname='$pname'";
		$res1 = mysqli_query($con, $s1);
		$sum1 = 0;
		$answer1 = mysqli_num_rows($res1);
		while ($answe1 = mysqli_fetch_array($res1)) {
			$sum1 = $sum1 + $answe1['marks'];
		}
		if ($answer1 == 0) {
			$a1 = 0;
		} else {
			$a1 = $sum1 / $answer1;
		}


		$s2 = "SELECT marks FROM prc_marks WHERE rollNo='$roll' AND prc='prc2' AND ig_id='$ig' AND pname='$pname'";
		$res2 = mysqli_query($con, $s2);
		$sum2 = 0;
		$answer2 = mysqli_num_rows($res2);
		while ($answe2 = mysqli_fetch_array($res2)) {
			$sum2 = $sum2 + $answe2['marks'];
		}
		if ($answer2 == 0) {
			$a2 = 0;
		} else {
			$a2 = $sum2 / $answer2;
		}


		$s3 = "SELECT marks FROM prc_marks WHERE rollNo='$roll' AND prc='prc3' AND ig_id='$ig' AND pname='$pname'";
		$res3 = mysqli_query($con, $s3);
		$sum3 = 0;
		$answer3 = mysqli_num_rows($res3);
		while ($answe3 = mysqli_fetch_array($res3)) {
			$sum3 = $sum3 + $answe1['marks'];
		}
		if ($answer3 == 0) {
			$a3 = 0;
		} else {
			$a3 = $sum3 / $answer3;
		}


		$total_marks = $a1+$a2+$a3;

		echo $total_marks;

		$query = "UPDATE employee_table SET prc1='$a1', prc2='$a2', prc3='$a3', average_marks='$total_marks' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
		$re = mysqli_query($con, $query);
		



	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Try again. ');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
	</script>");
	}
}



?>



<?php

$pname = $_GET['p'];
$ig = $_GET['i'];
$roll = $_GET['roll'];
$branch = $_GET['branch'];
$year = $_GET['year'];
$section = $_GET['section'];
$prcId = $_GET['prcId'];



$s1 = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
$r1 = mysqli_query($con, $s1);
$row = mysqli_fetch_array($r1);
$n1 = mysqli_num_rows($r1);

if (isset($_POST['submit_marks_2'])) {
	if ($n1 > 0) {
		$s = "SELECT * FROM prc_marks WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc2'";
		$r = mysqli_query($con, $s);
		if (mysqli_num_rows($r) <= 0) {
			$marks2 = $_POST['marks2'];
			
			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc2', '$marks2')";
			if (mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks2 = $_POST['marks2'];
			$sql = "UPDATE prc_marks SET marks='$marks2' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc2'";
			if (mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			} else {
				echo ("<script LANGUAGE='JavaScript'>
					window.alert('Try again.');
					window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
				</script>");
			}
		}
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Try again. ');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
	</script>");
	}
}


?>


<?php



$pname = $_GET['p'];
$ig = $_GET['i'];
$roll = $_GET['roll'];
$branch = $_GET['branch'];
$year = $_GET['year'];
$section = $_GET['section'];
$prcId = $_GET['prcId'];



$s1 = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
$r1 = mysqli_query($con, $s1);
$row = mysqli_fetch_array($r1);
$n1 = mysqli_num_rows($r1);

if (isset($_POST['submit_marks_3'])) {
	if ($n1 > 0) {
		$s = "SELECT * FROM prc_marks WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc3'";
		$r = mysqli_query($con, $s);
		if (mysqli_num_rows($r) <= 0) {
			$marks3 = $_POST['marks3'];
			
			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc3', '$marks3')";
			if (mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks3 = $_POST['marks3'];
			$sql = "UPDATE prc_marks SET marks='$marks3' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc3'";
			if (mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			} else {
				echo ("<script LANGUAGE='JavaScript'>
					window.alert('Try again.');
					window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
				</script>");
			}
		}
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Try again. ');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
	</script>");
	}
}


?>