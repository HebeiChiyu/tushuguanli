<?php
namespace Common\Model;
use Think\Model\RelationModel;
class MagazineModel extends RelationModel{
	protected $_link = array(
			"Type"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"type",
					"foreign_key"=>"type",
					"mapping_name"=>"type",
			),
			"Press"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"press",
					"foreign_key"=>"press",
					"mapping_name"=>"press",
			),
			"Recorder"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"admin",
					"foreign_key"=>"recorder",
					"mapping_name"=>"recorder",
			),
			"Period"=>array(
					"mapping_type"=>self::HAS_MANY,
					"class_name"=>"magazinePeriod",
					"foreign_key"=>"magazine",
					"mapping_name"=>"period",
			),
			"Libary"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"libary",
					"foreign_key"=>"libary",
					"mapping_name"=>"libary",
			),
	);
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$result = getCache($id, "Runtime/magazine/id");
		if($result && $result['expire'] > time()){
			return $result['magazine'];
		}
		$where = array(
				"id"=>$id
		);
		$magazine = $this->where($where)->relation(true)->find();
		/*
		if($magazine){
			$magazine['tag'] = D('magazineTag')->serchByBook($magazine);
		}
		*/
		makeCache($id,array("magazine"=>$magazine,"expire"=>time()+60),"Runtime/magazine/id");
		return $magazine;
	}
	public function getByISSN($ISSN){
		if(!$ISSN || !is_string($ISSN)){
			return;
		}
		$result = getCache($ISSN, "Runtime/magazine/ISSN");
		if($result && $result['expire'] > time()){
			return $result['magazine'];
		}
		$where = array(
				"ISSN"=>$ISSN
		);
		$magazine = $this->where($where)->relation(true)->find();
		/*
		if($magazine){
			$magazine['tag'] = D('magazineTag')->serchByMagazine($magazine);
		}
		*/
		makeCache($id,array("magazine"=>$magazine,"expire"=>time()+60),"Runtime/magazine/id");
		return $magazine;
	}
	public function getByCodeBar($codeBar){
		if(!$codeBar || !is_numeric($codeBar)){
			return;
		}
		$result = getCache($codeBar, "Runtime/magazine/codeBar");
		if($result && $result['expire'] > time()){
			return $result['magazine'];
		}
		$where = array(
				"codeBar"=>$codeBar
		);
		$magazine = $this->where($where)->relation(true)->find();
		makeCache($id,array("magazine"=>$magazine,"expire"=>time()+60),"Runtime/magazine/id");
		return $magazine;
	}
	public function get($index = null){
		if(!$index){
			return;
		}
		$magazine = $this->getByCodeBar($index);
		if(!$magazine){
			$magazine = $this->getByISSN($index);
			if(!$magazine){
				return;
			}
		}
		return $magazine;
	}
}
?>