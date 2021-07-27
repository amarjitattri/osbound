<?php

if ( isset($_POST["RemindPassword"]) )
{
	# Perform a simple dlookup
	
	# Get the Username and use it to get the Password and Email Address
	$username 				= trim($_POST["txtUsername"]);
	$sqlString 				= "SELECT `Password`, `Username` FROM `tblUsers` WHERE `Username` = '{$username}'";
	$rstUserValues 			= databaseQuery($conn, $sqlString, "SELECT");
	$rowUserValues 			= mysqli_fetch_assoc($rstUserValues);
	
	$password 				= $rowUserValues["Password"];	
	databaseFreeResource($rstUserValues);
	
	$reminderMessage 		= "Your password for logging on to the Workflow Management and Information System portal is {$password}";
	$fromEmail 				= "donotreply@osbondandtutt.co.uk";
	
	$headers 				= 'From: Osbond And Tutt <' . $fromEmail . '>' . "\r\n";
	$headers 		   	   .= "MIME-Version: 1.0" . "\r\n";

	//mail($username,"Workflow Management and Information System Password Reminder",$reminderMessage,$headers);

	$email 					= "donotreply@osbondandtutt.co.uk";
	include "header.php";
	echo "<section id='mainBodyLoggedIn'>";
		echo "<div class='standardDivsMessage'>";
		echo "<center>";
		echo "Your password has been sent to your following email address: <strong> {$username} </strong>";
		echo "<br />";
		echo "Please check the above email address for your password.";
		echo "<br /><br />";
		echo "<a href = 'index.php?u=1'>Please click here to go back to the Login Screen.</a><center>";
		echo "</center>";
		echo "</div>";
	echo "</section>";

	exit;
}


# Using $_POST Super Global Array, obtain the values sent by the user attempting to Login
$username 					= $_POST["txtUsername"];
$password 					= $_POST["txtPassword"];

# If Username OR Password are empty send a notification back to the user to try and Login again
if ($username == "" || $password == "")
{
	displayLoginError();
	exit;
}

# Get the required data from tblUsers for authorisation purposes
$sqlString 					= sprintf("SELECT * FROM `tblUsers` WHERE `Username` = '{$username}'");
$userResult 				= databaseQuery($conn, $sqlString, "SELECT");
$usersRow 					= mysqli_fetch_assoc($userResult);

# Check if the password is correct
if ($usersRow["Username"] && $usersRow["Password"] == $password) 	# password was correct
{
	# Set session to be authorised
	$_SESSION["LoggedIn"] 	= TRUE;

	# Get the UserID, FirstName, LastName, Username and Privilege
	$_SESSION["UserID"] 	= $usersRow["UserID"];
	$_SESSION["Firstname"] 	= $usersRow["Firstname"];
	$_SESSION["Lastname"] 	= $usersRow["Lastname"];
	$_SESSION["Username"] 	= $usersRow["Username"];
	$_SESSION["Privilege"] 	= $usersRow["Privilege"];
	
	# Display the header
	include "header.php";

?>
    <!-- This is where the body section starts -->
    <section id="mainBodyLoggedIn">
        <div class="standardDivsMessage">
            <p style="font-weight:bold;font-size:25px;text-align:center;margin-top:50px;">
                Welcome to Osbond and Tutt's Workflow Management and Information System.
            </p>
        </div>
    </section>
	<?php
}
else	# Username and Password were incorrect
{
	displayLoginError();
	exit;
}

# Free the result resource used to obtain clients information
databaseFreeResource($userResult);

?>

<?php
# Functions used with this page
function displayLoginError(){
		# Display Header
		include "header.php";
?>
		<!-- This is where the body section starts -->
            <section id="mainBodyLoggedIn">
                <div class="standardDivsMessage">
				<center><p style="color:#FF0000; font-weight:bold;"> There seems to be an authentication problem with the Login Details you provided !</p></center>
				<p style="font-weight: bold;"><center> <a href="index.php?u=1">Please enter your Login Credential correctly and try again. </a><center></p>
				</div>
            </section>
<?php

}
?>
