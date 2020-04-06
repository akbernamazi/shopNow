
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //  session_register();
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
    <div align = "center">
        <div style = "width:350px; border: solid 1px #333333; margin-top: 25px;" align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px; justify-content: space-between;"><b>Login</b>
        </div>
        <div style = "margin:30px">
            <table cellspacing="4" >
                <form action = "" method = "post">
                    <tr align="left"><th>User Name:</th><td> <input type = "text" name = "username" class = "box"/></td>
                    <tr align="left"><th >Password:</th><td> <input type = "password" name = "password" class = "box" />
                    <tr><th colspan="2"><input type = "submit" value = " Submit "/>
                </form>
            </table>    
            <div align="center">
            <a href="/project/admin.php"> <button >Admin Login</button></a>
            <a href="/project/new_user.php"> <button >New User</button></a>
        </div>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                
        </div>
            
        </div>
        
    </div>

   </body>
</html>
