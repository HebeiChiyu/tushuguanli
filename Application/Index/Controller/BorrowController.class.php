<?php
namespace Index\Controller;
use Common\Base\Base;
class BorrowController extends Base {
    public function index(){
    	
    }
    public function borrowBook(){
    	if(!checkClassified("borrowBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function returnBook(){
    	if(!checkClassified("returnBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function prolongerBook(){
    	if(!checkClassified("returnBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
}