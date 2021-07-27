<?php

# Function to perform the connection to the required Database
function databaseConnection()
{
	# Connect to the required database using the MySQLi API

	# Credentials for the development database
	$dbHost 	= "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbDatabase = "upwork_osbondandtutt_core";

	/*
	# Credentials for the production database
	$dbHost 	= "ksvision.dns-systems.net";
	$dbUsername = "ksvision_db";
	$dbPassword = "NsydGacSYSc31";
	$dbDatabase = "ksvision_db";
	*/

	/*
	echo $dbHost . "<br />";
	echo $dbUsername . "<br />";
	echo $dbPassword . "<br />";
	echo $dbDatabase . "<br />";
	*/

	# Perform the connection to get a connection variable
	$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

	# Notify user in case of an unsuccessful connection
	if ( mysqli_connect_errno() )
	{
		$errNumber = mysqli_connect_errno();
		$errMessage = "Database connection failed; " . mysqli_connect_error();
		$errDescription = "{$errNumber}: \r\n {$errMessage}";

		die($errDescription);
	}

	# Return the connection variable upon successful connection
	return $conn;
}

# Function to perform a query to the required resource (tables or queries)
function databaseQuery($conn, $query, $queryType)
{
	# Switch off warning messages for the sake of empty result sets
	error_reporting(E_ERROR | E_PARSE);

	# Execute the query to get the either result resource (for SELECT)
	# or a boolean value (INSERT, UPDATE and DELETE)
	$resultResource = mysqli_query($conn, $query);

	if ( ($queryType == "SELECT") && ( mysqli_num_rows($resultResource) == 0 ) )
	{
		return 0;
	}

	# Report all PHP errors - Switching on warning messages again
	error_reporting(E_ALL);

	switch( $queryType )
	{
		case "SELECT":
		case "INSERT":
			# Notify user in case of an unsuccessful query execution
			if ( !$resultResource )
			{
				$errMessage = "Could not execute the query:";
				$errReason = mysqli_error($conn);
				$errDescription = "{$errMessage}: \r\n {$errReason}";
				die($errDescription);
			}

		case "UPDATE":
		case "DELETE":
			# Notify user in case of an unsuccessful query execution
			# Use mysqli_affected_rows() function to check the number of rows affected

			# If the value of mysqli_affected_rows($conn) is 0, then it can either mean:
			# - the WHERE Clause in the query has a filter that could not point to any set of rows to be affected OR
			# - the user has sent the same values to be affected (in the case of an UPDATE query)

			# Since the first type of error needs to be trapped and the second type of error is assumed absurd for practical reasons,
			# it is conclusive that mysqli_affected_rows($conn) <= 0 be used for error trapping. In the rare case where the second error
			# is posing a problem, it would be adivsable to use the error trapping method given below independently in the script where required.

			# If the value of mysqli_affected_rows($conn) is -1, then it means that the database returned a fatal error
			if ( !$resultResource )	# || mysqli_affected_rows($conn) <= 0
			{
				$errMessage = "Could not execute the query:";
				$errReason = mysqli_error($conn);
				$errDescription = "{$errMessage}: \r\n {$errReason}";
				die($errDescription);
			}
	}


	# Return the result resource or boolean value
	return $resultResource;
}

# Function to free a result resource
function databaseFreeResource($resultResource)
{
	# Free the result resource from memory
	mysqli_free_result($resultResource);
}

# Function to perform the disconnection to the required Database
function databaseDisconnection($conn)
{
	# Close the connection to the required database
	mysqli_close($conn);
}

?>
