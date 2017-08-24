<?php
namespace Index\Controller;
use Common\Base\Base;
class ClientController extends Base {
    public function index(){
    	
    }
    public function addClient(){
    	if(!checkClassified("addClient")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function listClient(){
    	
    }
    public function detailClient($id = null){
    	if(!checkClassified("detailClient")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    /*
    public function changeClient(){
    	
    }
    public function deleteClient(){
    	
    }
    */
    public function present(){
    	if(!checkClassified("present")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function statisticClient(){
    	
    }
}