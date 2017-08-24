<?php
namespace Common\Model;
use Think\Model;
class TagModel extends Model{
	public function getByName($name = null){
		if(!$name){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$model = D('BookTag');
			$result['book'] = $model->serchByTag($result);
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
			$model = D('BookTag');
			$result['book'] = $model->serchByTag($result);
		}
		return $result;
	}
}
?>