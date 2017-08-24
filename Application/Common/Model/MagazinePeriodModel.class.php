<?php
namespace Common\Model;
use Think\Model\RelationModel;
class MagazinePeriodModel extends RelationModel{
	protected $_link = array(
			"Magazine"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"magazine",
					"foreign_key"=>"magazine",
					"mapping_name"=>"magazine"
			)
	);
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$result = getCache($id, "Runtime/magazinePeriod/id");
		if($result && $result['expire'] > time()){
			return $result['magazinePeriod'];
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->relation(true)->find();
		if($result){
			makeCache($id,array("expire"=>time()+1200,"magazinePeriod"=>$result),"Runtime/magazinePeriod/id");
		}
		return $result;
	}
	public function serchByMagazine($magazine = null){
		if(!$magazine){
			return;
		}
		if(is_numeric($magazine)){
			$where = array(
					"magazine"=>$magazine
			);
		}elseif(is_array($magazine) || isset($magazine['id'])){
			$where = array(
					"magazine"=>$magazine['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		return $result;
	}
}