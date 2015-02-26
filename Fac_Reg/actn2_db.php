<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Educational Details</title>
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


$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
echo 'Connected successfully';
echo "<br/>";

 
mysqli_select_db($conn,"db2");
echo "Connected to database ";
echo "<br/>";
echo "<br/>";

$sql = "INSERT INTO F_EDU (F_ID,D_COURSE,D_COLLEGE,D_YOP,D_AGG,P_COURSE,P_COLLEGE,P_YOP,P_AGG,G_COURSE,G_COLLEGE,G_YOP,G_AGG,T_COURSE,T_COLLEGE,T_YOP,T_AGG,A_EXP,P_EXP,T_EXP) 
VALUES ('$F_ID','$D_COURSE','$D_COLLEGE','$D_YOP','$D_MARK','$P_COURSE','$P_COLLEGE','$P_YOP','$P_MARK','$G_COURSE','$G_COLLEGE','$G_YOP','$G_MARK','$T_COURSE','$T_COLLEGE','$T_YOP','$T_MARK','$AC_EXP','$PR_EXP','$T_EXP')";


if (mysqli_query($conn, $sql)) 
{
   echo "New record created successfully";	
	} 

else 
{
    echo "TRY AGAIN..!";
}
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
}
$string = $PWD;
$PASS = "";

for($i=0;$i<strlen($string);$i++)
{
	$ans = ord($string[$i]);
	
	$key = ($ans + 10)%93;
	
	$keyval = $key + 33;
	
	$char = chr($keyval);
	
	$PASS .=$char;
}


if($id == $F_ID)

$sqll = "INSERT INTO LOGIN (F_ID,U_NAME,PWD) VALUES ('$F_ID','$USER_NAME','$PASS')";

if (mysqli_query($conn, $sqll))
{	
  header('location: register_succes.php');		
}
else
{	
  header('location: fac_reg1.php');
}
	
mysqli_close($conn);
?>
</body>
</html>
