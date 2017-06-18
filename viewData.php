<table id="viewcart_display" align="center" style="border:1px solid black; border-collapse:collapse;" cellpadding="2" cellspacing="2" width="100%" >
                <tr>
                <th>#</th>
                <th>Book</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Option</th>                
                </tr>
                <form name="form1" method="post" action="updateBasket.php">               
                <?php 
				if(count($cart->items)>0){				
					for($i = 0; $i<count($cart->items); $i++){ ?>
                    
                    
         
                	<tr>                
                		<td><?php echo $i+1;  ?></td>
                		<td><img src="Products/<?php echo $cart->items[$i][2];?>" height="100px" width="100px" /><br /><?php echo $cart->items[$i][1];  ?></td>
                		<td>Rs <?php echo $cart->items[$i][3];  ?></td>                
                		<td><input type="text" name="items[]" value="<?php echo $cart->items[$i][4];?>" size="2"/></td>
                		<td><?php echo $cart->items[$i][5];  ?></td>
                           
                		<td><a href="removeItem.php?itemid=<?php echo $cart->items[$i][0]; ?>" class="a" onclick="return confRem();">Remove this Item</a></td>           
                	</tr>                
                <?php } 
				}else{
				?>
                
                	<tr><td colspan="6" align="center">&nbsp;</td></tr>
                	<tr><td colspan="6" align="center"><?php  echo "Shopping cart empty!!!";  } ?></td></tr>
                 	<tr><td colspan="6">&nbsp;</td></tr>
                  	<tr><td colspan="6" align="right"><strong>Total:</strong> $<?php echo  $cart->calculate_gTotal(); ?></td></tr>
                    <tr><td colspan="6">&nbsp;</td>
                    
                    </tr>
                   
                   
              
                   
                	<tr><td colspan="6" align="center"> 
                	<input type="submit" name="update" value="Update Cart" />
                 	<input type="button" name="emptycart" value="Empty Cart" onclick="window.location='emptycart.php'" />&nbsp;<input type="button" name="continue" value="Continue Shopping" onclick="window.location='index.php'" />&nbsp;<input type="button" name="checkout" value="Checkout" onclick="window.location='checkOut.php'" /></td></tr>
                	</form>
                	</table>                
                </p>
                
              </td>
              </tr>
              </table>