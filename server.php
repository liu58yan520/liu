<?php  
require_once "Image.php";
if ($_FILES["file"]["error"]>0) {
    echo '请上传4兆以内的图片 jpg、gif、png ';
}
if ((($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 4096000))
    $img=new Image_class($_FILES["file"]["tmp_name"],$_POST['name']);
    $upload=$img->show();
echo <<<IMG
<style>
body,img{margin:0;padding:0}
img{width:100%;height:100%}
</style>
<img src="$upload">
IMG;

