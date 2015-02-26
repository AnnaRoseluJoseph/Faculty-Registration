<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<title>LOGIN DB</title>
</head>

<body>

<?php
$error='';
$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to Database: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
  
//echo 'Connected successfully';
//echo "<br/>";

mysqli_select_db($conn,"db2");
//echo 'Connected to db successfully';

if(isset($_POST['Login']))
{
	$user_id = mysqli_real_escape_string($conn,$_POST['u_id']);
	$pass = mysqli_real_escape_string($conn,$_POST['pwd']);
	echo $pass.'<br/>';
	
	$string = $pass;
    $str = "";

    for($i=0;$i<strlen($string);$i++)
{
	$ans = ord($string[$i]);
	echo $ans;
	//echo '<br/>';
	$key = ($ans + 10)%93;
	echo $key;
	//echo '<br/>';
	$keyval = $key + 33;
	echo $keyval;
	//echo '<br/>';
	$char = chr($keyval);
	echo $char;
	//echo '<br/>';
	$str .=$char;
}
//echo '<br/>';
echo $str;
$password = $str;
echo $password;


$sql = "select * from LOGIN where (U_NAME = '$user_id' AND PWD = '$password') OR (U_NAME = '$user_id' AND PWD = '$pass')";

$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_row($result);
$ID = $row[0];
$check_user = mysqli_num_rows($result);
	if($check_user == 1)
	{
		$_SESSION['user_id'] = $user_id;
		$_SESSION['id'] = $ID;
		
			}
	
    else 
    {
		echo "<script>alert('INVALID USERNAME OR PASSWORD!!!')
				       window.location = 'Log-in.php';
				       </script>";
		//echo "count is ".$check_user;
		//$error = "User Name or Password is Invalid";
		//header('Location: error.html');
		break;
     }
}
$sqll = "select * from FACULTY where F_ID = '$ID'";
$result1 = mysqli_query($conn, $sqll);
$row1 = mysqli_fetch_row($result1);
$User_name1 = $row1[1];
$User_name2 = $row1[2];
$_SESSION['F_NAME1'] = $User_name1;
$_SESSION['F_NAME2'] = $User_name2;
if(isset($_SESSION['user_id']))
{
	header('Location: my_page.php');
}

mysqli_close($conn);

?>
</body>
</html>