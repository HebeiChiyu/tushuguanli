<?php
namespace API\Common\Controller;
use Think\Controller;
class Api extends Controller{
	protected $user;
	public function __construct(){
		parent::__construct();
		$this->user = $this->checkLogin();
		if(!$this->user){
			apiReturn("access denied");
			die;
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
?>