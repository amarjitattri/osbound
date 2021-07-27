<div id="navigationLoggedIn">
	<!-- This is where the Navigation has been coded -->
    <nav id="top-menu-LoggedIn" class="menuHoriz">
		<ul>
		<?php
			# The contents of the Navigation Menus depend on the Access Level

			# NB: Alter the parameters in the privilegeTypeCheck function to reflect the correct values
			# Display the Sales Agreement menu 
			if( privilegeTypeCheck("Admin-Operator") )
            {

				displayMenu(4, "idJobList", "Job<br />List");
				
				displayMenu(1000, "idNotes", "Notes");
				
				//displayMenu(41, "idClients", "Clients");
				
				displayMenu(1000, "idOperatives", "Operatives");
				
				displayMenu(1000, "idSuppliers", "Suppliers");

            }

			# Display the Administration Settings menu if logged in personnel has Admin privileges. 
			if( privilegeTypeCheck("Admin") )
            {
				displayMenu(200, "idAdministrationSettings", "Admin <br /> Settings");
            }

			# Display System Logout menu
			displayMenu(3, "idSystemLogout", "System <br /> Logout");
        ?>
		</ul>
	</nav><!-- end of top-menu-LoggedIn with a class of menuHoriz -->
</div> <!-- end of navigationLoggedIn -->

<!-- Clear any margins, paddings and/or columns for precise display -->
<!--
<div class = "clear"></div>
-->

<?php

# Function to render the List Item menu
function displayMenu($pageIndicator, $idValue, $menuName)
{
	switch ($pageIndicator)
	{
		case 4:
			$urlLink = "index.php?u={$pageIndicator}&queryType=Clear";
			break;
			
		/*
		case 100:
			$urlLink = "index.php?u={$pageIndicator}";
			break;
		*/
			
		default:
			$urlLink = "index.php?u={$pageIndicator}";
			break;

	}
	
	?>
        <li>
            <a href="<?php echo $urlLink; ?>" id="<?php echo $idValue; ?>">
            <?php echo $menuName; ?> 
            </a>
        </li>
    <?php	

}	# end of displayMenu functionality

?>