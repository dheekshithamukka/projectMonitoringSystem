<html>

<head>
  <link rel="stylesheet" href="tableprcpro2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);">
  <div class="dropdown" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);">
    <button class="dropbtn" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVIcj4yYNjZ5iI4dAjusUE0OwK6jzd8EBON2aNJ4AejGNGYZch&usqp=CAU" style="width: 30px; height: 30px" /></button>
    <div class="dropdown-content">
      <a href="stdProfile.php">My profile</a>
      <a href="prclogin.php">Logout</a>
      <!--<a href="proreg.php">New project registration</a>-->
    </div>
  </div>

  <?php
  $con = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
  if (mysqli_connect_errno()) {
    echo "Failed to connect " . mysqli_connect_error();
  }
  session_start();
  ?>
  <?php
  $r = $_SESSION['id'];
  $pwd = $_SESSION['p'];
  $query = "SELECT * FROM prcreg WHERE prcRollNo='$r'";
  $res = mysqli_query($con, $query);
  echo "<table border='3'>
";
  $row = mysqli_fetch_array($res);
  $name = $row['prcName'];
  $roll = $row['prcRollNo'];
  $branch = $row['prcBranch'];
  $_SESSION['n'] = $name;
  $_SESSION['r'] = $roll;
  $_SESSION['b'] = $branch;
  echo "<tr>";
  echo "<td>PRC Name</td>";
  echo "<td>" . $row['prcName'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>PRC Roll No</td>";
  echo "<td>" . $row['prcRollNo'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>PRC Email</td>";
  echo "<td>" . $row['prcEmail'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>PRC Phone number</td>";
  echo "<td>" . $row['prcPhone'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>PRC Branch</td>";
  echo "<td>" . $row['prcBranch'] . "</td>";
  echo "</tr>";
  echo "</table>";


  $prcId = $row['prcRollNo'];
  $_SESSION['prcId'] = $prcId;

  ?>
  <br>



  <?php
  require_once "db.php";
  $sql = "SELECT prcId FROM prcreg WHERE prcRollNo='$r'";
  $result = mysqli_query($conn, $sql);
  ?>

  <HTML>

  <HEAD>
    <link href="imageStyles.css" rel="stylesheet" type="text/css" />
  </HEAD>

  <BODY>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <div class="image"><img src="imageView1.php?image_id=<?php echo $row["prcId"]; ?>" width="175" height="200" /></div>

    <?php
    }
    mysqli_close($conn);
    ?>


    <?php
    $con = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
    if (mysqli_connect_errno()) {
      echo "Failed to connect " . mysqli_connect_error();
    }
    session_start();
    ?>



    <?php
    $r = $_SESSION['id'];
    $pwd = $_SESSION['p'];
    $q = "select branch, year, section from prc_allotment where prcId='$r'";
    $q_res = mysqli_query($con, $q);
    $row = mysqli_fetch_array($q_res);
    // echo $row["year"];
    // echo $row["section"];
    $b = $row["branch"];
    $y = $row["year"];
    $sec = $row["section"];
    $query1 = "SELECT distinct pname FROM ig WHERE (branch='$b' AND year='$y' AND section='$sec') AND (appdisapp_abs=1 OR appdisapp_doc=1 OR appdisapp_vid=1) ";
    $res1 = mysqli_query($con, $query1);
    ?>

    <br>
    <center>
      <br><br>
      <h1>List of projects registered:</h1><br>
    </center>
    <center>
      <address><i>Note: Click on project names to know more details about it.</i></address>
    </center><br><br>



    <?php


    ?>




    <?php
    $i = 1;
    $_SESSION['u'] = '$i';
    $j = 1;
    $array = [];
    while ($row1 = mysqli_fetch_array($res1)) {
      $array[$j] = $row1['pname'];
      $j++;
      $entry = $row1["pname"];

    ?>
      <div class="container">
        <div class="pro">
          <center>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="column">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">
                        <a href="prcprodetails.php?pn=<?php echo $entry ?>&prcId=<?php echo $prcId ?>" style="text-decoration: none; color: black;">
                          <?php echo $i . ". " . $entry;

                          ?></a></h5>

                    </div>
                  </div>

                </div>
              </div>
              <div style="margin-top: 85px;">



                <?php
                $percentage = 0;
                $sq = "SELECT * FROM ig WHERE pname='$entry'";
                $ans1 = mysqli_query($con, $sq);
                $r3 = mysqli_fetch_array($ans1);
                $r4 = mysqli_num_rows($ans1);
                /*$abs = $r3["appdisapp_abs"];
$doc = $r3["appdisapp_doc"];
$vid = $r3["appdisapp_vid"];*/
                if ($r4 != 0) {
                  $abs = $r3["appdisapp_abs"];
                  $doc = $r3["appdisapp_doc"];
                  $vid = $r3["appdisapp_vid"];
                  if ($abs == 1 & $doc == 1 & $vid == 1) {
                    $percentage = 100;
                  } else if ($abs == 1 & $doc == 1) {
                    $percentage = 50;
                  } else if ($abs == 1) {
                    $percentage = 25;
                  } else {
                    $percentage = 0;
                  }
                }



                if ($percentage == 25) {
                  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-error\" role=\"progressbar\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 25%\">25% complete</div>
</div>";
                } elseif ($percentage == 50) {
                  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-warning\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 50%\">50% complete</div>
</div>";
                } elseif ($percentage == 100) {
                  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">100% complete</div>
</div>";
                }


                ?>



              </div>
              <br>





            </div>

        </div>
      </div>
      </center>
    <?php
      echo "<br>";
      echo "<br>";
      $i++;
    }

    ?>

    <div class="buttons">

      <div class="action_btn">

        <form method="POST" action="export.php" align="center">
          <?php
          $s = "SELECT * FROM prc_allotment WHERE prcId='$prcId'";
          $re = mysqli_query($con, $s);
          if (mysqli_num_rows($re) > 0) {
          ?>

            <label for="branch">Branch:</label>
            <select name="branch" id="branch">
              <option value="">Select</option>
              <?php
              while ($ans = mysqli_fetch_array($re)) {
              ?>
                <option value=<?php echo $ans['branch'] ?>><?php echo $ans['branch'] ?></option>
              <?php
              }
              ?>

            </select>
          <?php
          }
          ?>
          <?php
          $s = "SELECT * FROM prc_allotment WHERE prcId='$prcId'";
          $re = mysqli_query($con, $s);
          if (mysqli_num_rows($re) > 0) {
          ?>

            <label for="year">Year:</label>
            <select name="year" id="year">
              <option value="">Select</option>
              <?php
              while ($ans = mysqli_fetch_array($re)) {
              ?>
                <option value=<?php echo $ans['year'] ?>><?php echo $ans['year'] ?></option>
              <?php
              }
              ?>

            </select>
          <?php
          }
          ?>
          <?php
          $s = "SELECT * FROM prc_allotment WHERE prcId='$prcId'";
          $re = mysqli_query($con, $s);
          if (mysqli_num_rows($re) > 0) {
          ?>

            <label for="section">Section:</label>
            <select name="section" id="section">
              <option value="">Select</option>
              <?php
              while ($ans = mysqli_fetch_array($re)) {
              ?>
                <option value=<?php echo $ans['section'] ?>><?php echo $ans['section'] ?></option>
              <?php
              }
              ?>

            </select>
          <?php
          }
          ?>


<br />
<br />

<br />

<input type="submit" name="export" value="Download" class="btn btn-success" id="button1" style="background-color:#8B008B;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  float: left;
  margin-left: 550px;
  margin-right: -230px;
  cursor: pointer;" />

          <!-- <button class="btn"><i class="fa fa-download"></i> Download</button> -->

        </form>

        <!-- <form method="post" action="approve.php?pn=$pname" align="center">
          <input type="submit" name="approve" value="Approve" class="btn btn-success" id="button2" style="background-color: #4CAF50;
  background-color:#8B008B;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;" />


        </form> -->
        <br />
        <br />

        <br />



      </div>

    </div>










    </table>
    <br />
    <br />
    <br />
  </BODY>

  </HTML>