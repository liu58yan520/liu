<?php
namespace Home\Common;
class WX_Data {

    public $appid='wx697d085a65340b93';
    public $secret="90c6a359583ca3a75101498af33a824b";
    protected $scope='snsapi_userinfo';   //snsapi_base snsapi_userinfo
    protected $code;
    protected $state;
    public    $openid;
    public $access_token;
    protected $mch_id='1467101902'; //商户号
    protected $api_key='FiH2QLbzHMjHSa6bIDB0Rk82ilD5Ua9I'; //api密钥
    protected $prepay_id;

    /*
     把要发送的数据 直接传入 createXML 他会自动生成签名 返回xml

     */
    
 
   

}