<?php 
namespace Home\Common;
class WX_pay extends WX_tool {
	private $prepay_id;
	public function befoepay($info,$attach='',$pay_num,$notify_url,$openid){
	    /*  统一下单
	        商品描述，附加信息 价格，通知页面,openid
	    */
	    $url="https://api.mch.weixin.qq.com/pay/unifiedorder";
	    if(empty($openid))
	        return '没有openid';
	    $post=array(
	        "appid"		=>WX_base::APPID,
	        "mch_id"	=>WX_base::MCH_ID,
	        "nonce_str"	=>$this->randStr(30),
	        "body"		=>$info,
	        "attach"	=>$attach,
	        "out_trade_no"=>$this->randStr(30),
	        "total_fee"	=>(int) $pay_num,
	        "spbill_create_ip"=>$_SERVER["REMOTE_ADDR"],
	        "notify_url"=>$notify_url,  //支付结果通知
	        "trade_type"=>"JSAPI",
	        "openid"	=>$openid
	    );
	    $back=$this->send($url,$post);
		return   $this->prepay_id= $back['prepay_id'];
    }
    public function pay(){
    	if(empty($this->prepay_id))
       		$this->befoepay();
        $post=array(
            "appId"		=>WX_base::APPID,
            "timeStamp"	=>(string) time(),
            "nonceStr"	=>$this->randStr(30),
            "package"	=>'prepay_id='.$this->prepay_id,
            "signType"	=>'MD5'
        );
        $post=$this->createSign($post,WX_base::API_KEY);
        $post['paySign']=$post['sign'];
        unset($post['sign']);
        return $post;
    }

    private function createSign($post,$api_key){
    	//排序 生成sign  拼接api密钥,此函数结束后可直接arrayToXml
        ksort($post);  
        $str 	= urldecode(http_build_query($post)).'&key='.$api_key;
        $sign 	= strtoupper(md5($str));
        $post['sign'] = $sign;
        return $post;
    }

    private function send($url,$data=null){
        $data=$this->createSign($data,WX_base::API_KEY);
        $xml=$this->arrayToXml($data);
        if(!empty($data))
            $back_xml=$this->curl_Post($xml,$url);
        else
            $back_xml=$this->curl_Get($xml,$url);
        return $this->XmlToArray($back_xml);
    }

}


