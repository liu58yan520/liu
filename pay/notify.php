<?php


function FromXml($xml){
        libxml_disable_entity_loader(true);
		$xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
		$val = json_decode(json_encode($xmlstring),true); 
		return $val; 
	}


$xml=$GLOBALS["HTTP_RAW_POST_DATA"];
//$arr=FromXml($xml);
file_put_contents('log.log',$xml,FILE_APPEND);
// $is_database='';   //是否写入数据库成功
// if($arr['result_code']=='FAIL') exit('提交失败');
// $infoArr=getUserInfo($arr);
// $is_database=mysqk_inset($infoArr);

// file_put_contents('log.log','姓名:'.$infoArr['name'].
// 							'  电话号码:'.$infoArr['tel'].
// 							'  身份证号:'.$infoArr['card'].
// 							'  所在城市:'.$infoArr['city'].
// 							'  总付款:'.$infoArr['fee'].
// 							'  付款时间:'.$infoArr['createAT'].
// 							'  微信支付订单号:'.$infoArr['wx_id'].
// 							'  共买了几张:'.$infoArr['num'].
// 							'	'.$is_database.
// 							PHP_EOL, FILE_APPEND);


function getUserInfo($res){	
	$info=explode('&',$res['attach']);
	foreach ($info as $v) {	
			if(stristr($v,"name")>-1)
			$nameArr=explode('-',$v);
		elseif(stristr($v,"tel")>-1)
			$telArr=explode('-',$v);
		elseif(stristr($v,"card")>-1)
			$cardArr=explode('-',$v);
		elseif(stristr($v,"city")>-1)
			$cityArr=explode('-',$v);	
		elseif(stristr($v,"num")>-1)
			$numArr=explode('-',$v);	
	}
	$arr_info=array(
		$nameArr[0]=>addslashes($nameArr[1]),
		$telArr[0]=>addslashes($telArr[1]),
		$cardArr[0]=>addslashes($cardArr[1]),
		$cityArr[0]=>$cityArr[1],
		$numArr[0]=>$numArr[1],
		'fee'=>$res['cash_fee'],
		'createAT'=>$res['time_end'],
		'wx_id'=>$res['transaction_id']
		);
	return $arr_info;
}
function mysqk_inset($data){
	$db=array(
		'db_host'=> '115.29.238.95',
		'db_name'=>'liquor',
		'db_user'=> 'root',
		'db_pass'=> 'mingyang',
		'db_table'=>'liquor'
		);

	$mysqli = new mysqli ( $db['db_host'], $db['db_user'], $db['db_pass'],$db['db_name'] );
	if (mysqli_connect_errno())   return '数据库连接出错';
	$mysqli->set_charset('utf8');
	$res_text='SELECT id FROM '.$db["db_table"].' WHERE  wx_id = "'.$data["wx_id"].'" LIMIT 1;';
	$res=$mysqli->query($res_text);
	if(!$res->num_rows){
		$sql=   'INSERT INTO '.$db["db_table"].' (name,tele,card,city,fee,num,wx_id,createAT)VALUES(
							"'.$data["name"].'",
							"'.$data["tel"].'",
							"'.$data["card"].'",
							"'.$data["city"].'",
							"'.$data["fee"].'",
							"'.$data["num"].'",
							"'.$data["wx_id"].'",
							now());';
		if(!$mysqli->query($sql))	return '写入错误';
		$mysqli->close();
		return true;
	}else{
		echo "SUCCESS";
		echo "<xml> 
  <return_code><![CDATA[SUCCESS]]></return_code>
  <return_msg><![CDATA[OK]]></return_msg>
		</xml>";		
		exit();
	}
}



