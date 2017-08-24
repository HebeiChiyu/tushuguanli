<?php
namespace API\Controller;
use Think\Controller;
class ClassifiedController extends Controller {
	public function addTemplate(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$postData = I('post.data');
		$error = array();
		if(!$postData['name']){
			$error['name'] = "模板名称不能为空";
		}
		if(!$postData['classified'] && !is_array($postData['classified'])){
			$error['classified'] = "模版内的权限不能为空";
		}
		if(count($error)){
			$error['status'] = "false";
			apiReturn($error);
			return;
		}
		$data = array(
				"name"=>$postData['name']
		);
		$templateModel = D('Template');
		$idTemplate = $templateModel->add($data);
		if(!$idTemplage){
			apiReturn("fail");
			return;
		}
		$dataClassified = array();
		foreach($postData['classified'] as $c){
			$temp = array(
					"template"=>$idTemplate,
					"classified"=>$c
			);
			array_push($dataClassified,$temp);
		}
		if(D('TemplateClassified')->addAll($dataClassified) > 0){
			apiReturn("ok");
		}else{
			D('TemplateClassified')->where(array("template"=>$idTemplate))->delete();
			$templateModel->where(array("id"=>$idTemplate))->delete();
			apiReturn("fail");
		}
	}
	public function changeTemplate(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$postData = I('post.data');
		$error = array();
		if(!$postData['name']){
			$error['name'] = "模板名称不能为空";
		}
		if(!$postData['classified'] && !is_array($postData['classified'])){
			$error['classified'] = "模版内的权限不能为空";
		}
		if(count($error) || !$postData['id'] || !is_numeric($postData['id'])){
			$error['status'] = "false";
			apiReturn($error);
			return;
		}
		$data = array(
				"name"=>$postData['name']
		);
		$templateModel = D('Template');
		$idTemplate = $templateModel->add($data);
		if(!$idTemplage){
			apiReturn("fail");
			return;
		}
		$dataClassified = array();
		foreach($postData['classified'] as $c){
			$temp = array(
					"template"=>$idTemplate,
					"classified"=>$c
			);
			array_push($dataClassified,$temp);
		}
		if(D('TemplateClassified')->addAll($dataClassified) > 0){
			apiReturn("ok");
		}else{
			D('TemplateClassified')->where(array("template"=>$idTemplate))->delete();
			$templateModel->where(array("id"=>$idTemplate))->delete();
			apiReturn("fail");
		}
	}
	public function deleteTemplate(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$templateModel = D('Template');
		$template = $templateModel->getById($template);
		$result = $templateModel->where(array("id"=>$id))->delete();
		if($result){
			apiReturn("ok");
		}else{
			apiReturn("fail");
		}
	}
	public function listTemplate(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$condition = I('post.');
		//TODO
	}
	public function checkSerchCondition(){
		if(!$data){
			$data = I('post.');
		}
		if(!is_array($data)){
			return;
		}
		//TODO
	}
	public function getTemplateById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$templateModel = D('Template');
		$template = $templateModel->getById($id);
		$result = array(
				"status"=>"ok",
				"template"=>$template
		);
		apiReturn($result);
	}
}