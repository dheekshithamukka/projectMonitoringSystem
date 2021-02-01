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
    <script src='jquery-3.2.1.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>

</head>



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
            for($i=0;$i<count($prcId);$i++) {
                $s1 = "INSERT INTO prc_allotment(branch, year, section, prcId) VALUES('$branch', '$year','$section','$prcId[$i]')";
                mysqli_query($con, $s1);
                
            }
            echo ("<script LANGUAGE='JavaScript'>
		                window.alert('PRC Id is added. ');
                        window.location.href = 'adminProfile1.php';
                    </script>");
        }
        else {
                echo ("<script LANGUAGE='JavaScript'>
		            window.alert('No PRC with the given Id.');
                    window.location.href = 'adminProfile1.php';
                </script>");
        }
        }
    else {
    echo ("<script LANGUAGE='JavaScript'>
              window.alert('Already entered. ');
              window.location.href = 'adminProfile1.php';
              </script>");
    }
}

?>



<br />
<br />
<br />
<br />



</html>