<?php
namespace Common\Model;
use Think\Model\RelationModel;
class AdminClassModel extends RelationModel{
	protected $_link = array(
			"Classified"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"classified",
					"foreign_key"=>"classified",
					"mapping_name"=>"classified",
			),
	);
	public function getByAdmin($admin = null){
		/*
		if(!is_numeric($id)){
			return;
		}
		$where = array(
				"admin"=>$id
		);
		return $this->relation(true)->where($where)->select();
		*/
		if(!$admin){
			return;
		}
		if(is_numeric($admin)){
			$where = array(
					"admin"=>$admin
			);
		}elseif(is_array($id) && isset($admin['id'])){
			$where = array(
					"admin"=>$admin['id']
			);
		}else{
			return;
		}
		$result = $this->relation(true)->where($where)->select();
		return $result;
	}
	public function update($admin = null,$classified = null){
		if(!$admin || !$classified || !is_array($classified) || !count($classified)){
			return false;
		}
		if(is_numeric($admin)){
			$where = array(
					"admin"=>$admin,
			);
		}elseif(is_array($admin['id']) || $admin['id']){
			$where = array(
					"admin"=>$admin['id']
			);
		}else{
			return false;
		}
		$list = $this->where($where)->select();
		foreach($list as $key=>$value){
			unset($list[$key]['id']);
		}
		$this->where($where)->delete();
		$data = array();
		foreach($classified as $value){
			$temp = array(
					"admin"=>$where['admin'],
					"classified"=>$value
			);
			array_push($data,$temp);
		}
		return ($this->addAll($data) > 0);
	}
}
?>