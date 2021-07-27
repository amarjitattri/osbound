<?php
session_start();
//error_reporting(0);			# Switch off error messaging
include "functions/dbFunctions.php";
include "functions/generalFunctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "en" />
	<title> Osbond and Tutt - Workflow Management and Information System </title>

	<link rel = "stylesheet" type = "text/css" href = "css/ot_css.css" />

	<!-- Add the various scripts depending on the value of menu selection -->
	<?php
    	if (!empty($_GET["u"]))	# Only enter if the first page is not loaded
		{
			$u = $_GET["u"];
			
			switch ($u)
			{
				case 203:
					# Load the required CSS and JavaScript files
					//echo "<link rel='stylesheet' href='css/calendar_black.css' title='calendar'>";
					
					echo "<script language='javascript' src='javascript/clientsDatabase.js'></script>";
					break;

					
			
			
			
			}	# End of switch ($u) - for loading scripts		

		}	# End of IF (!empty($_GET["u"]))
	
	?>
	<!--<script language="javascript" src="javascript/navigation.js"></script>-->
</head>

<body>
<main id="mainDiv">
<?php

# Connect to the KS Vision Database
$conn = databaseConnection();

# Initialise the pass value to 0 as the index file loads
$u = 0;

if ( !( isset($_GET["u"]) ) )	# Load the first page if the Page Indicator Value (PIV) is not set
{
	# If there is no session started then show login page and exit
	if (!isset($_SESSION["auth"]) || $_SESSION["auth"] != 1) 
	{
	   include "header.php";
	   include "home.php";
	}
}
else	# Its not the first page, get the value of u from the Super_Global Variable
{
	$u = $_GET["u"];
	//echo "<font>the value of u is:" . $u . "</font>";
}

# Set $_SESSION['u'] value to reflect the $u value so that other dynamic pages can execute code base on this value
$_SESSION["u"] = $u;

switch ($u)
{
	case 1:	# Home Page
		include "header.php";
	   	include "home.php";
		break;

	case 2:	# Process Login Page
	   	include "processLogin.php";
		break;
		
	case 3:	# Log Out
		if(	ascertainLogin() )
		{
			# Call function to log the user out of the system
			systemLogOut();
		}
		
		break;
		
	# Page Indicators 4 to 20 are for Job List and associated functionalities
	case 4:	# View Job List - Only Admins can view this page (?)
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "jobListView.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}
		
		break;


	# Page Indicators 21 to 40 are for Notes and associated functionalities




	# Page Indicators 41 to 60 are for Clients and associated functionalities
	case 41:	# View Clients Database - Only Admins can view this page (?)
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "clientsDatabaseView.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}
		
		break;


	# Display Administration Settings Functionalities
	case 200:	# Display page to avail Administration Settings
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "administrationSettings.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}

		break;


	# Administration Settings - Users and Credentials 201 - 202
	case 201:	# Display Users and Credentials
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "adminUsersCredentialsView.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}

		break;

	case 202:	# Edit Users Credentials
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "adminUsersCredentialsEdit.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}
		break;
		
	case 203:	# Display Clients Database
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "adminClientsDatabaseView.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}

		break;

	case 204:	# Edit Clients Database
		if(	ascertainLogin() && privilegeTypeCheck("Admin") )
		{
			include "header.php";
			include "adminClientsDatabaseEdit.php";
		}
		else
		{
			# Call function to log the user out of the system
			systemLogOut();
		}
		break;
	

	case 1000:	# Display Consctruction Page
		include "header.php";
	   	include "constrcution.php";
		break;

}	# End of switch ($u)


?>

</main>	<!-- End of Main Div -->
</body>
<?php
# Close the conneciton to the database
databaseDisconnection($conn);
?>
</html>
