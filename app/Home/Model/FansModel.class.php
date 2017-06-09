<?php 
namespace Home\Model;
use Think\Model;

class FansModel  extends Model{
	function getMyALLFans($id,$quc='name,pay,con,openid,createAT'){
		
		return $this->where('qid='.$id)->field('name,pay,con,openid,createAT')->order('createAT desc')->select();
	}
	
	public function inset(array $data){
    	$data['createAT']= date('Y-m-d H:i:s:');    
    	$this->add($data);
    }

}