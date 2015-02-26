<?php
session_start();
?>
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
background-color:  #dfdfdf;
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

$F_ID = $_POST['fid'];
$D_COURSE = $_POST['d_course'];
$D_COLLEGE = $_POST['d_college'];
$D_YOP = $_POST['d_yop'];
$D_MARK = $_POST['d_agg'];

$P_COURSE = $_POST['p_course'];
$P_COLLEGE = $_POST['p_college'];
$P_YOP = $_POST['p_yop'];
$P_MARK = $_POST['p_agg'];


$G_COURSE = $_POST['g_course'];
$G_COLLEGE = $_POST['g_college'];
$G_YOP = $_POST['g_yop'];
$G_MARK = $_POST['g_agg'];


$T_COURSE = $_POST['t_course'];
$T_COLLEGE = $_POST['t_college'];
$T_YOP = $_POST['t_yop'];
$T_MARK = $_POST['t_agg'];

$AC_EXP = $_POST['acd_exp'];
$PR_EXP = $_POST['prof_exp'];
$T_EXP = $_POST['t_exp'];

$USER_NAME = $_POST['u_name'];
$PWD = $_POST['pwd'];

$id = $_SESSION['id'];
$_SESSION['id'] = $id;
?>
<body>
<h3> EDUCATIONAL QUALIFICATIONS </h3>
<form action="actn2_db.php" method="post" name="ed_form" onsubmit="return checklid()">
<table align="center" cellpadding="10" width="90%" height="250">
<tr>
<td> FACULTY ID NUMBER:</td>
<td><input type="text" name="fid" value="<?php echo $F_ID?>" readonly="readonly"><td>
</tr>
<tr>
<td> ACADEMIC: </td>
<td><table>
<tr>
<td>Doctoral Programme: </td>
<td><input type="text" name="d_course" value="<?php echo $D_COURSE?>" readonly="readonly"></td>
<td><input type="text" name="d_college" value="<?php echo $D_COLLEGE?>" readonly="readonly"></td>
<td><input type="number" name="d_yop" value="<?php echo $D_YOP?>" readonly="readonly"></td>
<td><input type="number" name="d_agg" value="<?php echo $D_MARK?>" readonly="readonly"></td>
</tr>
<br/>
<tr>
<td class="required">Post Graduation: </td>
<td><input type="text" name="p_course" value="<?php echo $P_COURSE?>" readonly="readonly"></td>
<td><input type="text" name="p_college" value="<?php echo $P_COLLEGE?>" readonly="readonly"></td>
<td><input type="number" name="p_yop" value="<?php echo $P_YOP?>" readonly="readonly"></td>
<td><input type="number" name="p_agg" value="<?php echo $P_MARK?>" readonly="readonly"></td>
</tr>
<br/>
<tr>
<td class="required">Graduation: </td>
<td><input type="text" name="g_course" value="<?php echo $G_COURSE?>" readonly="readonly"></td>
<td><input type="text" name="g_college" value="<?php echo $G_COLLEGE?>" readonly="readonly"></td>
<td><input type="number" name="g_yop" value="<?php echo $G_YOP?>" readonly="readonly"></td>
<td><input type="number" name="g_agg" value="<?php echo $G_MARK?>" readonly="readonly"></td>
</tr>
<br/>
<tr>
<td class="required">10+2: </td>
<td><input type="text" name="t_course" value="<?php echo $T_COURSE?>" readonly="readonly"></td>
<td><input type="text" name="t_college" value="<?php echo $T_COLLEGE?>" readonly="readonly"></td>
<td><input type="number" name="t_yop" value="<?php echo $T_YOP?>" readonly="readonly"></td>
<td><input type="number" name="t_agg" value="<?php echo $T_MARK?>" readonly="readonly"></td>
</tr>
</table>
</td>
</tr>
<tr> 
<td>WORK EXPERIENCE </td>
</tr>

<tr>
<td>Academic Experience    : </td>
<td><input type="number" name="acd_exp" value="<?php echo $AC_EXP?>" readonly="readonly"></td>
</tr>
<tr>
<td>Professional Experience:</td>
<td><input type="number" name="prof_exp" value="<?php echo $PR_EXP?>" readonly="readonly"></td>
</tr>
<tr>
<td>Total Work Experience  :</td>
<td><input type="number" name="t_exp" value="<?php echo $T_EXP?>" readonly="readonly"></td>
</tr>

<tr>
<td> LOGIN DETAILS: </td>
</tr>
<tr>
<td class="required">User Name:</td>
<td><input type="text" name="u_name" value="<?php echo $USER_NAME?>" readonly="readonly"></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pwd" value="<?php echo $PWD?>" readonly="readonly"></td>
</tr>

<input type="hidden" name="fid" value="<?php echo $F_ID?>" >

<input type="hidden" name="d_course" value="<?php echo $D_COURSE?>" >
<input type="hidden" name="d_college" value="<?php echo $D_COLLEGE?>" >
<input type="hidden" name="d_yop" value="<?php echo $D_YOP?>" >
<input type="hidden" name="d_agg" value="<?php echo $D_MARK?>" >

<input type="hidden" name="p_course" value="<?php echo $P_COURSE?>" >
<input type="hidden" name="p_college" value="<?php echo $P_COLLEGE?>" >
<input type="hidden" name="p_yop" value="<?php echo $P_YOP?>" >
<input type="hidden" name="p_agg" value="<?php echo $P_MARK?>" >

<input type="hidden" name="g_course" value="<?php echo $G_COURSE?>" >
<input type="hidden" name="g_college" value="<?php echo $G_COLLEGE?>" >
<input type="hidden" name="g_yop" value="<?php echo $G_YOP?>" >
<input type="hidden" name="g_agg" value="<?php echo $G_MARK?>" >

<input type="hidden" name="t_course" value="<?php echo $T_COURSE?>" >
<input type="hidden" name="t_college" value="<?php echo $T_COLLEGE?>" >
<input type="hidden" name="t_yop" value="<?php echo $T_YOP?>" >
<input type="hidden" name="t_agg" value="<?php echo $T_MARK?>" >

<input type="hidden" name="acd_exp" value="<?php echo $AC_EXP?>">
<input type="hidden" name="prof_exp" value="<?php echo $PR_EXP?>">
<input type="hidden" name="t_exp" value="<?php echo $T_EXP?>">
<input type="hidden" name="u_name" value="<?php echo $USER_NAME?>">
<input type="hidden" name="pwd" value="<?php echo $PWD?>">

<br/><br/><br/>
<tr>
<td/>
<td col span="2"><input type="submit" name="Submit" value="Submit">
<input type="button" name="return" value="Return to data" onClick="javascript: window.history.back(-1)";></td>
</tr>
<table>
</form>
</body>
</html>