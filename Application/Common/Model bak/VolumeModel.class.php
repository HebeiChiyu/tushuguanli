<?php
namespace Common\Model;
use Think\Model\Model;
class VolumeModel extends Model{
	/*
	protected $_link = array(
			"Book"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"book",
					"foreign_key"=>"book",
					"mapping_name"=>"book"
			),
	);
	*/
	public function serchByBook($book = null){
		if(!$book){
			return;
		}
		if(is_array($book) && $book['id']){
			$where = array(
					"book"=>$book['id'],
			);
		}elseif(is_numeric($book)){
			$where = array(
					"book"=>$book
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		return $list;
	}
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->getById($result['book']);
		}
		return $result;
	}
	public function getBySerialNumber($number = null){
		if(!$number || !is_numeric($number)){
			return;
		}
		$where = array(
				"serialNumber"=>$number
		);
		$result = $this->where($where)->find();
		if($result){
			$result['book'] = D('Book')->getById($result['book']);
		}
		return $result;
	}
	public function serchByStatus($status = null){
		if(!$status || !is_string($status)){
			return;
		}
		$where = array(
				"status"=>$status
		);
		$list = $this->where($where)->select();
		if(count($list)){
			$bookModel = D('Book');
			foreach($list as $key=>$value){
				$list[$key]['book'] = $bookModel->getById($value['book']);
			}
		}
		return $list;
	}
	public function serchByAddTime($time = null){
		if(!$time){
			return;
		}
		if(is_array($time) && count($time) > 0){
			if(count($time) >= 2 && is_string($time[0]) && is_string($time[1])){
				$where = array(
						"addTime"=>array()
				);
				if($time[0]){
					$temp = array(
							"EGT",
							$time[0]
					);
					array_push($where['addTime'],$temp);
				}
				if($time[1]){
					$temp = array(
							"LT",
							date("Y-m-d",strtotime($time[1]."+1day"))
					);
					array_push($where['addTime'],$temp);
				}
			}elseif(count($time) == 1 && is_string($time[0]) && $time[0]){
				$where = array(
						"addTime"=>$time[0]
				);
			}else{
				return;
			}
		}elseif(is_string($time)){
			$where = array(
					"addTime"=>$time,
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$bookModel = D('Book');
			foreach($list as $key=>$value){
				$list[$key]['book'] = $bookModel->getById($value['book']);
			}
		}
		return $list;
	}
}
?>