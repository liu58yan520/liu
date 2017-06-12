<?php
namespace Home\Controller;
use Think\Controller;
class NotifyController extends Controller {
	private $returnXML="<xml>
  <return_code><![CDATA[SUCCESS]]></return_code>
  <return_msg><![CDATA[OK]]></return_msg>
</xml>";

	public function U2FsdGVkX1(){

		$xml = file_get_contents('php://input');
    	if(empty($xml))
    		$xml=$GLOBALS["HTTP_RAW_POST_DATA"];
    	if($arr['result_code']=='FAIL'||$arr['return_code']=='FAIL') 
    		exit('提交失败');
		$arr=$this->FromXml($xml);
		$data=$this->setVAR($arr);
		$this->insetDB($data);
		$this->inset_log($data);

	}
	private function setVAR($arr){
		$data=$this->en_str($arr['attach']);
		$data['pay']=$arr['total_fee'];
		$data['createAT']=date('Y-m-d H:i:s',strtotime($arr['time_end']));
		$data['openid']=$arr['openid'];
		$data['transaction_id']=$arr['transaction_id'];
		return $data;
	}
	private function en_str($str){
		$arr=explode('&',$str);
		$tmp=explode('=',$arr[0]);
		$data[$tmp[0]]=$tmp[1];
		$tmp=explode('=',$arr[1]);
		$data[$tmp[0]]=$tmp[1];
		return $data;
	}

	private function insetDB($data){
		$m=M('fans');
		$t=array('transaction_id'=>$data['transaction_id']);
		$count=$m->where($t)->count();
		if($count>0){
			echo $this->returnXML;
			echo 'SUCCESS';
			return ;
		}
		 $id=$m->add($data);
		if($id){
			echo $this->returnXML;
			echo 'SUCCESS';
		}

	}

	private function FromXml($xml){
       libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
	}

	private function inset_log($data){
		$str='';
		$path=dirname(THINK_PATH).'/Public/log.log';
		foreach ($data as $k => $v) 
			$str.=$k.':'.$v.'  ';
		$str.=PHP_EOL;
		file_put_contents($path,$str,FILE_APPEND);
	}
	 

}