<?php
namespace Common\Model;
use Think\Model\RelationModel;
class ClientLibaryModel extends RelationModel{
	protected $_link = array(
			"Libary"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"libary",
					"foreign_key"=>"libary",
					"mapping_name"=>"libary",
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
		$list = $this->where($where)->relation("Libary")->select();
		$result = array();
		foreach($list as $l){
			array_push($result,$l['libary']);
		}
		return $result;
	}
	public function serchByLibary($libary = null){
		if(!$libary){
			return;
		}
		if(is_numeric($libary)){
			$where = array(
					"libary"=>$libary
			);
		}elseif(is_array($libary) && $libary['id']){
			$where = array(
					"libary"=>$libary['id']
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
	public function serchByLibaryes($libaryes = null){
		if(!$libaryes){
			return;
		}
		if(!is_array($libaryes) || !count($libaryes)){
			return;
		}
		$temp = array();
		foreach($libaryes as $t){
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
				"libary"=>array(
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