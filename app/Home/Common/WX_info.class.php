<?php
namespace Home\Common;
/**
 * 获取用户信息类
*  getInfo nickname  rtrim(trim($info['headimgurl']),'0').'64'  openid
*/
class WX_info extends WX_tool {

    private $code;
    private $state='';
    private $openid;
    private $access_token;
    private $prepay_id;

    private function getCode(){
        if(!isset($_GET["code"])){
            $REDIRECT_URI='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $scope='snsapi_userinfo';
            $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.WX_base::APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.WX_base::SCOPE.'&state='.$this->state.'#wechat_redirect';
            header("Location:".$url);
            exit('结束');
        }else
            $this->code=$_GET['code'];
    }
    public function getOpenid(){
        if(empty($this->openid)){
            $this->getCode();
            $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.WX_base::APPID.'&secret='.WX_base::SECRET.'&code='.$this->code.'&grant_type=authorization_code';
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

    public function getWXuser(){
        $info=$this->getInfo();
            $user=array(
                "name"=>$info['nickname'],
                "face"=>rtrim(trim($info['headimgurl']),'0').'64',
                'openid'=>$info['openid']);
        return $user;   
    }




}


