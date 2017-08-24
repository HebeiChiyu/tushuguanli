<?php
namespace API\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	if(!IS_POST){
    		apiReturn("false");
    		return;
    	}
    	$data = I('post.');
    	if(!$data['login']){
    		apiReturn("login empty");
    		return;
    	}
    	if(!$data['pwd']){
    		apiReturn("pwd empty");
    		return;
    	}
    	if(!checkVerify($data['verify'])){
    		apiReturn("verify error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getByLogin($data['login']);
    	if(!$admin){
    		apiReturn("login error");
    		return;
    	}
    	if($admin['statusLock'] == 1){
    		apiReturn("login lock");
    		return;
    	}
    	$code = md5(rand(1000,9999));
    	$adminModel->where(array("id"=>$admin['id']))->save(array("code"=>$code));
    	$result = array(
    			"status"=>"ok",
    			"pwd"=>chiffrement($data['pwd']),
    			"code"=>$code
    	);
    	apiReturn($result);
    }
}