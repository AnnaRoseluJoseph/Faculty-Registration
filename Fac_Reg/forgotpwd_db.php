	<?php
	session_start();
	?>

<!DOCTYPE html>
<html>

<head>
</head>
<body>
	<?php
	
	ini_set('include_path','C:\wamp\PHPMailer');
	require("class.phpmailer.php");
	require("class.smtp.php");
	$mail = new PHPMailer();
	//$mail->SMTPDebug  = 3; 
	
	$email = $_POST['email_id'];
	$conn = mysqli_connect("localhost","root", "lion");
	if (mysqli_connect_errno())
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
		 
	mysqli_select_db($conn,"db2");
	$spwd = "SELECT F_ID, F_NAME, L_NAME FROM FACULTY WHERE MAIL = '$email'";
	$respwd = mysqli_query($conn, $spwd);
	$rows1 = mysqli_fetch_assoc($respwd);
	if (mysqli_num_rows($respwd) == 1) 
	 {   
        $f_id =  $rows1['F_ID'];
		$fname = $rows1['F_NAME'];
		$lname = $rows1['L_NAME'];
	 }
	 else
	 {
		 echo "Entry not found";
	 }
	 $name = $fname.$lname;
	$spwdd = "SELECT * FROM LOGIN WHERE F_ID = '$f_id'";
	$respwdd = 	mysqli_query($conn, $spwdd);
	$rows2 = mysqli_fetch_assoc($respwdd);
	if (mysqli_num_rows($respwdd) == 1) 
		{   
	        $fid =  $rows2['F_ID'];
			$uname = $rows2['U_NAME'];
			$pwd = $rows2['PWD'];
						     			
	$mail->isSMTP();	
    $mail->Mailer = "smtp";	
	$mail->Host = "ssl://smtp.gmail.com";  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	
	$mail->Username = 'reg.faculty@gmail.com';                 // SMTP username
	$mail->Password = 'facultyreg123';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;   
    $mail -> SingleTo = true; 	// TCP port to connect to

	$mail->From = 'reg.faculty@gmail.com';
	$mail->FromName = 'Faculty Registration Section';
	$mail->addAddress( $email, $uname);     // Add a recipient
	
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('annaroselu@gmail.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Forgot Password Request';
	$mail->Body    = 'Dear'.$name.'<br/><br/><br/>Your USERNAME is:'.$uname.'<br/> Password is: '. $pwd;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) 
    {
      echo 'Message could not be sent.<br/>';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
    else 
    {
    echo "<script>alert('Password has been sent to your Email Address!!!')
				       window.location = 'Log-in.php';
				       </script>";
	//echo "<h4><span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span></h4>";      
	}
    }
     
    
	        
	else
	{
	echo "<script>alert('Please Enter the MAIL -ID given at the time of REGISTRATION!!!')
				       window.location = 'Log-in.php';
				       </script>";
	//echo("no such in the system. please try again.");
	}
	
    mysqli_close($conn);
	?>
	</body>
	</html>
