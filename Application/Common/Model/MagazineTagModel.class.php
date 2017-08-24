<?php
namespace Common\Model;
use Think\Model\RelationModel;
class MagazineTagModel extends RelationModel{
	protected $_link = array(
			"Tag"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"tag",
					"foreign_key"=>"tag",
					"mapping_name"=>"tag",
			),
			"Magazine"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"magazine",
					"foreign_key"=>"magazine",
					"mapping_name"=>"magazine",
			),
	);
	public function serchByMagazine($magazine = null){
		if(!$magazine){
			return;
		}
		if(is_numeric($magazine)){
			$where = array(
					"magazine"=>$magazine
			);
		}elseif(is_array($magazine) && $magazine['id']){
			$where = array(
					"magazine"=>$magazine['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation("Tag")->select();
		$result = array();
		foreach($list as $l){
			array_push($result,$l['tag']);
		}
		return $result;
	}
	public function serchByTag($tag = null){
		if(!$tag){
			return;
		}
		if(is_numeric($tag)){
			$where = array(
					"tag"=>$tag
			);
		}elseif(is_array($tag) && $tag['id']){
			$where = array(
					"tag"=>$tag['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		$temp = array();
		foreach($list as $l){
			array_push($temp,$l['magazine']);
		}
		$result = D('Magazine')->serchByIds($temp);
		return $result;
	}
	public function serchByTags($tags = null){
		if(!$tags){
			return;
		}
		if(!is_array($tags) || !count($tags)){
			return;
		}
		$temp = array();
		foreach($tags as $t){
			if(is_numeric($t)){
				array_push($temp,$t);
			}elseif(is_array($t) && $t['id']){
				array_push($temp,$t['id']);
			}else{
					return;
			}
		}
		if(!count($temp)){
			return;
		}
		$where = array(
				"tag"=>array(
						"in",
						$temp
				)
		);
		$list = $this->where($where)->select();
		$temp = array();
		foreach($list as $l){
			array_push($temp,$l['magazine']);
		}
		$result = D('Magazine')->serchByIds($temp);
		return $result;
	}
}
?>