<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<title>Student details</title>
<style>

h3
{
font-family: Calibri; 
font-size: 22pt; 
font-style: normal; 
font-weight: bold; 
text-align: center; 
color: #8B4500; 
text-decoration: underline;
}
table
{
font-family: Calibri; 
color:black; 
font-size: 11pt;
font-style: normal;
background-color: #dfdfdf;
border-collapse: collapse; 
border: 2px solid brown;
}
table.inner{border: 0px}
 .required:after
 {
	 content:"*";
	 color: #FF0000
 }
table
{
border: 2px solid navy;
border-spacing: 5px;
border-collapse: collapse;
padding: 5px; 

margin-left: auto;
margin-right: auto;
margin-top: 3cm;
}
tr, td ,th{ 
  border: solid;
  border-width: .25px solid navy;
}

</style>
</head>
<body>
<table width="75%" height="200%">
<tr>
<th> ID </th>
<th> NAME </th>
<th> DEPT </th>
<th> SEMESTER </th>
<th> GUIDE </th>
<th> CGPA </th>
</tr>

<?php
$F_NAME = $_SESSION['F_NAME'];
$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
 
mysqli_select_db($conn,"db2");

$sql = "SELECT * FROM S_ACAD WHERE S_GUIDE = '$F_NAME'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) 
	{
           echo '<tr>
		   <td>' .$row['S_ID'].'</td>
		   <td>' .$row['S_NAME'].'</td>
		   <td>' .$row['S_DEPT'].'</td>
		   <td>'.$row['S_CSEM'].'</td>
		   <td>'.$row['S_GUIDE'].'</td>
		   <td>'.$row['S_CGPA'].'</td>
		   </tr>';
		   
			}
         			
			}		
    

 else
	 {
    echo "0 results";
}

mysqli_close($conn);
?> 
</table>
</body>
</html>