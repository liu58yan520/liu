<?php 
namespace Home\Model;
use Think\Model\RelationModel;
class FansModel  extends RelationModel{
/*
qid 是发起者的ID
rid 是捐款者的ID

*/
	 protected $_link = array(
         'reply'  =>  array(
	        'mapping_type'  => self::HAS_MANY,
		    'foreign_key'   => 'rid',
		    'mapping_fields'=>'openid,text,fu_id,id',
	    	'mapping_order' => 'id asc',
         )
    );
	public function getCommlist($fu_id = 0,&$result = array()){ 
        $q=array('rid'=>43,'fu_id'=>$fu_id);      
        $arr = $this->table(__REPLY__)->where($q)->order("id asc")->select();   
        if(empty($arr)){
            return array();
        }
        foreach ($arr as $cm) {  
            $thisArr=&$result[];
            $sub=$this->getCommlist($cm["id"],$thisArr);
           	$cm["sub"] = $sub;    
            $thisArr = $cm; 
                                               
        }
        return $result;
   }

	

}