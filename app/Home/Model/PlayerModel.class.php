<?php 
namespace Home\Model;
use Think\Model;

class PlayerModel extends Model{

    public function getPlayer(array $requ,array $field=array('*')){
        return $player=$this->where($requ)->field($field)->find();
    }
    public function createPlayer($id){
    	 $data['createAT']=date("Y-m-d");
    	 echo $this->where('id='.$id)->save($data);
    }
   
   
}