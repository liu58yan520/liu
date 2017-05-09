<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';



//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);


//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("新歌声总决赛门票");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));

$pay_num="29800";

if(stristr($_GET['city'],"taizhou"))
	$pay_num="18800";
elseif(stristr($_GET['city'],"lianyungang"))
	$pay_num="8800";
elseif(stristr($_GET['city'],"suzhou"))
	$pay_num="35800";

$input->SetTotal_fee($pay_num);
$input->SetNotify_url('http://vote.didifc.com/test/notify.php');
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();
?>

<html>
<head>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"  />
    <title>第二季《中国新歌声》全国城市海选总决赛门票</title>
    <style>
    ul,ol,body,p,button{
    	margin: 0;padding:0;
    }
    	body{
    		background: #ccc;
    		width:100%;
    		height: 100%;
    		overflow: hidden;
    	}
		#top{
			background: #fdfdfd;
			font-size:14px;
			width:95%;
			color:#696969;
			margin: 10px auto;
			border-radius: 5px;
		}
		#top .info{
			padding: 8px 10px;
			border-bottom: 1px solid #ccc;
			font-size: 17px;

		}
		#top .ticket_num{
			padding: 8px 10px;
			height: 35px;
			line-height: 35px;
			font-size: 22px;
		}
		#top .ticket_num button{
			width:32px;
			height: 28px;
			border-radius: 2px;
			font-size: 14px;
			background: #ccc;
			
		}
		#main {
			margin: 8px auto;
			width:90%;
			min-height: 215px;
			background: #fdfdfd;
			border-radius: 5px;
			padding: 2%;
		}
		#main p{
			width: 80px;
			height: 35px;
			line-height: 35px;
			font-size:14px;
			color:#fafafa;

			background: #5CB85C;
			border-radius: 4px;
			text-align: center;
		}
		#main ul{

			padding-left: 8px;
			list-style: none;
			color:#6f6f6f;
			margin:0 0 0 0;
		}
		#main ul li{
			border-bottom: 1px solid #ddd;
			padding: 6px 0 ;
			margin:0 0 0;
			height: 30px;
			line-height: 30px;

		}
		#main ul input{
			border:none;
			width:60%;
			margin:0 0 0 5px;
			text-indent: 3px;
			height: 25px;
			line-height: 25px;
			font-size: 15px;
		}

		#pay{
			position: fixed;
			bottom: 0;
			width: 100%;
			height: 50px;
			background: #f9f9f9;
			border-top: 1px solid #ddd;
		}
		#pay button{
			width: 88%;
			height: 80%;
			display: block;
			font-size: 19px;
			border:none;
			margin: 1% auto 0;
			background: #5CB85C;
			color:#fff;
			border-radius: 5px;
		}
    </style>
    
    <script type="text/javascript">

    function getQueryString(name) {  //获取URL参数
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
		var r = window.location.search.substr(1).match(reg); 
		if (r != null) return unescape(r[2]); return null; 
	} 

    
	//调用微信JS api 支付
	function jsApiCall()
	{	
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				self.location="./notify.php"; 
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

	function city_data(data,pos,city){
		document.getElementsByClassName('date')[0].innerText=data;
        document.getElementsByClassName('address')[0].innerText=pos;
        document.getElementById('city_text').value=city;    

	}
	
	window.onload = function(){	
		
		var city=getQueryString('city');	//从url判断城市
		if(city.indexOf('yangzhou')>-1)
			city_data('演出时间：2017年5月6日13:30','地点：江苏扬州京杭会议中心(京杭厅)','yangzhou');
		else if(city.indexOf('zhenjiang')>-1)
			city_data('演出时间：2017年5月5日晚7:30','演出地址：江苏镇江金山壹号 游轮酒店','zhenjiang');
		else if(city.indexOf('taizhou')>-1){
			city_data('演出时间：2017年5月7日13:30','演出地址：江苏泰州市金座酒吧','taizhou');
			document.getElementById('final_pay').innerText=188;
		}else if(city.indexOf('lianyungang')>-1){
			city_data('演出时间：2017年5月11日 14:00','演出地址：江苏财会职业学院——江苏财院文化艺术中心','lianyungang');
			document.getElementById('final_pay').innerText=88;
		}
		else if(city.indexOf('suzhou')>-1){
			city_data('时间：2017年5月10日19:30','地点：苏州市吴中区木渎影剧院','suzhou');	
			document.getElementById('final_pay').innerText=358;
		}
		
		
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

		/***********style***********/
		var pay_btn=pay.getElementsByTagName('button')[0];
		
		pay_btn.onclick=function(e){
				callpay();
		};
		
		// var num_btn=document.getElementsByClassName('ticket_num')[0].getElementsByTagName('button');
		// var pay_num_text=document.getElementsByClassName('ticket_num')[0]
		// 		        .getElementsByClassName('ticket_num_text')[0];
		// num_btn[0].onclick=function(){
		// 	if(pay_num_text.innerText<20){
		// 		pay_num_text.innerText++;
		// 		final_pay.innerText=pay_num_text.innerText*298;
		// 	}
		// };
		// num_btn[1].onclick=function(){
		// 	if(pay_num_text.innerText>1){
		// 		pay_num_text.innerText--
		// 		final_pay.innerText=final_pay.innerText-298;
		// 	}
		// };	
		/**********style***********/
		
		
		
	};
	
	</script>
</head>
<body>
<header>
	<div id="top">
		<div class="info">
			<div class="date">xx</div>
			<div class="address">xx</div>
		</div>
		<div class="ticket_num">数量: 
			 <span class='ticket_num_text'>1</span>
			张
		</div>
	</div>
</header>
<div id="main">
	<p>联系信息</p>
	<ul>
		<form method="GET" action="form.php" id='form' >
			<li>姓&nbsp;&nbsp;名:<input type="text" name='name' required="required" placeholder='请输入受票人姓名'></li>
			<li>手机号码:<input type="text" name='tel' required="required" placeholder='请填写手机号码'></li>
			<li>身份证号:<input type="text" name='card' required="required" placeholder='请填写身份证号码'></li>
			<li style='display:none;'><input type="text" name='city' id='city_text' hidden="hidden" value='' ></li>
		</form>
	</ul>
</div>

</div>
<footer >
	<div id="pay">
		<button type="submit" form='form' >立即支付 <span id='final_pay'>298</span>元</button>
	</div>
</footer>
   
</body>
</html>