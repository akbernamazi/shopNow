<?php
        include("config.php");
        session_start();

            $sql = "SELECT * FROM login";
            
            $result = mysqli_query($db,$sql) or die( mysqli_error($db));
            $count = mysqli_num_rows($result);

        if(isset($_POST['but_upload'])){
            $pname=$_POST['pname'];
            $price=$_POST['price'];
            $name = $_FILES['file']['name'];
            $target_dir = "images/products/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
        
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");

            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
            
                // Insert record
                $query = "insert into product(`ID`, `pname`, `price`,`image`) values(NULL,'$pname','$price','".$name."')";
                mysqli_query($db,$query);
                
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

            }
        }
?>    

<html>
    <head>
        <title>Admin Home</title>
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <td>User Name</td>
                <td>Password</td>   
            </tr>
        <?php 
            while($rows=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $rows['ID'] ?></td>
                    <td><?php echo $rows['username'] ?></td>
                    <td><?php echo $rows['password'] ?></td>   
                </tr>
        <?php    }?>
        </table>
        <h1> Product Entry: </h1>
        <form method="post" action="" enctype='multipart/form-data'>
            <input type='text' name='pname' placeholder='Enter Product Name'/>
            <input type='Number' name='price' placeholder='Enter Price'/>
            <input type='file' name='file' />
            <input type='submit' value='Save Product' name='but_upload'>
        </form>
    </body>
</html>