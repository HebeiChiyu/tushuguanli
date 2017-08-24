<?php
namespace Common\Model;
use Think\Model\RelationModel;
class BookModel extends RelationModel{
	protected $_link = array(
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
		$result = getCache($id,"Runtime/book/id");
		if($result && $result['expire']){
			return $result['book'];
		}
		$where = array(
				"id"=>$id
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
			$book['volume'] = D('Volume')->getByParent($book,"book");
		}
		makeCache($id,array("expire"=>time()+60,"book"=>$book),"Runtime/book/id");
		return $book;
	}
	public function getByCodeBar($codeBar = null){
		if(!$codeBar){
			return;
		}
		$result = getCache($codeBar,"Runtime/book/codeBar");
		if($result && $result['expire']){
			return $result['book'];
		}
		$where = array(
				"codeBar"=>$codeBar
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
			$book['volume'] = D('Volume')->getByParent($book,"book");
		}
		makeCache($codeBar,array("expire"=>time()+60,"book"=>$book),"Runtime/book/codeBar");
		return $book;
	}
	public function getByISBN($ISBN = null){
		if(!$ISBN){
			return;
		}
		$result = getCache($ISBN,"Runtime/book/ISBN");
		if($result && $result['expire']){
			return $result['book'];
		}
		$where = array(
				"ISBN"=>$ISBN
		);
		$book = $this->where($where)->relation(true)->find();
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
			$book['volume'] = D('Volume')->getByParent($book,"book");
		}
		makeCache($ISBN,array("expire"=>time()+60,"book"=>$book),"Runtime/book/ISBN");
		return $book;
	}
	public function serchByTitle($title = null){
		if(!$title){
			return;
		}
		$where = array(
				"title"=>array(
						"like",
						"%".$title."%"
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
	public function serchByNumberRest($number = null){
		if(!$number){
			return;
		}
		if(is_array($number) && count($number) > 0){
			if(count($number) >= 2 && is_numeric($number[0]) & is_numeric($number[1])){
				$where = array(
						"numberRest"=>array(
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
						"numberRest"=>$number[0]
				);
			}else{
				return;
			}
		}elseif(is_numeric($number)){
			$where = array(
					"numberRest"=>$number
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
		}elseif(is_string($type)){
			$types = D('Type')->serchByName($type);
			if(!count($types)){
				$where = array("type"=>"");
			}else{
				$temp = array();
				foreach($types as $t){
					array_push($temp,$t['id']);
				}
				$where = array("type"=>array("in",$temp));
			}
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
		}elseif(is_string($press)){
			$presss = D('Press')->serchByName($press);
			if(!count($presss)){
				$where = array("press"=>"");
			}else{
				$temp = array();
				foreach($presss as $t){
					array_push($temp,$t['id']);
				}
				$where = array("press"=>array("in",$temp));
			}
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
	public function serchByCondition($condition = null){
		if(!$condition || !is_array($condition)){
			return;
		}
		$where = array(
				"datePublish"=>array()
		);
		if($condition['ISBN']){
			$where['ISBN'] = $condition['ISBN'];
		}
		if($condition['codeBar']){
			$where['codeBar'] = $condition['codeBar'];
		}
		if($condition['title']){
			$where['title'] = array(
					"like",
					"%".$condition['title']."%"
			);
		}
		if($condition['subtitle']){
			$where['subtitle'] = array(
					"like",
					"%".$condition['subtitle']."%"
			);
		}
		if($condition['author']){
			$where['author'] = $condition['author'];
		}
		if($condition['class']){
			$where['class'] = $condition['class'];
		}
		if($condition['type']){
			$where['type'] = $condition['type'];
		}
		if($condition['press']){
			$where['press'] = $condition['press'];
		}
		if($condition['libary']){
			$where['libary'] = $condition['libary'];
		}
		if($condition['datePublishMin']){
			$temp = array(
					"EGT",
					$condition['datePublishMin']
			);
			array_push($where['datePublish'],$condition['datePublishMin']);
		}
		if($condition['datePublishMax']){
			$temp = array(
					"ELT",
					$condition['datePublishMax']
			);
			array_push($where['datePublish'],$condition['datePublishMax']);
		}
		if($condition['edition']){
			$where['edition'] = array(
					"like",
					"%".$condition['edition']."%"
			);
		}
		if($condition['bian']){
			$where['bian'] = array(
					"like",
					"%".$condition['bian']."%"
			);
		}
		if($condition['juan']){
			$where['juan'] = array(
					"like",
					"%".$condition['juan']."%"
			);
		}
		if($condition['ce']){
			$where['ce'] = array(
					"like",
					"%".$condition['ce']."%"
			);
		}
		if($condition['pageMin']){
			$temp = array(
					"ELT",
					$condition['pageMin']
			);
			array_push($where['page'],$temp);
		}
		if($condition['pageMax']){
			$temp = array(
					"EGT",
					$condition['pageMax']
			);
			array_push($where['page'],$temp);
		}
		if($condition['numberInventoryMin']){
			$temp = array(
					"ELT",
					$condition['numberInventoryMin']
			);
			array_push($where['numberInventory'],$temp);
		}
		if($condition['numberInventoryMax']){
			$temp = array(
					"EGT",
					$condition['numberInventoryMax']
			);
			array_push($where['numberInventory'],$temp);
		}
		if($condition['numberRestMin']){
			$temp = array(
					"ELT",
					$condition['numberRestMin']
			);
			array_push($where['numberRest'],$temp);
		}
		if($condition['numberRestMax']){
			$temp = array(
					"EGT",
					$condition['numberRestMax']
			);
			array_push($where['numberRest'],$temp);
		}
		if($condition['position']){
			$where['position'] = array(
					"like",
					"%".$condition['position']."%"
			);
		}
		if($condition['responsable']){
			$where['responsable'] = array(
					"like",
					"%".$condition['responsable']."%"
			);
		}
		if($condition['recorder']){
			$where['recorder'] = $condition['recorder'];
		}
		if($condition['maxNumberDelayMin']){
			$temp = array(
					"ELT",
					$condition['maxNumberDelayMin']
			);
			array_push($where['maxNumberDelay'],$temp);
		}
		if($condition['maxNumberDelayMax']){
			$temp = array(
					"EGT",
					$condition['maxNumberDelayMax']
			);
			array_push($where['maxNumberDelay'],$temp);
		}
		if($condition['timeRecordMin']){
			$temp = array(
					"ELT",
					$condition['timeRecordMin']
			);
			array_push($where['timeRecord'],$temp);
		}
		if($condition['timeRecordMax']){
			$temp = array(
					"LT",
					date("Y-m-d",strtotime($condition['timeRecordMax']."+1 day")),
			);
			array_push($where['timeRecord'],$temp);
		}
		foreach($where as $key=>$value){
			if(is_array($value) && !count($value)){
				unset($where[$key]);
			}
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
	public function serchByLibary($libary = null){
		if(!$libary){
			return;
		}
		if(is_array($libary) && $libary['id']){
			$where = array(
					"id"=>$libary['id']
			);
		}elseif(is_numeric($libary)){
			$where = array(
					"id"=>$libary
			);
		}elseif(is_string($libary)){
			$libaries = D('Libary')->serchByName($libary);
			if(!count($libaries)){
				$where = array("libary"=>"");
			}else{
				$temp = array();
				foreach($libaries as $l){
					array_push($temp,$l['id']);
				}
				$where = array(
						"libary"=>array(
								"in",
								$temp
						)
				);
			}
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
	public function get($index = null){
		if(!$index){
			return;
		}
		/*
		$where = array(
				"ISBN"=>$index
		);
		$book = $this->where($where)->relation(true)->find();
		if(!$book){
			$where = array(
					"codeBar"=>$index
			);
			$book = $this->where($where)->relation(true)->find();
		}
		if($book){
			$book['tag'] = D('BookTag')->serchByBook($book);
			$book['volume'] = D('Volume')->serchByParent($book,"book");
		}
		*/
		$book = $this->getByCodeBar($index);
		if(!$book){
			$book = $this->getByISBN($index);
			if(!$book){
				$book = $this->getById($index);
			}
		}
		return $book;
	}
	public function serchByLanguage($language = null){
		if(!$language){
			return;
		}
		if(!is_string($language)){
			return;
		}
		$where = array(
				"language"=>$language
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
}
?>