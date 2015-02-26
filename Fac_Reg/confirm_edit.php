<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Selecting MySQL Database</title>
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

$ID = $_SESSION['id'];
$user_id = $_SESSION['user_id'];
$F_NAME = $_SESSION['F_NAME'];
$Counter = 0;
$Counter1 = 0;

$conn = mysqli_connect("localhost","root", "lion");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "PLEASE TRY LATER";
  }
//echo 'Connected successfully';
//echo "<br/>";

 
mysqli_select_db($conn,"db2");
if(isset($_POST['submit']))
{
	$sqle = "select * from LOGIN where F_ID = '$ID'";
    $resulte = mysqli_query($conn, $sqle); 
    $rowe = mysqli_fetch_row($resulte);
	$u_id = $rowe[1];
	if($user_id == $u_id)
	{
		$check_usere = mysqli_num_rows($resulte);
		if($check_usere == 1)
		{
		
			$sql1e = "UPDATE FACULTY SET F_NAME = '$fname',L_NAME = '$lname',H_NAME = '$hname',CITY = '$city',STATE = '$state',PINCODE = '$pin',MAIL = '$Mail',PHN_NUMBER = '$phn_no' WHERE F_ID = '$ID'";
			$resultte = mysqli_query($conn, $sql1e);
			if(! $resultte)
			{
			die('Could not update data :' .mysqli_error());
			}
			else
			{ 
		        $sqlu = "select * from LOGIN where F_ID = '$ID'";
				$resultu = mysqli_query($conn, $sqlu); 
				$rowu = mysqli_fetch_row($resultu);
				$u_id = $rowu[1];
				if($user_id == $u_id)
				{
					$check_useru = mysqli_num_rows($resultu);
					if($check_useru == 1)
					{
					
						$sql1u = "UPDATE F_EDU SET D_COURSE = '$D_COURSE',D_COLLEGE = '$D_COLLEGE', D_YOP = '$D_YOP',D_AGG = '$D_MARK',P_COURSE = '$P_COURSE', P_COLLEGE ='$P_COLLEGE', P_YOP = '$P_YOP',P_AGG = '$P_MARK',G_COURSE = '$G_COURSE', G_COLLEGE = '$G_COLLEGE', G_YOP = '$G_YOP',G_AGG = '$G_MARK',T_COURSE = '$T_COURSE', T_COLLEGE = '$T_COLLEGE', T_YOP = '$T_YOP',T_AGG = '$T_MARK', A_EXP = '$AC_EXP',P_EXP = '$PR_EXP',T_EXP = '$T_EXP' WHERE F_ID = '$ID'";
						$resulttu = mysqli_query($conn, $sql1u);
						if(! $resulttu)
						{
						die('Could not update data :' .mysqli_error());
						}  
                        else						
						{ 
                         echo "<script>alert('Updated Successfully!!!')
				               window.location = 'my_page.php';
				               </script>";
						}
                
                }
		        }
	        }
	
        }
	}
	
}
mysqli_close($conn);

?>
</body>
</html>