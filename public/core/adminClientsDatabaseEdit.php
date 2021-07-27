<section id = "mainBodyLogin">

<?php

	# Get the ClientID
	$clID 		= $_GET["CLID"];
	$formName 	= $_GET["FormName"];		# The FormName index is used to determine what values to obtain for updating

	switch ($formName)
	{
		case "updateDeleteClients":

			# Perform action based on the type of Submit button that has been clicked
			# Updates Clients
			if ( isset($_POST["submitUpdateClients"]) )
			{
				# Get Client Details
				$contactName 	= mysqli_real_escape_string( $conn, $_POST["txtContactNameUD"]	);
				$companyName  	= mysqli_real_escape_string( $conn, $_POST["cboCompaniesUD"]	);
				$telephone  	= mysqli_real_escape_string( $conn, $_POST["txtTelephoneUD"]	);
				$mobile  		= mysqli_real_escape_string( $conn, $_POST["txtMobileUD"]		);
				$email 			= mysqli_real_escape_string( $conn, $_POST["txtEmailUD"]		);
			
				# Perform an UPDATE using the ClientID obtained
				$sqlString 		= "UPDATE `tblClients` SET "
						   		. "`CompanyName`	= '{$companyName}', "
						   		. "`ContactName`	= '{$contactName}', "
						   		. "`Telephone`		= '{$telephone}', "
						   		. "`Mobile`			= '{$mobile}', "
						   		. "`Email`			= '{$email}' "
						   		. "WHERE `ClientID`	= {$clID}";
				$updateStatus 	= databaseQuery($conn, $sqlString, "UPDATE");
			}
			
			# Deletes Users and Credentials
			if ( isset($_POST["submitDeleteClients"]) )
			{
				# Perform a DELETE using the ClientID obtained
				$sqlString 		= "DELETE FROM `tblClients` WHERE `ClientID` = {$clID}";
				$deleteStatus 	= databaseQuery($conn, $sqlString, "DELETE");
			}
			

		
			break;
			
		case "addClients":

			# Get User Details
			$contactName 		= mysqli_real_escape_string( $conn, $_POST["txtContactNameADD"]	);
			$companyName  		= mysqli_real_escape_string( $conn, $_POST["txtCompaniesADD"]	);
			$telephone  		= mysqli_real_escape_string( $conn, $_POST["txtTelephoneADD"]	);
			$mobile  			= mysqli_real_escape_string( $conn, $_POST["txtMobileADD"]		);
			$email 				= mysqli_real_escape_string( $conn, $_POST["txtEmailADD"]		);
		
			# Perform an INSERT using the ClientID obtained
			$sqlString 			= "INSERT INTO `tblClients` "
					   			. "(`CompanyName`, `ContactName`, `Telephone`, `Mobile`, `Email`) "
					   			. "VALUES "
					   			. "('{$companyName}','{$contactName}','{$telephone}','{$mobile}','{$email}')";
			$insertStatus 		= databaseQuery($conn, $sqlString, "INSERT");
			
			# Script to add the Company Name to tblCompanies (the Companies Database) if it does not already exist
			if ( dcount("CompanyID", "tblCompanies", "CompanyName = '{$companyName}'", $conn) == 0 )
			{
				insertOtherDatabaseValues("tblCompanies", "CompanyName", $companyName, $conn);
			}

			break;
	}

# Take user directly to the Users and Credentials page
$path = rawurlencode("index.php");
$queryString = "?u=203"; 
$urlLink = $path . $queryString;
die("<script>location.href = '{$urlLink}'</script>");
exit();

?>
</section>