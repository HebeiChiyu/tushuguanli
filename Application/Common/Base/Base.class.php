<?php
namespace Common\Base;
use Think\Controller;
class Base extends Controller{
	protected $user;
	public function __construct(){
		parent::__construct();
		$this->user = $this->checkLogin();
		if(!$this->user){
			header("location: ".U('/login')."?url=".$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
		}
	}
	private function checkLogin(){
		$user = session("user");
		$expire = session("expire");
		if(!$user){
			return;
		}
		if(!$expire || $expire < time()){
			return;
		}
		$sessionTime = C("sessionTime")?C("sessionTime"):1200;
		session("expire",time()+$sessionTime);
		return $user;
	}
}