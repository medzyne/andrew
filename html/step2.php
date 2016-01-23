<?php
	include("check/check_login.php");
?>

<script>

function myFunction() 
  {
        var pass1 = document.getElementById("user_pass_new").value;
        var pass2 = document.getElementById("user_pass_firm").value;
        if (pass1 != pass2) 
    {
            //alert("Passwords Do not match");
            var message = document.getElementById("passerror");
            message.innerHTML = "Passwords Do not match";
            return false;
            //document.getElementById("user_pass").style.borderColor = "#E34234";
            //document.getElementById("user_pass_re").style.borderColor = "#E34234";
        }
        else {
            return validate();
            //alert("Passwords Match!!!");
        }
    }
    
</script>    

<html>
    
 <div class="row">
  <br/>



               <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/about-us-before.png" 
onmouseover="this.src='../dist/img/about-us.png';"
onmouseout="this.src='../dist/img/about-us-before.png';" class="center-block" data-toggle="collapse" href="#collapseAboutus" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box -->
              </div><!-- /.col -->



             



  
         <!-- Tab2.2-->
              <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/call-us-before.png" 
onmouseover="this.src='../dist/img/call-us.png'"
onmouseout="this.src='../dist/img/call-us-before.png'" class="center-block" data-toggle="collapse" href="#collapseCallus" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box --> 
              </div><!-- /.col -->
         <!-- Tab2.3-->
              <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/image-icon-before.png" 
onmouseover="this.src='../dist/img/image-icon.png'"
onmouseout="this.src='../dist/img/image-icon-before.png'" class="center-block" data-toggle="collapse" href="#collapseImage" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box -->  
              </div><!-- /.col -->

</div><!-- /.row -->




</br></br>
            <!-- Tab2.4-->
<div class="row">
              <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/video-icon-before.png" 
onmouseover="this.src='../dist/img/video-icon.png'"
onmouseout="this.src='../dist/img/video-icon-before.png'" class="center-block" data-toggle="collapse" href="#collapseVideo" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box -->  
              </div><!-- /.col -->
      <!-- Tab2.5-->  
              <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/fb-icon-before.png" 
onmouseover="this.src='../dist/img/fb-icon.png'"
onmouseout="this.src='../dist/img/fb-icon-before.png'" class="center-block" data-toggle="collapse" href="#collapseFB" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box -->  
              </div><!-- /.col -->
        <!-- Tab2.6-->
              <div class="col-md-4">
                <div class="gradient-box">
                  <img src="../dist/img/fanwall-before.png" 
onmouseover="this.src='../dist/img/fanwall.png'"
onmouseout="this.src='../dist/img/fanwall-before.png'" class="center-block" data-toggle="collapse" href="#collapseFanwall" aria-expanded="false" aria-controls="collapseExample">                
                </div><!-- /.gradient-box -->  
              </div><!-- /.col -->

</div><!-- /.row -->
   
<div class="row">
  
  
   <div class="collapse" id="collapseAboutus"> <!--Start about us-->
               <div class="col-md-12">
               </br></br>
               <form onsubmit="return myFunction();" method="POST" action="allaboutshop/record.php" enctype="multipart/form-data" >
                <h3 class="duck-underline">About us</h3>
                  <form role="form">
                    <div class="form-group">
                      <h4>Name Shop</h4>
                    </div>  
                    
                    
                    
                    <h4>Up load shop logo</h4>
                    
                    <div align="center">
          <?php
          if($shopdetail['shop_name'])
          {
            $photo = $shopdetail['shop_photo'];
            echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'" width="140px" height="140px" class="img-circle">';
          }
          else
          {
            echo '<img src="" width="140px" height="140px" class="img-circle">';
          }
          ?>
          <input type="file" name="image" />
          </div> 
        
                    <div class="form-group">
                      <h4>Subtitle</h4>
                      <input type="text" class="form-control" placeholder="Enter subtitle less than 35 characters">
                    </div>
                    <div class="form-group">
                      <h4>Description</h4>
                      <textarea class="form-control" rows="6" placeholder="Enter Description less than 250 characters"></textarea>
                    </div>

                    <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                    
                    </form>
                    </div>
              </br></br>
              </form>
  </div> <!--End about us-->               
              
  <div class="collapse" id="collapseCallus"> <!--Start call-->
        <h3 class="duck-underline">Phone number</h3>
          
          <div class="box-body">
              <form method="POST" action="allaboutshop/insert_call.php" enctype="multipart/form-data" >
                <h4>Your current phone number: <h4>
                <h4>Update your phone number</h4>
                <input type="text" class="form-control" name="call_num" id="call_num">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>          
          </div>
          


  </div>
   <!--End call-->
  <div class="collapse" id="collapseImage"> <!--Start Gall-->
        <div class="well">
			<h2>Insert image </h2>
			</br>
			<!--<script type="text/javascript" src="app.js"></script>-->
			<link type="text/css" rel="stylesheet" href="../dist/css/dropzone.css">

			<!--<script src="../dist/css/dropzone.css"></script>
			<link rel="stylesheet" type="text/css" href="style.css"> -->
			<?php
				$sql = "SELECT * FROM shop_album WHERE shop_id=".$_SESSION['shop_id']." AND real_name='Album1'";
				$result = mysql_query($sql); 
				$shopalbum = mysql_fetch_assoc($result);
			?>
			<form method="post" action="gall_upload.php<?=$shopalbum['album_id'] ? "?albumid=".$shopalbum['album_id'] : ""?>" class="dropzone" id="mydropzone1" enctype="multipart/form-data">
				Album 1 name: <input type="text" name="Album1" value="<?=$shopalbum['album_name']?>"/>
				<br/>
				<?php
					$sql2 = "SELECT * FROM shop_photo WHERE album_id=".$shopalbum['album_id'];
					$result2 = mysql_query($sql2); 
					while($albumphoto = mysql_fetch_assoc($result2))
					{
						echo "<div class='dz-preview'>\n";
							echo "<div class='dz-file-preview'>\n";
								echo " <div class=\"dz-image\">\n";
									echo "<img data-dz-thumbnail src='".substr($albumphoto['photo_path'], 13)."' width='120' height='120' />\n";
								echo "</div>\n";
							echo "</div>\n";
							echo "<textarea rows='4' cols='15' id='des".$albumphoto['photo_id']."' onblur='UpdateAlbumDetail(".$albumphoto['photo_id'].");'>\n";
							echo $albumphoto['description'];
							echo "</textarea>\n";
							echo "<a class=\"dz-remove\" href=\"javascript:deletefile(file, '1');\" data-dz-remove>Remove file</a>\n";
						echo "</div>\n";
					}
				?>
				<br/>
				<!--<input type="button" name="CreateAlbum1" value="Creat Album 1" />-->
			</form>
			<br/>
			<script>
				Dropzone.options.mydropzone1 = 
				{
					maxFiles: <?=$shopalbum['max_pic'] ? $shopalbum['max_pic'] - $shopalbum['amount_pic'] : 10;?>,
					url: 'gall_upload.php?album=1<?=$shopalbum['album_id'] ? "&albumid=".$shopalbum['album_id'] : ""?>',
					dictDefaultMessage: "Drag your images",
					addRemoveLinks: true,
					acceptedFiles: "image/jpeg,image/png,image/gif",

					accept: function(file, done) 
					{
						done();
					},
					init: function() 
					{
						this.on("addedfile", function(file)
						{
							//alert("Add File");
							var id = location.search.split('shop=')[1] ? location.search.split('shop=')[1] : 'Not Found';
							//alert(document.getElementsByName("Album1")[0].value);
							if(id == "Not Found")
							{
								alert("Please Update Shop Name at first tab.");
								this.removeFile(file);
							}
							if(document.getElementsByName("Album1")[0].value == "")
							{
								alert("Please insert Album name first.");
								this.removeFile(file);
							}
							else if(!/^[A-z]+[A-z -_]*$/.test(document.getElementsByName("Album1")[0].value))
							{
								alert("Album name is not correct format.");
								this.removeFile(file);
							}
						});
						this.on("maxfilesexceeded", function(file)
						{
							alert("No more files please!");
						});
						this.on("removedfile", function(file) 
						{
							deletefile(file, "1"); 
						});
					}
				};
			</script>
			<?php
				$sql = "SELECT * FROM shop_album WHERE shop_id=".$_SESSION['shop_id']." AND real_name='Album2'";
				$result = mysql_query($sql); 
				$shopalbum = mysql_fetch_assoc($result);
			?>
			<form method="post" action="gall_upload.php" class="dropzone" id="mydropzone2" enctype="multipart/form-data">
				Album 2 name: <input type="text" name="Album2" value="<?=$shopalbum['album_name']?>" />
				<br/>
				<?php
					$sql2 = "SELECT * FROM shop_photo WHERE album_id=".$shopalbum['album_id'];
					$result2 = mysql_query($sql2); 
					while($albumphoto = mysql_fetch_assoc($result2))
					{
						echo "<div class='dz-preview'>\n";
							echo "<div class='dz-file-preview'>\n";
								echo " <div class=\"dz-image\">\n";
									echo "<img data-dz-thumbnail src='".substr($albumphoto['photo_path'], 13)."' width='120' height='120' />\n";
								echo "</div>\n";
							echo "</div>\n";
							echo "<textarea rows='4' cols='15' id='des".$albumphoto['photo_id']."' onblur='UpdateAlbumDetail(".$albumphoto['photo_id'].");'>\n";
							echo $albumphoto['description'];
							echo "</textarea>\n";
							echo "<a class=\"dz-remove\" href=\"javascript:deletefile(file, '1');\" data-dz-remove>Remove file</a>\n";
						echo "</div>\n";
					}
				?>
				<br/>
				<!--<input type="button" name="CreateAlbum2" value="Creat Album 2" />-->
			</form>
			<br/>  
			<script>
			Dropzone.options.mydropzone2 = 
				{
					maxFiles: <?=$shopalbum['max_pic'] ? $shopalbum['max_pic'] - $shopalbum['amount_pic'] : 10;?>,
					url: 'gall_upload.php?album=2<?=$shopalbum['album_id'] ? "&albumid=".$shopalbum['album_id'] : ""?>',
					dictDefaultMessage: "Drag your images",
					addRemoveLinks: true,
					acceptedFiles: "image/jpeg,image/png,image/gif",

					accept: function(file, done) 
					{
						done();
					},
					init: function() 
					{
						this.on("addedfile", function(file)
						{
							//alert("mydropzone2");
							var id = location.search.split('shop=')[1] ? location.search.split('shop=')[1] : 'Not Found';
							//alert(document.getElementsByName("Album2")[0].value);
							if(id == "Not Found")
							{
								alert("Please Update Shop Name at first tab.");
								this.removeFile(file);
							}
							if(document.getElementsByName("Album2")[0].value == "")
							{
								alert("Please insert Album name first.");
								this.removeFile(file);
							}
							else if(!/^[A-z]+[A-z -_]*$/.test(document.getElementsByName("Album2")[0].value))
							{
								alert("Album name is not correct format.");
								this.removeFile(file);
							}
						});
						this.on("maxfilesexceeded", function(file)
						{
							alert("No more files please!");
						});
						this.on("removedfile", function(file) 
						{
							deletefile(file, "2"); 
						});
					}
				};
			</script>
			<?php
				$sql = "SELECT * FROM shop_album WHERE shop_id=".$_SESSION['shop_id']." AND real_name='Album3'";
				$result = mysql_query($sql); 
				$shopalbum = mysql_fetch_assoc($result);
			?>
			<form method="post" action="gall_upload.php" class="dropzone" id="mydropzone3" enctype="multipart/form-data">
				Album 3 name: <input type="text" name="Album3" value="<?=$shopalbum['album_name']?>" />
				<br/>
				<?php
					$sql2 = "SELECT * FROM shop_photo WHERE album_id=".$shopalbum['album_id'];
					$result2 = mysql_query($sql2); 
					while($albumphoto = mysql_fetch_assoc($result2))
					{
						echo "<div class='dz-preview'>\n";
							echo "<div class='dz-file-preview'>\n";
								echo " <div class=\"dz-image\">\n";
									echo "<img data-dz-thumbnail src='".substr($albumphoto['photo_path'], 13)."' width='120' height='120' />\n";
								echo "</div>\n";
							echo "</div>\n";
							echo "<textarea rows='4' cols='15' id='des".$albumphoto['photo_id']."' onblur='UpdateAlbumDetail(".$albumphoto['photo_id'].");'>\n";
							echo $albumphoto['description'];
							echo "</textarea>\n";
							echo "<a class=\"dz-remove\" href=\"javascript:deletefile(file, '1');\" data-dz-remove>Remove file</a>\n";
						echo "</div>\n";
					}
				?>
				<br/>
				<!--<input type="button" name="CreateAlbum3" value="Creat Album 3" />-->
			</form>
			<br/>
			<script>
				Dropzone.options.mydropzone3 = 
				{
					maxFiles: <?=$shopalbum['max_pic'] ? $shopalbum['max_pic'] - $shopalbum['amount_pic'] : 10;?>,
					url: 'gall_upload.php?album=3<?=$shopalbum['album_id'] ? "&albumid=".$shopalbum['album_id'] : ""?>',
					dictDefaultMessage: "Drag your images",
					addRemoveLinks: true,
					acceptedFiles: "image/jpeg,image/png,image/gif",

					accept: function(file, done) 
					{
						done();
					},
					init: function() 
					{
						this.on("addedfile", function(file)
						{
							//alert("mydropzone3");
							var id = location.search.split('shop=')[1] ? location.search.split('shop=')[1] : 'Not Found';
							//alert(document.getElementsByName("Album3")[0].value);
							if(id == "Not Found")
							{
								alert("Please Update Shop Name at first tab.");
								this.removeFile(file);
							}
							if(document.getElementsByName("Album3")[0].value == "")
							{
								alert("Please insert Album name first.");
								this.removeFile(file);
							}
							else if(!/^[A-z]+[A-z -_]*$/.test(document.getElementsByName("Album3")[0].value))
							{
								alert("Album name is not correct format.");
								this.removeFile(file);
							}
						});
						this.on("maxfilesexceeded", function(file)
						{
							alert("No more files please!");
						});
						this.on("removedfile", function(file) 
						{
							deletefile(file, "3"); 
						});
					}
				};
				
				function deletefile(value, album)
				{
					var xmlhttp;
					if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					}
					else
					{// code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							//alert(xmlhttp.responseText);
						}
					}
					xmlhttp.open("GET","gall_cancel.php?filename=" + value.name + "&album=" + album + "&shop=<?=$_SESSION['shop_id']?>", true);
					xmlhttp.send();
				}
				
				function UpdateAlbumDetail(id)
				{
					var description = document.getElementById("des"+id).value;
					//alert(description);
					var xmlhttp;
					if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					}
					else
					{// code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							alert(xmlhttp.responseText);
						}
					}
					//alert("update_photo_detail.php?photo=" + id + "&des=" + description);
					xmlhttp.open("GET","update_photo_detail.php?photo=" + id + "&des=" + description, true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send();
					//alert("readyState="+xmlhttp.readyState+", Status"+xmlhttp.status);
					/*$.ajax
					({
						url: "update_photo_detail.php?photo=" + id + "&des=" + description,
						complete: function (response) 
						{
							$('#output').html(response.responseText);
						},
						error: function () 
						{
							$('#output').html('Bummer: there was an error!');
						}
					});*/
				}
			</script>
        </div>
  </div> <!--End -->



  <div class="collapse" id="collapseVideo"> <!--Start Video-->
        
            <h3 class="duck-underline">Video</h3>
          <div class="box-body">
    
            <form method="POST" action="allaboutshop/insert_youtube.php" enctype="multipart/form-data" >
            <h4>Youtube link</h4>
                <input type="text" class="form-control" placeholder="insert youtube link" name="video_url" id="video_url">
              </br>
               <h4>Video name</h4>
                <input type="text" class="form-control" placeholder="name your video" name="video_name" id="video_name">
              </br>  
               <h4>Video description</h4>
                <input type="text" class="form-control" placeholder="your video description here" name="video_description" id="video_desription">
                  
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
             </form>   
          </div>
      
            </br></br>
       
       


  </div> <!--End -->

  <div class="collapse" id="collapseFB"> <!--Start FB FEED-->
        <h3 class="duck-underline">Facebook Livefeed</h3>
          <div class="box-body">

            <form method="POST" action="allaboutshop/insert_fb.php" enctype="multipart/form-data" >

          Pulling all new feed from your Facebook page</br>
            <h4>Insert Facebook Page name</h4>

            <input type="text" class="form-control" placeholder="..." name="fb_id" id="fb_id">
                
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
             </form>   
          </div>
      
            </br></br>
  </div> <!--End -->

  <div class="collapse" id="collapseFanwall"> <!--Start Fanwall-->
        <div class="well">
          Fanwall detail </br>
          </br></br>
          <div class="col-md-6">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                  <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button">Update!</button>
                  </span>
                </div>
            </div>
            </br></br> 
        </div>
  </div><!--End Fanwall-->

</div> <!--End tab2 collapse row-->



</html>
