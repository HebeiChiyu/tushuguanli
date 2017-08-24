<?php
namespace Common\Model;
use Think\Model;
class AdminModel extends Model{
	public function getById($id = null){
		if(!$id){
			return;
		}
		$where = array(
				"id"=>$id
		);
		$result = $this->where($where)->find();
		if($result){
			$result['classified'] = D('AdminClassified')->getByAdmin($result['id']);;
		}
		return $result;
	}
	public function getByLogin($login = null){
		if(!$login){
			return;
		}
		$where = array(
				"login"=>$login
		);
		$result = $this->where($where)->find();
		if($result){
			$result['classified'] = D('AdminClassified')->getByAdmin($result['id']);
		}
		return $result;
	}
	public function getByIdentity($identity = null){
		if(!$identity){
			return;
		}
		$where = array(
				"identity"=>$identity
		);
		$result = $this->where($where)->find();
		if($result){
			$result['classified'] = D('AdminClassified')->getByAdmin($result['id']);
		}
		return $result;
	}
	public function serchByName($name = null){
		$where = array(
				"name"=>array(
						"like",
						"%".$name."%"
				)
		);
		return $this->where($where)->select();
	}
	public function update($obj = null,$data = null){
		if(!$obj || !$data || !is_array($obj) || !is_array($data) || !$obj['id']){
			return;
		}
		$where = array(
				"id"=>$obj['id']
		);
		return ($this->where($where)->save($data) > 0);
	}
}
?>