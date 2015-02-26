<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Personal Details</title>
<style>
h3
{
font-family: Calibri; font-size: 22pt; font-style: normal; font-weight: bold; color:DarkCyan; text-decoration: underline;
}
table
{
font-family: Calibri; 
color:white; 
font-size: 11pt;
font-style: normal;
background-color:DarkCyan;
border-collapse: collapse; 
border: 2px solid navy
}
table.inner{border: 0px}
</style>

</head>
<body>
<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];

$hname = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pincode'];

$Gender = $_POST['gender'];
$DOB = $_POST['dob'];
$Mail = $_POST['mail'];
$phn_no = $_POST['phn_no'];
$dept = $_POST['dept'];

$last_id="";
$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
//echo 'Connected successfully';
echo "<br/>";

 
mysqli_select_db($conn,"db2");
//echo "Connected to database ";
//echo "<br/>";
//echo "<br/>";

$sql = "INSERT INTO faculty (F_NAME,L_NAME,H_NAME,CITY,STATE,PINCODE,GENDER,DOB,MAIL,PHN_NUMBER,DEPT_ID) 
VALUES ('$fname','$lname','$hname','$city','$state','$pin','$Gender','$DOB','$Mail','$phn_no','$dept')";


if (mysqli_query($conn, $sql)) 
{
	$last_id = mysqli_insert_id($conn);
	
	} 

else 
{
    echo "DUPLICATE ENTRY..!";
	header('Location: error.html');
	exit;
}
$_SESSION['id'] = $last_id;
mysqli_close($conn);
?>

<h3> NOTE DOWN THIS UNIQUE ID: </h3>
<form action="fac-reg2.php" name="db_frm1" method="post">
<table align="center" cellpadding="10" width="40%" height="200">
<tr>
<td>
<input type="text" name="id" value="<?php echo $last_id?>" readonly="readonly">
</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="Submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
</html>
