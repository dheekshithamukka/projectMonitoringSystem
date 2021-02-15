<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring_copy');
if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="stdregister.css" />
</head>
<body>
<center>
<div class="container">
    <section id="content">
        <form name="frmImage" enctype="multipart/form-data" action="" method="POST">
            <center><h1>Register Form</h1></center>
            <div>
                <input type="text" placeholder="Enter your Name" required name="name" />
            </div>
            <div>
                <input type="text" placeholder="Enter your Id" required name="roll" />
            </div>
	    <div>
                <input type="email" placeholder="Enter your email-id" required name="email" />
            </div>
	    
	    <div>
                <input type="tel" placeholder="Enter phone number" required name="phone" />
            </div>
<div>
                <input type="text" placeholder="Enter branch" required name="branch" />
            </div>

	    <div>
                <input type="password" placeholder="password" required name="password"/>
            </div>
           <div>
                </div>
<div>
<br></br>
		<input name="userImage" type="file" class="inputFile" required/>
        <input type="submit" value="Submit" name="submit"/>
            </div>

        </form>



<?php     
if(isset($_POST['submit'])){
    //echo "Hi";
$name=$_POST['name'];
$roll=$_POST['roll'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$branch=$_POST['branch'];
$password=$_POST['password'];
if($name==''){
    echo 'Name empty';
}
else if($roll==''){
    echo 'Roll empty';
}
else if($email==''){
    echo 'Email empty';
}
else if($phone==''){
    echo 'Phone empty';
}
else if($branch==''){
    echo 'Branch empty';
}
else if($password==''){
    echo 'Password empty';
}
else if($name=='' || $roll=='' || $email=='' || $phone=='' || $branch=='' || $password=='')
{
echo "Please fill the empty field.";
}
else{
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
$sql="insert into igreg (ig_name,ig_id,ig_email,ig_phone,ig_branch,ig_password,imageType, imageData) values('$name','$roll','$email','$phone','$branch','$password', '{$imageProperties['mime']}', '{$imgData}')";
$res=mysqli_query($con,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
if($res)
{
echo "Record successfully inserted";
}
else{
    echo "There is some problem in inserting record";

}
}
}
}
}
?>



</div>
</body>
</html>