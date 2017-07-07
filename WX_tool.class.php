<?php 
require_once "WX_base.class.php";
    /**
        微信工具类	
        post发送数据     		curl_Post
        get发送数据   			curl_Get
        获取随机数				randStr
        数组转xml				arrayToXml
        xml转数组				XmlToArray
    */
class WX_tool {
	 protected function curl_Get($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 500);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //运行curl，结果以jason形式返回
        $res = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($res,true);
        return $data;
    }
    protected function randStr($length = 30) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
    protected function arrayToXml($arr){
        if(!is_array($arr))
            return '不是数组';
            $xml = "<xml>";
            foreach ($arr as $key=>$val){
                if (is_numeric($val))
                    $xml.="<".$key.">".$val."</".$key.">";
                    else
                        $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
            $xml.="</xml>";
            return $xml;
    }

    protected function XmlToArray($xml){ //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $arr=json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $arr;
    }



}