<!DOCTYPE HTML>
<html>

<head>
<title> Registration Form </title>
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
<script type="text/javascript">
    function formValidation()  
    {  
    var fname = document.pd_form.fname;  
    var lname = document.pd_form.lname;  
    var uzip = document.pd_form.pincode;  
    var uemail = document.pd_form.mail; 
    var unum = document.pd_form.phn_no;	
    
    if(allLetter(fname))  
    {  
	  if(allLetter(lname)) 
	  {		
		if(allnumeric(uzip))  
		{ 
		 if(allnumeric(unum))  
		 {  
		  if(ValidateEmail(uemail))  
		  {}		     
         }  
        }   
       }  
     }      
    
    }  
	   
  
	    function allLetter(uname)  
		 {   
		  var letters = /^[A-Za-z\s]+$/;  
		  if(uname.value.match(letters))  
		  {  
		   return true;  
		  }  
		 else  
		 {  
		  alert('Username must have alphabet characters only');  
		  uname.focus();  
		  return false;  
		 }  
		} 
		
    function allnumeric(uzip)  
    {   
     var numbers = /^[0-9]+$/;  
     if(uzip.value.match(numbers))  
     {  
      return true;  
     }  
     else  
     {  
      alert('ZIP code must have numeric characters only');  
      uzip.focus();  
     return false;  
    }  
    }  
		function ValidateEmail(uemail)  
		{  
		 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		 if(uemail.value.match(mailformat))  
		 {  
		  return true;  
		 }  
		else  
		{  
		 alert("You have entered an invalid email address!");  
		 uemail.focus();  
		 return false;  
		}  
       }  
	    
	</script>
	


</head>

<body>
<h3> FACULTY REGISTRATION FORM </h3>
<form action="confirm.php" method="post" name="pd_form" onsubmit="return formValidation()">
<table align="center" cellpadding="10" width="40%" height="200">
<tr>
<td class="required"> FIRST NAME: </td>
<td><input type="text" name="fname" placeholder="First Name"  required="required"></td>
</tr>

<tr>
<td  class="required">LAST NAME: </td>
<td><input type="text" name="lname" placeholder="Last Name" ></td>
</tr>

<tr>
<td  class="required">DOB[YYYY-MM-DD]:</td>
<td><input type="date" name="dob" placeholder="yyyy-mm-dd"  required="required"> </td>
</tr>

<tr>
<td  class="required">EMAIL_ID:</td>
<td><input type="email" name="mail" placeholder="Valid Email Address"  required="required"></td>
</tr>

<tr>
<td  class="required">CONTACT_NO:</td>
<td><input type="tel" name="phn_no" placeholder="Contact Number"  required="required"></td>
</tr>

<tr>
<td  class="required">GENDER:</td>
<td>
Female <input type="radio" name="gender" value="Female"/>
Male <input type="radio" name="gender" value="Male"/> 
</td>
</tr>
<?php
if (isset($_POST['gender']))
{
	
	echo " selected:".$_POST['gender'];
}
?>


<tr>
<td  class="required">ADDRESS:</td>
<td><input type="text" name="address" required="required"  placeholder="House number"></td>
</tr>

<tr>
<td>CITY: </td>
<td><input type="text" name="city" placeholder="City" ><br></td>
</tr>

<tr>
<td  class="required">STATES: </td>
<td><input list="states" name="state" required="required"  placeholder="State">
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
<td class = "required"> DEPARTMENT: </td>
<td><input list="depts" name="dept" required="required"  placeholder="Department">
<datalist id="depts">
  <option value="CE">
  <option value="CS">
  <option value="EC">
  <option value="EE">
  <option value="ME">
  </datalist>
  </td>
  </tr>
  
  
<tr>
<td  class="required">PINCODE:</td>
<td><input type="text" name="pincode" placeholder="Pincode"></td>
</tr>
<br/>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Continue"></td>
</tr>
</table>


</form>
</body>
</html>