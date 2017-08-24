<?php
namespace Logout\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(!checkLogin()){
    		header("location: ".U('/'));
    	}
    	session("user",null);
    	session("expire",null);
    	header("location: ".U('/'));
    }
}