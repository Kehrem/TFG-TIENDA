<?php 

//$origen=$_SERVER["SERVER_NAME"];//descomentar cuando se suba al servidor
//$target_dir = $origen."/tienda/img/banners/";//descomentar cuando se suba al servidor
$target_dir = "../../../../img/banners/";
$send="ok";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        $ok= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $ok= "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {

    $ok="Error - Already Exists";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 500000) {
    $ok= "Error - File too Big";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $ok= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

    $ok="Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["img".$i]["name"]). " has been uploaded.";

    } else {
        $ok="Sorry, there was an error uploading your file.";
    }
}

echo $send;
?>