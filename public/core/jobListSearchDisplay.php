<!-- Code to display the Search Controls and Search Parameters is any have been required -->
<div class="standardDivsLighter">
<h3>Searches</h3>
<form name="jobListFilter" id="jobListFilter" action="index.php?u=4&queryType=Filter" method="post">
	<p>
    <!-- Table to layout and display the selection controls -->
    <table width="100%">
        <colgroup>
            <col style="width: 6.25%;">
            <col style="width: 12.5%;">
            <col style="width: 6.25%;">
            <col style="width: 12.5%;">
            <col style="width: 6.25%;">
            <col style="width: 12.5%;">
            <col style="width: 6.25%;">
            <col style="width: 12.5%;">
        </colgroup>

        <tr valign="top">
        	<td>Job No</td>
        	<td class="rowStyle1"><select id="selectJobNos"			name="selectJobNos"		class="dropDownListStyle"><?php populateJobNos($conn, $jobNo);			?></select>				</td>
            
        	<td>Company</td>
        	<td class="rowStyle1"><select id="selectCompanies"		name="selectCompanies"	class="dropDownListStyle"><?php populateCompanies($conn, $company);		?></select>				</td>
            
        	<td>Sales Stage</td>
        	<td class="rowStyle1"><select id="selectSalesStage"		name="selectSalesStage"	class="dropDownListStyle"><?php populateSalesStage($conn, $salesStage);	?></select>				</td>
            
        	<td>Invoice No</td>
        	<td class="rowStyle1"><select id="selectInvoiceNos"		name="selectInvoiceNos"	class="dropDownListStyle"><?php populateInvoiceNos($conn, $invoiceNo);	?></select>				</td>
        </tr>
        
		<tr height="20"><td colspan="8">&nbsp;</td></tr>
        
        <tr valign="top">
        	<td>Date</td>
        	<td class="rowStyle1"><input	id="selectJobDate"		name="selectJobDate"	type="date"		   value="<?php echo $jobDate;							?>"	max="2999-12-31">	</td>
            
        	<td>Contact</td>
        	<td class="rowStyle1"><select	id="selectContacts"		name="selectContacts"	class="dropDownListStyle"><?php populateContacts($conn, $contact);		?></select>				</td>
            
        	<td>Date Sent</td>
        	<td class="rowStyle1"><input	id="selectSentDate"		name="selectSentDate"	type="date"		   value="<?php echo $sentDate; 						?>"	max="2999-12-31">	</td>
            
        	<td>Paid</td>
        	<td class="rowStyle1"><select	id="selectPaid"			name="selectPaid"		class="dropDownListStyle"><?php populateYesNoNA($paid);					?></select>				</td>
        </tr>
    </table>
    </p>
    
    <p>
	<!-- Table to layout and display the buttons -->
    <table width="100%" border="0">
        <colgroup>
            <col style="width: 33.33%;">
            <col style="width: 33.33%;">
            <col style="width: 33.33%;">
        </colgroup>

        <tr>
        	<td align="right"	><input	type="submit" class="buttonStyle btnStyle2" name="Search"	value="Search"												></td>
            <td align="center"	><input type="submit" class="buttonStyle btnStyle2" name="Clear"	value="Clear"	formaction="index.php?u=4&queryType=Clear"	></td>
        	<td align="left"	><input type="submit" class="buttonStyle btnStyle2" name="Add"		value="Add"		formaction="#"								></td>
        	<!--
            <td align="center"	><button	type="button" class="buttonStyle btnStyle2" name="Clear">Clear		</button>	</td>
        	<td align="left"	><button	type="button" class="buttonStyle btnStyle2" name="Add"	>Add		</button>	</td>
            -->
        </tr>
    </table>
    </p>    
    
</form>
</div>	<!-- End of class="standardDivsLighter" -->