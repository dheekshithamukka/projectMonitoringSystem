<a href="prcProfile.php"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
" /></a>

<?php
$con = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
if (mysqli_connect_errno()) {
  echo "Failed to connect " . mysqli_connect_error();
}
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="prcprodetails.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

  <?php
  $pname = $_GET['pn'];
  $prcId = $_GET['prcId'];
  $i = 1;
  $query = "SELECT * FROM employee_table WHERE pname='$pname'";
  $res = mysqli_query($con, $query);
  echo "<table border='3'>
";
  echo "<tr>";
  echo "<td>Team members</td>";

  

  echo "<td>";
  while ($row = mysqli_fetch_array($res)) {
    $tname = $row["name"];
    $troll = $row["rollNo"];
    echo $i . ". " . $tname . " - " . $troll . "<br />";
    $i++;
  }
  echo "</td>";
  $q = "SELECT * FROM employee_table WHERE pname='$pname'";
  $r = mysqli_query($con, $q);
  $rs = mysqli_fetch_array($r);
  echo "<tr>";
  echo "<td><b>Project Name: </b></td>";
  echo "<td>" . $pname . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><b>Project Domain: </b></td>";
  echo "<td>" . $rs['pdomain'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><b>Type of project: </b></td>";
  echo "<td>" . $rs['ptype'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><b>Internal Guide: </b></td>";
  echo "<td>" . $rs['int_guide'] . "</td>";
  echo "</tr>";

  $ig = $rs['int_guide'];
  $_SESSION['ig'] = $ig;


  $branch = $rs['branch'];
  $_SESSION['branch'] = $branch;
  $year = $rs['year'];
  $_SESSION['year'] = $year;
  $section = $rs['section'];
  $_SESSION['section'] = $section;
  $pname = $pname;
  $_SESSION['pname'] = $pname;



  echo "</table>";
  ?>





  <div class="container">
    <div class="row">

      <div class="column">
        <div class="card" style="width: 22rem; border-radius: 20px;">
          <div class="card-body">
            <b><u>Abstract:</u></b>
            <br>
            <br>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            ?>
            <?php
            $conn = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
            if (mysqli_connect_errno()) {
              echo "Failed to connect " . mysqli_connect_error();
            }
            ?>

            <?php
            $sql = "SELECT * FROM file_upload_1 WHERE pname='$pname'";
            $result_set = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
            ?>

              <?php echo "<b>File Name:</b> ";
              echo $row['file1_abstract'];
              if ($row['file1_abstract'] == "") {
                echo "<i>No file found.</i>";
              } else {

              ?>


                <br>
                <a href="uploads/<?php echo $row['file1_abstract'] ?>" target="_blank">Download</a>
                <br>
            <?php
              }
            }
            ?>

          </div>
        </div>

        <br>

      </div>
      <div class="column">
        <div class="card" style="width: 22rem; border-radius: 20px;">
          <div class="card-body">
            <b><u>Documents:</u></b>
            <br>
            <br>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            ?>
            <?php
            $conn = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
            if (mysqli_connect_errno()) {
              echo "Failed to connect " . mysqli_connect_error();
            }
            ?>

            <?php
            $sql = "SELECT * FROM file_upload_1 WHERE pname='$pname'";
            $result_set = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
            ?>

              <?php echo "<b>File Name:</b> ";
              echo $row['file2_documents'];
              if ($row['file2_documents'] == '') {
                echo "<i>No file found.</i>";
                echo "<br>";
              } else {


              ?>
                <br>
                <a href="uploads/<?php echo $row['file2_documents'] ?>" target="_blank">Download</a>
                <br>
            <?php
              }
            }
            ?>


          </div>
        </div>
        <br>

      </div>
      <div class="column">
        <div class="card" style="width: 22rem; border-radius: 20px;">
          <div class="card-body">

            <b><u>Videos:</u></b>
            <br>
            <br>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            ?>
            <?php
            $conn = mysqli_connect('localhost', 'student', 'gnits', 'project_monitoring_copy');
            if (mysqli_connect_errno()) {
              echo "Failed to connect " . mysqli_connect_error();
            }
            ?>

            <?php
            $sql = "SELECT * FROM file_upload_1 WHERE pname='$pname'";
            $result_set = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
            ?>

              <?php echo "<b>File Name:</b> ";
              echo $row['file3_videos'];
              if ($row['file3_videos'] == '') {
                echo "<i>No file found.</i>";
              } else {



              ?>
                <br>
                <a href="uploads/<?php echo $row['file3_videos'] ?>" target="_blank">Download</a>
                <br>
            <?php
              }
            }
            ?>


          </div>
        </div>
      </div>
    </div>

    <br><br>
    <div class="s">
      <b><u>Suggestions by Internal Guide:</u></b><br><br>
      <?php
      $k = 1;
      $sq = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
      $ans = mysqli_query($con, $sq);
      while ($r1 = mysqli_fetch_array($ans)) {
        if ($r1["comments"] == "") {
          continue;
        } else {
          echo $k . ". " . $r1["comments"] . "<br>";
          $k++;
        }
      }
      ?>
      <br>
    </div>



    <br>
    <div class="s">
      <b><u>Suggestions by PRC:</u></b><br><br>
      <?php
      $k = 1;
      $sq1 = "SELECT * FROM prc_comments WHERE pname='$pname' AND ig_guide='$ig'";
      $ans1 = mysqli_query($con, $sq1);
      while ($r2 = mysqli_fetch_array($ans1)) {
        if ($r2["comments"] == "") {
          continue;
        } else {
          echo $k . ". " . $r2["comments"] . "<br>";
          $k++;
        }
      }
      ?>
      <br>
    </div>






    <b style="margin-left: 2px;">Progress: </b>

    <br />
    <br />

    <?php
    $percentage = 0;
    $sq = "SELECT * FROM ig WHERE pname='$pname'";
    $ans1 = mysqli_query($con, $sq);
    $r3 = mysqli_fetch_array($ans1);
    $r4 = mysqli_num_rows($ans1);
    $abs = $r3["appdisapp_abs"];
    $doc = $r3["appdisapp_doc"];
    $vid = $r3["appdisapp_vid"];
    if ($r4 != 0) {
      if ($abs == 1 & $doc == 1 & $vid == 1) {
        $percentage = 100;
      } elseif ($abs == 1 & $doc == 1) {
        $percentage = 50;
      } elseif ($abs == 1) {
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
    <br>
    <br>

    <b>Comments:</b>
    <br><br>
    <form action="prc_comments.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>" method="POST">
      <textarea name="comments" rows="4" cols="50" placeholder="Enter your comments" required></textarea><br><br>
      <input type="submit" name="submit_comments" class="submit1" />
    </form>





    <u><b>Marks: </b></u>




    <?php

    $i = 1;
    $sq = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig'";
    $res = mysqli_query($con, $query);

    ?>



    <?php
    while ($row = mysqli_fetch_array($res)) {
      echo "<br />";
      $tname = $row["name"];
      $troll = $row["rollNo"];
      echo $i . ". " . $tname . " - " . $troll . "<br />";
      $i++;
      $troll = $row["rollNo"];

      $sqm1 = "SELECT * FROM prc_marks WHERE rollNo='$troll' AND prcId='$prcId' AND prc='prc1' AND ig_id='$ig' AND pname='$pname'";
      $ansm1 = mysqli_query($con, $sqm1);
      $rsm1 = mysqli_fetch_array($ansm1);

      $sqm2 = "SELECT * FROM prc_marks WHERE rollNo='$troll' AND prcId='$prcId' AND prc='prc2' AND ig_id='$ig' AND pname='$pname'";
      $ansm2 = mysqli_query($con, $sqm2);
      $rsm2 = mysqli_fetch_array($ansm2);

      $sqm3 = "SELECT * FROM prc_marks WHERE rollNo='$troll' AND prcId='$prcId' AND prc='prc3' AND ig_id='$ig' AND pname='$pname'";
      $ansm3 = mysqli_query($con, $sqm3);
      $rsm3 = mysqli_fetch_array($ansm3);

    ?>
      <table class="table1" style="margin-left: 4px;">
        <thead>
          <tr>
            <th scope="col" style="color: black;
  text-align: center;">PRC1</th>
            <th scope="col" style="color: black;
  text-align: center;">PRC2</th>
            <th scope="col" style="color: black;
  text-align: center;">PRC3</th>

          </tr>
        </thead>
        <tbody>
          <tr>
          <?php
          if (mysqli_num_rows($ansm1) != 0 && mysqli_num_rows($ansm2) == 0 && mysqli_num_rows($ansm3) == 0) {
            $e = 0;
            echo "<td>" . $rsm1['marks'] . "</td>";
            echo "<td>" . $e . "</td>"; 
            echo "<td>" . $e . "</td>"; 
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<br>";
          } if(mysqli_num_rows($ansm1) != 0 && mysqli_num_rows($ansm2) != 0 && mysqli_num_rows($ansm3) == 0) {
            $e=0;
            echo "<td>" . $rsm1['marks'] . "</td>";
            echo "<td>" . $rsm2['marks'] . "</td>";
            echo "<td>" . $e . "</td>";

            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<br>";
          }
          if(mysqli_num_rows($ansm1) != 0 && mysqli_num_rows($ansm2) != 0 && mysqli_num_rows($ansm3) != 0) {
            $e=0;
            echo "<td>" . $rsm1['marks'] . "</td>";
            echo "<td>" . $rsm2['marks'] . "</td>";
            echo "<td>" . $rsm3['marks'] . "</td>";

            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<br>";
          } if(mysqli_num_rows($ansm1) == 0 && mysqli_num_rows($ansm2) == 0 && mysqli_num_rows($ansm3) == 0) {
            $e=0;
            echo "<td>" . $e. "</td>";
            echo "<td>" . $e . "</td>";
            echo "<td>" . $e . "</td>";

            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<br>";
          }
        }

          ?>

          <br>





          <div class="row" style="margin-top: 40px;">

            <div class="column">

<?php 
$a = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc1'";
$s = mysqli_query($con,$a);
$n = mysqli_fetch_array($s);
$prc1 = $n['marks'];

$a1 = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc2'";
$s1 = mysqli_query($con,$a1);
$n1 = mysqli_fetch_array($s1);
$prc2 = $n1['marks'];

$a2 = "SELECT * FROM prc_total_marks WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc3'";
$s2 = mysqli_query($con,$a2);
$n2 = mysqli_fetch_array($s2);
$prc3 = $n2['marks'];

?>
              <b>Marks for PRC1(out of <?php echo $prc1 ?>):</b>
              <br />
              <?php
              $q = "SELECT * FROM prc_meetings WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc1'";
              $result = mysqli_query($con, $q);
              $r = mysqli_fetch_array($result);
              if (mysqli_num_rows($result)) {
                $deadline = $r['date'];
                if (date("Y-m-d") > $deadline) {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
              ?>
                    <form action="prc_marks.php?p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>" method="POST">
                      <input type="number" name="marks1" min="1" max="10" disabled>
                      <input type="submit" name="submit_marks_1" disabled>
                    </form>
                  <?php

                  }
                } else {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
                  ?>
                    <form action="prc_marks.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>&branch=<?php echo $branch ?>&year=<?php echo $year ?>&section=<?php echo $section ?>&pname=<?php echo $pname ?>" method="POST">
                      <input type="number" name="marks1" min="1" max=<?php echo $prc1 ?> >
                      <input type="submit" name="submit_marks_1">
                    </form>
              <?php
                  }
                }
              }
              ?>



            </div>
            <div class="column">

              <b>Marks for PRC2(out of <?php echo $prc2 ?>):</b>
              <br />
              <?php
              $q = "SELECT * FROM prc_meetings WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc2'";
              $result = mysqli_query($con, $q);
              $r = mysqli_fetch_array($result);

              if (mysqli_num_rows($result)) {
                $deadline = $r['date'];
                if (date("Y-m-d") > $deadline) {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
              ?>
                    <form action="prc_marks.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>&branch=<?php echo $branch ?>&year=<?php echo $year ?>&section=<?php echo $section ?>&pname=<?php echo $pname ?>" method="POST">
                      <input type="number" name="marks2" min="1" max="10" required disabled>
                      <input type="submit" name="submit_marks_2" disabled>
                    </form>
                  <?php

                  }
                } else {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
                  ?>
                    <form action="prc_marks.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>&branch=<?php echo $branch ?>&year=<?php echo $year ?>&section=<?php echo $section ?>&pname=<?php echo $pname ?>" method="POST">
                      <input type="number" name="marks2" min="1" max=<?php echo $prc2 ?> required>
                      <input type="submit" name="submit_marks_2">
                    </form>
              <?php
                  }
                }
              }
              ?>
            </div>
            <div class="column">

              <b>Marks for PRC3(out of <?php echo $prc3 ?>):</b>
              <br />
              <?php
              $q = "SELECT * FROM prc_meetings WHERE branch='$branch' AND year='$year' AND section='$section' AND prc='prc3'";
              $result = mysqli_query($con, $q);
              $r = mysqli_fetch_array($result);

              if (mysqli_num_rows($result)) {
                $deadline = $r['date'];
                if (date("Y-m-d") > $deadline) {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
              ?>
                    <form action="prc_marks.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>&branch=<?php echo $branch ?>&year=<?php echo $year ?>&section=<?php echo $section ?>&pname=<?php echo $pname ?>" method="POST">
                      <input type="number" name="marks3" min="1" max="10" required disabled>
                      <input type="submit" name="submit_marks_3" disabled>
                    </form>
                  <?php

                  }
                } else {
                  $pname = $_GET['pn'];
                  $i = 1;
                  $query1 = "SELECT * FROM employee_table WHERE pname='$pname'";
                  $res1 = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($res1)) {
                    $tname = $row["name"];
                    $troll = $row["rollNo"];
                    echo $i . ". " . $tname . " - " . $troll;
                    $i++;
                    $_SESSION['troll'] = $troll;
                  ?>
                    <form action="prc_marks.php?prcId=<?php echo $prcId ?>&p=<?php echo $pname ?>&i=<?php echo $ig ?>&roll=<?php echo $troll ?>&branch=<?php echo $branch ?>&year=<?php echo $year ?>&section=<?php echo $section ?>&pname=<?php echo $pname ?>" method="POST">
                      <input type="number" name="marks3" min="1" max=<?php echo $prc2 ?> required>
                      <input type="submit" name="submit_marks_3">
                    </form>
              <?php
                  }
                }
              }
              ?>
            </div>
          </div>

<br />
<br />

<br />

          <form method="post" action="approve.php?pn=<?php echo $pname?>&prcId=<?php echo $prcId?>" align="center">
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


        </form>


<?php 
$s = "SELECT * FROM employee_table WHERE appDisapp=1";
$re = mysqli_query($con, $s);
$n = mysqli_num_rows($re);
if($n>0) {
  echo "<p><center>Already approved.</center></p> ";
}
else {
  
}
?>


</body>



<?php

if (isset($_POST['submit_marks_1'])) {
  echo $troll;
  echo $branch;
  echo $year;
}


?>



</html>