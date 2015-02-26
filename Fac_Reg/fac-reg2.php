<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
<title> Registration Form </title>
</head>
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

<script type="text/javascript">
function checklid()
{
	if(ed_form.u_name.value == "") 
	{
      alert("Error: USERNAME CANT BE BLANK!");
      ed_form.u_name.focus();
      return false;
    }
	
    re = /^\w+$/;
    if(!re.test(ed_form.u_name.value)) {
      alert("Error: Username must contain only LETTERS, NUMBERS and UNDERSCORES!");
      ed_form.u_name.focus();
      return false;
    }
	
     if(ed_form.pwd.value != ed_form.repwd.value) 
	 {
        alert("Error: PASSWORDS MUST BE SAME!");
        ed_form.repwd.focus();
        return false;
      }
	  
    if(ed_form.pwd.value != "" && ed_form.pwd.value == ed_form.repwd.value) 
	{
      if(ed_form.pwd.value.length < 6) 
	  {
        alert("Error: PASSWORD MUST CONTAIN ATLEAST SIX CHARACTERS!");
        ed_form.pwd.focus();
        return false;
      }
	  
      if(ed_form.pwd.value == ed_form.u_name.value) 
	  {
        alert("Error: PASSWORD MUST BE DIFFERENT FROM USEERNAME!");
        ed_form.pwd.focus();
        return false;
      }
	  
	  }
	  }
  </script>
  
  <?php
  $id=$_POST['id'];
  $last_id = $_SESSION['id'];
  $_SESSION['id'] = $id;
  ?>

<body>
<h3> EDUCATIONAL QUALIFICATIONS </h3>
<form action="confirm2.php" method="post" name="ed_form" onsubmit="return checklid()">
<table align="center" cellpadding="10" width="90%" height="250">
<tr>
<td> FACULTY ID NUMBER:</td>
<td><input type="text" name="fid" value="<?php echo $id ?>" readonly="readonly"></td>
</tr>
<tr>
<td> ACADEMIC: </td>
<td><table>
<tr>
<td>Doctoral Programme: </td>
<td><input type="text" name="d_course" placeholder="Course"></td>
<td><input type="text" name="d_college" placeholder="School/College/University"></td>
<td><input type="number" name="d_yop" placeholder="YYYY of passing" min="1990"></td>
<td><input type="number" name="d_agg" placeholder="% in Aggregate" min="40"></td>
</tr>
<br/>
<tr>
<td class="required">Post Graduation: </td>
<td><input type="text" name="p_course" placeholder="Course" required="required"></td>
<td><input type="text" name="p_college" placeholder="School/College/University" required="required"></td>
<td><input type="number" name="p_yop" placeholder="YYYY of passing" min="1990" required="required"></td>
<td><input type="number" name="p_agg" placeholder="% in Aggregate" min="40" required="required"></td>
</tr>
<br/>
<tr>
<td class="required">Graduation: </td>
<td><input type="text" name="g_course" placeholder="Course" required="required"></td>
<td><input type="text" name="g_college" placeholder="School/College/University" required="required"></td>
<td><input type="number" name="g_yop" placeholder="YYYY of passing" min="1990" required="required"></td>
<td><input type="number" name="g_agg" placeholder="% in Aggregate" min="40" required="required"></td>
</tr>
<br/>
<tr>
<td class="required">10+2: </td>
<td><input type="text" name="t_course" placeholder="Course" required="required"></td>
<td><input type="text" name="t_college" placeholder="School/College/University" required="required"></td>
<td><input type="number" name="t_yop" placeholder="YYYY of passing" min="1990" required="required"></td>
<td><input type="number" name="t_agg" placeholder="% in Aggregate" min="40" required="required"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td row span="2" > WORK EXPERIENCE </td>
<tr>
<script type="text/javascript">
function updatesum() 
{
document.ed_form.t_exp.value = (document.ed_form.acd_exp.value -0) + (document.ed_form.prof_exp.value -0);
}
</script>
<tr>
<td> Academic Experience:</td> 
<td><input type="number" name="acd_exp" placeholder="Total Academic exp" min="0" onChange="updatesum()"></td>
</tr>
<tr>
<td>Professional Experience:</td>
<td><input type="number" name="prof_exp" placeholder="Total Professional exp" min="0" onChange="updatesum()"></td>
</tr>
<tr>
<td>Total Work Experience :</td>
<td><input type="number" name="t_exp" placeholder="Academic + Professional xperience" min="0"></td>
</tr> 
 <tr>
 <td> LOGIN DETAILS</td>
 </tr>
	<tr>
	<td class="required">Preferred User Name:</td>
<td><input type="text" name="u_name" placeholder="Username" required="required"></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pwd" placeholder="Password" required="required"></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type="password" name="repwd" placeholder="Password" required="required"></td>
</tr>
<br/>
<tr>
<td> </td> <td col span="2"> <input type="submit" name="submit" value="Submit" align="center"></td>
</tr>
</table>
</form>
</body>
</html>


