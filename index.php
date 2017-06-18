<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Books Store</title>

<link href="style/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<?php 
try
{
	?>
<!-- Header -->
<div id="header">
<div id="page_header">
	<div id="page_title">
	<h1>
	<img src="images/header_logo.gif" width="25" height="26" alt="" />
	<span>Ideal Books Store</span>
	</h1>
	</div>
    
	<div id="header_search">
		<form method="get" action="http://www.google.com/search">
		<div>
		<h3><span>Find:</span></h3>  
		<input type="text" value="" maxlength="255"/>
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
	
      <?php require("leftcontents.php");?>  
   
	
    
	<!-- //END :: LEFT SIDEBAR -->

<!-- BEGIN :: MAIN COL -->
	<div id="page_maincol">
    
	  <div id="maincol_top">
			<div class="sideimg">&nbsp;</div>
			<div class="content1">
				<h2><span>Welcome to our site</span></h2>
				<p>
This is a template designed by free website templates for you for free you can replace all the text by your own text. This is just a place holder so you can see how the site would look like. If you're having problems editing the template please don't hesitate to ask for help on the forum. You will get help
				</p>
				<div class="readmore"><a href="http://www.freewebsitetemplates.com">Read More</a></div>
			</div>
            
            
		</div>
        
       
		
        
            <div id="main_index"><?php require_once("mainContents.php");?></div>
        
        
         
            
      
      
  </div>
    
	
        
  

<div id="page_rightcol">
<?php require_once("rightcontents.php");?>
</div>

              <div class="pagination"><?php echo $paging; ?></div>
                    

<div id="links"><?php require_once("include/footer.php");?>
</div>

<?php } catch(Exception $e)
{
	echo "There is a problem in opening this page.";
}?>

</body>
</html>