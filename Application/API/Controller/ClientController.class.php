<?php
namespace API\Controller;
use API\Common\Controller\Api;
class ClientController extends Api {
    public function addClient(){
        if(!IS_POST){
        	apiReturn("error");
        	return;
        }
        $data = $this->checkClientData();
        if(!is_array($data) || $data['status']){
			$data['status'] = "false";
        	apiReturn($data);
        	return;
        }
        $clientModel = D('Client');
        $idClient = $clientModel->add($data);
        if($idClient){
        	$result = array(
        			"status"=>"ok",
        			"id"=>$idClient
        	);
        	apiReturn($result);
        	return;
        }
        apiReturn("fail");
    }
    private function checkClientData($data = null){
    	if(!$data){
    		$data = I('post.');
    	}
    	if(!is_array($data)){
    		return;
    	}
    	$clientModel = D('Client');
    	$error = array();
    	if(!$data['serialNumber']){
    		$temp = array(
    				"serialNumber"=>"会员号不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}
    	if(!$data['name']){
    		$temp = array(
    				"name"=>"会员姓名不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}
    	if(!$data['sex']){
    		$temp = array(
    				"sex"=>"会员性别不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}elseif(!in_array($data['sex'],array("男","女"))){
    		$temp = array(
    				"sex"=>"会员性别错误"
    		);
    		$error = array_merge($error,$temp);
    	}
    	if(!$data['dateBirth']){
    		$temp = array(
    				"dateBirth"=>"会员出生日期不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}elseif(!strtotime($data['dateBirth'])){
    		$temp = array(
    				"dateBirth"=>"会员出生日期错误"
    		);
    		$error = array_merge($error,$temp);
    	}
    	if(!$data['tel']){
    		$temp = array(
    				"tel"=>"会员手机号码不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}else{
    		if(strlen($data['tel']) != 11 || !in_array($data['tel'][0].$data['tel'][1].$data['tel'][2],array("133","153","180","181","189","130","131","132","145","155","156","185","186","134","135","136","137","138","139","147","150","151","152","157","158","159","182","183","184","187","188","170","171","172","173","174","175","176","177"))){
	    		$temp = array(
	    				"tel"=>"会员手机号码格式错误"
	    		);
	    		$error = array_merge($error,$temp);
    		}else{
    			$client = $clientModel->getByTel($data['tel']);
    			if($client){
    				$temp = array(
    						"tel"=>"会员手机号码已存在"
    				);
    				$error = array_merge($error,$temp);
    			}
    		}
    	}
    	/*
    	if(!$data['identity']){
    		$temp = array(
    				"identity"=>"会员身份证号不能为空"
    		);
    		$error = array_merge($error,$temp);
    	}elseif(!is_numeric(rtrim(rtrim($data['identity'],"x"),"X")) || strlen($data['identity']) != 18 || (!is_numeric($data['identity'][17]) && !in_array($data['identity'],array("x","X")))){
    		$temp = array(
    				"identity"=>"会员身份证号格式错误"
    		);
    		$error = array_merge($error,$temp);
    	}
    	*/
    	if($data['identity']){
    		if(!is_numeric(rtrim(rtrim($data['identity'],"x"),"X")) || strlen($data['identity']) != 18 || (!is_numeric($data['identity'][17]) && !in_array($data['identity'],array("x","X")))){
    			$temp = array(
    					"identity"=>"会员身份证号格式错误"
    			);
    			$error = array_merge($error,$temp);
    		}else{
    			
    			$client = $clientModel->getByIdentity($data['identity']);
    			if($client){
    				$temp = array(
    						"identity"=>"会员身份证号码已存在"
    				);
    				$error = array_merge($error,$temp);
    			}
    		}
    	}
    	if(count($error)){
    		$error['status'] = "false";
    		return $error;
    	}
    	return $data;
    }
    public function listClient(){
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
    public function getClientById(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("id error");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->getById($id);
    	if(!$client){
    		apiReturn("id error");
    		return;
    	}
    	$result = array(
    			"status"=>"ok",
    			"client"=>$client
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
    	$clientModel = D('Client');
    	$client = $clientModel->getByTel($tel);
    	if(!$client){
    		apiReturn("id error");
    		return;
    	}
    	$result = array(
    			"status"=>"ok",
    			"client"=>$client
    	);
    	apiReturn($result);
    }
    public function changeClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$data = $this->checkClientData();
    	if(!is_array($data) || $data['status'] || !$data['id'] || !is_numeric($data['id'])){
    		$data['status'] = "false";
    		apiReturn($data);
    		return;
    	}
    	$where = array("id"=>$data['id']);
    	$clientModel = D('Client');
    	if(is_numeric($clientModel->where($where)->save($data))){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function deleteClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->getById($client);
    	$result = $clientModel->where(array("id"=>1))->delete();
    	if($result){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function lockClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->getById($client);
    	if(!$client){
			apiReturn("error");
			return;
    	}
    	$data = array(
    			"statusLock"=>1
    	);
    	$result = $clientModel->where(array("id"=>1))->save($data);
    	if(is_numeric($result)){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function unlockClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->getById($client);
    	if(!$client){
    		apiReturn("error");
    		return;
    	}
    	$data = array(
    			"statusLock"=>0
    	);
    	$result = $clientModel->where(array("id"=>1))->save($data);
    	if(is_numeric($result)){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function stopClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$id = I('post.id');
    	if(!$id || !is_numeric($id)){
    		apiReturn("error");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->getById($client);
    	if(!$client){
    		apiReturn("error");
    		return;
    	}
    	$data = array(
    			"status"=>0
    	);
    	$result = $clientModel->where(array("id"=>1))->save($data);
    	if(is_numeric($result)){
    		apiReturn("ok");
    	}else{
    		apiReturn("fail");
    	}
    }
    public function getClient(){
    	if(!IS_POST){
    		apiReturn("error");
    		return;
    	}
    	$index = I('post.index');
    	if(!$index){
    		apiReturn("false");
    		return;
    	}
    	$clientModel = D('Client');
    	$client = $clientModel->get($index);
    	if(!$client){
    		apiReturn("false".$index);
    		return;
    	}
    	$result = array(
    			"status"=>"ok",
    			"client"=>$client
    	);
    	apiReturn($result);
    }
}