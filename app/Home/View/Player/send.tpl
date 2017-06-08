<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<style type="text/css"> p{ opacity: 0; } </style>
<p id="appId">{$data.appId}</p>
<p id="timeStamp">{$data.timeStamp}</p>
<p id="nonceStr">{$data.nonceStr}</p>
<p id="package">{$data.package}</p>
<p id="signType">{$data.signType}</p>
<p id="paySign">{$data.sign}</p>
</body>

<script type="text/javascript">
callPay();

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
           "appId":    appId.innerText,     
           "timeStamp":timeStamp.innerText,     
           "nonceStr": nonceStr.innerText,     
           "package":  package.innerText,     
           "signType": signType.innerText,     
           "paySign":  paySign.innerText,     
       },
    function(res){   
      	history.go(-1);
          // if(res.err_msg == "get_brand_wcpay_request:ok" ) {}     
       }
	); 

 
}
</script>
</html>