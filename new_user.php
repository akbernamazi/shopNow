
<?php
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['pwd1']); 
        
        $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql) or die( mysqli_error($db));
        define("count" ,mysqli_num_rows($result));
        echo count;
        
        if(count>=1){
            $error="Try other Name";
    }
    else{
        $sql = "INSERT INTO `login` (`ID`, `username`, `password`) VALUES (NULL, '$myusername', '$mypassword')";
        $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      //   echo "$result";
      //   $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
          
        if($result == 1) {
           echo "Successful";
          //  header("location: login.php");
        }
        else {
           $error = "Unable to Create Account Contact Admin";
        }
    }
   }
?>
<html>
   
   <head>
      <title>Create New Account</title>
      
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
        <div style = "width:400px; border: solid 1px #333333; margin-top: 25px;" align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px; justify-content: space-between;"><b>Create New Account</b>
        </div>
        <div align="center" style = "margin:30px">
            <table cellspacing="4" >
                <form action = "" method = "post">
                    <tr align="left"><th>Username:</th><td> <input type="text" required pattern="\w+" name="username"></td>
                    <tr align="left"><th >Password:</th><td> <input type="password" name="pwd1" onchange="form.pwd2.pattern = (this.value);"></td> <!--required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"-->
                    <tr align="left"><th>Confirm Password:</th><td> <input type="password" required name="pwd2"></td>
                    <tr><th colspan="2"><input type = "submit" value = " Submit "/>
                </form>
            </table>
            <a href="/project/admin.php"> <button >Admin Login</button></a>
            <a href="/project/login.php"> <button >Login</button></a>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                
        </div>
            
        </div>
        
    </div>

   </body>
</html>
