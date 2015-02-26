<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<title> Edit Details </title>
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
  
  $sqls = "SELECT * FROM FACULTY WHERE F_ID = '$ID'";
  $results = mysqli_query($conn, $sqls);
  $rows = mysqli_fetch_assoc($results);
   if (mysqli_num_rows($results) == 1) 
   {
    $fname = $rows['F_NAME'];
    $lname = $rows['L_NAME'];

    $hname = $rows['H_NAME'];
    $city = $rows['CITY'];
    $state = $rows['STATE'];
    $pin = $rows['PINCODE'];

    $Gender = $rows['GENDER'];
    $DOB = $rows['DOB'];
    $Mail = $rows['MAIL'];
    $phn_no = $rows['PHN_NUMBER'];
   }
   
   
  $sqls1 = "SELECT * FROM F_EDU WHERE F_ID = '$ID'";
  $results1 = mysqli_query($conn, $sqls1);
  $rows1 = mysqli_fetch_assoc($results1);
   if (mysqli_num_rows($results1) == 1) 
   {
		$F_ID = $rows1['F_ID'];
		$D_COURSE = $rows1['D_COURSE'];
		$D_COLLEGE = $rows1['D_COLLEGE'];
		$D_YOP = $rows1['D_YOP'];
		$D_MARK = $rows1['D_AGG'];

		$P_COURSE = $rows1['P_COURSE'];
		$P_COLLEGE = $rows1['P_COLLEGE'];
		$P_YOP = $rows1['P_YOP'];
		$P_MARK = $rows1['P_AGG'];


		$G_COURSE = $rows1['G_COURSE'];
		$G_COLLEGE = $rows1['G_COLLEGE'];
		$G_YOP = $rows1['G_YOP'];
		$G_MARK = $rows1['G_AGG'];


		$T_COURSE = $rows1['T_COURSE'];
		$T_COLLEGE = $rows1['T_COLLEGE'];
		$T_YOP = $rows1['T_YOP'];
		$T_MARK = $rows1['T_AGG'];

		$AC_EXP = $rows1['A_EXP'];
		$PR_EXP = $rows1['P_EXP'];
		$T_EXP = $rows1['T_EXP'];
   }
   ?>
   
    <body>
	<form action="confirm_edit.php" method="post" name="ped_form" onsubmit="return validate()">
	<table align="center" cellpadding="10" width="80%" height="230">
	    <tr>
		<td> FACULTY ID NUMBER:</td>
		<td><input type="text" name="fid" value="<?php echo $F_ID?>" readonly="readonly"><td>
		</tr>
		
		<tr>
		<td class="required">FIRST NAME: </td>
		<td><input type="text" name="fname" value="<?php echo $fname?>" required="required"></td>
		</tr>

		<tr>
		<td class="required">LAST NAME: </td>
		<td><input type="text" name="lname" value="<?php echo $lname?>" >
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
		<input type="tel" name="phn_no" value="<?php echo $phn_no?>" required="required">
		</td>
		</tr>

		<tr>
		<td class="required">GENDER:</td>
		<td>
		<input type="radio" name="gender" value="Female" <?php if($Gender == "Female") { echo 'checked="checked"';} ?>" readonly="readonly" >Female
		<input type="radio" name="gender" value="Male" <?php if($Gender == "Male") { echo 'checked="checked"';} ?>" readonly="readonly"> Male
		</td>
		</tr>

		<tr>
		<td class="required">ADDRESS:<br/></td>
		<td>
		<input type="text" name="address" value="<?php echo $hname?>" required="required" >
		</td>
		</tr>

		<tr>
		<td>CITY: </td>
		<td>
		<input type="text" name="city" value="<?php echo $city?>" required="required" >
		</td>
		</tr>

		<tr>
		<td class="required">STATES: </td>
		<td>
		<input list = "states" name="state" value="<?php echo $state?>" required="required">
		<datalist id="states">
		  <option value="Andhra Pradesh">
		  <option value="Arunachal Pradesh">
		  <option value="Assam">
		  <option value="Chattisgarh">
		  <option value="Goa">
		  <option value="Gujarat">
		  <option value="Haryana">
		  <option value="Jammu & Kashmir">
		  <option value="Jharkhand">
		  <option value="Karnataka">
		  <option value="Kerala">
		  <option value="Madhya Pradesh">
		  <option value="Maharashtra">
		  <option value="Manipur">
		  <option value="Mehalaya">
		  <option value="Mizoram">
		  <option value="Nagaland">
		  <option value="Odisha(Orissa)">
		  <option value="Punjab">
		  <option value="Rajastan">
		  <option value="Sikkim">
		  <option value="Tamil Nadu">
		  <option value="Telangana">
		  <option value="Tripura">
		  <option value="Uttar Pradesh">
		  <option value="Uttarakhand">
		  <option value="West Bengal">  
		</datalist>
		</td>
		</tr>


		<tr>
		<td class="required">PINCODE:</td>
		<td>
		<input type="number" name="pincode" value="<?php echo $pin?>" >
		</td>
		</tr>
		
		
		<tr>
		<td> ACADEMIC: </td>
		<td><table width="100%">
		<tr>
		<td>Doctoral Programme: </td>
		<td><input type="text" name="d_course" value="<?php echo $D_COURSE?>" ></td>
		<td><input type="text" name="d_college" value="<?php echo $D_COLLEGE?>" ></td>
		<td><input type="number" name="d_yop" value="<?php echo $D_YOP?>" ></td>
		<td><input type="number" name="d_agg" value="<?php echo $D_MARK?>" ></td>
		</tr>
		<br/> 
		<tr>
		<td class="required">Post Graduation: </td>
		<td><input type="text" name="p_course" value="<?php echo $P_COURSE?>" ></td>
		<td><input type="text" name="p_college" value="<?php echo $P_COLLEGE?>" ></td>
		<td><input type="number" name="p_yop" value="<?php echo $P_YOP?>" ></td>
		<td><input type="number" name="p_agg" value="<?php echo $P_MARK?>" ></td>
		</tr>
		<br/> 
		<tr>
		<td class="required">Graduation: </td>
		<td><input type="text" name="g_course" value="<?php echo $G_COURSE?>" ></td>
		<td><input type="text" name="g_college" value="<?php echo $G_COLLEGE?>" ></td>
		<td><input type="number" name="g_yop" value="<?php echo $G_YOP?>" ></td>
		<td><input type="number" name="g_agg" value="<?php echo $G_MARK?>" ></td>
		</tr>
		<br/> 
		<tr>
		<td class="required">10+2: </td>
		<td><input type="text" name="t_course" value="<?php echo $T_COURSE?>" ></td>
		<td><input type="text" name="t_college" value="<?php echo $T_COLLEGE?>" ></td>
		<td><input type="number" name="t_yop" value="<?php echo $T_YOP?>" ></td>
		<td><input type="number" name="t_agg" value="<?php echo $T_MARK?>" ></td>
		</tr>
		</table>
		</td>
		</tr>
		
		<tr> 
		<td>WORK EXPERIENCE </td>
		</tr>
        
		<tr>
		<script type="text/javascript">
			function updatesum() 
			{
			document.ed_form.t_exp.value = (document.ed_form.acd_exp.value -0) + (document.ed_form.prof_exp.value -0);
			}
			</script>
		<td>Academic Experience    : </td>
		<td><input type="number" name="acd_exp" value="<?php echo $AC_EXP?>" onChange="updatesum()"></td>
		</tr>
		<tr>
		<td>Professional Experience:</td>
		<td><input type="number" name="prof_exp" value="<?php echo $PR_EXP?>" onChange="updatesum()"></td>
		</tr>
		<tr>
		<td>Total Work Experience  :</td>
		<td><input type="number" name="t_exp" value="<?php echo $T_EXP?>" ></td>
		</tr>	
		
		<tr>
		<td colspan="2" align="center">
		<input type="submit" name="submit" value="Continue"></td>
		</tr>
		</table>
		
		</form>
		</body>
		</html>