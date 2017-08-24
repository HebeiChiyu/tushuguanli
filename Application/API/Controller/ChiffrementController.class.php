<?php
namespace API\Controller;
use Think\Controller;
class ChiffrementController extends Controller {
    public function chiffrementLoginPwd(){
    	if(!IS_POST){
    		apiReturn("false");
    		return;
    	}
    	$data = I('post.');
    	if(!$data['login']){
    		apiReturn("login empty");
    		return;
    	}
    	
    }
}