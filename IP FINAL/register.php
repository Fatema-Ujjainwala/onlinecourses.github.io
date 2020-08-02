<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Courses</title>
<link rel="stylesheet" type="text/css" href="register_style.css">
</head>

<script type="text/javascript">



</script>

<body>
<div class="container">

<div class="header">
<header>
<img src="tcetlogo.jpg" alt="tcet header" height="100" style="width:100%;">
</header>
</div>

<div class="menu">
<ul type='none'>
<li><a href="index.html" >HOME</a></li>
<li><a href="dept.html">DEPARTMENT</a></li>
<li><a href="register.php"class="active">REGISTER</a></li>
<li><a href="login.html">FACULTY LOGIN</a></li>
<li><a href="about.html">ABOUT US</a></li>
</ul>
</div>

<div class="content" style="overflow-x:auto;">
<h1 align='center'>COURSES REGISTERATION FORM</h1><br>
<form action="<?php $_PHP_SELF ?>" method="post" align='center'> 
<fieldset> 
<legend>Your Details</legend>
	<label>Name: </label>
	<input type="text" name="name" placeholder="Full Name" width="100px;"><br><br>
	
	<label>Email Id: </label>
	<input type="Email" name="email" placeholder="email@gmail.com"><br><br>		
	
	<label>Contact Number: </label>
	<input type="text" name="contact" placeholder="987654321"><br><br>

	<label>Year: </label>
<select name='year'>
<option value="None">--Select--</option>
<option>First Year</option>
<option>Second Year</option>
<option>Third Year</option>
<option>Fourth Year </option>
</select><br><br>	

	<label>Department: </label>
<select name='dept'>
<option>--Select--</option>
<option>Information Technology</option>
<option>Computer</option>
<option>Electronics </option>
<option>Electronics & Telecommunication</option>
<option>Mechanical</option>
<option>Civil</option>
</select><br><br>


	<label>Division:</label>
<input type="radio" name="division" value="A">A
<input type="radio" name="division" value="B">B
<br><br


<label>Roll No.: </label>
	<input type="Number" name="rollno" placeholder="Enter Roll No." width="100px;"><br><br>

<br><br>
</fieldset>

<fieldset>
<legend>Domain Details</legend>
	<label>Domain Department: </label>
<select name='d_dept'>
<option value="None">--Select--</option>
<option>Information Technology</option>
<option>Computer</option>
<option>Electronics </option>
<option>Electronics & Telecommunication</option>
<option>Mechanical</option>
<option>Civil</option>
</select><br><br>

<label>Select Domain:</label>
<select name='domain'>
<option value="None">--Select--</option>
<option value="Infrastructure Security">Infrastructure Security </option>
<option value="Application Paradigm">Application Paradigm</option>
<option value="Artificial Intelligence">Artificial Intelligence</option>
<option value="Data Science">Data Science</option>
<option value="System On Chip">System On Chip</option>
<option value="Industrial Automation">Industrial Automation</option>
<option value="Wireless Communication">Wireless Communication</option>
<option value="IOT Specialization">IOT Specialization</option>
<option value="Industry 4.0">Industry 4.0</option>
<option value="Product Design">Product Design</option>
<option value="Smart Infrastructure">Smart Infrastructure</option>
<option value="Structural Engineering">Structural Engineering</option>
</select><br><br>

	<label>  Any Queries? (Optional)</label>
	<textarea name="query" rows="5" cols="20" placeholder="Message"></textarea><br><br>
</fieldset><br>
	<input type="submit" class="button" name="insert" value="SUBMIT" height="30%">	

</form>
</div>

</div>

</body>
</html>

<?php
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
  
 if(isset($_POST['insert']))
{
$con = mysqli_connect("localhost","root","");
if($con)
{
//echo "Mysql connection ok<br>";
mysqli_select_db($con,"project");
$name = strval($_POST['name']);
$email = strval($_POST['email']);
$contact = intval($_POST['contact']);
$dept = strval($_POST['dept']);
$year = strval($_POST['year']);
$rollno = intval($_POST['rollno']);
$division = strval($_POST['division']);
$d_dept = strval($_POST['d_dept']);
$domain = strval($_POST['domain']);
$query = strval($_POST['query']);

$valid = "Select * from register WHERE email='$email' ";
$result = mysqli_query($con,$valid) or die(mysqli_error($con));
$count = mysqli_num_rows($result);

if(empty($name) || empty($email) || empty($contact) || empty($dept) || empty($year) || empty($rollno) || empty($division) || empty($d_dept) || empty($domain) )
{
	function_alert("ALL THE FIELDS NEED TO BE FILL"); 
}
elseif ($count>0)
{
	function_alert("YOU HAVE ALREADY ENTERED DATA OR CHECK YOUR DETAILS PROPERLY"); 
}
else
{
	$insert = "insert into register values('$name','$email',$contact,'$year','$dept','$division',$rollno,'$d_dept','$domain','$query')";
	mysqli_query($con,$insert);
	function_alert("DATA IS SAVED SUCCESSFULLY"); 
}

}
else 
{
	function_alert("CONNECTION FAILURE"); 
}
}

mysqli_close($con);
?>
