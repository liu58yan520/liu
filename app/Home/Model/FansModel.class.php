<?php 
namespace Home\Model;
use Think\Model\RelationModel;

class FansModel  extends RelationModel{
	// protected $_link=array('fans'=>array(
	// 	'class_name'=>'fans',
	// 		//'mapping_type'  => self::HAS_MANY,
	// 		'mapping_type'  => self:: BELONGS_TO,
	// 		'foreign_key'   => 'qid',
	// 		'mapping_order' => 'createAT desc',
	// 		'condition'=>'id=qid'

	// 		));


	function getMyALLFans($id){
		return $this->where('qid='.$id)->field('name,pay,text,face,createAT')->order('createAT desc')->select();
	}
	function inset(array $info){
		
	}

}