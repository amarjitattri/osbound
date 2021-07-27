<header id="header">
	<!-- Display the main logo -->
	<div id="headerLogoTitle">
		<div><center><img src="images/ot_logo.jpg" alt="OT_Logo" height="115" /></center></div>
		<div><center>Workflow Management and Information System</center></div>
	</div>
</header>
<?php
	if(	( isset($_SESSION["LoggedIn"]) ) && ( $_SESSION["LoggedIn"] == TRUE ) )
	{
		# Pages on which the navigation menu should not be displayed
		if ( ($u != 11) && ($u != 13) )
		{
			include "navigation.php";
		}
	}
?>