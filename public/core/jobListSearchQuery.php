<!-- Code snippet to construct the query required to fetch and display the results  -->
<?php
# Get the queryType filter value
$queryType	= $_GET["queryType"];

# Iniialise the query and the filter variables
$sqlString	= "SELECT * FROM `tblJobList` ";

$jobNo		= "";
$jobDate	= "";
$company	= "";
$contact	= "";
$salesStage	= "";
$sentDate	= "";
$invoiceNo	= "";
$paid		= "";

# Append filters to the query if required
if ( $queryType == "Filter" )
{	
	# Initialise the overall WHERE Clause
	$whereClause = "";
	
	# Commence constructing the WHERE Clause from here on
	
	# Include the Job No filter if required
	if ( filterIncludeExclude($_POST["selectJobNos"]) )
	{
		$jobNo				= $_POST["selectJobNos"];
		$whereClause		= "(`JobNo` = '{$jobNo}') ";		
	}

	# Include the Job Date filter if required
	if ( filterIncludeExclude($_POST["selectJobDate"]) )
	{
		$jobDate			= $_POST["selectJobDate"];

		if ( $whereClause == "" )
		{
			$whereClause	= "(`JobDate` = '{$jobDate}') ";
		}
		else
		{
			$whereClause   .= "AND (`JobDate` = '{$jobDate}') ";
		}
	}

	# Include the Company filter if required
	if ( filterIncludeExclude($_POST["selectCompanies"]) )
	{
		$company			= $_POST["selectCompanies"];
		
		if ( $whereClause == "" )
		{
			$whereClause	= "(`Company` = '{$company}') ";
		}
		else
		{
			$whereClause   .= "AND (`Company` = '{$company}') ";
		}
	}

	# Include the Contact filter if required
	if ( filterIncludeExclude($_POST["selectContacts"]) )
	{
		$contact			= $_POST["selectContacts"];

		if ( $whereClause 	== "" )
		{
			$whereClause	= "(`Contact` = '{$contact}') ";
		}
		else
		{
			$whereClause   .= "AND (`Contact` = '{$contact}') ";
		}
	}

	# Include the Sales Stage filter if required
	if ( filterIncludeExclude($_POST["selectSalesStage"]) )
	{
		$salesStage			= $_POST["selectSalesStage"];
		
		if ( $whereClause 	== "" )
		{
			$whereClause	= "(`SalesStage` = '{$salesStage}') ";
		}
		else
		{
			$whereClause   .= "AND (`SalesStage` = '{$salesStage}') ";
		}
	}

	# Include the Send Date filter if required
	if ( filterIncludeExclude($_POST["selectSentDate"]) )
	{
		$sentDate			= $_POST["selectSentDate"];
		
		if ( $whereClause 	== "" )
		{
			$whereClause	= "(`SentDate` = '{$sentDate}') ";
		}
		else
		{
			$whereClause   .= "AND (`SentDate` = '{$sentDate}') ";
		}
	}

	# Include the Invoice No filter if required
	if ( filterIncludeExclude($_POST["selectInvoiceNos"]) )
	{
		$invoiceNo			= $_POST["selectInvoiceNos"];
		
		if ( $whereClause 	== "" )
		{
			$whereClause	= "(`InvoiceNumber` = '{$invoiceNo}') ";
		}
		else
		{
			$whereClause   .= "AND (`InvoiceNumber` = '{$invoiceNo}') ";
		}
	}

	# Include the Paid filter if required
	if ( filterIncludeExclude($_POST["selectPaid"]) )
	{
		$paid				= $_POST["selectPaid"];
		
		if ( $whereClause 	== "" )
		{
			$whereClause	= "(`Paid` = '{$paid}') ";
		}
		else
		{
			$whereClause   .= "AND (`Paid` = '{$paid}') ";
		}
	}

	# Append the WHERE Clause to the SQL Statement
	$sqlString	.= "WHERE {$whereClause}";
}

# Append the ORDER BY Clause
$sqlString	.= "ORDER BY `JobNo` DESC";

# Function to check if a variable should be included in the filter
function filterIncludeExclude($testVar)
{
	$returnVar	= ( !($testVar == "0" || $testVar == "")	?  true	:	false);
	return $returnVar;
}

?>