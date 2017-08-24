<?php
namespace Setting\Controller;
use Common\Base\Base;
/**
 * 
 * @author Yuan LI
 *
 */
class UserController extends Base {
    /**
     * 
     */
    public function addUser(){
    	if(!checkClassified("addUser")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    /**
     * 
     */
    public function listUser(){
    	if(!checkClassified("listUser")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    /*
    public function changeUser(){
    	
    }
    public function deleteUser(){
    	
    }
    */
    public function detailUser($id = null){
    	if(!checkClassified("detailUser")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    public function classifiedUser($id = null){
    	if(!checkClassified("classifiedUser")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
}