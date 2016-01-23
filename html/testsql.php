<?php
include("connectdb.php");
$query = "SELECT * FROM shop_album WHERE album_id=4";
$result=mysql_query($query); 
$detail = mysql_fetch_assoc($result);
$sql = "UPDATE shop_album SET amount_pic = " . ($detail['amount_pic']+1) . " WHERE album_id =4";
//$result = mysql_query($sql); 
echo $sql;    
$filename = "/var/www/html/shop/Duckkk/Test/Pic0.png";
if (unlink($filename)) {
        echo "Deleted $filename!\n";
    } else {
        echo "Delete of $filename failed!\n";
    }
echo "<br/>";
chmod ("var/www/html/shop/Duckkk", 0777); 
rmdir("var/www/html/shop/Duckkk");	
if(deleteDir("var/www/html/shop/Duckkk"))
{
	echo "Directory Removed";
}
else
{
	echo "Directory can't Removed";
}
echo "<br/>";	
	
if($_GET['albumid']) 
{
	echo "Found";
}
else
{
	echo "Not Found";
}

function deleteDir($dir)
{
   if (substr($dir, strlen($dir)-1, 1) != '/')
       $dir .= '/';

   echo $dir;

   if ($handle = opendir($dir))
   {
       while ($obj = readdir($handle))
       {
           if ($obj != '.' && $obj != '..')
           {
               if (is_dir($dir.$obj))
               {
                   if (!deleteDir($dir.$obj))
                       return false;
               }
               elseif (is_file($dir.$obj))
               {
                   if (!unlink($dir.$obj))
                       return false;
               }
           }
       }

       closedir($handle);

       if (!@rmdir($dir))
           return false;
       return true;
   }
   return false;
}

?>     