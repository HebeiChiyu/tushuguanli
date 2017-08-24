<?php
namespace Common\Model;
use Think\Model\Model;
class PressModel extends Model{
	public function getByName($name = null){
		if(!$name){
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
}
?>