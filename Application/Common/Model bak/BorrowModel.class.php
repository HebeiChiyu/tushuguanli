<?php
namespace Common\Model;
use Think\Model\RelationModel;
class BorrowModel extends RelationModel{
	protected $_link = array(
			"Client"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"client",
					"foreign_key"=>"client",
					"mapping_name"=>"client"
			),
	);
	public function sercheByClient($client = null){
		if(!$client){
			return;
		}
		if(is_array($client) && $client['id']){
			$where = array(
					"client"=>$client['id']
			);
		}elseif(is_numeric($client)){
			$where = array(
					"client"=>$client
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$contentModel = D('BorrowContent');
			foreach($list as $key=>$value){
				$list[$key]['content'] = $contentModel->serchByBorrow($value);
			}
		}
		return $list;
	}
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$borrow = $this->where($where)->find();
		if($borrow){
			$borrow['content'] = D('BorrowContent')->serchByBorrow($borrow);
		}
		return $borrow;
	}
	public function getBySerialNumber($serialNumber = null){
		if(!$serialNumber || !is_numeric($serialNumber)){
			return;
		}
		$where = array(
				"serialNumber"=>$serialNumber
		);
		$borrow = $this->where($where)->find();
		if($borrow){
			$borrow['content'] = D('BorrowContent')->serchByBorrow($borrow);
		}
		return $borrow;
	}
	public function serchByTime($time = null){
		if(!$time){
			return;
		}
		if(is_array($time) && count($time) > 0){
			if(count($time) >= 2 && is_string($time[0]) && is_string($time[1])){
				$where = array(
						"time"=>array()
				);
				if($time[0]){
					$temp = array(
							"EGT",
							$time[0]
					);
					array_push($where['time'],$temp);
				}
				if($time[1]){
					$temp = array(
							"LT",
							date("Y-m-d",strtotime($time[1]."+1day"))
					);
					array_push($where['time'],$temp);
				}
			}elseif(count($time) == 1 && is_string($time[0]) && $time[0]){
				$where = array(
						"time"=>$time[0]
				);
			}else{
				return;
			}
		}elseif(is_string($time)){
			$where = array(
					"time"=>$time,
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$contentModel = D('BorrowContent');
			foreach($list as $key=>$value){
				$list[$key]['content'] = $contentModel->serchByBorrow($value);
			}
		}
		return $list;
	}
}
?>