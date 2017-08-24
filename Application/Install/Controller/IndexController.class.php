<?php
namespace Install\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(C("INSTALLED")){
    		$this->display("installed");
    	}
    	header("location: ".U('/install/installStep/step1'));
    }
}