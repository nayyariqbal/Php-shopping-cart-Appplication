
<div id="bestsellers">
			<h2 align="center">Featured Books</h2>
            
             </div>
<?php 
//require_once("db.php");
error_reporting(~E_NOTICE); 
$whrstr="";
if ($_GET['cid']){
	$whrstr="WHERE cat_id =".$_GET['cid'];
}
else{
	$whrstr="";
}

require_once("datastore.php");
  //Step 0 - include pagination class
 require_once("classes/Pagination.php");
 
 /* Step 1 Assign Basic Variables ****/	
	$page_limit = 4;
	$total = 0;	
	$paging = "";
	$max_pages = 10;
	
//Step 2 get total records. 
 	$cntrs    = mysql_query("SELECT count(*) from books"); 
 	$totalrow = mysql_fetch_row($cntrs);
	
 	$total  =  $totalrow[0];/*echo $total;*/

//Tell the page name 
 	$_pageurl = "index.php?cid=".$_GET['cid'];

 //Step 3 Create class object	
	$paginate = new Paginate($page_limit, $total, $_pageurl, $max_pages);
	$paging = $paginate->displayTable();
	$page = $paginate->currentPage;
	$paginate->start = $paginate->start -1;
	
	$sql = "Select * from books ".$whrstr ." LIMIT $paginate->start, $paginate->limit";
/*echo $prodsql;*/

/*$sql = "Select * from books ".$whrstr;*/
/*echo $sql;*/
	

$rs = mysql_query($sql);

$dataArray = array();
while($row = mysql_fetch_row($rs)){
	array_push($dataArray,$row); 
}
/*print_r($dataArray);*/
?>                



	
		
<?php for($i = 0; $i<count($dataArray) ; $i++){ ?>
<div id="items_display">
                <table id="items_contents" cellpadding="0" cellspacing="0"  align="left" >
                
                <form name="form[i]" method="post" action="addtocart.php" >
                <input name="id" type="hidden" value="<?php echo $dataArray[$i][0];  ?>" />
                <input name="name" type="hidden" value="<?php echo $dataArray[$i][1];  ?>" />
                <input name="image" type="hidden" value="<?php echo $dataArray[$i][2];  ?>" />
                 <input name="price" type="hidden" value="<?php echo $dataArray[$i][3];  ?>" />
                <input name="desc" type="hidden" value="<?php echo $dataArray[$i][7];  ?>" />               
              
                             
                <tr>
                <td><img src="Products/<?php echo $dataArray[$i][2];  ?>" height="100px" width="100px" /></td>
                
                <td valign="top">
                    <table class="border_items" cellpadding="0" cellspacing="0" border="0px" align="left">
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left">Name</td><td align="center"><?php echo $dataArray[$i][1];?></td></tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left">Price</td><td align="center"><?php echo $dataArray[$i][3];?></td></tr>                                            
                    <tr>
                      <td align="left" valign="top">&nbsp;</td>
                      <td align="left" valign="top">Description</td><td align="center"><?php echo substr($dataArray[$i][7],0,200);?>......</td></tr>
                    <!--<tr><td colspan="3" align="left"><input type="submit" name="sub" value="Add to cart" /></td></tr>-->
                    
                    <tr><td colspan="3" align="left"><input type="image" name="sub" value="Add to cart" src="images/addtocart.gif"  ></td></tr>
                    </table>
                </td>                            
                </tr>
                </form>  
                </table>
            
              
           </div>     
                <?php }
				?> 
                            
                
</table>                
                