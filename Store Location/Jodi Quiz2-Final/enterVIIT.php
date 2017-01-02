
<!DOCTYPE html>
<!--   Jodi L. Hess  CSC423 Final December 2016  -->

<html>
<head>
<title>McArdle's Inventory Management Sytsem</title>
 <script type="text/javascript" src="verify.js"></script>

 <style>

  h2  {text-align: center;}

  h3  {text-align: center;}

body {
    background-color: lightblue;
}

  </style>
</head>
<body>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="left">

      <h2>  INVENTORY MANAGEMENT SYSTEM  </h2>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="right">



  <br>   <br>
  <h3>  <font color="B22222">  ADD A VENDOR INVENTORY ITEM TYPE </font> </h3>


  <!------------------------------------------------------------------>

<form name="myForm" onsubmit="return validateForm()" method="post">

<table>

  <col width="45%">
  <col width="55%">

  <tr>

    <td height="35 px"> Vendor Name: </td>
        <td> <input type="text" name="Vendor" id="Vendor"  size="30"> </td>


  </tr>


  <tr>
    <td height="35 px"> Vendor Item Name: </td>
         <td> <input type="text" name="Item" id="Item" size="30"> </td>


  </tr>

  <tr>
         <td height="35 px"> Vendor Current Price: &nbsp &nbsp &nbsp $  </td>
         <td> <input type="text" name="Price" id="Price" size="30"> </td>


  </tr>

  <tr>
    <td height="35 px"> Price Unit Indicator:  </td>
         <td> <form action=""> <select name="Unit" id="Unit">
           <option>Per Unit</option>
           <option>Gross</option>

  </tr>

  <tr>
    <td height="35 px"> Vendor Description: </td>
         <td> <input type="text" name="VendorDesc" id="VendorDesc"  size="30"> </td>

  </tr>


  <tr>
         <td height="35 px"> Vendor Item Number:  </td>
         <td> <input type="text" name="ItemNum" id="ItemNum"  size="30"> </td>

  </tr>


<tr>
        <td height="35 px">Preferred Vendor:  </td>
        <td> Yes
        <input type="radio" name="PrefVendor" id="PrefVendor" size="10">
          No <input type="radio" name="PrefVendor" id="PrefVendor" size="10" checked> </td>

  </tr>

           <td> </td>

<td style="height:40px">  <input align="center" type="submit" value="Submit">

    <input type="reset" value="Reset">   </td>





 </table>

  </form>

</body>
</html>
