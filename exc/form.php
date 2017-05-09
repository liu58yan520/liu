<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title> 苏州乐园卡兑换系统 </title>
</head>
<body>

</body>
</html>

<?php 
define('DB_HOST','localhost');
define('DB_NAME','liquor');
define('DB_USER','root');
define('DB_PASS','mingyang');
define('DB_TABLE','rec_data');

$name=addslashes( trim ($_POST['name']));
$tel=addslashes( trim ($_POST['tel']));
$card=addslashes( trim ($_POST['card']));
$city=addslashes( trim ($_POST['city']));

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset('utf8');


$res_text="SELECT id FROM `".DB_TABLE."` WHERE  `tel` = '".$tel."' OR `card` = '".$card."'  LIMIT 1;";
$res=$mysqli->query($res_text);
if(!$res->num_rows){
	$sql="INSERT INTO `".DB_TABLE."` (`name`,`tel`,`card`,`city`,`createAT`)VALUES('$name','$tel','$card','$city',now());";
	if($mysqli->query($sql))
		echo '录入成功';
	else
		echo '插入失败';
}else{
	echo "电话号码或身份证已被录入过！！ 本次录入失败";
}

$mysqli->close();






?>
