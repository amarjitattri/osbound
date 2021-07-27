<div class="standardDivsLighter">
<?php
	//echo $sqlString;

	# Get the result set of the passed query
	$jlResults = databaseQuery($conn, $sqlString, "SELECT");
	
	if ( (is_int($jlResults)) && ($jlResults == 0) )
	{
		echo "<center>";
		echo "<p>";
		echo "<strong>Your Filters/Searches did not yield any results.";
		echo "<br /><br />";
		echo "Please try again with a different set of values.</strong>";
		echo "</p>";
		echo "</center>";
		return;
	}
	
	?>
        
		<p>
            <table class="columnedTable">
            	<thead>
                    <tr valign="top">
                        <th> Job No </th>
                        <th> Job Date </th>
                        <th> Company, Client</th>						
                        <th> Phone, Mobile </th>
                        <th> Email </th>
                        <th> Project, Site Description </th>
                        <th> Sales Stage </th>
                        <th> Sent Date </th>						
                        <th> Invoice No </th>
                        <th> Paid </th> 
                        <th> Paid Date </th>
                        <th> &nbsp;&nbsp;&nbsp; </th>
                    </tr>
                </thead>

				<tbody>
                    <tr style="height:20px;">
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
                        <td><center></center></td>
						<td style="padding-left: 6px;"></td>
                    </tr>

			<?php

			# Loop through the restults obtained, and display the data in a tabular format
            while($jlRow = mysqli_fetch_array($jlResults))
            {
                # Get the column values
                $jobID 			= 	$jlRow["JobID"];
				$jobNo 			= 	$jlRow["JobNo"];
				$jobDate 		= ( $jlRow["JobDate"] == "0000-00-00"	?	""	: date("d/m/Y", strtotime($jlRow["JobDate"]))	);
				$company 		= 	$jlRow["Company"];
				$contact 		= 	$jlRow["Contact"];
				$phone 			= 	$jlRow["Telephone"];
				$mobile 		= 	$jlRow["Mobile"];
				$email 			= 	$jlRow["Email"];
				$projSiteDesc 	= 	$jlRow["ProjectSiteDescription"];
				$salesStage 	= 	$jlRow["SalesStage"];
				$sentDate 		= ( $jlRow["SentDate"] == "0000-00-00"	?	""	: date("d/m/Y", strtotime($jlRow["SentDate"]))	);
				$invNo 			= 	$jlRow["InvoiceNumber"];
				$paid 			= 	$jlRow["Paid"];
				$paidDate 		= ( $jlRow["PaidDate"] == "0000-00-00"	?	""	: date("d/m/Y", strtotime($jlRow["PaidDate"]))	);
				
				# Concatenate required values
				$companyContact	= $company;
				
				if ( $companyContact == "" )
				{
					$companyContact  = $contact;
				}
				else
				{
					$companyContact .= ", <br />" . $contact;
				}
				
				$phoneMobile	= $phone;
				
				if ( $phoneMobile == "" )
				{
					$phoneMobile  = $mobile;
				}
				else
				{
					$phoneMobile .= "<br />" . $mobile;
				}
        
                # Set table row's class as odd if loopCounter is an odd number else set it as even
                /*
				if ($loopCounter % 2 != 0){
                    echo "<tr style='color:#000000; font-size:13px;'>";
                }
                else{
                    echo "<tr style='color:#808080; font-size:13px;'>";	
                }
				*/
                
                # Set the remaining Table Data contents and close the Table Row
                echo "<td><center>" . $jobNo			.	"</center></td>";
                echo "<td><center>" . $jobDate			.	"</center></td>";
                echo "<td><center>" . $companyContact	.	"</center></td>";	
                echo "<td><center>" . $phoneMobile		.	"</center></td>";
                echo "<td><center>" . $email			.	"</center></td>";
                echo "<td><center>" . $projSiteDesc		.	"</center></td>";
                echo "<td><center>" . $salesStage		.	"</center></td>";
                echo "<td><center>" . $sentDate			.	"</center></td>";
                echo "<td><center>" . $invNo			.	"</center></td>";
                echo "<td><center>" . $paid				.	"</center></td>";
                echo "<td><center>" . $paidDate			.	"</center></td>";

				echo "</tr>";
                //$loopCounter++;
            }
            
            ?>
            </tbody>
        </table>
    </p>	<!-- End of Paragraph that just began before the DIV with ID articleBody -->
<?php
	# Free the result set resounce
	databaseFreeResource($jlResults);


?>
</div>	<!-- End of class="standardDivsLighter" -->