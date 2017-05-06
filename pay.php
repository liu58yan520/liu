<?php

ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';


//123
//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

$info=array('name'=>addslashes( trim ($_GET['name'])),
			'tel'=>addslashes( trim ($_GET['tel'])),
			'card'=>addslashes( trim ($_GET['card'])),
			'city'=>addslashes( trim ($_GET['city'])),
			'fee'=>addslashes( trim ($_GET['fee'])),
			'num'=>addslashes( trim ($_GET['num'])),
			);

$attach='name-'.$info["name"].    //加入附加内容
		'&tel-'.$info["tel"].
		'&card-'.$info["card"].
		'&city-'.$info["city"].
		'&num-'.$info["num"];
//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("买酒送门票");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($info['fee']);
$input->SetNotify_url('http://vote.didifc.com/test/notify.php');
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$input->SetAttach($attach);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>第二季新歌声</title>
 <script type="text/javascript">
 
	//调用微信JS api 支付
	function jsApiCall()
	{	
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				if (res.err_msg == "get_brand_wcpay_request:ok") {
					alert('支付成功');           
					window.history.go(-2);
				}else{
					window.history.go(-1);
				}

			}
		);
	}
		//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
			}
		);
	}
	
	function callpay(){		 
			
			if (typeof WeixinJSBridge == "undefined"){
			    if( document.addEventListener ){
			        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
			    }else if (document.attachEvent){
			        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
			        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
			    }
			}else{
			    jsApiCall();
			}			
    		
	}
	
	window.onload = function(){	
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
		callpay();
	};
	
	</script>
	</head>


	<body>
		
	</body>
	</html>