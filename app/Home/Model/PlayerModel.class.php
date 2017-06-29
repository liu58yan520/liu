<?php
namespace Home\Model;
use Think\Model;

class PLayerModel extends Model{

	public function getPlayer($start=0,$getNUM=4){
		$sql="SELECT  poll,id,name,@rank := @rank + 1 AS rank FROM ( SELECT  poll,id,name FROM  `tpl_player`  ORDER BY poll DESC ) AS obj, (SELECT @rank := 0) r;";
		return $this->query($sql);
		//return	$this->order('rand()')->limit($start,$getNUM)->select();
	}
	public function getPlayerOne($name){
		if(is_numeric($name))
			$name=array('id'=>$name);
		else
			$name=array('name'=>$name);
		return	$this->where($name)->find();
	}
	public function getRank(){
		return $this->order('poll desc')->select();
	}
	public function vote($id){
		$id=3;
		$time=60*60*24;  //限度为24小时
		$f=M('fans');
		// $name=cookie('user')['name'];
		// $openid=cookie('user')['openid'];
		$name='abc';
		$openid='123';
		//$u=$f->field('date')->order('date desc')->where("qid='$id' AND openid='$openid'")->find(1);
		$u=$this->query("select date from tpl_fans where qid='$id' AND openid='$openid' order by date desc limit 1 ");
		return $u;
		if(!empty($u)&& ($u['date']+$time) >time())
			return 'last';
		$data=array('openid'=>$openid,'name'=>$name,'qid'=>$id,'date'=>time());
		if($f->add($data))
			return $this->where(array('id'=>$id))->setInc('poll',1); 
	}
	public function getRankOne($id){
		$sql="select count(1) AS rank
 from `tpl_player` AS a  where a.poll>= (select b.poll from `tpl_player` AS b  where b.id = '$id');";
		return $user= $this->query($sql);
	}

	public function getPlayerInfo($id){
       $user = $this->getPlayerOne($id);
       $user1= $this->getRankOne($id);
       return $user=array_merge($user,$user1[0]);
    }
}