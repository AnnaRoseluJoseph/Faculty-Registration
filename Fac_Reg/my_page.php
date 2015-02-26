<?php
session_start();
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>Profile Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
</head>
<body>
<?php
	
	$F_NAME1 = $_SESSION['F_NAME1'];
	$F_NAME2 = $_SESSION['F_NAME2'];
	$F_NAME = $F_NAME1." ".$F_NAME2;
	$_SESSION['F_NAME'] = $F_NAME;
	$ID = $_SESSION['id'];
	$user_id = $_SESSION['user_id'];
	$_SESSION['id'] = $ID;
	if(isset($_SESSION['user_id']))
	{
		?>
		
		
		<div id="wrapper">
		  <div class="title">
			<div class="title-top">
			  <div class="title-left">
				<div class="title-right">
				  <div class="title-bottom">
					<div class="title-top-left">
					  <div class="title-bottom-left">
						<div class="title-top-right">
						  <div class="title-bottom-right">
							<h1> WELCOME <span> <?php echo $F_NAME; ?> </span> </h1>
																					
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
      <?php
    }
      ?>

  <hr class="noscreen" />
  <div class="content">
    <div class="column-left">
      
      <fieldset>
      <ul class="menu">
        <li><a href="view_pd.php">PERSONAL PROFILE</a></li>
        <li><a href="view_ad.php">ACADEMIC PROFILE</a></li>
        <li><a href="student.php"> STUDENT DETAILS</a></li>
		<li><a href="timetable.php"> VIEW TIMETABLE</a></li>
		<li><a href="faculty_list.php"> FACULTY LIST</a></li>
        <li class="last"><a href="Logout.php">LOGOUT</a></li>
      </ul>
	  </fieldset>
    </div>
   
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div class="box-in">
          <h2>  </h2>
          <p></p>
          <p></p>
          <br />
          <h2>EDIT YOUR DETAILS HERE</h2>
          <ul class="main-list">
            <li><a href="edit_details.php"><strong>EDIT DETAILS</strong></a></li>
			<li><a href="change_pwd.php"><strong> CHANGE PASSWORD</strong></a></li>
			        
          </ul>
        </div>
      </div>
      </body>
      </html>
