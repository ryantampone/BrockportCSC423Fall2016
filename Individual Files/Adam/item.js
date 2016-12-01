function validateItem() {

	var itemName = document.getElementById("ItemTypeName").value;
	if (itemName.search(/[^A-z_0-9\.\s]/) >= 0)
	{
		alert("ERROR: Only Alphabetic (upper- and lower-case), digits (0-9), periods (.), and spaces are allowed. Please try again.");
		document.getElementById("ItemTypeName").value = "";
	}
	else if (itemName.search(/\./) == 0)
	{
		alert("ERROR: This field cannot begin with a period. Please try again.");
		document.getElementById("ItemTypeName").value = "";
	}
	else if (itemName == "")
		alert("ERROR: This field cannot be blank. Please enter a value.");

}

function validateUnits() {

	var units = document.getElementById("Units").value;
	if (units.search(/[^\d]/) >= 0)
	{
		alert("ERROR: Only integers (0-9) are allowed. Please try again.");
		document.getElementById("Units").value = "";
	}
}

function verify() {

	var myID = document.getElementById("Units").value;
	if (myID.search(/[a-z]{4}/) != 0)
	{
		alert("ERROR: This field must begin with four lowercase alphabetic characters. Please try again.");
		document.getElementById("Units").value = "";
	}
	else if (myID.search(/\d{4}/) != 4)
	{
		alert("ERROR: This field must end with four digits. Please try again.");
		document.getElementById("Units").value = "";
	}
	else if (myID.length > 8)
	{
		alert("ERROR: This field cannot contain more than 8 characters. Please try again.");
		document.getElementById("Units").value = "";
	}
}
