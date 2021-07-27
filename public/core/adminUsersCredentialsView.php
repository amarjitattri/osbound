<div id="mainBodyLoggedIn">
    <center>
        <p><b>The following are all the current Users with their Credentials:</b></p>
    </center>

	<div class="iFrameStyle" style="height:450px;">
	<table class="columnedTable">
		<tr>
        	<th>First Name</th>
        	<th>Last Name</th>
        	<th>Username</th>
        	<th>Password</th>
        	<th>Privilege</th>
        	<th colspan="2">&nbsp;</th>
        </tr>
		<?php
        # Get all the Users from tblusers
        $sqlString = "SELECT * FROM `tblUsers` ORDER BY `FirstName`";
        $rstUsers = databaseQuery($conn, $sqlString, "SELECT");
        
        # Initialise the loopCounter; variable used to determine the use of forecolors for the rows
        while ($rowUsers = mysqli_fetch_array($rstUsers))
        {
            # Get the UserID
            $uID = $rowUsers["UserID"];
            ?>
            <!-- Set the remaining table data contents and close the table row -->
            <form name="updateDeleteUsersCredentials" id="updateDeleteUsersCredentials" 
                  action="index.php?u=202&FormName=updateDeleteUsersCredentials&UID=<?php echo $uID; ?>" method="POST">
            <tr>	<!-- Open the row -->
            
                <td><input type="text" name="txtFirstnameUD" id="txtFirstnameUD" value = "<?php echo $rowUsers["Firstname"]; ?>" required ></td>
                <td><input type="text" name="txtLastnameUD"  id="txtLastnameUD"  value = "<?php echo $rowUsers["Lastname"];  ?>" required ></td>
                <td><input type="text" name="txtUsernameUD"  id="txtUsernameUD"  value = "<?php echo $rowUsers["Username"];  ?>" required ></td>
                <td><input type="text" name="txtPasswordUD"  id="txtPasswordUD"  value = "<?php echo $rowUsers["Password"];  ?>" required ></td>
            
                <td>
                    <select name="txtPrivilegeUD" 	id="txtPrivilegeUD"		class="dropDownListStyle" required>
                        <option value="Operator"	<?php if ($rowUsers["Privilege"] == "Operator")	{echo "selected";} ?> >Operator	</option>
                        <option value="Sales" 		<?php if ($rowUsers["Privilege"] == "Sales")	{echo "selected";} ?> >Sales	</option>
                        <option value="Admin" 		<?php if ($rowUsers["Privilege"] == "Admin")	{echo "selected";} ?> >Admin	</option>
                    </select>
                </td>
                
                <!-- Display the Edit button -->
                <td><center><input name="submitUpdateUserCredential" type="submit" value="Update" class="buttonStyle btnStyle1" /></center></td>
            
                <!-- Display the Delete button -->
                <td><center><input name="submitDeleteUserCredential" type="submit" value="Delete" class="buttonStyle btnStyle1" /></center></td>
        
            </tr>	<!-- Close the row -->
            </form>
            <?php
        }	# End of while loop
        
		# Call function to free result resource
		databaseFreeResource($rstUsers);
		
		?>
	</table>
    </div>

	<br /><br />

	<hr style="width:80%"/>

	<br /><br />

	<div id="articleBody" style="width:100%;">
    <table class="columnedTable">
		<tr>
        	<th>First Name</th>
        	<th>Last Name</th>
        	<th>Username</th>
        	<th>Password</th>
        	<th>Privilege</th>
        	<th colspan="2">&nbsp;</th>
        </tr>

		<form name="addUsersCredentials" id="addUsersCredentials" action="index.php?u=202&FormName=addUsersCredentials&UID=0" method="POST">
        <tr>
			<td><input type="text" name="txtFirstnameADD" id="txtFirstnameADD" required ></td>
            <td><input type="text" name="txtLastnameADD"  id="txtLastnameADD"  required ></td>
            <td><input type="text" name="txtUsernameADD"  id="txtUsernameADD"  required ></td>
            <td><input type="text" name="txtPasswordADD"  id="txtPasswordADD"  required ></td>
        
            <td>
                <select name="txtPrivilegeAdd" 		id="txtPrivilegeAdd" 	class="dropDownListStyle" required >
                    <option value="Operator"				>Operator</option>
                    <option value="Sales"					>Sales</option>
                    <option value="Admin"					>Admin</option>

                </select>
            </td>
        
            <td><input name="submitAddUserCredential" type="submit" value="Add" class="buttonStyle btnStyle2" /></td>
        </tr>
        </form>
    </table>
    </div>	<!-- end of div id="articleBody" -->

	<br /><br />
    
</div>