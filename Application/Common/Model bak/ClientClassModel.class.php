<?php
namespace Common\Model;
use Think\Model\RelationModel;
class ClientClassModel extends RelationModel{
	protected $_link = array(
			"Class"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"class",
					"foreign_key"=>"class",
					"mapping_name"=>"class",
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
		$list = $this->where($where)->relation("Class")->select();
		$result = array();
		foreach($list as $l){
			array_push($result,$l['class']);
		}
		return $result;
	}
	public function serchByClass($class = null){
		if(!$class){
			return;
		}
		if(is_numeric($class)){
			$where = array(
					"class"=>$class
			);
		}elseif(is_array($class) && $class['id']){
			$where = array(
					"class"=>$class['id']
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
	public function serchByClasss($classs = null){
		if(!$classs){
			return;
		}
		if(!is_array($classs) || !count($classs)){
			return;
		}
		$temp = array();
		foreach($classs as $t){
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
				"class"=>array(
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