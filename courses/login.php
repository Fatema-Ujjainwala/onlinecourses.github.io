<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Courses</title>
<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
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
		<li><a href="dept.html" >DEPARTMENT</a></li>
		<li><a href="register.html">REGISTER</a></li>
		<li><a href="login.php" class="active">FACULTY LOGIN</a></li>
		<li><a href="about.html">ABOUT US</a></li>
	</ul>
</div>

<div class="content" style="overflow-x:auto;">
<h1 align='center'>FACULTY LOGIN</h1><br>
<form action="<?php $_PHP_SELF ?>"  method="post" align='center'> 
	<label>USERNAME : </label>
	<input type="text" name="username" width="100px;"><br><br>
	
	<label>PASSWORD : </label>
	<input type="password" name="password" width="100px;"><br><br>		
	
	<input type="submit" class="button" value="SUBMIT" id="submit" width="50%">	

</div>
</body>
</html>
<?php
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
$username = $_POST["username"];
$password = $_POST["password"];
// Connect to the database
$con = mysqli_connect('localhost', 'root', '');
// Make sure we connected successfully
if(!$con)
{
    die('Connection Failed'.mysql_error());
}
// Select the database to use
mysqli_select_db($con,"project");
$query = "Select * from login WHERE username='$username' and password='$password'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);

//$it = "Select * from login WHERE username='it@tcet' and password='1234'";
//$cmpn = "Select * from login WHERE username='cmpn@tcet' and password='1234'";

if ($count<=0)
{
	function_alert("ENTER VALID DATA");
}

if($username=='it@tcet' and  $password='1234')
{
	header("Location: it.php");
}
elseif($username=='cmpn@tcet' and $password='1234')
{
	header("Location: cmpn.php");
}
elseif($username=='mech@tcet' and $password='1234')
{
	header("Location: mech.php");
}
elseif($username=='ci@tcet' and  $password='1234')
{
	header("Location: ci.php");
}
elseif($username=='ex@tcet' and  $password='1234')
{
	header("Location: ex.php");
}
elseif($username=='etrx@tcet' and  $password='1234')
{
	header("Location: etrx.php");
}



mysqli_close($con);

?>