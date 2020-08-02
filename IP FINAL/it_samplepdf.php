<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "project");  
      $sql = "SELECT * FROM register WHERE d_dept='IT'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["contact"].'</td>  
                          <td>'.$row["dept"].'</td>  
                          <td>'.$row["year"].'</td> 
                          <td>'.$row["rollno"].'</td> 
                          <td>'.$row["division"].'</td> 
                          <td>'.$row["d_dept"].'</td>
                          <td>'.$row["domain"].'</td> 
                          <td>'.$row["query"].'</td> 

                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th>name</th>  
                <th>email</th>  
                <th>contact</th> 
                <th>dept</th> 
                <th>year</th> 
                <th>rollno</th> 
                <th>division</th>
                <th>d_dept</th>
                <th>domain</th>   
                <th>query</th>   
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
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
<form method="post">
<input type="submit" name="create_pdf" class="button" value="Generate PDF" /><br>
</form>

<div class="content1">

  <table border=1 align="center">

  <tr bgcolor='grey'>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Department</th>
    <th>Year</th>
    <th>Roll No</th>
    <th>Division</th>
    <th>Domain Dept</th>
    <th>Domain</th>
    <th>Query</th>
    <th>Update</th>
  </tr>
  <?php  
  echo fetch_data();  
   ?>  
   
  </table>
</div>

</div>

</div>
</body>
</html>
