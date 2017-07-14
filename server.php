<?php  

require_once "test.php";

if ($_FILES["file"]["error"] > 0) echo '上传错误';
if ((($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000)){
	

	$obj = new Image_class($_FILES["file"]["tmp_name"]);
	//$obj->fontMark(array(255,255,255,60),'公园欣欣向荣啊供热爱国人啊额');
	$obj->load_img();
      

 
}
//else echo $_FILES["file"]["type"];
	
