<?php
namespace Setting\Controller;
use Common\Base\Base;
class LibaryController extends Base {
    public function index(){
        
    }
    public function addLibary(){
    	if(!checkClassified("addLibary")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function listLibary(){
    	
    }
    /*
    public function changeLibary(){
    	
    }
    public function deleteLibary(){
    	 
    }
    */
    public function detailLibary($id = null){
    	if(!checkClassified("detailList")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    
}