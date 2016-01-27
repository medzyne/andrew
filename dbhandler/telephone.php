<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta charset="UTF-8">
    <title>Add Telephone number</title>
    <link rel="stylesheet" href="../css/style.css">

<script>
  function validatePhone() 
  {
    var phone = document.getElementById("call_num").value;
    var regexPhone = /^[0-9]{3}-[0-9]{4}-[0-9]{4}$/;
    if(regexPhone.test(phone))
    {
      return true; 
    }  
    else
    {
      var message = document.getElementById("error");
      message.innerHTML = "Phone number is not correct format";
      return false;
    }
  }
</script>
</head>

<body>

    <div class="login">
  <div class="heading">
    <h2>Add Phone Number</h2>
    
    <br>
    <form action= "x">
     <button type="submit" class="float">Add your telephone number</button>
     </form>
    <br>
    <h2>Or</h2>
    
  <form id="form1" name="form1" method="post" action="telephone_record.php">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Telephone number" name="call_num" id="call_num">
		<label id="error" style="color:red"></label>
      </div>
       
        <button type="submit" class="float" > Add</button>
    </form>
    </div>
 </div>
    
    
    
    
    
  </body>
</html>
