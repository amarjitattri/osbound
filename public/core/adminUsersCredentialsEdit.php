<section id = "mainBodyLogin">

<?php

	# Get the UserID
	$userID = $_GET["UID"];
	$formName = $_GET["FormName"];		# The FormName index is used to determine what values to obtain for updating

	switch ($formName)
	{
		case "updateDeleteUsersCredentials":

			# Perform action based on the type of Submit button that has been clicked
			# Updates Users and Credentials
			if ( isset($_POST["submitUpdateUserCredential"]) )
			{
				# Get User Details
				$firstName 		= mysqli_real_escape_string( $conn, $_POST["txtFirstnameUD"] 					);
				$lastName  		= mysqli_real_escape_string( $conn, $_POST["txtLastnameUD"] 					);
				$userName  		= mysqli_real_escape_string( $conn, $_POST["txtUsernameUD"] 					);
				$password  		= mysqli_real_escape_string( $conn, $_POST["txtPasswordUD"] 					);
				$privilege 		= mysqli_real_escape_string( $conn, $_POST["txtPrivilegeUD"] 					);
			
				# Perform an UPDATE using the UserID obtained
				$sqlString = "UPDATE `tblUsers` SET "
						   . "`Firstname` = '{$firstName}', "
						   . "`Lastname` = '{$lastName}', "
						   . "`Username` = '{$userName}', "
						   . "`Password` = '{$password}', "
						   //. "`HashedPassword` = '{$hashedPassword}', "
						   . "`Privilege` = '{$privilege}' "
						   . "WHERE `UserID` = {$userID}";
				$updateStatus = databaseQuery($conn, $sqlString, "UPDATE");
			}
			
			# Deletes Users and Credentials
			if ( isset($_POST["submitDeleteUserCredential"]) )
			{
				# Perform a DELETE using the UserID obtained
				$sqlString = "DELETE FROM `tblUsers` WHERE `UserID` = {$userID}";
				$deleteStatus = databaseQuery($conn, $sqlString, "DELETE");
			}
			

		
			break;
			
		case "addUsersCredentials":

			# Get User Details
			$firstName 		= mysqli_real_escape_string( $conn, $_POST["txtFirstnameADD"] 					);
			$lastName  		= mysqli_real_escape_string( $conn, $_POST["txtLastnameADD"] 					);
			$userName  		= mysqli_real_escape_string( $conn, $_POST["txtUsernameADD"] 					);
			$password  		= mysqli_real_escape_string( $conn, $_POST["txtPasswordADD"] 					);
			$privilege 		= mysqli_real_escape_string( $conn, $_POST["txtPrivilegeAdd"] 					);
		
			# Perform an INSERT using the EmployeeID obtained
			$sqlString = "INSERT INTO `tblUsers` "
					   . "(`Firstname`, `Lastname`, `Username`, `Password`, `Privilege`) "
					   . "VALUES "
					   . "('{$firstName}','{$lastName}','{$userName}','{$password}','{$privilege}')";
			$insertStatus = databaseQuery($conn, $sqlString, "INSERT");

			break;
	}

# Take user directly to the Users and Credentials page
$path = rawurlencode("index.php");
$queryString = "?u=201"; 
$urlLink = $path . $queryString;
die("<script>location.href = '{$urlLink}'</script>");
exit();

?>
</section>