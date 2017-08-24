<?php
namespace Common\Model;
use Think\Model;
class TemplateModel extends Model{
	public function getById($id = null){
		if(!$id){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->find();
		if($result){
			$result['classified'] = D('TemplateClassified')->getByTemplate($result['id']);;
		}
		return $result;
	}
	public function getByName($name = null){
		if(!$name){
			return;
		}
		$where = array(
				"name"=>$name
		);
		$result = $this->where($where)->find();
		if($result){
			$result['classified'] = D('TemplateClassified')->getByTemplate($result['id']);
		}
		return $result;
	}
}
?>