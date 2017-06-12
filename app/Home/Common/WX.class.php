<?php
namespace Home\Common;
/**
 * 要用时直接  $wx=new \Home\Common\WX(); 
*/
class WX extends WX_Data {

    private function getCode(){
        if(!isset($_GET["code"])){
            $REDIRECT_URI='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $scope='snsapi_userinfo';
            $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$this->scope.'&state='.$this->state.'#wechat_redirect';
            header("Location:".$url);
            exit('结束');
        }else
            $this->code=$_GET['code'];
    }
    public function getOpenid(){
        if(empty($this->openid)){
            $this->getCode();
            $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->secret.'&code='.$this->code.'&grant_type=authorization_code';
            $json_obj = $this->curl_Get($get_token_url);
            $this->access_token = $json_obj['access_token'];
            return $this->openid = $json_obj['openid'];
        }
        return $this->openid;
    }


    public function getInfo(){
        $this->getOpenid();
        /***已经获得openid,snsapi_base 下面是获取用户更多信息scope必须是snsapi_userinfo*******/
        $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$this->access_token.'&openid='.$this->openid.'&lang=zh_CN';
        return $this->curl_Get($get_user_info_url);
    }

    private function send($url,$data=null){
        $data=$this->createSign($data);
        $xml=$this->createXML($data);
        if(!empty($data))
            $back_xml=$this->curl_Post($xml,$url);
            else
                $back_xml=$this->curl_Get($xml,$url);
                return $this->XmlToArray($back_xml);
    }

    public function befoepay($info,$attach='',$pay_num,$notify_url,$openid){
        /*  统一下单
            商品描述，附加信息 价格，通知页面,openid
        */
        $url="https://api.mch.weixin.qq.com/pay/unifiedorder";
        if(empty($openid))
            return '没有openid';
        $post=array(
            "appid"		=>$this->appid,
            "mch_id"	=>$this->mch_id,
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
        $this->prepay_id=$back['prepay_id'];
        return $back;
    }
    public function pay(){
        if(empty($this->prepay_id))
            $this->befoepay();
            $post=array(
                "appId"		=>$this->appid,
                "timeStamp"	=>(string) time(),
                "nonceStr"	=>$this->randStr(30),
                "package"	=>'prepay_id='.$this->prepay_id,
                "signType"	=>'MD5'
            );
            $post=$this->createSign($post);
            $post['paySign']=$post['sign'];
            unset($post['sign']);
            return $post;
    }
    public function getWXuser(){
        $user=cookie('user');
        if(empty($user)){
            $info=$this->getInfo();
            $user=array(
                "name"=>$info['nickname'],
                "face"=>rtrim(trim($info['headimgurl']),'0').'64',
                'openid'=>$info['openid']);
            cookie('user',$user);
            return $user;
        }
        return $user;   
    }

    public function GetSignPackage() {
        $jsapiTicket = $this->getJsApiTicket();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $timestamp = time();
        $nonceStr = $this->randStr(16);
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature = sha1($string);
        $signPackage = array(
          "appId"     => $this->appid,
          "nonceStr"  => $nonceStr,
          "timestamp" => $timestamp,
          "url"       => $url,
          "signature" => $signature,
          "rawString" => $string
        );
        return $signPackage; 
  }

  private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $path=dirname(THINK_PATH).'/Public/jsapi_ticket.json';
    $data = json_decode(file_get_contents($path));
    if (empty($data)||$data->expire_time < time()) {
      $accessToken = $this->getAccessToken();
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res =$this->curl_Get($url);
      $ticket = $res['ticket'];
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $fp = fopen($path, "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }

    return $ticket;
  }
  private function getAccessToken() {
   $path=dirname(THINK_PATH).'/Public/access_token.json';
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents($path));
    if (empty($data)||$data->expire_time < time()) {
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->secret";
       $url;
      $res = $this->curl_Get($url);
      $access_token = $res['access_token'];
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen($path, "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $access_token = $data->access_token;
    }
    return $access_token;
  }


}


