<!DOCTYPE html>
<html>
  <head>
    <title></title>
</head>
<body><form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD </button>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$file=$_FILES['file'];
$fileName=$_FILES['file']['name'];
$fileTmpName=$_FILES['file']['tmp_name'];
$filesize=$_FILES['file']['size'];
$fileerror=$_FILES['file']['error'];
$fileType=$_FILES['file']['type'];






$fileExt=explode('.', $filename);
$fileActualExt= strtolower(end($fileExt));
$allowed= array('jpg','jpeg','png','mp3','mp4');
if(in_array($fileActualExt,$allowed)){
if($fileerror===0){
if ($filesize<1000000){
$filename=uniqid('',true).".".$fileActualExt;
$fileDestination='uploads/'.$fileNameNew;
move_uploaded_file($fileTmpName, $fileDestination);
header("location: index.php?uploadssuccess");
}else{
  echo "your file is too big" ;
}

}else{
    echo"there was an error uploading your file!";
}
}else{
    echo"You cannot upload files of this type!";
}
}