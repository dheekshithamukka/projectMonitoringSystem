<a href="igprofile.php"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
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
  <link rel="stylesheet" href="prodetails.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

  <?php
  $pname = $_GET['pn'];
  $guide = $_GET['guide'];
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
  echo "<td><b>Branch: </b></td>";
  echo "<td>" . $rs['branch'] . "</td>";
  echo "</tr>";
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


  $b = $rs['branch'];
  $_SESSION['b'] = $b;

  $y = $rs['year'];
  $_SESSION['y'] = $y;

  $sec = $rs['section'];
  $_SESSION['sec'] = $sec;


  echo "</table>";
  ?>



  <div class="container">
    <div class="row">
      <div class="column">
        <div class="card" style="width: 22rem; border-radius: 20px;">
          <div class="card-body">
            <b>Abstract:</b>
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
                <br><br>
                <form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig ?>" method="POST">
                  <input id="submitBtn" type="submit" name="approve1" value="Approve"></input>
                  <br>
                </form>
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
            <b>Documents:</b>
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
                <br><br>
                <form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig ?>" method="POST">
                  <input type="submit" name="approve2" value="Approve"></input>
                  <br>
                </form>
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
            <b>Videos:</b>
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
                <br><br>
                <form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig ?>"" method=" POST">
                  <input type="submit" name="approve3" value="Approve"></input>
                  <br>
                </form>

            <?php
              }
            }
            ?>


          </div>
        </div>
      </div>
    </div>

    <br><br>
    <div class="s" style="margin-top: 80px;">
      <b>Suggestions by Internal Guide:</b><br><br>
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
      <b>Suggestions by PRC:</b><br><br>
      <?php
      $k = 1;
      $sq2 = "SELECT * FROM prc_comments WHERE pname='$pname' AND ig_guide='$ig'";
      $ans2 = mysqli_query($con, $sq2);
      while ($r2 = mysqli_fetch_array($ans2)) {
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


  </div>

  <b style="margin-left: 80px;">Progress: </b>
  <br />
  <br />

  <?php
  $percentage = 0;
  $sq = "SELECT * FROM ig WHERE pname='$pname'";
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
  <br>


  <u><b style="margin-left: 80px;">Marks: </b></u>





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
  ?>
    <div class="c" style="margin-left:80px;">
      <?php
      echo $i . ". " . $tname . " - " . $troll . "<br />";
      ?>
    </div>
    <?php
    $i++;
    $troll = $row["rollNo"];
   
    $s1 = "SELECT marks FROM prc_marks WHERE rollNo='$troll' AND prc='prc1' AND ig_id='$ig' AND pname='$pname'";
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


    $s2 = "SELECT marks FROM prc_marks WHERE rollNo='$troll' AND prc='prc2' AND ig_id='$ig' AND pname='$pname'";
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
    


    $s3 = "SELECT marks FROM prc_marks WHERE rollNo='$troll' AND prc='prc3' AND ig_id='$ig' AND pname='$pname'";
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

    




    ?>

    <table class="table1" style="margin-left: 84px;">
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



        if (!is_nan($a1) && is_nan($a2) && is_nan($a3)) {
          echo "<td>" . $a1 . "</td>";
          echo "<td>" . "-" . "</td>";
          echo "<td>" . "-" . "</td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
          echo "<br>";
        }
        if (!is_nan($a1) && !is_nan($a2) && is_nan($a3)) {
          echo "<td>" . $a1 . "</td>";
          echo "<td>" . $a2 . "</td>";
          echo "<td>" . "-" . "</td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
          echo "<br>";
        }
        if (!is_nan($a1) && !is_nan($a2) && !is_nan($a3)) {
          echo "<td>" . $a1 . "</td>";
          echo "<td>" . $a2 . "</td>";
          echo "<td>" . $a3 . "</td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
          echo "<br>";
        }


        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "<br>";

        

      }




        ?>



        <div class="c" style="margin-left:80px;">
          <?php

          

          ?>
        </div>
        <?php
      

        ?>


        <br>



        <div class="comments" style="margin-left: 80px;">

          <b>Comments:</b>
          <br><br>



          <form action="" method="POST">
            <textarea name="comments" rows="4" cols="50" placeholder="Enter your comments" required></textarea><br><br>
            <input type="submit" name="submit_comments" value="Submit" class="submit1" />
          </form>
          <br>
        </div>







        <?php
        if (isset($_POST['submit_comments'])) {
          $comments = $_POST['comments'];
          $s1 = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
          $ans = mysqli_query($con, $s1);
          $k = mysqli_num_rows($ans);
          
          $sql = "INSERT INTO ig(ig_name,pname,branch,year,section,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$ig','$pname','$b','$y','$sec','$comments','0','0','0')";
          if (mysqli_query($con, $sql)) {
            echo ("<script LANGUAGE='JavaScript'>
   window.alert('Commented successfully. ');
  </script>");
          } else {
            echo "Try again";
          }
          
        }
        ?>




        <br />
        <a href="igprofile.php?intid=<?php echo $guide ?>"><input type="button" class="back" value="Back"></button></a>



        <br />
        <br />
        <br />
        <br />

</body>

</html>