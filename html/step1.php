<?php
	include("check/check_login.php");
	if($shopdetail['shop_name'])
	{
		$name = $shopdetail['shop_name'];
	}
?><!DOCTYPE html>
<html>
  

   <h3>Name your pod</h3>
   <form method="POST" action="allaboutshop/record_shop.php" enctype="multipart/form-data" >
    <div class="input-group input-group-sm">
        <input type="text" class="form-control" name="shop_name" id="shop_name" value="<?=$name?>" />
		<span class="input-group-btn">
        	<!--<button class="btn btn-info btn-flat" type="submit">Name it!</button>-->
        	
        	
        	
        	<button type="submit" class="btn btn-primary">Update!</button>




        </span>
    </div>
	</form>
    </br></br> 
    
    
    
	            

</html>
