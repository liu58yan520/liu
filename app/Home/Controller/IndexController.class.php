<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    protected $USER_108=array('刘炎','刘德华','大尺佑香','123','陈超');
    private $wx;
    public function  __construct(){
        parent::__construct();
        $this->wx=new \Home\Common\WX();
    }
    protected function CheckUser($name){
        //$id=array_search($name,self::USER108);
        $u=M('user');
        $requ=array('name'=>$name);
        $field=array('id','createAT','count_pay');
        return $u->where($requ)->field($field)->find();
    }

    public function index(){
       // echo $this->wx->getOpenid();
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
        $id=I('get.id');
        $u=M('user');
        $data['createAT']=date("Y-m-d");
        $a= $u->where('id='.$id)->save($data);
        print_r($a);
    }
}



