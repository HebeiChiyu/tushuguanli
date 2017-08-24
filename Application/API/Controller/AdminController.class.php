<?php
namespace API\Controller;
use API\Common\Controller\Api;
class AdminController extends Api {
    public function addAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$data = $this->checkAdminData();
    	if(!is_array($data) || $data['status']){
    		$data['status'] = "false";
    		apiReturn($data);
    		return;
    	}
    	$adminModel = D('Admin');
    	$idAdmin = $adminModel->add($data);
    	if($idAdmin){
    		$result = array(
    				"status"=>"ok",
    				"id"=>$idAdmin
    		);
    		apiReturn($result);
    		return;
    	}
    	apiReturn("fail");
    }
    public function checkAdminData($data = null){
    	if(!$data){
    		$data = I('post.');
    	}
    	$error = array();
    	if(!$data['name']){
    		$temp = array(
    				"name"=>"姓名不能为空"
    		);
    		array_push($error,$temp);
    	}
    	if(!$data['sex']){
    		$temp = array(
    				"sex"=>"会员性别不能为空"
    		);
    		array_push($error,$temp);
    	}elseif(!in_array($data['sex'],array("男","女"))){
    		$temp = array(
    				"sex"=>"会员性别错误"
    		);
    		array_push($error,$temp);
    	}
    	if(!$data['dateBirth']){
    		$temp = array(
    				"dateBirth"=>"会员出生日期不能为空"
    		);
    		array_push($error,$temp);
    	}elseif(!strtotime($data['dateBirth'])){
    		$temp = array(
    				"dateBirth"=>"会员出生日期错误"
    		);
    		array_push($error,$temp);
    	}
    	if(!$data['tel']){
    		$temp = array(
    				"tel"=>"会员手机号码不能为空"
    		);
    		array_push($error,$temp);
    	}elseif(strlen($data['tel']) != 11 || !in_array($data['tel'][0].$data['tel'][1].$data['tel'][2],array("133","153","180","181","189","130","131","132","145","155","156","185","186","134","135","136","137","138","139","147","150","151","152","157","158","159","182","183","184","187","188","170","171","172","173","174","175","176","177"))){
    		$temp = array(
    				"tel"=>"会员手机号码格式错误"
    		);
    		array_push($error,$temp);
    	}
    	if(!$data['identity']){
    		$temp = array(
    				"identity"=>"会员身份证号不能为空"
    		);
    		array_push($error,$temp);
    	}elseif(!is_numeric(rtrim(rtrim($data['identity'],"x"),"X")) || strlen($data['identity']) != 18 || (!is_numeric($data['identity'][17]) && !in_array($data['identity'],array("x","X")))){
    		$temp = array(
    				"identity"=>"会员身份证号格式错误"
    		);
    		array_push($error,$temp);
    	}
    	if(count($error)){
    		$error['status'] = "false";
    		return $error;
    	}
    	return $data;
    }
    public function listAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$condition = I('post.');
    	//TODO
    	$adminModel = D('Admin');
    	$list = $adminModel->select();
    	$result = array(
    			"status"=>"ok",
    			"list"=>$list
    	);
    	$this->ajaxReturn($result);
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
    public function getAdminyId(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("id error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getById($id);
    	if(!$admin){
    		apiReturn("id error");
    		return;
    	}
    	$result = array(
    			"status"=>"ok",
    			"admin"=>$admin
    	);
    	apiReturn($result);
    }
    public function getClietnByTel(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$tel = I('post.tel');
    	if(!$tel){
    		apiReturn("tel error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getByTel($tel);
    	if(!$admin){
    		apiReturn("id error");
    		return;
    	}
    	$result = array(
    			"status"=>"ok",
    			"admin"=>$admin
    	);
    	apiReturn($result);
    }
    public function changeAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$data = $this->checkAdminData();
    	if(!is_array($data) || $data['status'] || !$data['id'] || !is_numeric($data['id'])){
    		$data['status'] = "false";
    		apiReturn($data);
    		return;
    	}
    	$where = array("id"=>$data['id']);
    	$adminModel = D('Admin');
    	if(is_numeric($adminModel->where($where)->save($data))){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function deleteAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getById($admin);
    	$result = $adminModel->where(array("id"=>$id))->delete();
    	if($result){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function lockAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getById($admin);
    	if(!$admin){
    		apiReturn("error");
    		return;
    	}
    	$data = array(
    			"statusLock"=>1
    	);
    	$result = $adminModel->where(array("id"=>$id))->save($data);
    	if(is_numeric($result)){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function unlockAdmin(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$adminModel = D('Admin');
    	$admin = $adminModel->getById($admin);
    	if(!$admin){
    		apiReturn("error");
    		return;
    	}
    	$data = array(
    			"statusLock"=>0
    	);
    	$result = $adminModel->where(array("id"=>$id))->save($data);
    	if(is_numeric($result)){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    
    
}