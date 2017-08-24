<?php
namespace Common\Model;
use Think\Model;
class LibaryModel extends Model{
	public function getByName($name = null){
		if(!$name || !is_string($name)){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByLibary($result);
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
	public function serchByResponsable($responsable = null){
		if(!$responsable || !is_string($responsable)){
			return;
		}
		$where = array(
				"responsable"=>array(
						"like",
						"%".$responsable."%"
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
			$result['book'] = D('Book')->serchByLibary($result);
		}
		return $result;
	}
	public function deleteById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$where = array(
				"id"=>$id
		);
		return $this->where($where)->delete();
	}
}
?>