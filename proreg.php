<head>
  <script src='jquery-3.2.1.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
  <link rel="stylesheet" type="text/css" href="proreg2.css" />
</head>

<body>
  <div class="container">
    <fieldset>
      <p>
        <center>
          <h1>New project registration</h1>
        </center>
        <label><strong>No of Candidates</strong></label>
        <label><input name="cand_no" type="text" placeholder="Type Your Number of Candidates" /></label>
        <div class="clear"></div>
      </p>
      <form method="post">
        <div class="cand_fields">
          <table id="studentTable" width="630" border="0">
            <tr>
              <td>Name</td>
              <td>Roll No</td>
              <td>Year</td>
            </tr>
            <tr>
            </tr>
          </table>
        </div>
      </form>
  </div>
  </fieldset>
  <div class="template" style="display: none">
    <table>
      <tr>
        <td><input name="name[]" type="text" placeholder="Name" required="required" /></td>
        <td><input name="age[]" type="text" placeholder="Roll No" required="required" /></td>
        <td><input name="year[]" type="number" placeholder="Year" required="required" min="1" max="4" /></td>
      </tr>
      <tr>
        <td><input name="job[]" type="text" placeholder="Branch" required="required" /></td>
        <td><input name="section[]" type="text" placeholder="Section" required="required" /></td>

      </tr>
    </table>
  </div>

</body>
<script type="text/javascript">
  $('[name="cand_no"]').on('change', function() {
    // Not checking for Invalid input
    if (this.value != '') {
      var val = parseInt(this.value, 10);

      for (var i = 1; i < val; i++) {
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
<div class="p" style="display: none">
  <div>
    <center> <input type="text" placeholder="Enter project name" name="pname" required /></center>
  </div>
  <div>
    <center><input type="text" placeholder="Enter project domain" name="pdomain" required /></center>
  </div>
  <div>
    <center><input type="text" placeholder="Enter internal guide Id" name="int_guide" required /></center>
  </div><br>

  <!--<div>
                <center><input type="text" placeholder="Type of project" name="ptype" required/></center>
            </div>-->
  <div>
    Type of project: <select name="ptype">
      <option>Select</option>
      <option value="mini">Mini project</option>
      <option value="major">Major project</option>
    </select>
  </div><br>
  <!-- <div>
    <p>Description:</p><textarea name="description" rows="5" cols="50"></textarea>
  </div><br>
  <div>
    <p>Problem statement:</p><textarea name="ps" rows="5" cols="50"></textarea>
  </div><br>

  <div>
    <p>Solution:</p><textarea name="sol" rows="5" cols="50"></textarea>
  </div><br> -->
  <div>
    <center><input type="password" placeholder="Enter password" name="pw" required /></center>
  </div>
  <div>
    <input type="submit" name="submit_row" value="Register" />
    <a href="index.php"><input type="submit1" value="Cancel" /></a>
  </div>
</div>

<?php
if (isset($_POST['submit_row'])) {
  $connect = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
  // $db=mysql_select_db($connect, $databasename);  
  if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }
  session_start();
?>

<?php
  $name = $_POST['name'];
  $age = $_POST['age'];
  $job = $_POST['job'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $pname = $_POST['pname'];
  $pdomain = $_POST['pdomain'];
  $int_guide = $_POST['int_guide'];
  $ptype = $_POST['ptype'];
  $pw = $_POST['pw'];

  $name1 = $_SESSION['n'];
  $roll1 = $_SESSION['r'];
  $branch1 = $_SESSION['b'];
  $year1 = $_SESSION['y'];
  $section1 = $_SESSION['s'];



  //echo $pname;
  $s = "SELECT * FROM employee_table WHERE pname='$pname'";
  $rs = mysqli_query($connect, $s);
  $r = mysqli_num_rows($rs);
  //echo $r;

  // $s1 = "SELECT stdRollNo FROM stdreg WHERE "






  if (mysqli_num_rows($rs) > 0) {
    //echo "Hello";
    echo ("<script LANGUAGE='JavaScript'>
         window.alert('Project name already exists. Please try again.');
        window.location.href = 'proreg.php';
        </script>");
  } else {
    $qu = "SELECT ig_id, ig_name FROM igreg WHERE ig_id='$int_guide'";
    $res = mysqli_query($connect, $qu);
    $rsm = mysqli_fetch_array($res);


    if (mysqli_num_rows($res) > 0) {
      $int_name = $rsm['ig_name'];
      for ($i = 0; $i < count($name); $i++) {
        if ($name[$i] != "" && $age[$i] != "" && $job[$i] != "" && $year[$i] != "" && $section[$i] != "" && $pname != "" && $pdomain != "" && $pw != "" ) {
          $s2 = "SELECT *  FROM stdreg WHERE stdRollNo='$age[$i]'";
          $res2 = mysqli_query($connect, $s2);
          $rsm2 = mysqli_fetch_array($res2);
          if (mysqli_num_rows($res2) > 0) {
            if ($year1 == $year[$i] && $section1 == $section[$i] && $branch1 == $job[$i]) {
              $q1 = "SELECT * FROM employee_table WHERE rollNo='$age[$i]' AND ptype='$ptype'";
              $res1 = mysqli_query($connect, $q1);
              // $rsm1 = mysqli_fetch_array($res1);
              $num1 = mysqli_num_rows($res1);

              $q2 = "SELECT * FROM employee_table WHERE rollNo='$roll1' AND ptype='$ptype' ";
              $res2 = mysqli_query($connect, $q2);
              $num2 = mysqli_num_rows(($res2));

              if ($num1 == 0 && $num2 == 0) {
                if (($year[$i] == 3 && $ptype != "mini") || ($year[$i] == 4 && $ptype != "major")) {

                  echo ("<script LANGUAGE='JavaScript'>
              window.alert('Enter valid year and type of project. Please try again.');
              window.location.href = 'proreg.php';
              </script>");
                } else {
                  if ($name[$i] != "" && $age[$i] != "" && $job[$i] != "" && $year[$i] != "" && $section[$i] != "" && $pname != "" && $pdomain != "" && $pw != "" ) {
                    $query = "INSERT INTO employee_table(name,rollNo,branch,year,section,pname,pdomain,int_guide,intName,ptype,password,appDisapp,average_marks) VALUES('$name1','$roll1','$branch1','$year1','$section1','$pname','$pdomain','$int_guide','$int_name','$ptype','$pw',0,0)";
                    mysqli_query($connect, $query);
                    $q = "INSERT INTO employee_table(name, rollNo, branch,year,section, pname, pdomain,int_guide, intName, ptype, password,appDisapp,average_marks) VALUES('$name[$i]', '$age[$i]', '$job[$i]','$year[$i]','$section[$i]', '$pname','$pdomain','$int_guide','$int_name', '$ptype', '$pw',0,0)";
                    mysqli_query($connect, $q);
                    echo ("<script LANGUAGE='JavaScript'>
              window.alert('Successfully created. ');
              window.location.href = 'proreg.php';
              </script>");
                  }
                }
              } else {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Roll no is already registered. ');
                window.location.href = 'proreg.php';
                </script>");
              }
            } else {
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Select correct year, section or branch. ');
              window.location.href = 'proreg.php';
              </script>");
            }
          } else {
            echo ("<script LANGUAGE='JavaScript'>
              window.alert('Roll no is not registered as a student yet. ');
              window.location.href = 'proreg.php';
              </script>");
          }
        } else {
          echo ("<script LANGUAGE='JavaScript'>
              window.alert('Fill all the details correctly. ');
              window.location.href = 'proreg.php';
              </script>");
        }
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
              window.alert('Enter internal guide id correctly. ');
              window.location.href = 'proreg.php';
              </script>");
    }
  }
}
?>

<br>

<center><a href="stdprofile.php"><img src="https://i2.wp.com/www.matuloo.com/wp-content/uploads/2017/02/backbutton.png?fit=800%2C400" style="width: 50px; height: 30px;">
</center>