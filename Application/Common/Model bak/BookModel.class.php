<?php
namespace Common\Model;
use Think\Model\RelationModel;
class BookModel extends RelationModel{
	protected $_link = array(
			"Class"=>array(
					"mapping_type"=>self::BELONGS_TO,
					"class_name"=>"class",
					"foreign_key"=>"class",
					"mapping_name"=>"class",
			),
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
			"Volume"=>array(
					"mapping_type"=>self::HAS_MANY,
					"class_name"=>"volume",
					"foreign_key"=>"book",
					"mapping_name"=>"volume",
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
		$where = array(
				"id"=>$id
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
		}
		return $book;
	}
	public function getByCodeBar($codeBar = null){
		if(!$codeBar){
			return;
		}
		$where = array(
				"codeBar"=>$codeBar
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
		}
		return $book;
	}
	public function getByISBN($ISBN = null){
		if(!$ISBN){
			return;
		}
		$where = array(
				"ISBN"=>$ISBN
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
		}
		return $book;
	}
	public function serchByName($name = null){
		if(!$name){
			return;
		}
		$where = array(
				"name"=>array(
						"like",
						"%".$name."%"
				),
		);
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByAuthor($author = null){
		if(!$author){
			return;
		}
		$where = array(
				"author"=>array(
						"like",
						"%".$author."%"
				),
		);
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByDatePublish($datePublish = null){
		if(!$datePublish){
			return;
		}
		if(is_array($datePublish) && count($datePublish) > 0){
			if(count($datePublish) >= 2 && is_string($datePublish[0]) && is_string($datePublish[1])){
				$where = array(
						"datePublish"=>array()
				);
				if($datePublish[0]){
					$temp = array(
							"EGT",
							$datePublish[0]
					);
					array_push($where['datePublish'],$temp);
				}
				if($datePublish[1]){
					$temp = array(
							"LT",
							date("Y-m-d",strtodatePublish($datePublish[1]."+1day"))
					);
					array_push($where['datePublish'],$temp);
				}
			}elseif(count($datePublish) == 1 && is_string($datePublish[0]) && $datePublish[0]){
				$where = array(
						"datePublish"=>$datePublish[0]
				);
			}else{
				return;
			}
		}elseif(is_string($datePublish)){
			$where = array(
					"datePublish"=>$datePublish,
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByNumber($number = null){
		if(!$number){
			return;
		}
		if(is_array($number) && count($number) > 0){
			if(count($number) >= 2 && is_numeric($number[0]) & is_numeric($number[1])){
				$where = array(
						"number"=>array(
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
						"number"=>$number[0]
				);
			}elseif(!$number[0] && is_numeric($number[2])){
				$where = array(
						"number"=>array(
								"ELT",
								$number[2]
						)
				);
			}else{
				return;
			}
		}elseif(is_numeric($number)){
			$where = array(
					"number"=>$number
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByRestNumber($number = null){
		if(!$number){
			return;
		}
		if(is_array($number) && count($number) > 0){
			if(count($number) >= 2 && is_numeric($number[0]) & is_numeric($number[1])){
				$where = array(
						"restNumber"=>array(
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
						"restNumber"=>$number[0]
				);
			}else{
				return;
			}
		}elseif(is_numeric($number)){
			$where = array(
					"restNumber"=>$number
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByPosition($position = null){
		if(!$position){
			return;
		}
		$where = array(
				"position"=>array(
						"like",
						"%".$position."%"
				),
		);
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByResponsable($responsable = null){
		if(!$responsable){
			return;
		}
		$where = array(
				"responsable"=>array(
						"like",
						"%".$responsable."%"
				),
		);
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByRecorder($recorder = null){
		if(!$recorder){
			return;
		}
		if(is_numeric($recorder)){
			$where = array(
					"recorder"=>$recorder
			);
		}elseif(is_numeric($recorder) && $recorder['id'] && is_numeric($recorder['id'])){
			$where = array(
					"recorder"=>$recorder['id']
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByTimeRecorder($time = null){
		if(!$time){
			return;
		}
		if(is_array($time) && count($time) > 0){
			if(count($time) >= 2 && is_string($time[0]) && is_string($time[1])){
				$where = array(
						"timeRecorder"=>array()
				);
				if($time[0]){
					$temp = array(
							"EGT",
							$time[0]
					);
					array_push($where['timeRecorder'],$temp);
				}
				if($time[1]){
					$temp = array(
							"LT",
							date("Y-m-d",strtotime($time[1]."+1day"))
					);
					array_push($where['timeRecorder'],$temp);
				}
			}elseif(count($time) == 1 && is_string($time[0]) && $time[0]){
				$where = array(
						"timeRecorder"=>$time[0]
				);
			}else{
				return;
			}
		}elseif(is_string($time)){
			$where = array(
					"timeRecorder"=>$time,
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByType($type = null){
		if(!$type){
			return;
		}
		if(is_array($type) && $type['id']){
			$where = array(
					"type"=>$type['id']
			);
		}elseif(is_numeric($type)){
			$where = array(
					"type"=>$type
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByClass($class = null){
		if(!$class){
			return;
		}
		if(is_array($class) && $class['id']){
			$where = array(
					"class"=>$class['id']
			);
		}elseif(is_numeric($class)){
			$where = array(
					"class"=>$class
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		if(count($list)){
			$BookTagModel = D('BookTag');
			foreach($list as $key=>$value){
				$list[$key]['tag'] = $BookTagModel->serchByBook($value);
			}
		}
		*/
		return $list;
	}
	public function serchByIds($ids = null){
		if(!$ids || !is_array($ids) || !count($ids)){
			return;
		}
		$where = array(
				"id"=>array(
						"in",
						$ids
				)
		);
		$list = $this->where($where)->relation(true)->select();
		/*
		 if(count($list)){
		 $BookTagModel = D('BookTag');
		 foreach($list as $key=>$value){
		 $list[$key]['tag'] = $BookTagModel->serchByBook($value);
		 }
		 }
		 */
		return $list;
	}
	public function serchByPress($press = null){
		if(!$press){
			return;
		}
		if(is_array($press) && $press['id']){
			$where = array(
					"id"=>$press['id']
			);
		}elseif(is_numeric($press)){
			$where = array(
					"id"=>$press
			);
		}else{
			return;
		}
		$list = $this->where($where)->relation(true)->select();
		/*
		 if(count($list)){
		 $BookTagModel = D('BookTag');
		 foreach($list as $key=>$value){
		 $list[$key]['tag'] = $BookTagModel->serchByBook($value);
		 }
		 }
		 */
		return $list;
	}
}
?>