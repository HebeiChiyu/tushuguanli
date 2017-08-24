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
	public function serchByClient($client = null){
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
	public function serchByVolume($volume = null){
		if(!$volume){
			return;
		}
		if(is_numeric($volume)){
			$whereVolume = array(
					"volume"=>$volume,
			);
		}elseif(is_array($volume) && count($volume)){
			$temp = array();
			foreach($volume as $v){
				if(is_array($v) && $v['id']){
					array_push($temp,$v['id']);
				}elseif(!is_array($v) && $volume['id']){
					array_push($temp,$volume['id']);
					break;
				}else{
					return;
				}
			}
			if($temp){
				$whereVolume = array(
						"volume"=>array(
								"in",
								$temp
						)
				);
			}else{
				return;
			}
		}
		$listContent = D('BorrowContent')->where($whereVolume)->select();
		$temp = array();
		foreach($listContent as $l){
			array_push($temp,$l['idborrow']);
		}
		if(!count($temp)){
			return array();	
		}
		return $this->serchByIds($temp);
	}
	public function serchByIds($ids = null){
		if(!$ids || !is_array($ids)){
			return;
		}
		foreach($ids as $i){
			if(!is_numeric($i)){
				return;
			}
		}
		$where = array(
				"id"=>array(
						"in",
						$ids
				)
		);
		$list = $this->where($where)->select();
		if(count($list)){
			$contentModel = D('BorrowContent');
			foreach($list as $key=>$value){
				$list[$key]['content'] = $contentModel->serchByBorrow($value);
			}
		}
		return $list;
	}
	public function serchByCondition($condition = null){
		if(!$condition){
			return;
		}
		$where = array(
				"time"=>array()
		);
		if($condition['client']){
			if(is_numeric($condition['client'])){
				$where['client'] = $condition['client'];
			}elseif(is_array($condition['client']) && $condition['client']['id']){
				$where['client'] = $condition['client']['id'];
			}else{
				return;
			}
		}
		if($condition['serialNumber']){
			$where['serialNumber'] = $condition['serialNumber'];
 		}
 		if($condition['timeMin']){
 			$temp = array(
 					"EGT",
 					$condition['timeMin']
 			);
 			array_push($where['time'],$temp);
 		}
 		if($condition['timeMax']){
 			$temp = array(
 					"LT",
 					date("Y-m-d",strtotime($condition['time']."+1 day")),
 			);
 			array_push($where['time'],$temp);
 		}
 		if($condition['book']){
 			$book = D('Book')->get($condition['book']);
 			if(!$book){
 				return;
 			}
 			$volume = $book['volume'];
 			$temp = array();
 			foreach($volume as $v){
 				array_push($temp,$v['id']);
 			}
 			if($temp){
 				$whereVolume = array(
 						"volume"=>array(
 								"in",
 								$temp
 						)
 				);
 			}else{
 				return array();
 			}
 			$listContent = D('BorrowContent')->where($whereVolume)->select();
 			$temp = array();
 			foreach($listContent as $l){
 				array_push($temp,$l['idborrow']);
 			}
 			if(!count($temp)){
 				return array();
 			}
 			$where['id'] = array(
 					"in",
 					$temp
 			);
 		}
 		foreach($where as $key=>$value){
 			if(is_array($value) && !count($value)){
 				unset($where[$key]);
 			}
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