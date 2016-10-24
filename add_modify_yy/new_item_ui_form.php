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
                        <td><input id='ItemId' name='ItemId' TYPE='text' SIZE='50' required/></td>
                    </tr>
               	    <tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='Description' name='Description' type='textarea' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='Size' name='Size' TYPE='text' SIZE='50' required/></td>
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
						
						</td>
						
                       
                    </tr>
		    
					
		    <tr>
                        <td><span align='right'>Category:</span></td>
                        <td>
						
						<select name='Category'>
								<option value='candy'>Candy</option>
								<option value='pie'>Pie</option>
						
						/td>
                    </tr>
					
		<tr>
			<td><span align='right'>Item Cost</span></td>
			 <td><input id='ItemCost' name='ItemCost' TYPE='text' SIZE='50' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Item Retail</span></td>
			 <td><input id='ItemRetail' name='ItemRetail' TYPE='text' SIZE='50' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Vendor Id</span></td>
			<td><input id='VendorId' name='VendorId' TYPE='text' SIZE='50' required/></td>			
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
