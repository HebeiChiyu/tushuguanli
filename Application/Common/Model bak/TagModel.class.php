<?php
namespace Common\Model;
use Think\Model\Model;
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
}
?>