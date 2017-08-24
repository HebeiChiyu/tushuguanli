<?php
namespace Common\Model;
use Think\Model;
class PressModel extends Model{
	public function getByName($name = null){
		if(!$name || !is_string($name)){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByPress($result);
		}
		return $result;
	}
	public function serchByName($name = null){
		if(!$name || !is_string($name)){
			return;
		}
		$where = array(
				"name"=>array(
						"like",
						"%".$name."%"
				)
		);
		$list = $this->where($where)->select();
		return $list;
	}
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByPress($result);
		}
		return $result;
	}
}
?>