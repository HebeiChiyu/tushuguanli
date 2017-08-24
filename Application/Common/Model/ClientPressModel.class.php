<?php
namespace Common\Model;
use Think\Model\RelationModel;
class ClientPressModel extends RelationModel{
	protected $_link = array(
			"Press"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"press",
					"foreign_key"=>"press",
					"mapping_name"=>"press",
			),
			"Client"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"client",
					"foreign_key"=>"client",
					"mapping_name"=>"client",
			),
	);
	public function serchByClient($client = null){
		if(!$client){
			return;
		}
		if(is_numeric($client)){
			$where = array(
					"client"=>$client
			);
		}elseif(is_array($client) && $client['id']){
			$where = array(
					"client"=>$client['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation("Press")->select();
		$result = array();
		foreach($list as $l){
			array_push($result,$l['press']);
		}
		return $result;
	}
	public function serchByPress($press = null){
		if(!$press){
			return;
		}
		if(is_numeric($press)){
			$where = array(
					"press"=>$press
			);
		}elseif(is_array($press) && $press['id']){
			$where = array(
					"press"=>$press['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		$temp = array();
		foreach($list as $l){
			array_push($temp,$l['client']);
		}
		$result = D('Client')->serchByIds($temp);
		return $result;
	}
	public function serchByPresses($presses = null){
		if(!$presses){
			return;
		}
		if(!is_array($presses) || !count($presses)){
			return;
		}
		$temp = array();
		foreach($presses as $t){
			if(is_numeric($t)){
				array_push($temp,$t);
			}elseif(is_array($t) && $t['id']){
				array_push($temp,$t['id']);
			}else{
					return;
			}
		}
		if(!count($temp)){
			return;
		}
		$where = array(
				"press"=>array(
						"in",
						$temp
				)
		);
		$list = $this->where($where)->select();
		$temp = array();
		foreach($list as $l){
			array_push($temp,$l['client']);
		}
		$result = D('Client')->serchByIds($temp);
		return $result;
	}
}
?>