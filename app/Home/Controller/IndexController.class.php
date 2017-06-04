<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {

    const USER108=array('刘炎','刘德华','大尺佑香','123','陈超');

    protected function CheckUser($name){
        //$id=array_search($name,self::USER108);
        $u=D('User');
        $requ=array('name'=>$name);
        $field=array('id','createAT');
        return $u->where($requ)->field($field)->find();
    }



    public function index(){
        $this->display();
    }

    public function select(){

        
    	$name=I('get.name');
    	if(empty($name)&&$name=='undefined') 
    		echo false;
    	else
            echo json_encode($this->CheckUser($name));
    	
    }

    public function create(){
        //此处把state字段改成1
    //     $name=I('get.id');
    //     $u=M('user');
    //     $u->create($id);
    // 
       
        echo 1;
    }
}