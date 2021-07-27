<?php
# Function to call the 'Under Construction' page
function underConstruction()
{
	########## CODE USED TO CALL THE UNDER CONSTRUCTION PAGE ##########
	$path = rawurlencode("index.php");
	$queryString = "?u=1000";
	$urlLink = $path . $queryString;

	# Take user directly to mail section on CLs Details page
	die("<script>location.href = '{$urlLink}'</script>");
	exit();	
}

# Function to log user out of the application
function systemLogOut()
{
	# Simply unset the required $_SESSION variables
	$_SESSION["LoggedIn"] 	= FALSE;
	$_SESSION["UserID"] 	= "";
	$_SESSION["Firstname"] 	= "";
	$_SESSION["Lastname"] 	= "";
	$_SESSION["Username"] 	= "";
	$_SESSION["Privilege"] 	= "";
	
	# Take user back to home page
	include "header.php";
	include "home.php";	
}

# Function to ascertain that a user is logged in
function ascertainLogin()
{
	$returnValue = ( $_SESSION["LoggedIn"] == TRUE ? true : false );
	return $returnValue;

}	# End of function ascertainLoginAdminUser

# Function to check if the "Privilege" session has been set and to ascertain 
# the validation of the passed parameter against the value of the session
function privilegeTypeCheck($privilegeTypeCheck)
{
	switch($privilegeTypeCheck)
	{
		case "Admin-Operator":
			$returnValue = ( (isset($_SESSION["Privilege"]) && ($_SESSION["Privilege"] == "Admin" || $_SESSION["Privilege"] == "Operator") ) ? true : false);
			break;
			
		case "Admin":
			$returnValue = ( (isset($_SESSION["Privilege"]) && ($_SESSION["Privilege"] == "Admin")) ? true : false );
			break;
			
		case "Client":
			$returnValue = ( (isset($_SESSION["Privilege"]) && ($_SESSION["Privilege"] == "Client")) ? true : false );
			break;

	}	# End of switch($privilegeToCheck)

	return $returnValue;
	
}	# End of function ascertainLoginAdminUser

# Function to perform a Domain Aggregate Lookup
function dlookup($fieldName, $domainName, $whereClause, $conn){
	$sqlString = "SELECT " . $fieldName . " FROM " . $domainName . " WHERE " . $whereClause;
	$rstReturnField = databaseQuery($conn, $sqlString, "SELECT");
	$returnField = mysqli_fetch_assoc($rstReturnField);
	$returnValue = $returnField[$fieldName];
	return $returnValue;
	
	# Call function to free the resultser resource
	databaseFreeResource($rstReturnField);	
}

# Function to perform a Domain Aggregate Count
function dcount($fieldName, $domainName, $whereClause, $conn){
	$sqlString = "SELECT COUNT(`" . $fieldName . "`) AS `RecordCount` FROM " . $domainName . " WHERE " . $whereClause;
	$rstReturnField = databaseQuery($conn, $sqlString, "SELECT");
	$returnField = mysqli_fetch_assoc($rstReturnField);
	$returnValue = $returnField["RecordCount"];
	return $returnValue;	

	# Call function to free the resultser resource
	databaseFreeResource($rstReturnField);	
}

# This function accepts a date and returns the MySQL Format of the date - reverse in order (yyyy-mm-dd)
function mysqlDateFormat($dateToConvert){
	$day = substr($dateToConvert,0,2);
	$month = substr($dateToConvert,3,2);
	$year = substr($dateToConvert,6,4);
	$reverseDateToConvert = $year . "-" . $month . "-" . $day;

	return $reverseDateToConvert;
}

# This function is used to replace any variable that is blank with with a zero value
function replaceBlankWithZero($replaceVariable){
	if ($replaceVariable == "")
	{
		$replaceVariable = 0;
	}
	
	return $replaceVariable;
}

# Function to clear special characters from a string
function cleanString($string) {
   $string = str_replace(' ', '-', $string); 				# Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 	# Removes special chars.
}

# Function to clear filename
function cleanFilename($filename){
	/*
	### USE THE pathinfo FUNCTION TO GET FILE PARTS ###
	
	$path_parts = pathinfo('/www/htdocs/index.html');

	echo $path_parts['dirname'], "\n";
	echo $path_parts['basename'], "\n";
	echo $path_parts['extension'], "\n";
	echo $path_parts['filename'], "\n"; // filename is only since PHP 5.2.0
	
	$fileName = 'a|"bc!@£de^&$f g';
	
	################################################
	*/

	$path_parts = pathinfo($filename);
	
	# Get the part of the file name before the period, clean it up and append it back with the extention
	$fnBeforeExtention 	= $path_parts["filename"];
	$filename  			= cleanString($fnBeforeExtention);
	$filename 		   .= "." . $path_parts['extension'];
	return $filename;
}

function tabSelectionLinks($tabIndexValue, $tabIndexComparison)
{
	# Select the required tab
	$returnValue = ($tabIndexValue == $tabIndexComparison ? "selected" : "unselected" );	
	echo $returnValue;
}

function tabSelectionDivs($tabIndexValue, $tabIndexComparison)
{
	# Select the required tab
	$returnValue = ($tabIndexValue == $tabIndexComparison ? "displayContent" : "hideContent" );	
	echo $returnValue;
}

# Function to add new values into the given table name
function insertOtherDatabaseValues($tableName, $colName, $colValue, $conn)
{
	$sqlString 			= "INSERT INTO {$tableName} (`{$colName}`) VALUES ('{$colValue}')";
	$executionStatus 	= databaseQuery($conn, $sqlString, "INSERT");
}

# Function used to populte the Companies
function populateCompanies($conn, $companyName)
{
	echo "<option value='0'>(Select Company:)</option>";

    # Select all the Companies and loop through the recordset each time populating the drop down list
    $sqlString  	= "SELECT `CompanyName` FROM `tblCompanies` ORDER BY `CompanyName`";
    $rstCompanies 	= databaseQuery($conn, $sqlString, "SELECT");
    
    # Set the Row Counter value. This will help in obtaining the details of the first Client
    while ( $rowCompanies = mysqli_fetch_array($rstCompanies) )
    {
		$optString  = "<option value='" . $rowCompanies["CompanyName"]. "' "; 
		
		if ( ( $companyName != "" ) && ( $companyName == $rowCompanies["CompanyName"] ) )
		{
			$optString .= "selected ";
		}
		
		$optString .= ">" . $rowCompanies["CompanyName"] . "</option>";
		echo $optString;
    }
    
    # Call function to free result resource
    databaseFreeResource($rstCompanies);
}

# Function used to populte the Contacts
function populateContacts($conn, $contactName)
{
	echo "<option value='0'>(Select Contact:)</option>";

    # Select all the Contacts and loop through the recordset each time populating the drop down list
    $sqlString  	= "SELECT `ContactName` FROM `tblClients` WHERE `ContactName` != '' ORDER BY `ContactName`";
    $rstContacts 	= databaseQuery($conn, $sqlString, "SELECT");
    
    # Set the Row Counter value. This will help in obtaining the details of the first Client
    while ( $rowContacts = mysqli_fetch_array($rstContacts) )
    {
		$optString  = "<option value='" . $rowContacts["ContactName"]. "' "; 
		
		if ( ( $contactName != "" ) && ( $contactName == $rowContacts["ContactName"] ) )
		{
			$optString .= "selected ";
		}
		
		$optString .= ">" . $rowContacts["ContactName"] . "</option>";
		echo $optString;
    }
    
    # Call function to free result resource
    databaseFreeResource($rstContacts);
}

# Function used to populte the Job Nos
function populateJobNos($conn, $jobNo)
{
	echo "<option value='0'>(Select Job No:)</option>";

    # Select all the Contacts and loop through the recordset each time populating the drop down list
    $sqlString  	= "SELECT `JobNo` FROM `tblJobList` ORDER BY `JobNo` DESC";
    $rstJobNo 		= databaseQuery($conn, $sqlString, "SELECT");
    
    # Set the Row Counter value. This will help in obtaining the details of the first Client
    while ( $rowJobNo = mysqli_fetch_array($rstJobNo) )
    {
		$optString  = "<option value='" . $rowJobNo["JobNo"]. "' "; 
		
		if ( ( $jobNo != "" ) && ( $jobNo == $rowJobNo["JobNo"] ) )
		{
			$optString .= "selected ";
		}
		
		$optString .= ">" . $rowJobNo["JobNo"] . "</option>";
		echo $optString;
    }
    
    # Call function to free result resource
    databaseFreeResource($rstJobNo);
}

# Function used to populte the Invoice Nos
function populateInvoiceNos($conn, $invNo)
{
	echo "<option value='0'>(Select Invoice No:)</option>";

    # Select all the Contacts and loop through the recordset each time populating the drop down list
    $sqlString  	= "SELECT `InvoiceNumber` FROM `tblJobList` WHERE `InvoiceNumber` != ''ORDER BY `InvoiceNumber` DESC";
    $rstInvNo 		= databaseQuery($conn, $sqlString, "SELECT");
    
    # Set the Row Counter value. This will help in obtaining the details of the first Client
    while ( $rowInvNo = mysqli_fetch_array($rstInvNo) )
    {
		$optString  = "<option value='" . $rowInvNo["InvoiceNumber"]. "' "; 
		
		if ( ( $invNo != "" ) && ( $invNo == $rowInvNo["InvoiceNumber"] ) )
		{
			$optString .= "selected ";
		}
		
		$optString .= ">" . $rowInvNo["InvoiceNumber"] . "</option>";
		echo $optString;
    }
    
    # Call function to free result resource
    databaseFreeResource($rstInvNo);
}

# Function used to populte Sales Stage
function populateSalesStage($conn, $salesStage)
{
	?>
		<option value="0"																			>(Select Sales Stage:)	</option>
		<option value="Enquiry"		<?php if($salesStage == "Enquiry")		{echo "selected";} ?>	>Enquiry				</option>
		<option value="Quoted"		<?php if($salesStage == "Quoted")		{echo "selected";} ?>	>Quoted					</option>
		<option value="Live"		<?php if($salesStage == "Live")			{echo "selected";} ?>	>Live					</option>
		<option value="Completed"	<?php if($salesStage == "Completed")	{echo "selected";} ?>	>Completed				</option>
    <?php
}

# Function to populate No and Yes fields
function populateYesNoNA($value)
{
	echo "<option value='0'   											   >(Please Select:)</option>";						
	echo "<option value='No'  " . ($value == "No" 	? "selected" : "") . " >No				</option>";
	echo "<option value='Yes' " . ($value == "Yes" 	? "selected" : "") . " >Yes				</option>";
}


?>
