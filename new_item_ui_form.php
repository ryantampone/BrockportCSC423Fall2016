<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h4 align='center'>Please Fill out the New Item Form Below</h4>
	  </div>
	  
    	<div id='userdataform'>
            <form action='insert_item.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Item ID:</span></td>
                        <td><input id='ItemId' name='ItemId' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
               	    <tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='Description' name='Description' type='textarea' onKeyPress='return anythingButQuotes(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='Size' name='Size' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Division:</span></td>
						<td>
							<select name='Division'>
								<option value='food_convenience'>Food Convenience</option>
								<option value='meat_convenience'>Meat Convenience</option>
						
						</td>
						
                       
                    </tr>
		    
		    
		    <tr>
                        <td><span align='right'>Department:</span></td>
						<td>
							<select name='Department'>
								<option value='meat_department'>Meat Department</option>
								<option value='beverages_department'>Beverages Department</option>
								<option value='frozen_foods_department'>Frozen Foods Department</option>
								<option value='produce_department'>Produce Department</option>
								<option value='bread/bakery_department'>Bread/Bakery Department</option>


						</td>
						
                       
                    </tr>
		    
					
		    <tr>
                        <td><span align='right'>Category:</span></td>
                        <td>
						
						<select name='Category'>
								<option value='beverages'>Beverages</option>
								<option value='bread/bakerty'>Bread/Bakery</option>
								<option value='meat'>Meat</option>
								<option value='frozen foods'>Frozen Foods</option>
						
						/td>
                    </tr>
					
		<tr>
			<td><span align='right'>Item Cost</span></td>
			 <td><input id='ItemCost' name='ItemCost' TYPE='text' onKeyPress='return isPrice(event)' onpaste='return false' SIZE='50' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Item Retail</span></td>
			 <td><input id='ItemRetail' name='ItemRetail' TYPE='text' SIZE='50' onKeyPress='return isPrice(event)' onpaste='return false' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Vendor Id</span></td>
			<td><input id='VendorId' name='VendorId' TYPE='text' SIZE='50' required/></td>			
		</tr>
			
		<tr>  
			<td><span align='right'>Image FileName</span></td>
			<td><input id='ImageFileName' name='ImageFileName' TYPE='text' SIZE='50' onKeyPress='return isImageFileName(event)' onpaste='return false'   value='BrockportCSC423Fall2016/src/' /></td>
		</tr>
										
                </table>		
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
	";
?>
