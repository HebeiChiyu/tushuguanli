<?php
namespace Common\Model;
use Think\Model\RelationModel;
class ClientTypeModel extends RelationModel{
	protected $_link = array(
			"Type"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"type",
					"foreign_key"=>"type",
					"mapping_name"=>"type",
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
		$list = $this->where($where)->relation("Type")->select();
		$result = array();
		foreach($list as $l){
			array_push($result,$l['type']);
		}
		return $result;
	}
	public function serchByType($type = null){
		if(!$type){
			return;
		}
		if(is_numeric($type)){
			$where = array(
					"type"=>$type
			);
		}elseif(is_array($type) && $type['id']){
			$where = array(
					"type"=>$type['id']
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
	public function serchByTypes($types = null){
		if(!$types){
			return;
		}
		if(!is_array($types) || !count($types)){
			return;
		}
		$temp = array();
		foreach($types as $t){
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
				"type"=>array(
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