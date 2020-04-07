<?php
include("config.php");

if(isset($_POST['but_upload'])){
 
  $prodName = $_POST['prod_name'];
  $prodPrice = $_POST['prod_price'];
  $name = $_FILES['prod_img']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["prod_img"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['prod_img']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
    $query = "insert into product(prod_name, prod_img, prod_price) values('$prodName','".$image."','$prodPrice')";
    mysqli_query($db,$query);
  
    // Upload file
  //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  Name<input type='text' name='prod_name' /><br/>
  Price<input type='number' name='prod_price' /><br/>
  <input type='file' name='prod_img' />
  <input type='submit' value='upload product' name='but_upload'>
</form>