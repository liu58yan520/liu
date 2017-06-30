<?php
header("Content-type: text/html; charset=utf-8"); 
  $hostdir='C:/Users/Administrator/Desktop/aa/';

//获取本文件目录的文件夹地址

  $filesnames = scandir($hostdir);

//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

  //print_r ($filesnames);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	foreach ($filesnames as $name) 
		// "INSERT INTO tbl_name (col1,col2) VALUES(col2*2,15); ";
echo  '##'. $name .'%%<br/>';

	 ?>
</body>
</html>