<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<title> Change Password </title>

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
 

</style>

<script>
function pwdvalidate()
{	
     if(!pwd_form.pwd.value) 
	 {
        alert("Error: ENTER THE CURRENT PASSWORD!");
        pwd_form.pwd.focus();
        return false;
      }
     if(pwd_form.npwd.value != pwd_form.cnpwd.value) 
	 {
        alert("Error: PASSWORDS MUST BE SAME!");
        pwd_form.cnpwd.focus();
        return false;
      }
	  
    if(pwd_form.npwd.value != "" && pwd_form.npwd.value == pwd_form.cnpwd.value) 
	{
      if(pwd_form.npwd.value.length < 6) 
	  {
        alert("Error: PASSWORD MUST CONTAIN ATLEAST SIX CHARACTERS!");
        pwd_form.npwd.focus();
        return false;
      }
       
	  }
	  }
  </script>
  
</head>
<?php
$ID = $_SESSION['id'];
$F_NAME = $_SESSION['F_NAME'];
?>
<body>
<h3> CHANGE YOUR PASSWORD </h3>
<form action="pwdchange_db.php" method="post" name="pwd_form" onsubmit="return pwdvalidate()">
<table align="center" cellpadding="10" width="40%" height="200">

<tr>
<td> CURRENT PASSWORD: </td>
<td><input type="password" name="pwd" placeholder="Current Password"  required="required"></td>
</tr>
<br/>

<td> NEW_PASSWORD: </td>
<td><input type="password" name="npwd" placeholder="New Password"  required="required"></td>
</tr>
<br/>
<tr>
<td> CONFIRM NEW_PASSWORD: </td>
<td><input type="password" name="cnpwd" placeholder="Re-enter New Password" ></td>
</tr>
<br/>
<tr>
<td colspan="2" align="center">
<input type="submit" name="Submit" value="Submit">
<input type="button" name="return" value="Cancel" onClick="javascript: window.history.back(-1)";>
</td>
</tr>
</table>
</form>
</body>
</html>