<?php
namespace Common\Model;
use Think\Model;
class VolumeModel extends Model{
	public function serchByParent($parent,$class){
		if(!$parent){
			return;
		}
		if(!$class){
			return;
		}
		if(!is_string($class) || in_array($class,array("book","magazine"))){
			return;
		}
		if(is_array($parent) && $parent['id']){
			$where = array(
					"parent"=>$parent['id'],
					"class"=>$class,
			);
		}elseif(is_numeric($parent)){
			$where = array(
					"parent"=>$parent,
					"class"=>$class,
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
			if($result['class'] == "book"){
				$result['parent'] = D('Book')->getById($result['parent']);
			}else{
				$result['parent'] = D('magazinePeriod')->getById($result['parent']);
			}
		}
		return $result;
	}public function getBySerialNumber($number = null){
		if(!$number){
			echo 1;
			return;
		}
		$where = array(
				"serialNumber"=>$number
		);
		$result = $this->where($where)->find();
		if($result){
			if($result['class'] == "book"){
				$result['parent'] = D('Book')->getById($result['parent']);
			}else{
				$result['parent'] = D('magazinePeriod')->getById($result['parent']);
			}
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
			$periodModel = D('magazinePeriod');
			foreach($list as $key=>$value){
				if($list[$key]['class'] == "book"){
					$list[$key]['parent'] = $bookModel->getById($result['parent']);
				}else{
					$list[$key]['parent'] = $periodModel->getById($result['parent']);
				}
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
			$periodModel = D('magazinePeriod');
			foreach($list as $key=>$value){
				if($list[$key]['class'] == "book"){
					$list[$key]['parent'] = $bookModel->getById($result['parent']);
				}else{
					$list[$key]['parent'] = $periodModel->getById($result['parent']);
				}
			}
		}
		return $list;
	}
}
?>