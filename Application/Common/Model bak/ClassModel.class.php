<?php
namespace Common\Model;
use Think\Model\Model;
class ClassModel extends Model{
	public function getByName($name = null){
		if(!$name){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->serchByClass($result);
		}
		return $result;
	}
}
?>