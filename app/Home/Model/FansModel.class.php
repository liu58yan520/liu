<?php 
namespace Home\Model;
use Think\Model;

class FansModel  extends Model{
	function getMyALLFans($id){
		return $this->where('qid='.$id)->field('name,pay,con,face,createAT')->order('createAT desc')->select();
	}
	
	public function inset(array $data){
    	$data['createAT']= date('Y-m-d H:i:s:');    
    	$this->add($data);
    }

}