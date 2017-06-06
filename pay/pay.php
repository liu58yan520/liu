<?php
header("Content-type: text/html; charset=utf-8"); 
require_once "wx.class.php";

$post=(new WX())->pay();



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
<script type="text/javascript">
window.onload=function(){
callPay();

}
function callPay(){
	if (typeof WeixiJSBridge == "undefined"){
	   if( document.addEventListener ){
	       document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
	   }else if (document.attachEvent){
	       document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
	       document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
	   }
	}else{
	   onBridgeReady();
	}
}

	function onBridgeReady(){
	   WeixinJSBridge.invoke(
	       'getBrandWCPayRequest', {
	           "appId":    "<?php echo $post['appId']?>",     
	           "timeStamp":"<?php echo $post['timeStamp']?>",     
	           "nonceStr": "<?php echo $post['nonceStr']?>",
	           "package":  "<?php echo $post['package']?>",
	           "signType": "<?php echo $post['signType']?>",
	           "paySign":  "<?php echo $post['sign']?>",
	       },
	       function(res){   
	       console.log(res);  
	           if(res.err_msg == "get_brand_wcpay_request:ok" ) {}     
	       }
	   ); 
	}

</script>
</html>