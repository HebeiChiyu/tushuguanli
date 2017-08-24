<?php
namespace Common\Model;
use Think\Model\RelationModel;
class TemplateClassModel extends RelationModel{
	protected $_link = array(
			"Classified"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"classified",
					"foreign_key"=>"classified",
					"mapping_name"=>"classified",
			),
	);
	public function getByTemplate($id = null){
		if(!is_numeric($id)){
			return;
		}
		$where = array(
				"template"=>$id
		);
		return $this->relation(true)->where($where)->select();
	}
	public function update($template = null,$classified = null){
		if(!$template || !$classified || !is_array($classified) || !count($classified)){
			return false;
		}
		if(is_numeric($template)){
			$where = array(
					"template"=>$template,
			);
		}elseif(is_array($template['id']) || $template['id']){
			$where = array(
					"template"=>$template['id']
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
					"template"=>$where['template'],
					"classified"=>$value
			);
			array_push($data,$temp);
		}
		return ($this->addAll($data) > 0);
	}
}
?>