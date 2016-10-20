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
                        <td><input id='item_id' name='item_id' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Item Name:</span></td>
                        <td><input id='item_name' name='item_name' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='size' name='size' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Division:</span></td>
						<td>
							<select name='division'>
								<option value='food_convenience'>Food Convenience</option>
								<option value='meat_convenience'>Meat Convenience</option>
						
						</td>
						
                       
                    </tr>
					
					 <tr>
                        <td><span align='right'>Category:</span></td>
                        <td>
						
						<select name='category'>
								<option value='candy'>Candy</option>
								<option value='pie'>Pie</option>
						
						/td>
                    </tr>
					
										<tr>
											<td><span align='right'>Price</span></td>
								  <td><input id='price' name='price' TYPE='text' SIZE='50' required/></td>			
										</tr>
									
										<tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='desc' name='desc' type='textarea' required/></td>
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
