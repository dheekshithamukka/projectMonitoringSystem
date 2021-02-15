<?php  



$branch = $_POST['branch'];
$year = $_POST['year'];
$section = $_POST['section'];

 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect('localhost','student','gnits','project_monitoring_copy');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Roll No', 'Branch', 'Project Name', 'Project Domain','Internal Guide Id', 'Internal Guide Name','Project Type','PRC1','PRC2','PRC3','Average Marks'));  
      $query = "SELECT name,rollNo,branch,pname,pdomain,int_guide,intName, ptype, prc1,prc2,prc3,average_marks from employee_table WHERE branch='$branch' AND year='$year' AND section='$section'";  
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) > 0) {  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
     }




      $sum = 0;
      $avg = 0;
      fputcsv($output, array('Average marks for the whole section'));  
      $query1 = "SELECT * FROM employee_table WHERE branch='$branch' AND year='$year' AND section='$section'";  
      $result1 = mysqli_query($connect, $query1);  
      $num = mysqli_num_rows($result1);
      while($row1 = mysqli_fetch_assoc($result1))  
      {  
           $sum = $sum + $row1['average_marks'];
      }  
      $avg = (float)$sum/$num;
      echo $avg;
     //  fputcsv($output, $avg);  
      fclose($output);  
 
 }
