<?php
namespace Common\Model;
use Think\Model;
class OperationRecordModel extends Model{
	public function getByAdmin($admin = null){
		if(!$admin){
			return;
		}
		if(is_numeric($admin)){
			$where = array(
					"admin"=>$admin
			);
		}elseif(is_array($admin) && $admin['id']){
			$where = array(
					"admin"=>$admin['id']
			);
		}
		return $this->where($where)->select();
	}
}
?>