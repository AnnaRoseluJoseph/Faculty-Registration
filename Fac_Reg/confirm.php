<!DOCTYPE html>
<html>
<head>
<title>Confirm the details entered</title>

<style>
h3
{
font-family: Calibri; 
font-size: 22pt; 
font-style: normal; 
font-weight: bold; 
text-align: center; 
color: #654321; 
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

?>

<body>
<h3> CONFIRM THE DETAILS ENTERED </h3>
<form action="actn1_db.php" method="post">
<table align="center" cellpadding="10" width="40%" height="200">
<tr>
<td class="required">FIRST NAME: </td>
<td><input type="text" name="fname" value="<?php echo $fname?>" readonly="readonly"></td>
</tr>

<tr>
<td class="required">LAST NAME: </td>
<td><input type="text" name="lname" value="<?php echo $lname?>" readonly="readonly">
</td>
</tr/>

<tr>
<td class="required">DOB[YYYY-MM-DD]:</td>
<td>
<input type="date" name="dob" value="<?php echo $DOB?>" readonly="readonly"> 
</td>
</tr>

<tr>
<td class="required">EMAIL_ID:</td>
<td>
<input type="email" name="mail" value="<?php echo $Mail?>" readonly="readonly">
</td>
</tr>

<tr>
<td class="required">CONTACT_NO:</td>
<td>
<input type="tel" name="phn_no" value="<?php echo $phn_no?>" readonly="readonly">
</td>
</tr>

<tr>
<td class="required">GENDER:</td>
<td>
<input type="radio" name="gender" value="Female" <?php if($Gender == "Female") { echo 'checked="checked"';} ?>" readonly="readonly">Female
<input type="radio" name="gender" value="Male" <?php if($Gender == "Male") { echo 'checked="checked"';} ?>" readonly="readonly"> Male
</td>
</tr>

<tr>
<td class="required">ADDRESS:</td>
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
<td class="required">STATES: </td>
<td>
<input type = "text" name="state" value="<?php echo $state?>" readonly="readonly">
</td>
</tr>


<tr>
<td class="required">PINCODE:</td>
<td>
<input type="text" name="pincode" value="<?php echo $pin?>" readonly="readonly">
</td>
</tr>

<tr>
<td class = "required"> DEPARTMENT: </td>
<td>
<input type="text" name="dept" value="<?php echo $dept?>" readonly="readonly">
</td>
</tr>

<input type="hidden" name="fname" value="<?php echo $fname?>">
<input type="hidden" name="lname" value="<?php echo $lname?>">

<input type="hidden" name="address" value="<?php echo $hname?>">
<input type="hidden" name="city" value="<?php echo $city?>">
<input type="hidden" name="state" value="<?php echo $state?>">
<input type="hidden" name="pincode" value="<?php echo $pin?>">

<input type="hidden" name="gender" value="<?php echo $Gender?>">
<input type="hidden" name="mail" value="<?php echo $Mail?>">

<input type="hidden" name="phn_no" value="<?php echo $phn_no?>">
<input type="hidden" name="dept" value="<?php echo $dept?>">

<br/><br/>
<tr>
<td colspan="2" align="center">
<input type="submit" name="confirm" value="Submit">
<input type="button" name="return" value="Return to data" onClick="javascript: window.history.back(-1)";>
</td>
</tr>
</table>
</form>
</body>
</html>