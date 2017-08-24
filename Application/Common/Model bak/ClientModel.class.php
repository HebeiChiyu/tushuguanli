<?php
namespace Common\Model;
use Think\Model\Model;
class ClientModel extends Model{
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$client = $this->where($where)->find();
		if($client){
			$client['press'] = D('ClientPress')->serchByClient($client);
			$client['Tag'] = D('ClientTag')->serchByClient($client);
			$client['Class'] = D('ClientClass')->serchByClient($client);
			$client['Type'] = D('ClientType')->serchByClient($client);
			$client['borrow'] = D('Borrow')->serchByClient($client);
		}
		return $client;
	}
	public function getBySerialNumber($serialNumber = null){
		if(!$serialNumber || !is_numeric($serialNumber)){
			return;
		}
		$where = array(
				"serialNumber"=>$serialNumber
		);
		$client = $this->where($where)->find();
		if($client){
			$client['press'] = D('ClientPress')->serchByClient($client);
			$client['Tag'] = D('ClientTag')->serchByClient($client);
			$client['Class'] = D('ClientClass')->serchByClient($client);
			$client['Type'] = D('ClientType')->serchByClient($client);
			$client['borrow'] = D('Borrow')->serchByClient($client);
		}
		return $client;
	}
	public function serchByName($name = null){
		if(!$name || !is_string($name)){
			return;
		}
		$where = array(
				"name"=>array(
						"like",
						"%".$name."%"
				)
		);
		$list = $this->where($where)->select();
		return $list;
	}
	public function serchBySex($sex = null){
		if(!$sex || !is_string($sex)){
			return;
		}
		$where = array(
				"sex"=>$sex
		);
		$list = $this->where($where)->select();
		return $list;
	}
	public function getByTel($tel = null){
		if(!$tel){
			return;
		}
		$where = array(
				"tel"=>$tel
		);
		$client = $this->where($where)->find();
		if($client){
			$client['press'] = D('ClientPress')->serchByClient($client);
			$client['Tag'] = D('ClientTag')->serchByClient($client);
			$client['Class'] = D('ClientClass')->serchByClient($client);
			$client['Type'] = D('ClientType')->serchByClient($client);
			$client['borrow'] = D('Borrow')->serchByClient($client);
		}
		return $client;
	}
	public function serchByNation($nation = null){
		if(!$nation || !is_string($nation)){
			return;
		}
		$where = array(
				"nation"=>$nation
		);
		$list = $this->where($where)->select();
		return $list;
	}
	public function serchByOrigin($origin = null){
		if(!$origin || !is_string($origin)){
			return;
		}
		$where = array(
				"origin"=>$origin
		);
		$list = $this->where($where)->select();
		return $list;
	}
	public function getByIdentity($identity = null){
		if(!$identity || !is_numeric($identity)){
			return;
		}
		$where = array(
				"identity"=>$identity
		);
		$client = $this->where($where)->find();
		if($client){
			$client['press'] = D('ClientPress')->serchByClient($client);
			$client['Tag'] = D('ClientTag')->serchByClient($client);
			$client['Class'] = D('ClientClass')->serchByClient($client);
			$client['Type'] = D('ClientType')->serchByClient($client);
			$client['borrow'] = D('Borrow')->serchByClient($client);
		}
		return $client;
	}
	public function serchByDateBirth($dateBirth = null){
		if(!$dateBirth){
			return;
		}
		if(!$dateBirth){
			return;
		}
		if(is_array($dateBirth)){
			if(count($dateBirth) >= 2 && is_string($dateBirth[0]) && is_string($dateBirth[1])){
				$where = array(
						"dateBirth"=>array()
				);
				if($dateBirth[0]){
					$temp = array(
							"EGT",$dateBirth[0]
					);
					array_push($where['dateBirth'],$temp);
				}
				if($dateBirth[1]){
					$temp = array(
							"LT",date("Y-m-d",strtotime($dateBirth[1]."+1 day"))
					);
					array_push($where['dateBirth'],$temp);
				}
			}elseif(is_string($dateBirth[0]) && $dateBirth[0]){
				$where = array(
						"dateBirth"=>$dateBirth[0]
				);
			}else{
				return;
			}
		}elseif(is_string($dateBirth) && $dateBirth){
			$where = array(
					"dateBirth"=>$dateBirth
			);
		}else{
			return;
		}
		$list = $this->where($where)->select();
		return $list;
	}
}
?>