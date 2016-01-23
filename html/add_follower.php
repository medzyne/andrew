<?php
	include("check_login.php");
?><!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta charset="UTF-8">
    <title>Add Telephone number</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="login">
  <div class="heading">
    <h2>Add Phone Number</h2>
    
  
  <form id="form1" name="form1" method="post" action="follower_record.php">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Name" name="f_name" id="f_name">
      </div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Surname" name="f_surname" id="f_surname">
      </div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="E-mail" name="f_email" id="f_email">
      </div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Gender" name="f_gender" id="f_gender">
      </div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Date of birth" name="f_dob" id="f_dob">
      </div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Join date" name="f_join_date" id="f_join_date">
      </div>
       
        <button type="submit" class="float" > Add</button>
    </form>
    </div>
 </div>
    
    
    
    
    
  </body>
</html>
