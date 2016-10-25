<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>Home Page</title>
    <link href="css/headerStyles.css" type="text/css" rel="stylesheet" />
    <link href="css/homeActionStyles.css" type="text/css" rel="stylesheet" />

<script language="javascript">

  function hasToBeNumber(event)
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
    if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)))
      return false;
    return true;
  }

  function isTextCityKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keycode
    if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 32 || charCode > 32)) )
      return false;
    return true;
  }

  function isPhoneNumber()
  {
  	var phonenumber = document.getElementById("phone").value;
  	var pattern = /^\d{3}-\d{3}-\d{4}$/;
  	if (phonenumber.match(pattern))
  	  continue;
  	else
  	  alert("Invalid Phone Number, must be in the format ###-###-####");
  }



</script>


</head>

<body>
  <!-- ====================== Begin Page Header ====================== -->
  <h1 align="center">Nanno's Foods</h1>

  <div id="nav">
      <div id="nav_wrapper">
          <ul>
              <li><a href="/~rtamp1/csc423/gp/index.php">Home</a></li>
              <li><a href="#">Vendor</a>
                  <ul>
                    <li><a href="/~rtamp1/csc423/gp/new_vendor_ui_form.php">Add Vendor</a>
                    <li><a href="/~rtamp1/csc423/gp/modify_vendor_ui_form.php">Modify Vendor</a>
                    <li><a href="/~rtamp1/csc423/gp/delete_vendor_ui_form.php">Remove Vendor</a>
                  </ul>
              </li>
              <li><a href="#">Locations</a>
                  <ul>
                    <li><a href="/~rtamp1/csc423/gp/add_store_location_ui.php">Add Store Location</a>
                    <li><a href="/~rtamp1/csc423/gp/modify_store_location_ui.php">Modify Store Location</a>
                    <li><a href="/~rtamp1/csc423/gp/delete_store_location_ui.php">Remove Store Location</a>
                  </ul>
              </li>
              <li><a href="#">Items</a>
                  <ul>
                    <li><a href="/~rtamp1/csc423/gp/new_item_ui_form.php">Add Item</a>
                    <li><a href="/~rtamp1/csc423/gp/modify_item_ui_form.php">Modify Item</a>
                    <li><a href="/~rtamp1/csc423/gp/delete_item_ui_form.php">Remove Item</a>
                  </ul>
              </li>
              <li><a href="#">Customer</a>
                  <ul>
                    <li><a href="/~rtamp1/csc423/gp/add_customer_ui_form.php">Add Customer</a>
                    <li><a href="/~rtamp1/csc423/gp/modify_customer_ui_form.php">Modify Customer</a>
                    <li><a href="/~rtamp1/csc423/gp/delete_customer_ui_form.php">Remove Customer</a>
                  </ul>
              </li>
          </ul>
      </div>
  </div>

  <br>
