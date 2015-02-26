<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<title>CHANGE PASSWORD</title>
</head>

<body>

	<?php
	$error='';
	$user_id = $_SESSION['user_id'];
	$currentpwd = $_POST['pwd'];
	$newpwd = $_POST['npwd'];
	$cnewpwd = $_POST['cnpwd'];
	$ID = $_SESSION['id'];
	$strg = "";

	$string = $currentpwd;
	echo $string.'<br/>';
	echo $newpwd.'<br/>';
	echo $cnewpwd.'<br/>';
	$str = "";

	for($i=0;$i<strlen($string);$i++)
	{
		$ans = ord($string[$i]);
		//echo $ans;
		//echo '<br/>';
		$key = ($ans + 10)%93;
		//echo $key;
		//echo '<br/>';
		$keyval = $key + 33;
		//echo $keyval;
		//echo '<br/>';
		$char = chr($keyval);
		//echo $char;
		//echo '<br/>';
		$str .=$char;
	}
	//echo '<br/>';
	//echo $str;


	$conn = mysqli_connect("localhost","root", "lion");
	if (mysqli_connect_errno())
	  {
		echo "Failed to connect to Database: " . mysqli_connect_error();
		echo "PLEASE TRY LATER";
	  }
	  
	 mysqli_select_db($conn,"db2");
	 if(isset($_POST['Submit']))
	{	
		$sql = "select * from LOGIN where F_ID = '$ID'";
		$result = mysqli_query($conn, $sql); 
		$row = mysqli_fetch_row($result);
		$pwd = $row[2];
		$check_user = mysqli_num_rows($result);
	    if($check_user == 1)
	    {
	      if(($pwd == $str) OR ($pwd == $currentpwd))
		  { 
			if($newpwd = $cnewpwd)
			{
			$string = $newpwd;
			$str = "";
			//Encrypting the New Password:

			for($i=0;$i<strlen($string);$i++)
			{
				$ans = ord($string[$i]);
				//echo $ans;
				//echo '<br/>';
				$key = ($ans + 10)%93;
				//echo $key;
				//echo '<br/>';
				$keyval = $key + 33;
				//echo $keyval;
				//echo '<br/>';
				$char = chr($keyval);
				//echo $char;
				//echo '<br/>';
				$strg .=$char;
			}
			//echo '<br/>';
			//echo $strg;
				
			$sql1 = "UPDATE LOGIN SET PWD = '$strg' WHERE F_ID = '$ID'";
			$resultt = mysqli_query($conn, $sql1);
			if(! $resultt)
			{
				
			 echo "<script>alert('Password NOT Updated!!!')
						   window.location = 'change_pwd.php';
						   </script>";
			}
			else
			{     
			 echo "<script>alert('Password Updated!!!')
						   window.location = 'my_page.php';
						   </script>";             
								
			}
			}
		   }
	    }
	 }
	mysqli_close($conn);
	?>
	</body>
	</html>