<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>Book Shop</title>
<script type="text/javascript">
function confRem(){	
	if(confirm("Are you sure to remove this item from cart")){
		return true;
	}	
	return false;
}
</script>



</head>
<?php
 require_once("datastore.php");
 require_once("classes/Cart.php"); 
 $cart = "";
 $total=0;
 $cart	=	$_SESSION['cart'];
/*  print_r($cart);*/
 echo "<br />";
 ?>
<body>

<!-- Header -->

<div id="header">
<div id="page_header">
	<div id="page_title">
	<h1>
	<img src="images/header_logo.gif" width="25" height="26" alt="" />
	<span>Books Forever</span>
	</h1>
	</div>
    
	<div id="header_search">
		<form method="post" action="http://www.freewebsitetemplates.com">
		<div>
		<h3><span>Find:</span></h3>  
		<input type="text" />
		<input type="image" src="images/search_button.gif" class="submit" />
       <a href="admin/index.php" > <img src="images/admin button.gif" height="25" align="right" /> </a>
       
		</div>
        
	  </form>
	</div>
 
</div></div>
<!-- Menu -->
<div id="menucontainer">
<div id="menunav">
<?php require("include/header.php");?>	
</div>
</div>


<div id="page_wrapper">
	<!-- BEGIN :: LEFT SIDEBAR -->
	<div id="page_leftcol">
		
      <?php require("leftcontents.php");?>  
  </div>
	</div>
	<!-- //END :: LEFT SIDEBAR -->
  
	<div id="main_view">
	<h1 class="heading_style">Shopping Cart</h1>
    
    <?php require("currency_index.php");?>
               
                <table id="viewcart_display" align="center" style="border:1px solid black; border-collapse:collapse;" cellpadding="2" cellspacing="2" width="65%" >
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
                    
                    <input type="hidden" name="itemids[]" value="<?php echo $cart->items[$i][0];?>" />
         
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
                  	<tr><td colspan="6" align="right"><strong>Total:</strong> PKR<?php echo  $cart->calculate_gTotal(); ?></td></tr>
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
             
   </div>
    </div>
<!--</div>-->

</div>


<div id="links"><?php require_once("include/footer.php");?>
</div>

</body>
</html>