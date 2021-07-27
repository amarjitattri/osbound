// JavaScript Document
function prepareEventHandlers(){

	// Make references to txtCompaniesADD and cboCompaniesADD 
	txtCompaniesADD		= document.getElementById("txtCompaniesADD");
	cboCompaniesADD		= document.getElementById("cboCompaniesADD");

	cboCompaniesADD.onchange = function(){
		// Call function to populate required values
		populateField('cboCompaniesADD', 'txtCompaniesADD');
	};

	
	
	// Function to populate required field from required dropdown - this is currently being used to auto populate 
	// the Raise Request Invoice text boxes when an option is selected from the respective drop down control
	function populateField($ddControlID, $txtControlID)
	{
		// Instantiate reference to ddUnitOfMeasureAdd and invDetUnitOfMeasureAdd
		$ddControl						= document.getElementById($ddControlID);
		$txtControl						= document.getElementById($txtControlID);
	
		// Populate the selected value from the Dropdown to the required Textbox
		$txtControl.value				= ( $ddControl.value != "0" ? $ddControl.value : "" );
		
		// Set the value of the drop down to the default
		$ddControl.value				= "0";	
	}

}

window.onload = function(){
	prepareEventHandlers();	
}