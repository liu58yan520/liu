<?php 
//if(empty($_POST['openid'])){ echo 'get out'; return ;}
$name=addslashes($_POST['name']);
$openid=addslashes($_POST['openid']);
$rand=rand(1,100);
add($name,$openid,$rand);


function add($name,$openid,$rand){
	$DB_HOST='115.29.238.95';
	$DB_NAME="rec_form";
	$DB_USER="root";
	$DB_PASS="7c6196ae24";
	$DB_TABLE="kan";
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$mysqli->set_charset('utf8');
	$sql="SELECT 1 FROM `$DB_TABLE` WHERE `openid`='$openid' LIMIT 1;";
	$mysqli->query($sql);
	if($mysqli->affected_rows>0)
		exit ('too');
	$sql="INSERT INTO `".$DB_TABLE."` ( `name`,`openid`,`rand`)VALUES('$name','$openid',$rand);";
	$a= $mysqli->query($sql);
	$mysqli->close();
	if($a>0)
		echo json_encode(array('name'=>$name,'rand'=>$rand));
	
}
