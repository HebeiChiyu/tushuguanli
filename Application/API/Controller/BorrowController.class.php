<?php
namespace API\Controller;
use Think\Controller;
class BorrowController extends Controller {
	public function borrowBook(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = I('post.');
		if(!$data['client']){
			apiReturn("no client");
			return;
		}
		$client = D('Client')->getById($data['client']);
		if(!$client){
			apiReturn("client error");
			return;
		}
		if(!$data['list'] || !count($data['list'])){
			apiReturn("no list");
			return;
		}
		$dataBorrow = array(
				"client"=>$client['id'],
				"serialNumber"=>time().rand(10000,99999),
				"time"=>date("Y-m-d H:i:s")
		);
		$idBorrow = M('borrow')->add($dataBorrow);
		if(!$idBorrow){
			apiReturn("false");
			return;
		}
		$volumeModel = D('Volume');
		$dataContent = array();
		$listVolume = array();
		foreach($data['list'] as $i){
			$volume = $volumeModel->getById($i);
			if(!$volume){
				apiReturn("list error");
				return;
			}
			$temp = array(
					"idBorrow"=>$idBorrow,
					"volume"=>$i,
					"dateExpire"=>date("Y-m-d H:i:s",strtotime("+7 days")),
			);
			array_push($dataContent,$temp);
			array_push($listVolume,$volume['id']);
		}
		$contentModel = M('borrowContent');
		$result = $contentModel->addAll($dataContent);
		if($result){
			$data = array(
					"status"=>"out",
			);
			$where = array(
					"id"=>array(
							"in",
							$listVolume
					)
			);
			$volumeModel->where($where)->save($data);
			apiReturn("ok");
		}else{
			M('borrow')->where(array("id"=>$idBorrow))->delete();
			apiReturn("false2");
		}
	}
	public function returnBook(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$serialNumber = I('post.serialNumber');
		$volume = D('Volume')->getBySerialNumber($serialNumber);
		if(!$volume){
			apiReturn("SN error");
			return;
		}
		$contentModel = D('BorrowContent');
		$where = array(
				"volume"=>$volume['id'],
				"dataReturn"=>"null"
		);
		$content = $contentModel->where($where)->find();
		if(!$content){
			apiReturn("not out");
			return;
		}
		$data = array(
				"dateReturn"=>date("Y-m-d H:i:s")
		);
		$where = array(
				"id"=>$content['id']
		);
		$result = $contentModel->where($where)->save($data);
		if($result){
			$data = array(
					"status"=>"in"
			);
			D('Volume')->where(array("id"=>$volume['id']))->save($data);
			apiReturn("ok");
		}else{
			apiReturn("å¤±è´¥");
		}
	}
	public function prolongerBook(){
		//TODO Î´²âÊÔ
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$serialNumber = I('post.serialNumber');
		$volume = D('Volume')->getBySerialNumber($serialNumber);
		if(!$volume){
			apiReturn("SN error");
			return;
		}
		$contentModel = D('BorrowContent');
		$where = array(
				"volume"=>$volume['id'],
				"dataReturn"=>"null"
		);
		$content = $contentModel->where($where)->find();
		if(!$content){
			apiReturn("not out");
			return;
		}
		$data = array(
				"dateExpire"=>date("Y-m-d",strtotime($content['dateexpire']." +7 days")),
				"numberProlonger"=>$content['numberprolonger']+1
		);
		$where = array(
				"id"=>$content['id']
		);
		$result = $contentModel->where($where)->save($data);
		if($result){
			apiReturn("ok");
		}else{
			apiReturn("å¤±è´¥");
		}
	}
}