<?php
namespace API\Controller;
use Think\Controller;
class SettingController extends Controller {
	public function addLibary(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = I('post.');
		$model = D('Libary');
		try{
			$id = $model->add($data);
		}catch(Exception $e){
			apiReturn("false");
			return;
		}
		if($id){
			$result = array(
					"status"=>"ok",
					"id"=>$result
			);
			apiReturn($result);
		}else{
			apiReturn("false");
		}
		
	}
	public function getLibary(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		$model = D('Libary');
		$libary = $model->getById($id);
		if(!$libary){
			apiReturn("false");
			return;
		}
		$result = array(
				"status"=>"ok",
				"libary"=>$libary
		);
		apiReturn($result);
	}
	public function changeLibary(){
		
	}
	public function deleteLibary(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		$model = D('Libary');
		$libary = $model->getById($id);
		if(!$libary){
			apiReturn("libary not found");
			return;
		}
		$result = $model->deleteById($libary['id']);
		if($result){
			apiReturn("ok");
		}else{
			apiReturn("false");
		}
	}
}
