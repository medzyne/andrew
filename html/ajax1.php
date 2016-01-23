<?php
	session_start();
	if(!isset($_SESSION["id"]))
	{
		session_destroy();
		header("Location:login.php");
		
	}	
		 header("Content-Type: text/html; charset=UTF-8");
		 session_start();
     
	    $host="localhost";
	    $user="root"; // MySql Username
	    $pass="P@ssw0rd"; // MySql Password
	    $dbname="user"; // Database Name
	    $tblname="follower";
	 
	    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
	    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
	    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย
	
	

	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPOD | Followers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   

   

  </head>
  <body class="hold-transition skin-Purple sidebar-mini">
    <div>

      <?php include ('header.php');?>
      
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Data
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Data</h4>
      </div>
      <div class="modal-body">
        
<form>
  <h3 class="duck-underline">About us</h3>
                  <form role="form">
                    <div class="form-group">
                      <h4>Name Shop</h4>
                    </div>  
                    
                    <div class="form-group">
                      <h4>Name your shop</h4>
                      <input type="text" class="form-control" placeholder="Name your shop here" id="shop_name">
                    </div>
                    
                    
                    
                    <h4>Up load shop logo</h4>
                    
                    <div align="center">
          <?php
          if($shop_detail['shop_name'])
          {
            $photo = $shop_detail['shop_photo'];
            echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'" width="140px" height="140px" class="img-circle">';
          }
          else
          {
            echo '<img src="" width="140px" height="140px" class="img-circle">';
          }
          ?>
          <input type="file" name="image" id="shop_photo"/>
          </div> 
        
                    <div class="form-group">
                      <h4>Subtitle</h4>
                      <input type="text" class="form-control" placeholder="Enter subtitle less than 35 characters" id="shop_subtitle">
                    </div>
                    <div class="form-group">
                      <h4>Description</h4>
                      <textarea class="form-control" rows="6" placeholder="Enter Description less than 250 characters" id="shop_description"></textarea>
                    </div>

                  

</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>    
      <br/>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      
                      <th>Shop Name</th>
                      <th>Shop subtitle</th>
                      <th>Shop description</th>
                     
                    </tr>
                    <tr>
						<?php
							
							 $sql="SELECT * FROM   shop_detail WHERE  user_id='".$_SESSION['id']."'";
							
								
			            //$sql="Select * From follower"; // คำสั่ง sql อ่านข้อมูลจากตาราง tbl_name
			            $result=mysql_query($sql); // คิวรี่คำสั่ง sql
			            $num=mysql_num_rows($result); // ตรวจสอบจำนวน record ที่คิวรี่ออกมา
			            if($num>0){ // ถ้าจำนวน record มากกว่า 0
			                $count=1; // กำหนดตัวแปร count เพื่อระบุตำแหน่ง record
			                while($recordset=mysql_fetch_assoc($result)){ // วน loop ดึงข้อมูลออกมา ทีละ record
			        
			        echo "<tr>";
			        echo    "<td>".$recordset['shop_name']."</td>";
			        echo    "<td>".$recordset['shop_subtitle']."</td>";
			        echo    "<td>".$recordset['Shop_description']."</td>";
			        
			        
			        
			        echo "</tr>";
			                    
			                }
			            }
			        ?>
					</tbody>
					</table>
    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div> <!-- /.col -->
          </div><!-- /.row -->
             

              

       
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

     
    </div><!-- ./wrapper -->

    

  </body>
</html>
