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
			// $avg = (float)($marks1 + $row['marks_prc2'] + $row['marks_prc3'])/3;
			// $sql = "UPDATE employee_table SET marks_prc1='$marks1', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";

			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc1', '$marks1')";
			if (mysqli_query($con, $sql)) {
				//echo "Updated successfully";
				//header('location:prcprodetails.php');
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				//echo "Try again";
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks1 = $_POST['marks1'];
			$sql = "UPDATE prc_marks SET marks='$marks1' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc1'";
			if(mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			}
			else {
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

if (isset($_POST['submit_marks_2'])) {
	// $marks2 = $_POST['marks2'];
	// $avg = (float)($marks2 + $row['marks_prc1'] + $row['marks_prc3']) / 3;
	// $sql = "UPDATE employee_table SET marks_prc2='$marks2', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
	if ($n1 > 0) {
		$s = "SELECT * FROM prc_marks WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc2'";
		$r = mysqli_query($con, $s);
		if (mysqli_num_rows($r) <= 0) {
			$marks2 = $_POST['marks2'];
			// $avg = (float)($marks1 + $row['marks_prc2'] + $row['marks_prc3'])/3;
			// $sql = "UPDATE employee_table SET marks_prc1='$marks1', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";

			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc2', '$marks2')";
			if (mysqli_query($con, $sql)) {
				//echo "Updated successfully";
				//header('location:prcprodetails.php');
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				//echo "Try again";
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks2 = $_POST['marks2'];
			$sql = "UPDATE prc_marks SET marks='$marks2' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc2'";
			if(mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			}
			else {
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
	// $marks2 = $_POST['marks2'];
	// $avg = (float)($marks2 + $row['marks_prc1'] + $row['marks_prc3']) / 3;
	// $sql = "UPDATE employee_table SET marks_prc2='$marks2', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
	if ($n1 > 0) {
		$s = "SELECT * FROM prc_marks WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc3'";
		$r = mysqli_query($con, $s);
		if (mysqli_num_rows($r) <= 0) {
			$marks3 = $_POST['marks3'];
			// $avg = (float)($marks1 + $row['marks_prc2'] + $row['marks_prc3'])/3;
			// $sql = "UPDATE employee_table SET marks_prc1='$marks1', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";

			$sql = "INSERT INTO prc_marks(rollNo, branch, section, year, ig_id, pname, prcId, prc, marks) VALUES('$roll', '$branch', '$section', '$year', '$ig', '$pname', '$prcId', 'prc3', '$marks3')";
			if (mysqli_query($con, $sql)) {
				//echo "Updated successfully";
				//header('location:prcprodetails.php');
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
		window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			} else {
				//echo "Try again";
				echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
        </script>");
			}
		} else {
			$marks3 = $_POST['marks3'];
			$sql = "UPDATE prc_marks SET marks='$marks3' WHERE rollNo='$roll' AND prcId='$prcId' AND prc='prc3'";
			if(mysqli_query($con, $sql)) {
				echo ("<script LANGUAGE='JavaScript'>
		  			window.alert('Marks uploaded successfully.');
		 			window.location.href = 'prcprodetails.php?pn=$pname&prcId=$prcId';
		 		</script>");
			}
			else {
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