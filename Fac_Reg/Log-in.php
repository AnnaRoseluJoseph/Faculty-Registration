<!DOCTYPE html>

<html>

<head>
<title> Log-in Page </title>
<style>
a:link    {color:#000000; background-color:transparent; text-decoration:none}
a:visited {color:#000000; background-color:transparent; text-decoration:none}
a:hover   {color:#ff0000; background-color:transparent; text-decoration:underline}
a:active  {color:#ff0000; background-color:transparent; text-decoration:underline}
    
</style>

<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">

<script type="text/javascript">
function validate()
{
	if(log_form.u_id.value == "") 
	{
      alert("Error: Username cannot be blank!");
      log_form.u_id.focus();
      return false;
    }
	if(log_form.pwd.value == "") 
	{
      alert("Error: ENTER YOUR PASSWORD!");
      log_form.pwd.focus();
      return false;
    }
	return true;
}
</script>
	

</head>

<body>

<form class="box login" name="log_form" method="post" action="login_db.php" onsubmit="return validate()" >
<fieldset class="boxBody">
<label>User Name: <br/></label>
<input type="text" name="u_id" placeholder="User_id">

<label>Password: <br/></label>
<input type="password" name="pwd" placeholder="Password">
<br/>
<input type="submit" class="btnLogin" name="Login" value="Login">

<label><a style="color:#8B4500" href="frgt_pwd.php">Forgot Password </a>
</fieldset>
</form>
</body>

</html>
