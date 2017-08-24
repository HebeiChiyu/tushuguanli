<?php
namespace Common\Model;
use Think\Model;
class BorrowContentModel extends Model{
	public function serchByBorrow($borrow = null){
		if(!$borrow){
			return;
		}
		if(is_numeric($borrow)){
			$where = array(
					"idBorrow"=>$borrow
			);
		}elseif(is_array($borrow) && $borrow['id']){
			$where = array(
					"idBorrow"=>$borrow['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$volumeModel = D('Volume');
			foreach($list as $key=>$value){
				$list[$key]['volume'] = $volumeModel->getById($value['volume']);
			}
		}
		return $list;
	}
	public function serchByVolume($volume = null){
		if(!$volume){
			return;
		}
		if(is_array($volume) && $volume['id']){
			$where = array(
					"volume"=>$volume['id']
			);
		}elseif(is_numeric($volume)){
			$where = array(
					"volume"=>$volume
			);
		}else{
			return;		
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$volumeModel = D('Volume');
			foreach($list as $key=>$value){
				$list[$key]['volume'] = $volumenModel->getById($value['volume']);
			}
		}
		return $list;
	}
	public function serchByStatus($status = null){
		if(!$status){
			return;
		}
		if(!is_string($status)){
			return;
		}
		$where = array(
				"status"=>$status
		);
		$list = $this->where($where)->select();
		if(count($list)){
			$volumeModel = D('Volume');
			foreach($list as $key=>$value){
				$list[$key]['volume'] = $volumenModel->getById($value['volume']);
			}
		}
		return $list;
	}
	public function serchByNumberProlonger($number = null){
		if(!$number){
			return;
		}
		if(is_array($number) && count($number) > 0){
			if(count($number) >= 2 && is_numeric($number[0]) & is_numeric($number[1])){
				$where = array(
						"numberProlonger"=>array(
								array(
										"EGT",
										$number[0]
								),
								array(
										"ELT",
										$number[1]
								)
						)
				);
			}elseif(is_numeric($number[0])){
				$where = array(
						"numberProlonger"=>$number[0]
				);
			}elseif(!$number[0] && is_numeric($number[2])){
				$where = array(
						"numberProlonger"=>array(
								"ELT",
								$number[2]
						)
				);
			}else{
				return;
			}
		}elseif(is_numeric($number)){
			$where = array(
					"numberProlonger"=>$number
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$volumeModel = D('Volume');
			foreach($list as $key=>$value){
				$list[$key]['volume'] = $volumenModel->getById($value['volume']);
			}
		}
		return $list;
	}
	public function serchByDateExpire($dateExpire = null){
		if(!$dateExpire){
			return;
		}
		if(is_array($dateExpire)){
			if(count($dateExpire) >= 2 && is_string($dateExpire[0]) && is_string($dateExpire[1])){
				$where = array(
						"dateExpire"=>array()
				);
				if($dateExpire[0]){
					$temp = array(
							"EGT",$dateExpire[0]
					);
					array_push($where['dateExpire'],$temp);
				}
				if($dateExpire[1]){
					$temp = array(
							"LT",date("Y-m-d",strtotime($dateExpire[1]."+1 day"))
					);
					array_push($where['dateExpire'],$temp);
				}
			}elseif(is_string($dateExpire[0]) && $dateExpire[0]){
				$where = array(
						"dateExpire"=>$dateExpire[0]
				);
			}else{
				return;
			}
		}elseif(is_string($dateExpire) && $dateExpire){
			$where = array(
					"dateExpire"=>$dateExpire
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		if(count($list)){
			$volumeModel = D('Volume');
			foreach($list as $key=>$value){
				$list[$key]['volume'] = $volumenModel->getById($value['volume']);
			}
		}
		return $list;
	}
	
}
?>