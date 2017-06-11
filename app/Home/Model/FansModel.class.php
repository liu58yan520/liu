<?php 
namespace Home\Model;
use Think\Model\RelationModel;
class FansModel  extends RelationModel{

	 protected $_link = array(
         'reply'  =>  array(
	        'mapping_type'  => self::HAS_MANY,
		    'foreign_key'   => 'rid',
		    'mapping_fields'=>'openid,text',
	    	'mapping_order' => 'id desc',
         )
    
    );

	

}