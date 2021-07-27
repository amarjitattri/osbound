<div id="mainBodyLoggedIn">
    <center>
        <p><b>The following are all the current Clients:</b></p>
    </center>

	<div class="iFrameStyle" style="height:450px;">
	<table class="columnedTable">
		<tr>
        	<th>Contact Name</th>
        	<th>Company Name</th>
        	<th>Telephone</th>
        	<th>Mobile</th>
        	<th>Email</th>
        	<th colspan="2">&nbsp;</th>
        </tr>
		<?php
        # Get all the Users from tblusers
        $sqlString	= "SELECT * FROM `tblClients` ORDER BY `ContactName`, `CompanyName`";		
		$rstClients = databaseQuery($conn, $sqlString, "SELECT");
        
        # Initialise the loopCounter; variable used to determine the use of forecolors for the rows
        while ($rowClients = mysqli_fetch_array($rstClients))
        {
            # Get the ClientID and the CompanyName
            $clID 	= $rowClients["ClientID"];
            $coName = $rowClients["CompanyName"];
            ?>
            <!-- Set the remaining table data contents and close the table row -->
            <form name="updateDeleteClients" id="updateDeleteClients" 
                  action="index.php?u=204&FormName=updateDeleteClients&CLID=<?php echo $clID; ?>" method="POST">
            <tr>	<!-- Open the row -->
            
                <td><input type="text" name="txtContactNameUD"	id="txtContactNameUD"	value = "<?php echo $rowClients["ContactName"]; 						?>"				>	</td>
                <td><select 		   name="cboCompaniesUD"	id="cboCompaniesUD"  	class="dropDownListStyle"><?php populateCompanies($conn, $coName);	?>	</select>		</td>
                <td><input type="text" name="txtTelephoneUD"	id="txtTelephoneUD"		value = "<?php echo $rowClients["Telephone"];						?>"				>	</td>
                <td><input type="text" name="txtMobileUD"		id="txtMobileUD"		value = "<?php echo $rowClients["Mobile"];							?>"				>	</td>
                <td><input type="text" name="txtEmailUD"		id="txtEmailUD"			value = "<?php echo $rowClients["Email"];							?>"				>	</td>
            
                
                <!-- Display the Edit button -->
                <td><center><input name="submitUpdateClients" type="submit" value="Update" class="buttonStyle btnStyle1" /></center></td>
            
                <!-- Display the Delete button -->
                <td><center><input name="submitDeleteClients" type="submit" value="Delete" class="buttonStyle btnStyle1" /></center></td>
        
            </tr>	<!-- Close the row -->
            </form>
            <?php
        }	# End of while loop



		# Call function to free result resource
		databaseFreeResource($rstClients);
		
		?>
	</table>
    </div>

	<br /><br />

	<hr style="width:80%"/>

	<br /><br />

	<div id="articleBody" style="width:100%;">
    <table class="columnedTable">
		<tr>
        	<th>Contact Name</th>
        	<th>Company Name</th>
        	<th>Telephone</th>
        	<th>Mobile</th>
        	<th>Email</th>
        	<th colspan="2">&nbsp;</th>
        </tr>

		<form name="addClients" id="addClients" action="index.php?u=204&FormName=addClients&CLID=0" method="POST">
        <tr>
			<td><input type="text"		name="txtContactNameADD"	id="txtContactNameADD"			 >	</td>
			<td><input type="text"		name="txtCompaniesADD"	id="txtCompaniesADD"			 >	</td>
            <td><input type="text"		name="txtTelephoneADD"	id="txtTelephoneADD"			 >	</td>
            <td><input type="text"		name="txtMobileADD"		id="txtMobileADD"				 >	</td>
            <td><input type="text"		name="txtEmailADD"		id="txtEmailADD"				 >	</td>
        
            <td><input type="submit"	name="submitAddClients"  value="Add" class="buttonStyle btnStyle2" /></td>
        </tr>
        </form>
        
        <tr>
			<td>&nbsp;</td>
			<td><select 		   name="cboCompaniesADD"	id="cboCompaniesADD"	class="dropDownListStyle"><?php populateCompanies($conn, 0);	?>	</select>	</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        
            <td>&nbsp;</td>
        </tr>
        
    </table>
    </div>	<!-- end of div id="articleBody" -->

	<br /><br />
    
</div>