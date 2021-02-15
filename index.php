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

<html>
  <head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>

<div class="navbar">
<div class="image img-responsive"><img src="http://103.44.2.84/ecap/CollegeImages/title_head.jpg" style="margin-left: -200px; width: 1500px; height: 180px"/></div>

/></div>
</div>
</div>









<div class="dropdown">
  <button class="dropbtn"><img src="https://miro.medium.com/max/600/1*rddekGCO3PjhXqtePcIYIQ.png" 
  style="width: 60px; height: 50px"
  /></button>
  <div class="dropdown-content">
    <a href="stdlogin.php">Student login</a>
    <a href="iglogin.php">Internal guide login</a>
    <a href="prclogin.php">PRC login</a>
    <a href="adminlogin.php">Admin</a>
  </div>
</div>


<div class="steps">
<center><p style="font-family: American Typewriter, serif; color: #6a3093; font-size: 50px; font-weight: bold;">6 Steps to do a Successful Project</p></center></div>


<div class="acc" style="width: 100%">


<button class="accordion" >1. Selection of Topic</button>
<div class="panel">

<div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/workplace-office-business-woman-working-computer-her-desk_141192-6.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>
<div style="float: right; width: 80%">
  <p style="font-family: Verdana">Selection of topic is a huge and important task in a project. One should have a clear idea about one's subject strengths and the selected topic should be relevant to it. Always select the project that has value addition.

As a graduate you should select a project which is either advantageous to a lot of people or enhance your technical and managerial skills. Your project must play its role towards a positive growth/development in that specific field.</p>
</div>
</div>







<button class="accordion">2. Research about the selected topic online</button>
<div class="panel">

<div style="float:left;width:80%">
 <p>Do some online research about the selected topic. Go through the research papers from different researchers around the world on the topics related to project. Find some websites containing the information about the materials used for project.</p>
</div>


<div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/telecommuting-concept-illustration_114360-1600.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>
</div>


<button class="accordion">3. Suggestions from subject experts</button>
<div class="panel">
<div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/telecommuting-concept_23-2148497144.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>

<div style="float:left;width:80%">

  <p>Go to the subject experts in your college and interact with them about the project topic. You can also meet many subject experts from various parts of India through social media and some discussion forums. This helps you in getting suggestions in different possible ways, through which you can get a clear idea on your project topic.</p>
</div>
</div>


<button class="accordion">4. Planning</button>
<div class="panel">

<div style="float:left;width:80%">

  <p>After getting a clear idea about the topic, prepare a rough plan about procurement of resources, experimentation and fabrication along with your teammates. Make a rough schedule, adapt to it and distribute the work among your teammates. This will keep your project on track and individuals will come to know about their part in the project rather than any individual (leader) taking full responsibilities.</p>
</div>
  <div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/telecommuting-concept-with-woman_23-2148479666.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>
</div>





<button class="accordion">5. Execution of plans</button>
<div class="panel">
<div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/man-working-from-home-concept_23-2148493925.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>
<div style="float:left;width:80%">

  <p>Make sure that the materials will be ready for the experimentation/fabrication by the scheduled time. Follow the schedule during experimentation/fabrication to get accurate and efficient results.
</p>
</div>
</div>


<button class="accordion">6. Presentation</button>
<div class="panel">
<div style="float:left;width:80%">

  <p>Experimentation/Fabrication does not make a project successful; one should be able to present the results in proper way. So it should be prepared in such a way that, it reflects the exact objective of your project.</p>
</div>
  <div style="float:left;width:20%">
<img src="https://image.freepik.com/free-vector/work-concept-illustration_114360-132.jpg" style="width:70%; height: 30%; border-radius: 20%"/>
</div>
</div>

</div>

</body>
</html>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>



<?php
  $d = date("Y-m-d");
  $q = "SELECT * FROM academic_calendar";
  $r = mysqli_query($con, $q);
  $res = mysqli_fetch_array($r);
  $start_date = $res['start_date'];
  $end_date = $res['end_date'];
  if(mysqli_num_rows($r) > 0) {
    if($d>$end_date) {
      $q1 = "DELETE FROM stdreg WHERE stdYear='4'";
      $r1 = mysqli_query($con, $q1);
      $q2 = "UPDATE stdreg SET stdYear='4' WHERE stdYear='3'";
      $r2 = mysqli_query($con, $q2);
      $q3 = "DELETE FROM employee_table";
      $r3 = mysqli_query($con, $q3);
      $q4 = "DELETE FROM file_upload_1";
      $r4 = mysqli_query($con, $q4);
      $q5 = "DELETE FROM deadlines";
      $r5 = mysqli_query($con, $q5);
      $q6 = "DELETE FROM ig";
      $r6 = mysqli_query($con, $q6);
      $q7 = "DELETE FROM prc_allotment";
      $r7 = mysqli_query($con, $q7);
      $q8 = "DELETE FROM prc_comments";
      $r8 = mysqli_query($con, $q8);
      $q9 = "DELETE FROM prc_marks";
      $r9 = mysqli_query($con, $q9);
      $q10 = "DELETE FROM prc_meetings";
      $r10 = mysqli_query($con, $q10);
      $q11 = "DELETE FROM prc_submission";
      $r11 = mysqli_query($con, $q11);
      $q12 = "DELETE FROM prc_total_marks";
      $r12 = mysqli_query($con, $q12);
    }
  }
?>





