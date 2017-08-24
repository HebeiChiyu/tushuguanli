<?php
namespace Index\Controller;
use Common\Base\Base;
class BookController extends Base {
    public function index(){
    	
    }
    public function addBook(){
    	if(!checkClassified("addBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function addMagazine(){
    	if(!checkClassified("addMagazine")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function addMagazinePeriod(){
    	if(!checkClassified("addMagazinePeriod")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function listBook(){
    	if(!checkClassified("listBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function detailBook($id = null){
    	if(!checkClassified("detailBook")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    public function detailMagazine($id = null){
    	if(!checkClassified("detailMagazine")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    public function addVolume(){
    	if(!checkClassified("addVolume")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display(); 
    }
    public function listBookVolume(){
    	if(!checkClassified("listVolume")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function detailVolume($id = null){
    	if(!checkClassified("detailVolume")){
    		$this->error("权限不足");
    		return;
    	}
    	if(!$id || !is_numeric($id)){
    		$this->error("404");
    		return;
    	}
    	$this->assign("id",$id);
    	$this->display();
    }
    public function listMagazineVolume(){
    	if(!checkClassified("listVolume")){
    		$this->error("权限不足");
    		return;
    	}
    	$this->display();
    }
    public function statisticBook(){
    	
    }
}