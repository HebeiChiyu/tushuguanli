<?php
namespace Common\Model;
use Think\Model;
class TypeModel extends Model{
	public function getByName($name = null){
		if(!$name){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByType($result);
		}
		return $result;
	}
	public function getById($id = null){
		if(!$id){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByType($result);
		}
		return $result;
	}
}
?>