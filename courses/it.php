<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM register WHERE d_dept='Information Technology'"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Courses</title>
<link rel="stylesheet" type="text/css" href="it_style.css">
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
		<li><a href="dept.html">DEPARTMENT</a></li>
		<li><a href="register.html">REGISTER</a></li>
		<li><a href="login.html">FACULTY LOGIN</a></li>
		<li><a href="about.html">ABOUT US</a></li>
		<li><a href="index.html">LOGOUT</a></li>
	</ul>
</div>

<div class="content" style="overflow-x:auto;">
	<h1 align='center'>INFORMATION TECHNOLOGY DEPARTMENT</h1>
<br>



<div class="content1">

	<table class="table1" border=2 align="center">

	<tr align="center" bgcolor='grey'>
		<td>Name</td>
		<td>Email</td>
		<td>Contact</td>
		<td>Year</td>
		<td>Department</td>
		<td>Division</td>
		<td>Roll No</td>
		<td>Domain Dept</td>
		<td>Domain</td>
		<td>Query</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['contact']."</td>";
		echo "<td>".$res['year']."</td>";
		echo "<td>".$res['dept']."</td>";	
		echo "<td>".$res['division']."</td>";
		echo "<td>".$res['rollno']."</td>";
		echo "<td>".$res['d_dept']."</td>";
		echo "<td>".$res['domain']."</td>";
		echo "<td>".$res['query']."</td>";
		echo "<td><a href=\"it_delete.php?email=$res[email]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</div>

</div>

</div>
</body>
</html>


