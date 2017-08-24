<?php
namespace Common\Model;
use Think\Model;
class ClientModel extends Model{
	public function getById($id = null){
		if(!$id || !is_numeric($id)){
			return;
		}
		$result = getCache($id,"Runtime/client/id");
		if($result && $result['expire'] > time()){
			return $result['client'];
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
			$client['libary'] = D('ClientLibary')->serchByClient($client);
		}
		makeCache($id,array("expire"=>time()+60,"client"=>$client),"Runtime/client/id");
		return $client;
	}
	public function getBySerialNumber($serialNumber = null){
		if(!$serialNumber || !is_numeric($serialNumber)){
			return;
		}
		$result = getCache($serialNumber,"Runtime/client/serialNumber");
		if($result && $result['expire'] > time()){
			return $result['client'];
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
			$client['libary'] = D('ClientLibary')->serchByClient($client);
		}
		makeCache($serialNumber,array("expire"=>time()+60,"client"=>$client),"Runtime/client/serialNumber");
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
		$result = getCache($tel,"Runtime/client/tel");
		if($result && $result['expire'] > time()){
			return $result['client'];
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
			$client['libary'] = D('ClientLibary')->serchByClient($client);
		}
		makeCache($tel,array("expire"=>time()+60,"client"=>$client),"Runtime/client/tel");
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
		$result = getCache($identity,"Runtime/client/identity");
		if($result && $result['expire'] > time()){
			return $result['client'];
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
			$client['libary'] = D('ClientLibary')->serchByClient($client);
		}
		makeCache($identity,array("expire"=>time()+60,"client"=>$client),"Runtime/client/identity");
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
	public function serchByCondition($condition = null){
		if(!$condition){
			return;
		}
		$where = array(
				"dateBirth"=>array(),
		);
		if($condition['serialNumber']){
			$where['serialNumber'] = $condition['serialNumber'];
		}
		if($condition['name']){
			$where['name'] = array(
					"like",
					"%".$condition['name']."%"
			);
		}
		if($condition['sex']){
			$where['sex'] = $condition['sex'];
		}
		if($condition['dateBirthMin']){
			$temp = array(
					"EGT",
					$condition['dateBirthMin']
			);
			array_push($where['dateBirth'],$temp);
		}
		if($condition['dateBirthMax']){
			$temp = array(
					"EGT",
					$condition['dateBirthMax']
			);
			array_push($where['dateBirth'],$temp);
		}
		if($condition['tel']){
			$where['tel'] = $condition['tel'];
		}
		if($condition['nation']){
			$where['nation'] = $condition['nation'];
		}
		if($condition['origin']){
			$where['origin'] = $condition['origin'];
		}
		if($condition['identity']){
			$where['identity'] = $condition['identity'];
		}
		if($condition['etc']){
			$where['etc'] = array(
					"like",
					"%".$condition['etc']."%"
			);
		}
		$idIn = array();
		if($condition['tag']){
			if(is_array($condition['tag'])){
				$temp = array();
				foreach($condition['tag'] as $t){
					array_push($temp,$t);
				}
				$list = D('ClientTag')->serchByTags($temp);
			}else{
				$list = D('ClientTag')->serchByTag($condition['tag']);
			}
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if($condition['press']){
			if(is_array($condition['press'])){
				$temp = array();
				foreach($condition['press'] as $t){
					array_push($temp,$t);
				}
				$list = D('ClientPress')->serchByPresses($temp);
			}else{
				$list = D('ClientPress')->serchByPress($condition['press']);
			}
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if($condition['type']){
			if(is_array($condition['type'])){
				$temp = array();
				foreach($condition['type'] as $t){
					array_push($temp,$t);
				}
				$list = D('ClientType')->serchByTypes($temp);
			}else{
				$list = D('ClientType')->serchByType($condition['type']);
			}
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if($condition['libary']){
			if(is_array($condition['libary'])){
				$temp = array();
				foreach($condition['libary'] as $t){
					array_push($temp,$t);
				}
				$list = D('ClientLibary')->serchByLibarys($temp);
			}else{
				$list = D('ClientLibary')->serchByLibary($condition['libary']);
			}
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if($condition['class']){
			if(is_array($condition['class'])){
				$temp = array();
				foreach($condition['class'] as $t){
					array_push($temp,$t);
				}
				$list = D('ClientClass')->serchByClasss($temp);
			}else{
				$list = D('ClientClass')->serchByClass($condition['class']);
			}
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if($condition['book']){
			$bookModel = D('Book');
			$book = $bookModel->get($condition['book']);
			if(!$book){
				return array();
			}
			$volume = $book['volume'];
			$list = D('Borrow')->serchByVolume($volume);
			if(!count($list)){
				return array();
			}
			foreach($list as $l){
				if(!in_array($l['id'],$idIn)){
					array_push($$idIn,$l['id']);
				}
			}
		}
		if(count($idIn)){
			$where['id'] = array(
					"in",
					$idIn
			);
		}
		foreach($where as $key=>$value){
			if(is_array($value) && !count($value)){
				unset($where[$key]);
			}
		}
		$list = $this->where($where)->select();
		return $list;
	}
	public function getByLogin($login = null){
		if(!$login || !is_string($login)){
			return;
		}
		$result = getCache($login,"Runtime/client/login");
		if($result && $result['expire'] > time()){
			return $result['client'];
		}
		$where = array(
				"login"=>$login
		);
		$client = $this->where($where)->find();
		if($client){
			$client['press'] = D('ClientPress')->serchByClient($client);
			$client['Tag'] = D('ClientTag')->serchByClient($client);
			$client['Class'] = D('ClientClass')->serchByClient($client);
			$client['Type'] = D('ClientType')->serchByClient($client);
			$client['borrow'] = D('Borrow')->serchByClient($client);
			$client['libary'] = D('ClientLibary')->serchByClient($client);
		}
		makeCache($login,array("expire"=>time()+60,"client"=>$client),"Runtime/client/login");
		return $client;
	}
	public function get($index = null){
		if(!$index){
			return;
		}
		$client = $this->getById($index);
		if(!$client){
			$client = $this->getBySerialNumber($index);
			if(!$client){
				$client = $this->getByTel($index);
				if(!$client){
					$client = $this->getByIdentity($index);
					if(!$client){
						$client = $this->getByLogin($index);
						if(!$client){
							return;
						}
					}
				}
			}
		}
		return $client;
	}
}
?>