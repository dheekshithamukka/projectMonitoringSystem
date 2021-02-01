<?php  

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$branch = $_POST['branch'];
$year = $_POST['year'];
$section = $_POST['section'];


$connect = new PDO("mysql:host=localhost;dbname=project_monitoring_copy","student","gnits");
$query = "SELECT * FROM employee_table WHERE branch='$branch' AND year='$year' AND section='$section'";
$statement = $connect -> prepare($query);
$statement -> execute();
$result = $statement -> fetchAll();


 if(isset($_POST["export"]))  
 {
         
 }  
 ?>  