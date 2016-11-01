<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>Home Page</title>
    <link href="css/headerVendorStyles.css" type="text/css" rel="stylesheet" />
    <link href="css/homeActionStyles.css" type="text/css" rel="stylesheet" />

<script language="javascript">

  function hasToBeNumber(evt)
	{
    var charCode = (evt.which) ? evt.which : event.keycode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
  }

  function isZipCode(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keycode
		if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode.length == 5))
			return false;
		return true;
	}

  function checkZipCode()
  {
    var myZip = document.getElementById("zip").value;
    if (myZip.length < 5)
    {
      document.getElementById("zip").value = "";
      //alert("ERROR: The Zip Code field must contain 5 numbers. Please try again.");
    }

  }

  function hasToBeLetter(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keycode
    if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)))
      return false;
    return true;
  }

  function hasToBeNumberOrLetter(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keycode
		if  ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)))
			return false;
		return true;
	}

  function isTextNameKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keycode
    if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)) &&
    (charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
      return false;
    return true;
  }

  function isTextCityOrPersonKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keycode
    if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 32 || charCode > 32)) &&
    (charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
      return false;
    return true;
  }

  function isPhoneNumber()
  {
  	var phonenumber = document.getElementById("phone").value;
  	var pattern = /^\d{3}-\d{3}-\d{4}$/;
  	if (phonenumber.match(pattern))
  	  return;
  	else
    {
  	  alert("Invalid Phone Number, must be in the format ###-###-####");
      document.getElementById("phone").value = "";
    }
  }

  // Do not need this function - recent update allows user to enter backslash and apostrophe
  /*function anythingButQuotesOrSlash(evt)
  {
	var charCode = (evt.which) ? evt.which : event.keycode

	// Allows: anything but single quote (') and backslash (\)
	if (charCode > 31 && (charCode < 39 || charCode > 39) && (charCode > 31 && (charCode < 92 || charCode > 92)))
		return true;
	return false;

}*/

  // Do not need password function - user can type any character in password field
  /*function isPasswordKey(evt)
  {
  	var charCode = (evt.which) ? evt.which : event.keycode

  	// Allows: anything but single quote (') and backslash (\)
  	if (charCode > 31 && (charCode < 39 || charCode > 39) && (charCode > 31 && (charCode < 92 || charCode > 92)))
  	   return true;
  	return false;

  }*/

  function isAddressKey(evt)
  {
  	var charCode = (evt.which) ? evt.which : event.keycode

  	// Allows: A-Z, a-z, space, numbers, hyphens, apostrophe/backslash
  	if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 32 || charCode > 32)) &&
    (charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
  		return false;
  	return true;
  }

	// item
  function isOnlyCharacter(evt)
  {
		var charCode= (evt.which) ? evt.which: event.keycode
			if(charCode > 65 || charCode < 91 || charCode > 96 || charCode < 123)
				return true;
			return false;
	}

  function isItemCost()
  {
    var itemcost = document.getElementById("ItemCost").value;
    var pattern = /^\d+.\d{2}$/;
    if (itemcost.match(pattern))
      return;
    else
    {
      alert("Invalid Item Cost");
      document.getElementById("ItemCost").value = "";
    }

	}


  function isItemRetail()
  {
    var itemretail = document.getElementById("ItemRetail").value;
    var pattern = /^\d+.\d{2}$/;
    if (itemretail.match(pattern))
      return;
    else
    {
      alert("Invalid Item Retail");
      document.getElementById("ItemRetail").value = "";
    }
  }

  function isImageFileName(evt)
	{
    var charCode = document.getElementById("ImageFileName").value;
		if(charCode.match(/[\d\D_.\/-]*/))
			    return true;
			return false;
  }


  function check_dept() {
 switch(document.getElementById('Department').value){
		case 'Meat Department':
			document.getElementById('Category_1').innerHTML = 'Beef';
        	document.getElementById('Category_2').innerHTML = 'Chicken';
			break;

		case 'Candy Department':
		 document.getElementById('Category_1').innerHTML = 'Jelly Beans';
         document.getElementById('Category_2').innerHTML = 'Gummy & Chewy Candy';
		 break;

		 case 'Cookies/Crackers Department':
		 document.getElementById('Category_1').innerHTML = 'Chocolate Chip Cookies';
         document.getElementById('Category_2').innerHTML = 'Ginger Cookies';
		 break;

		default:

		  document.getElementById('Category_1').innerHTML = 'Pepsi';
          document.getElementById('Category_2').innerHTML = 'Water';

		}
}


//item

</script>

</head>

<body>
  <!-- ====================== Begin Page Header ====================== -->
  <h1 align="center">Nanno's Foods Order Management</h1>

  <div id="nav">
      <div id="nav_wrapper">
          <ul>
              <li><a href="/~rtamp1/csc423/gp/indexVendor.php">Home</a></li>
                  <ul>
                    <li><a href="/~rtamp1/csc423/gp/new_vendor_ui_form.php">Add Vendor</a>
                  </ul>

              </li>
          </ul>
      </div>
  </div>
  <br>
