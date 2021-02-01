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
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="adminProfile.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->
  <script src='jquery-3.2.1.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>

</head>
<!-- <body style="background: linear-gradient(120deg, #FFAFBD, #ffc3a0)"> -->
<!-- <body style="background: linear-gradient(120deg, #1c92d2, #f2fcfe);"> -->

<body style="background: linear-gradient(120deg, #E8CBC0, #636FA4);">




  <center>
    <h1 style="margin-top: 100px;">Project Review Committee</h1>
  </center>



  <div class="row">
    <div class="column">
      <br><br>
      <form method="POST" action="">
        <label for="branch">Choose a branch:</label>
        <select name="branch" id="branch">
          <option value="">Select</option>
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="EEE">EEE</option>
          <option value="ETM">ETM</option>
          <option value="IT">IT</option>
        </select>
        <br><br>
        <label for="year">Choose a year:</label>
        <select name="year" id="year">
          <option value="">Select</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <br><br>
        <label for="section">Choose a section:</label>
        <select name="section" id="section">
          <option value="">Select</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
        <br><br>
        <!-- <label>Enter PRC Id: </label>
                <input placeholder="PRC Id" type="text" id="prcId" name="prcId">
                <br /> -->

        <p>
          <label><strong>No of PRC</strong></label>
          <label><input name="cand_no" type="text" placeholder="Type number of PRC" /></label>
          <div class="clear"></div>
        </p>
        <div class="cand_fields">
          <table id="studentTable" width="630" border="0">
            <tr>
              <td>PRC Id</td>
            </tr>
            <tr>
            </tr>
          </table>
        </div>
        <input type="submit" name="prcAllotment" value="Submit" />

      </form>
      <div class="template" style="display: none">
        <table>
          <tr>
            <td><input name="prcId[]" type="text" placeholder="PRC Id" required="required" /></td>
          </tr>
        </table>
      </div>
      <!-- <input type="submit" name="prcAllotment" value="Submit" /> -->

    </div>




  <div class="column">
    <br><br>
    <form action="" method="POST">
      <label for="branch">Choose a branch:</label>
      <select name="branch" id="branch">
        <option value="">Select</option>
        <option value="CSE">CSE</option>
        <option value="ECE">ECE</option>
        <option value="EEE">EEE</option>
        <option value="ETM">ETM</option>
        <option value="IT">IT</option>
      </select>
      <br><br>
      <label for="year">Choose a year:</label>
      <select name="year" id="year">
        <option value="">Select</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br><br>
      <label for="section">Choose a section:</label>
      <select name="section" id="section">
        <option value="">Select</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
      <br><br>
      <label for="prc">Choose:</label>
      <select name="prc" id="prc">
        <option value="">Select</option>
        <option value="prc1">PRC 1</option>
        <option value="prc2">PRC 2</option>
        <option value="prc3">PRC 3</option>
      </select>
      <br><br>
      <label>Marks: </label>
      <input type="number" id="marks" name="marks">
      <br />
      <input type="submit" name="submit_prc_marks">
    </form>
  </div>

  </div>



</body>
<script type="text/javascript">
  $('[name="cand_no"]').on('change', function() {
    // Not checking for Invalid input
    if (this.value != '') {
      var val = parseInt(this.value, 10);

      for (var i = 1; i <= val; i++) {
        // Clone the Template
        var $cloned = $('.template tbody').clone();
        // For each Candidate append the template row
        $('#studentTable tbody').append($cloned.html());
      }
      var $c = $('.p').clone();
      // For each Candidate append the template row
      $('#studentTable tbody').append($c.html());
    }
  });
</script>
















<?php
if (isset($_POST['submit_prc_marks'])) {
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $prc = $_POST['prc'];
  $marks = $_POST['marks'];
  $q = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='$prc'";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO prc_total_marks(branch, year, section, prc, marks) VALUES('$branch','$year','$section', '$prc', '$marks')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated marks. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE prc_total_marks SET marks='$marks' WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='$prc' ";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated marks. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>












<?php

if (isset($_POST['prcAllotment'])) {
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $prcId = $_POST['prcId'];
  echo $branch;
  echo $year;
  echo $section;
  echo count($prcId);

  $count = 0;
  $q1 = "SELECT * FROM prc_allotment WHERE branch='$branch' AND year='$year' AND section='$section'";
  $result1 = mysqli_query($con, $q1);
  $num1 = mysqli_num_rows($result1);
  if ($num1 == 0) {
    for ($i = 0; $i <= count($prcId); $i++) {
      $check = "SELECT * FROM prcreg WHERE prcRollNo='$prcId[$i]'";
      $res = mysqli_query($con, $check);
      $n = mysqli_num_rows($res);
      echo $n;
      if ($n == 1) {
        $count = $count + 1;
      }
    }
    if ($count == count($prcId)) {
      for ($i = 0; $i < count($prcId); $i++) {
        $s1 = "INSERT INTO prc_allotment(branch, year, section, prcId) VALUES('$branch', '$year','$section','$prcId[$i]')";
        mysqli_query($con, $s1);
      }
      echo ("<script LANGUAGE='JavaScript'>
		                window.alert('PRC Id is added. ');
                        window.location.href = 'adminProfile.php';
                    </script>");
    } else {
      echo ("<script LANGUAGE='JavaScript'>
		            window.alert('No PRC with the given Id.');
                    window.location.href = 'adminProfile.php';
                </script>");
    }
  } else {
    echo ("<script LANGUAGE='JavaScript'>
              window.alert('Already entered. ');
              window.location.href = 'adminProfile.php';
              </script>");
  }
}

?>



<br />
<br />
<br />
<br />
















<!-- <div class="row">
    <div class="column">
      <form action="" method="post">
        <h1>3rd year</h1>
        <label for="csea3">CSE-A: </label>
        <input placeholder="PRC Id" type="text" id="csea3" name="csea3">
        <input type="submit" name="csea3_submit">
        <br />
        <br />
        <label for="cseb3">CSE-B:</label>
        <input type="text" id="cseb3" name="cseb3">
        <input type="submit" name="cseb3_submit">
        <br />
        <br />
        <label for="csec3">CSE-C: </label>
        <input type="text" id="csec3" name="csec3">
        <input type="submit" name="csec3_submit">
      </form>
    </div>
    <div class="column">
      <form action="" method="post">
        <h1>4th year</h1>
        <label for="csea4">CSE-A: </label>
        <input type="text" id="csea4" name="csea4">
        <input type="submit" name="csea4_submit">
        <br />
        <br />
        <label for="cseb4">CSE-B:</label>
        <input type="text" id="cseb4" name="cseb4">
        <input type="submit" name="cseb4_submit">
        <br />
        <br />
        <label for="csec4">CSE-C: </label>
        <input type="text" id="csec4" name="csec4">
        <input type="submit" name="csec4_submit">
      </form>
    </div>
  </div> -->





<?php

if (isset($_POST['csea3_submit'])) {
  echo "Hi";
  $csea3 = $_POST['csea3'];
  echo $csea3;

  $q1 = "SELECT * FROM prc_allotment WHERE year='3' AND section='A'";
  $result1 = mysqli_query($con, $q1);
  $num1 = mysqli_num_rows($result1);
  if ($num1 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csea3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s1 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('3','A','$csea3')";
      if (mysqli_query($con, $s1)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline.');
    window.location.href = 'adminProfile.php';
    </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('No PRC with the given Id.');
    window.location.href = 'adminProfile.php';
    </script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csea3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s1 = "UPDATE prc_allotment SET prcId='$csea3' WHERE year='3' AND section='A' ";
      if (mysqli_query($con, $s1)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  }
}

?>









<?php

if (isset($_POST['cseb3_submit'])) {
  $cseb3 = $_POST['cseb3'];

  $q2 = "SELECT * FROM prc_allotment WHERE year='3' AND section='B'";
  $result2 = mysqli_query($con, $q2);
  $num2 = mysqli_num_rows($result2);
  if ($num2 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$cseb3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s2 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('3','B','$cseb3')";
      if (mysqli_query($con, $s2)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline 1.');
    window.location.href = 'adminProfile.php';
		</script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$cseb3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s2 = "UPDATE prc_allotment SET prcId='$cseb3' WHERE year='3' AND section='B' ";
      if (mysqli_query($con, $s2)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  }
}

?>







<?php

if (isset($_POST['csec3_submit'])) {
  $csec3 = $_POST['csec3'];

  $q3 = "SELECT * FROM prc_allotment WHERE year='3' AND section='C'";
  $result3 = mysqli_query($con, $q3);
  $num3 = mysqli_num_rows($result3);
  if ($num3 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csec3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s3 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('3','C','$csec3')";
      if (mysqli_query($con, $s3)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline 1.');
    window.location.href = 'adminProfile.php';
		</script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csec3'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s3 = "UPDATE prc_allotment SET prcId='$csec3' WHERE year='3' AND section='C' ";
      if (mysqli_query($con, $s3)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
  window.alert('No PRC with the given Id.');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}

?>







<?php

if (isset($_POST['csea4_submit'])) {
  echo "Hi";
  $csea4 = $_POST['csea4'];
  echo $csea4;

  $q4 = "SELECT * FROM prc_allotment WHERE year='4' AND section='A'";
  $result4 = mysqli_query($con, $q4);
  $num4 = mysqli_num_rows($result4);
  if ($num4 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csea4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s4 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('4','A','$csea4')";
      if (mysqli_query($con, $s4)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline.');
    window.location.href = 'adminProfile.php';
		</script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csea4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s4 = "UPDATE prc_allotment SET prcId='$csea4' WHERE year='4' AND section='A' ";
      if (mysqli_query($con, $s4)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('No PRC with the given Id.');
      window.location.href = 'adminProfile.php';
      </script>");
    }
  }
}

?>









<?php

if (isset($_POST['cseb4_submit'])) {
  $cseb4 = $_POST['cseb4'];

  $q5 = "SELECT * FROM prc_allotment WHERE year='4' AND section='B'";
  $result5 = mysqli_query($con, $q5);
  $num5 = mysqli_num_rows($result5);
  if ($num5 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$cseb4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s5 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('4','B','$cseb4')";
      if (mysqli_query($con, $s5)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline 1.');
    window.location.href = 'adminProfile.php';
		</script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$cseb4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s5 = "UPDATE prc_allotment SET prcId='$cseb4' WHERE year='4' AND section='B' ";
      if (mysqli_query($con, $s5)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
  window.alert('No PRC with the given Id.');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}

?>







<?php

if (isset($_POST['csec4_submit'])) {
  $csec4 = $_POST['csec4'];

  $q6 = "SELECT * FROM prc_allotment WHERE year='4' AND section='C'";
  $result6 = mysqli_query($con, $q6);
  $num6 = mysqli_num_rows($result6);
  if ($num6 == 0) {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csec4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s6 = "INSERT INTO prc_allotment(year, section, prcId) VALUES('4','C','$csec4')";
      if (mysqli_query($con, $s6)) {
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline 1.');
    window.location.href = 'adminProfile.php';
		</script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
window.alert('No PRC with the given Id.');
window.location.href = 'adminProfile.php';
</script>");
    }
  } else {
    $check = "SELECT * FROM prcreg WHERE prcRollNo='$csec4'";
    $res = mysqli_query($con, $check);
    $n = mysqli_num_rows($res);
    if ($n == 1) {
      $s6 = "UPDATE prc_allotment SET prcId='$csec4' WHERE year='4' AND section='C' ";
      if (mysqli_query($con, $s6)) {
        echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
  window.alert('No PRC with the given Id.');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}

?>

































<!-- <body style="background: linear-gradient(120deg, #D3CCE3, #E9E4F0)"> -->
<center>
  <h1 style="margin-top: 50px;">Deadlines</h1>
</center>









<div class="row">
  <div class="column">
    <br><br>
    <form action="" method="POST">
      <label for="branch">Choose a branch:</label>
      <select name="branch" id="branch">
        <option value="">Select</option>
        <option value="CSE">CSE</option>
        <option value="ECE">ECE</option>
        <option value="EEE">EEE</option>
        <option value="ETM">ETM</option>
        <option value="IT">IT</option>
      </select>
      <br><br>
      <label for="year">Choose a year:</label>
      <select name="year" id="year">
        <option value="">Select</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br><br>
      <label for="section">Choose a section:</label>
      <select name="section" id="section">
        <option value="">Select</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
      <br><br>
      <label for="section">Choose:</label>
      <select name="adv" id="adv">
        <option value="">Select</option>
        <option value="abstract">Abstract</option>
        <option value="documents">Documents</option>
        <option value="videos">Videos</option>
      </select>
      <br><br>
      <label>Select date </label>
      <input type="date" id="date" name="date">
      <br />
      <input type="submit" name="submit_deadlines">
    </form>
  </div>






  <div class="column">
    <br><br>
    <form action="" method="POST">
      <label for="branch">Choose a branch:</label>
      <select name="branch" id="branch1">
        <option value="">Select</option>
        <option value="CSE">CSE</option>
        <option value="ECE">ECE</option>
        <option value="EEE">EEE</option>
        <option value="ETM">ETM</option>
        <option value="IT">IT</option>
      </select>
      <br><br>
      <label for="year">Choose a year:</label>
      <select name="year" id="year1">
        <option value="">Select</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br><br>
      <label for="section">Choose a section:</label>
      <select name="section" id="section1">
        <option value="">Select</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
      <br><br>
      <label for="prc">Choose:</label>
      <select name="prc" id="prc1">
        <option value="">Select</option>
        <option value="prc1">PRC 1</option>
        <option value="prc2">PRC 2</option>
        <option value="prc3">PRC 3</option>
      </select>
      <br><br>
      <label>Select date </label>
      <input type="date" id="date1" name="date">
      <br />
      <input type="submit" name="submit_prc">
    </form>
  </div>

</div>











<?php
if (isset($_POST['submit_prc'])) {
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $prc = $_POST['prc'];
  $dat = $_POST['date'];
  $d = date("Y-m-d");
  $q1 = "SELECT * FROM prc_meetings WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='$prc'";
  $result1 = mysqli_query($con, $q1);
  $num1 = mysqli_num_rows($result1);
  if ($num1 == 0) {
    echo "Hi";
    $s1 = "INSERT INTO prc_meetings(branch, year, section, prc, date) VALUES('$branch','$year','$section', '$prc', '$dat')";
    if (mysqli_query($con, $s1)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated meeting deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    } else {
      echo "Error";
    }
  } else {
    echo "Hello";
    $s1 = "UPDATE prc_meetings SET date='$dat' WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='$prc' ";
    if (mysqli_query($con, $s1)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated meeting deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>







<?php
if (isset($_POST['submit_deadlines'])) {
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $adv = $_POST['adv'];
  // echo $abstract;
  $dat = $_POST['date'];
  $d = date("Y-m-d");
  $q = "SELECT * FROM prc_submission WHERE branch='$branch' AND year='$year' AND section='$section' AND adv='$adv'";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO prc_submission(branch, year, section, adv, date) VALUES('$branch','$year','$section', '$adv', '$dat')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE prc_submission SET date='$dat' WHERE branch='$branch' AND year='$year' AND section='$section' AND adv='$adv' ";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>
















<br /><br />
<!-- <div class="row">
    <div class="column">

      <form action="" method="post">
        <label for="abstract">Abstract: </label>
        <input type="date" id="abstract" name="abstract">
        <input type="submit" name="abstract_submit">
        <br />
        <br />
        <label for="documents">Documents:</label>
        <input type="date" id="documents" name="documents">
        <input type="submit" name="documents_submit">
        <br />
        <br />
        <label for="videos">Videos: </label>
        <input type="date" id="videos" name="videos">
        <input type="submit" name="videos_submit">
      </form>

      <br />
      <br />
      <br />

    </div>


    <div class="column">


      <form action="" method="post">
        <label for="PRC1">PRC1:</label>
        <input type="date" id="prc1" name="prc1">
        <input type="submit" name="prc1_submit" class="button">
        <br />
        <br />
        <label for="PRC2">PRC2:</label>
        <input type="date" id="prc2" name="prc2">
        <input type="submit" name="prc2_submit" class="button">
        <br />
        <br />
        <label for="PRC3">PRC3:</label>
        <input type="date" id="prc3" name="prc3">
        <input type="submit" name="prc3_submit" class="button">
      </form>


    </div>
  </div> -->


<?php
if (isset($_POST['abstract_submit'])) {
  echo "Hi";
  $abstract = $_POST['abstract'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO deadlines(abstract, documents, videos) VALUES('$abstract','$d','$d')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE deadlines SET abstract='$abstract'";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>



<?php
if (isset($_POST['documents_submit'])) {
  echo "Hi";
  $documents = $_POST['documents'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  $s = "UPDATE deadlines SET documents='$documents'";
  if (mysqli_query($con, $s)) {
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated documents deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
}
?>



<?php
if (isset($_POST['videos_submit'])) {
  // echo "Hi";
  $videos = $_POST['videos'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  $s = "UPDATE deadlines SET videos='$videos'";
  if (mysqli_query($con, $s)) {
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated videos deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
}
?>







<?php
if (isset($_POST['prc1_submit'])) {
  $prc1 = $_POST['prc1'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM prc_meetings_deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO prc_meetings_deadlines(prc1,prc2,prc3) VALUES('$prc1','$d','$d')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated PRC1 deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE prc_meetings_deadlines SET prc1='$prc1'";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated aPRC1 deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>



<?php
if (isset($_POST['prc2_submit'])) {
  $prc2 = $_POST['prc2'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM prc_meetings_deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO prc_meetings_deadlines(prc1,prc2,prc3) VALUES('$d','$prc2','$d')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated PRC2 deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE prc_meetings_deadlines SET prc2='$prc2'";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated PRC2 deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>



<?php
if (isset($_POST['prc3_submit'])) {
  $prc3 = $_POST['prc3'];
  // echo $abstract;
  $d = date("Y-m-d");
  $q = "SELECT * FROM prc_meetings_deadlines";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    $s = "INSERT INTO prc_meetings_deadlines(prc1,prc2,prc3) VALUES('$d','$d','$prc3')";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated PRC3 deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  } else {
    $s = "UPDATE prc_meetings_deadlines SET prc3='$prc3'";
    if (mysqli_query($con, $s)) {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated PRC3 deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
  }
}
?>



<center>
  <a href="adminlogin.php">
    <input type="submit" name="approve" value="Logout" class="btn btn-success" id="button2" style="background-color: #4CAF50;
  background-color:#636FCC;
  border: none;
  color: white;
  margin-top: 100px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;" />

  </a>

</center>


<br />
<br />
<br />
<br />















</body>

</html>