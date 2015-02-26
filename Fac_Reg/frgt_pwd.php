<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<title> Forgot Password </title>

<style>

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
<SCRIPT language="JavaScript" >
<!--  
function Validate()
{
    // If email field is null it will show an error.
    if ( fpwd_form.email_id.value == "")
    {
        alert( "Please enter a Email ID for the field." );
        fpwd_form.email_id.focus();
        return ( false );
    }

    if ( fpwd_form.email_id.value.length < 5)
    {
        alert( "Please enter a valid Email ID in the field.");
        fpwd_form.email_id.focus();
        return ( false );
    }

    var check_at = "@"; // '@' character to be checked in Email ID. Either its present or not. If its present we will check other condition. Else it a invalid ID.

    var check_dot = "." // to check '.' (dot)character in the host name. 
    var checkStr = fpwd_form.email_id.value;
    var allValid = false; // this is use to check whether all condition is true or not. If all condition evaluate true then this will turns to true and our form will be forwarded to next page.

    for (i = 0;  i < checkStr.length;  i++)
    {
        ch_at = checkStr.charAt(i);

        // Here checking for all in valid character. I am checking '~' , '`' , '!' , '#' character as invalid character for an Email ID field. If we found any if this character in my email id, we just need to truncate the loop any making allValids = false. 
        if(ch_at == '~' || ch_at == '`' || ch_at == '!' || ch_at == '#')
        {
            allValid = false;
            break;
        }

        if (ch_at == check_at) // checking for '@' character in ID.
        {
            for (j = i+2; j < checkStr.length; j++) // if found '@' character then the we must check for '.' (dot) character. It will be at more than +2 position after finding the '@' character. 
            {
                ch_dot = checkStr.charAt(j);

                if (ch_dot == check_dot && checkStr.charAt(j+1) != "") // after finding '.' (dot) character there must be one character so it is checked by checkStr.charAt(j+1) function.
                {
                    allValid = true;
                    break;
                }
            }
        }
    }

    if (!allValid) // if allValid fails then it will show a alert message.
    {
        alert("Please enter a valid Email ID for field.");
        fpwd_form.email_id.focus();
        return (false);
    }
    else // if allvalid is not false then it will forward the information to next page.
    {
        return(true);
    }

}
-->
</SCRIPT>
</head>

<body>
<form action="forgotpwd_db.php" method="post" name="fpwd_form" onsubmit="return Validate()">
<table align="center" cellpadding="10" width="40%" height="200">

<tr>
<td> ENTER YOUR EMAIL-ID: </td>
<td><input type="email" name="email_id" placeholder="email address"  required="required"></td>
</tr>
<br/>

<tr>
<td colspan="2" align="center">
<input type="submit" name="Submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
</html>