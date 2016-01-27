<?php
function queryWithError ($query, $success)
{
  $result = mysql_query($query);
  if($result == true){
    http_response_code(200);
    echo($success);
    return $result;
  }
  else{
    http_response_code(400);
    echo mysql_error();
    return $result;
  }
}

function ShopCount($tableName, $shopID)
{
   $countOuery = "SELECT COUNT(*) FROM $tableName WHERE shop_id = ".$shopID;
   $shopCount = mysql_result(mysql_query($countOuery), 0);
   return $shopCount;
}

?>
