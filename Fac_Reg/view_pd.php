<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<title> Edit Registration Form </title>
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
</style>
</head>

<?php
$ID = $_SESSION['id'];
$F_NAME = $_SESSION['F_NAME'];
$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
  mysqli_select_db($conn,"db2");
  
  $sqlq = "SELECT * FROM faculty WHERE F_ID = '$ID'";
  $resultq = mysqli_query($conn, $sqlq);
  $rowq = mysqli_fetch_assoc($resultq);
   if (mysqli_num_rows($resultq) == 1) 
   {
    $fname = $rowq['F_NAME'];
    $lname = $rowq['L_NAME'];

    $hname = $rowq['H_NAME'];
    $city = $rowq['CITY'];
    $state = $rowq['STATE'];
    $pin = $rowq['PINCODE'];

    $Gender = $rowq['GENDER'];
    $DOB = $rowq['DOB'];
    $Mail = $rowq['MAIL'];
    $phn_no = $rowq['PHN_NUMBER'];
	$dept = $rowq['DEPT_ID'];
   }
   ?>
   <body>
	<h3> PERSONAL DETAILS </h3>
	<form action="actn1_db.php" method="post">
	<table align="center" cellpadding="10" width="40%" height="200">
	<tr>
	<td>FIRST NAME: </td>
	<td><input type="text" name="fname" value="<?php echo $fname?>" readonly="readonly"></td>
	</tr>

	<tr>
	<td>LAST NAME: </td>
	<td><input type="text" name="lname" value="<?php echo $lname?>" readonly="readonly">
	</td>
	</tr/>

	<tr>
	<td>DOB[YYYY-MM-DD]:</td>
	<td>
	<input type="date" name="dob" value="<?php echo $DOB?>" readonly="readonly"> 
	</td>
	</tr>

	<tr>
	<td>EMAIL_ID:</td>
	<td>
	<input type="email" name="mail" value="<?php echo $Mail?>" readonly="readonly">
	</td>
	</tr>

	<tr>
	<td>CONTACT_NO:</td>
	<td>
	<input type="tel" name="phn_no" value="<?php echo $phn_no?>" readonly="readonly">
	</td>
	</tr>

	<tr>
	<td>GENDER:</td>
	<td>
	<input type="radio" name="gender" value="Female" <?php if($Gender == "Female") { echo 'checked="checked"';} ?>" readonly="readonly">Female
	<input type="radio" name="gender" value="Male" <?php if($Gender == "Male") { echo 'checked="checked"';} ?>" readonly="readonly"> Male
	</td>
	</tr>

	<tr>
	<td>ADDRESS:<br/></td>
	<td>
	<input type="text" name="address" value="<?php echo $hname?>" readonly="readonly">
	</td>
	</tr>

	<tr>
	<td>CITY: </td>
	<td>
	<input type="text" name="city" value="<?php echo $city?>" readonly="readonly">
	</td>
	</tr>

	<tr>
	<td>STATES: </td>
	<td>
	<input type = "text" name="state" value="<?php echo $state?>" readonly="readonly">
	</td>
	</tr>


	<tr>
	<td>PINCODE:</td>
	<td>
	<input type="text" name="pincode" value="<?php echo $pin?>" readonly="readonly">
	</td>
	</tr>
	<br/>
	
	<tr>
	<td> DEPARTMENT: </td>
	<td>
	<input type = "text" name="dept" value="<?php echo $dept?>" readonly="readonly">
	</td>
	</tr>
	
	<tr>
	<td colspan="2" align="center">
	<input type="button" name="return" value="Back" onClick="javascript: window.history.back(-1)";>
	</td>
	</tr>
	</table>
	</form>
	</body>
	</html>
   