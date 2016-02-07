<?php
function queryWithError ($query, $success, $shopID)
{
  $result = mysql_query($query);
  if($result == true){
    http_response_code(200);
    echo(json_encode(array("message" => $success, "shopID" => $shopID)));
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

function clean_dir($dir){
  $files = glob($dir . '*'); // get all file names
  foreach($files as $file){ // iterate files
    if(is_file($file))
      unlink($file); // delete file
  }
}

function save_file($shopID, $photo_name, $photo_path, $section)
{
  if(!$photo_path)
  {
    return false;
  }
  $basepath = "/var/www/html/shop/" . $shopID;
  mkdir($basepath);
  $basepath = $basepath . "/" . $section . "/";
  mkdir($basepath);
  clean_dir($basepath);
  move_uploaded_file($photo_path, $basepath . $photo_name);
  return true;
}

?>
