<?php
	if(	( isset($_SESSION["LoggedIn"]) ) && ( $_SESSION["LoggedIn"] == TRUE ) )
	{
		include "navigationMenu.php";
	}
?>