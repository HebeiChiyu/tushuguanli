<?php
namespace Login\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(checkLogin()){
    		if(I('get.url')){
    			header("location: ".I('get.url'));
    		}else{
    			header("location: ".U('/'));
    		}
    	}
    	if(!IS_POST){
    		$this->display();
    		return;
    	}
   		$data = I('post.');
   		$user = $this->check($data);
   		if(is_numeric($user)){
   			$error = array();
   			switch($user){
   				case 1:
   					$error['login'] = "登录名错误";
   					break;
   				case 2:
   					$error['pwd'] = "密码错误";
   					break;
   				case 3:
   					$error['login'] = "非法访问";
   					break;
   				case 4:
   					$error['login'] = "账号已锁定";
   					break;
   			}
   			$this->assign("data",$data);
   			$this->assign("error",$error);
   			$this->display("fail");
   			return;
   		}
   		session("user",$user);
   		$sessionTime = C("sessionTime")?C("sessionTime"):1200;
   		session("expire",time()+$sessionTime);
   		if(I('get.url')){
   			header("location: ".I('get.url'));
   		}else{
   			header("location: ".U('/'));
   		}
    }
    private function check($data){
    	if(!$data['login']){
    		return 1;
    	}
    	if(!$data['pwd']){
    		return 2;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getByLogin($data['login']);
    	if(!$admin){
    		return 1;
    	}
    	if($admin['pwd'] != $data['pwd']){
    		return 2;
    	}
    	if($admin['statusLock'] == 1){
    		return 4;
    	}
    	if(!$data['code'] || $admin['code'] != $data['code']){
    		$saveData = array(
    				"code"=>$null,
    				"statusLock"=>1
    		);
    		$adminModel->update($admin,$saveData);
    		return 3;
    	}
    	$temp = array(
    			"code"=>null,
    			"timeLastLogin"=>$admin['timeThisLogin']?$admin['timeThisLogin']:null,
    			"timeThisLogin"=>date("Y-m-d H:i:s")
    	);
    	$adminModel->update($admin,$temp);
    	return $admin;
    }
}