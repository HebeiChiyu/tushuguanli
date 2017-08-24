<?php
namespace API\Controller;
use API\Common\Controller\Api;
class BookController extends Api {
	public function addBook(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = $this->checkBookData();
		if($data['status']){
			$this->ajaxReturn($data);
			return;
		}
		if(!$this->checkBookData($data)){
			$error = array(
					"status"=>"already",
			);
			$this->ajaxReturn($error);
			return;
		}
		$bookModel = D('Book');
		$idBook = $bookModel->add($data);
		$result = array(
				"status"=>"ok",
				"id"=>$idBook,
		);
		$this->ajaxReturn($result);
	}
	public function addMagazine(){
		/*
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		*/
		$data = $this->checkMagazineData();
		if($data['status']){
			$this->ajaxReturn($data);
			return;
		}
		if(!$this->checkMagazineExist($data)){
			$error = array(
					"status"=>"already",
			);
			$this->ajaxReturn($error);
			return;
		}
		$magazineModel = D('Magazine');
		$idMagazine = $magazineModel->add($data);
		$result = array(
				"status"=>"ok",
				"id"=>$idMagazine,
		);
		$this->ajaxReturn($result);
	}
	private function checkBookExist($data){
		if(!$data || !is_array($data)){
			return false;
		}
		if($data['id']){
			//已有
			$where = array(
					"ISBN"=>$data['ISBN'],
					"codeBar"=>$data['codeBar'],
					"id"=>array(
							"NE",
							$data['id']
					),
			);
			$result = D('Book')->where($where)->select();
			if(count($result)){
				return false;
			}
		}else{
			//新增
			$where = array(
					"ISBN"=>$data['ISBN'],
					"codeBar"=>$data['codeBar'],
			);
			$result = D('Book')->where($where)->select();
			if(count($result)){
				return false;
			}
		}
		return true;
	}
	private function checkBookData(){
		$data = I('post.');
		$error = array();
		if(!$data['title']){
			$error['title'] = "书籍标题不能为空";
		}
		if(!$data['codeBar']){
			$error['codeBar'] = "书籍EAN13码不能为空";
		}
		if(!is_numeric($data['codeBar']) || strlen($data['codeBar']) != 13){
			$error['codeBar'] = "书籍EAN13码格式输入错误";
		}
		if(!$data['ISBN']){
			$error['ISBN'] = "书籍ISBN号码不能为空";
		}
		if(!$data['author']){
			$data['author'] = "佚名";
		}
		if(!$data['language']){
			$data['language'] = "中文";
		}
		if(!$data['type']){
			unset($data['type']);
		}else{
			$type = D('Type')->getById($data['type']);
			if(!$type){
				$error['type'] = "分类选择错误";
			}
		}
		if(!$data['press']){
			$error['press'] = "请选择出版社";
		}
		$press = D('Press')->getById($data['press']);
		if(!$press){
			$error['press'] = "出版社选择错误";
		}
		if(!$data['libary']){
			unset($libary);
		}else{
			$libary = D('Libary')->getById($data['libary']);
			if(!$libary){
				$error['libary'] = "藏管选择错误";
			}
		}
		if(!$data['datePublish']){
			$error['datePublish'] = "请选择出版日期";
		}else{
			$datePublish = explode("-", $data['datePublish']);
			if(count($datePublish) != 3 || !is_numeric($datePublish[0]) || !is_numeric($datePublish[1]) || !is_numeric($datePublish[2])){
				$error['datePublish'] = "出版日期格式输入错误".$data['datePublish'];
			}
		}
		if(!$data['edition']){
			$error['edition'] = "请输入版次";
		}
		if(!$data['bian']){
			unset($data['bian']);
		}
		if(!$data['juan']){
			unset($data['juan']);
		}
		if(!$data['ce']){
			unset($data['ce']);
		}
		if(!$data['page']){
			unset($data['page']);
		}
		if(!$data['position']){
			$error['position'] = "请输入存放位置";
		}
		if(count($error)){
			$error['status'] = "false";
			return $error;
		}
		$data['timeRecord'] = date("Y-m-d H:i:s");
		$data['recorder'] = $this->user['id'];
		return $data;
	}
	public function addType(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$name = I('post.name');
		$typeModel = D('Type');
		$type = $typeModel->getByName($name);
		if($type){
			apiReturn("already");
			return;
		}
		$idType = $typeModel->add(array("name"=>$name));
		if($idType){
			apiReturn("ok");
		}else{
			apiReturn("fail");
		}
	}
	public function addPress(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = I('post.');
		$error = array();
		$pressModel = D('Press');
		if(!$data['name']){
			$error['name'] = "出版社名称不能为空";
		}elseif($pressModel->getByName($data['name'])){
			$error['name'] = "出版社已存在";
		}
		if(!$data['adresse']){
			$error['adresse'] = "出版社地址不能为空";
		}
		if(!$data['tel']){
			$error['tel'] = "出版社电话不能为空";
		}
		if(count($error)){
			$error['status'] = "false";
			apiReturn($error);
			return;
		}
		$idPress = $pressModel->add($data);
		if($idPress){
			apiReturn("ok");
		}else{
			apiReturn("fail");
		}
	}
	public function addTag(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$name = I('post.name');
		$tagModel = D('Tag');
		$tag = $tagModel->getByName($name);
		if($tag){
			apiReturn("already");
			return;
		}
		$idTag = $tagModel->add(array("name"=>$name));
		if($idTag){
			apiReturn("ok");
		}else{
			apiReturn("fail");
		}
	}
	public function getTagById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$tagModel = D('Tag');
		$tag = $tagModel->getById($id);
		if($tag){
			$result = array(
					"status"=>"ok",
					"tag"=>$tag
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getTagByName(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$name = I('post.name');
		if(!$name || !is_numeric($name)){
			apiReturn("error");
			return;
		}
		$tagModel = D('Tag');
		$tag = $tagModel->getByName($name);
		if($tag){
			$result = array(
					"status"=>"ok",
					"tag"=>$tag
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getTypeById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$typeModel = D('Type');
		$type = $typeModel->getById($id);
		if($type){
			$result = array(
					"status"=>"ok",
					"type"=>$type
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getTypeByName(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$name = I('post.name');
		if(!$name || !is_numeric($name)){
			apiReturn("error");
			return;
		}
		$typeModel = D('Type');
		$type = $typeModel->getByName($name);
		if($type){
			$result = array(
					"status"=>"ok",
					"type"=>$type
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getPressById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$pressModel = D('Press');
		$press = $pressModel->getById($id);
		if($press){
			$result = array(
					"status"=>"ok",
					"press"=>$press
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getPressByName(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$name = I('post.name');
		if(!$name || !is_numeric($name)){
			apiReturn("error");
			return;
		}
		$pressModel = D('Press');
		$press = $pressModel->getByName($name);
		if($press){
			$result = array(
					"status"=>"ok",
					"press"=>$press
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getBook(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$index = I('post.index');
		$bookModel = D('Book');
		$book = $bookModel->getById($index);
		if(!$book){
			$book = $bookModel->getByCodeBar($index);
			if(!$book){
				$book = $bookModel->getByISBN($index);
				if(!$book){
					apiReturn("fail");
				}
			}
		}
		$result = array(
				"status"=>"ok",
				"book"=>$book
		);
		apiReturn($result);
	}
	public function getBookById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->getById($id);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getBookByCodeBar(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$codeBar = I('post.codeBar');
		if(!$codeBar || !is_numeric($codeBar)){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->getByCodeBar($codeBar);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getBookByISBN(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$ISBN = I('post.ISBN');
		if(!$ISBN || !is_numeric($ISBN)){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->getByISBN($ISBN);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function serchBookByTitle(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$title = I('post.title');
		if(!$title){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->SerchByTitle($title);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function serchBookByAuthor(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$author = I('post.author');
		if(!$author){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->SerchByAuthor($author);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function serchBookByClass(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$class = I('post.class');
		if(!$class){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->SerchByClass($class);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function serchBookByPress(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$press = I('post.press');
		if(!$press){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->SerchByPress($press);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function serchBookByLibary(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$libary = I('post.libary');
		if(!$libary){
			apiReturn("error");
			return;
		}
		$bookModel = D('Book');
		$book = $bookModel->SerchByLibary($libary);
		if($book){
			$result = array(
					"status"=>"ok",
					"book"=>$book
			);
			apiReturn($result);
		}else{
			apiReturn("fail");
		}
	}
	public function getListPress(){
		if(!IS_POST){
			$this->ajaxReturn(array("status"=>"false"));
			return;
		}
		$list = D('Press')->select();
		$result = array(
				"status"=>"ok",
				"list"=>$list
		);
		$this->ajaxReturn($result);
	}
	public function getListType(){
		if(!IS_POST){
			$this->ajaxReturn(array("status"=>"false"));
			return;
		}
		$list = D('Type')->select();
		$result = array(
				"status"=>"ok",
				"list"=>$list
		);
		$this->ajaxReturn($result);
	}
	public function getListLibary(){
		if(!IS_POST){
			$this->ajaxReturn(array("status"=>"false"));
			return;
		}
		$list = D('Libary')->select();
		$result = array(
				"status"=>"ok",
				"list"=>$list
		);
		$this->ajaxReturn($result);
	}
	public function getListTypeAndPressAndlibary(){
		if(!IS_POST){
			$this->ajaxReturn(array("status"=>"false"));
			return;
		}
		$presslist = D('Press')->select();
		$typeList = D('Type')->select();
		$libaryList = D('Libary')->select();
		$result = array(
				"status"=>"ok",
				"press"=>$presslist,
				"type"=>$typeList,
				"libary"=>$libaryList
		);
		$this->ajaxReturn($result);
	}
	private function checkMagazineData(){
		$data = I('post.');
		$error = array();
		if(!$data['title']){
			$error['title'] = "书籍标题不能为空";
		}
		if(!$data['codeBar']){
			$error['codeBar'] = "书籍EAN13码不能为空";
		}
		if(!is_numeric($data['codeBar']) || strlen($data['codeBar']) != 13){
			$error['codeBar'] = "书籍EAN13码格式输入错误";
		}
		if(!$data['ISSN']){
			$error['ISSN'] = "书籍ISSN号码不能为空";
		}
		if(!$data['language']){
			$data['language'] = "中文";
		}
		if(!$data['type']){
			unset($data['type']);
		}else{
			$type = D('Type')->getById($data['type']);
			if(!$type){
				$error['type'] = "分类选择错误";
			}
		}
		if(!$data['press']){
			$error['press'] = "请选择出版社";
		}
		$press = D('Press')->getById($data['press']);
		if(!$press){
			$error['press'] = "出版社选择错误";
		}
		if(!$data['libary']){
			unset($libary);
		}else{
			$libary = D('Libary')->getById($data['libary']);
			if(!$libary){
				$error['libary'] = "藏管选择错误";
			}
		}
		if(!$data['page']){
			unset($data['page']);
		}
		if(!$data['position']){
			$error['position'] = "请输入存放位置";
		}
		if(!$data['periodPublish']){
			$error['periodPublish'] = "请选择出版周期";
		}
		if(count($error)){
			$error['status'] = "false";
			return $error;
		}
		$data['timeRecord'] = date("Y-m-d H:i:s");
		$data['recorder'] = $this->user['id'];
		return $data;
	}
	private function checkMagazineExist($data){
		if(!$data || !is_array($data)){
			return false;
		}
		if($data['id']){
			//已有
			$where = array(
					"ISSN"=>$data['ISSN'],
					"codeBar"=>$data['codeBar'],
					"id"=>array(
							"NE",
							$data['id']
					),
			);
			$result = D('Magazine')->where($where)->select();
			if(count($result)){
				return false;
			}
		}else{
			//新增
			$where = array(
					"ISSN"=>$data['ISSN'],
					"codeBar"=>$data['codeBar'],
			);
			$result = D('Magazine')->where($where)->select();
			if(count($result)){
				return false;
			}
		}
		return true;
	}
	public function getMagazineByISSN(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$issn = I('post.ISSN');
		if(!$issn || !is_string($issn)){
			apiReturn("false");
			return;
		}
		$magazineModel = D('Magazine');
		$magazine = $magazineModel->getByISSN($issn);
		if($magazine){
			$result = array(
					"status"=>"ok",
					"magazine"=>$magazine
			);
			$this->ajaxReturn($result);
		}else{
			apiReturn("false");
		}
	}
	public function getMagazineByCodeBar(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$codeBar = I('post.codeBar');
		if(!$codeBar || !is_numeric($codeBar)){
			apiReturn("false");
			return;
		}
		$magazineModel = D('Magazine');
		$magazine = $magazineModel->getByCodeBar($codeBar);
		if($magazine){
			$result = array(
					"status"=>"ok",
					"magazine"=>$magazine
			);
			$this->ajaxReturn($result);
		}else{
			apiReturn("false");
		}
	}
	public function getMagazine(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$index = I('post.index');
		if(!$index){
			apiReturn("false1");
			return;
		}
		
		$magazineModel = D('Magazine');
		$magazine = $magazineModel->getByISSN($index);
		if(!$magazine){
			$magazine = $magazineModel->getByCodeBar($index);
			if(!$magazine){
				apiReturn("false2");
				return;
			}
		}
		$result = array(
				"status"=>"ok",
				"magazine"=>$magazine
		);
		apiReturn($result);
	}
	public function addMagazinePeriod(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = I('post.');
		$error = array();
		if(!$data['magazine']){
			$error['magazine'] = "请选择所属期刊";
		}
		if(!$data['datePublish']){
			$error['datePublish'] = "请选择出版日期";
		}else{
			$date = explode("-", $data['datePublish']);
			if(count($date) != 3 || !is_numeric($date[0]) || !is_numeric($date[1]) || !is_numeric($date[2])){
				$error['datePublish'] = "出版日期格式输入错误";
			}
		}
		if(!$data['periodCode']){
			$error['periodCode'] = "请输入期号";
		}
		if(!$data['periodTotalCode']){
			$error['periodTotalCode'] = "请输入总期号";
		}
		if(count($error)){
			$error['status'] = "false";
			apiReturn($error);
		}
		$periodModel = D('MagazinePeriod');
		$idPeriod = $periodModel->add($data);
		$result = array(
				"status"=>"ok",
				"id"=>$idPeriod,
		);
		$this->ajaxReturn($result);
	}
	public function getMagazineById(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id || !is_numeric($id)){
			apiReturn("false");
			return;
		}
		$magazineModel = D('Magazine');
		$magazine = $magazineModel->getById($id);
		if($magazine){
			$result = array(
					"status"=>"ok",
					"magazine"=>$magazine
			);
			$this->ajaxReturn($result);
		}else{
			apiReturn("false");
		}
	}
	public function addVolume(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$data = I('post.');
		if(!$data['parent'] || !$data['class'] || !$data['serialNumber']){
			apiReturn("false5");
			return;
		}
		switch($data['class']){
			case "book":
				$book = D('Book')->getById($data['parent']);
				if(!$book){
					apiReturn("false4");
					return;
				}
				unset($data['period']);
				break;
			case "magazine":
				/*
				$magazinePeriod = D('MagazinePeriod')->getById($data['parent']);
				if(!$magazinePeriod){
					apiReturn("false3");
					return;
				}
				*/
				$magazine = D('Magazine')->getById($data['parent']);
				if(!$magazine){
					apiReturn("false");
					return;
				}
				if(!$data['period']){
					apiReturn("false");
					return;
				}
				$period = D('MagazinePeriod')->getById($data['period']);
				if($period['magazine']['id'] != $data['parent']){
					apiReturn("false");
					return;
				}
				$data['parent'] = $data['period'];
				unset($data['period']);
				break;
			default:
				apiReturn("false2".$data['class']);
				return;
		}
		$data['addTime'] = date("Y-m-d H:i:s");
		$idRecord = D('Volume')->add($data);
		if($idRecord){
			$result = array(
					"status"=>"ok",
					"id"=>$idRecord
			);
			apiReturn($result);
		}else{
			apiReturn("false1");
		}
	}
	public function getThingByIndex(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$index = I('post.index');
		$bookModel = D('Book');
		$magazineModel = D('Magazine');
		$result = array(
				"statsu"=>"ok",
		);
		$thing = $bookModel->get($index);
		$result['class'] = "book";
		if(!$thing){
			$thing = $magazineModel->get($index);
			$result['class'] = "magazine";
			if(!$thing){
				apiReturn("false");
				return;
			}
		}
		$result['thing'] = $thing;
		apiReturn($result);		
	}
	public function listVolume(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$where = I("post.");
		foreach($where as $key=>$value){
			if(!$value){
				unset($where[$key]);
			}
		}
		$volumeModel = D('Volume');
		$list = $volumeModel->where($where)->select();
		if(count($list)){
			if($where['class'] == "book"){
				$model = D('Book');
			}else{
				$model = D('MagazinePeriod');
			}
			foreach($list as $key=>$value){
				$list[$key]['parent'] = $model->getById($list[$key]['parent']);
			}
			$result = array(
					"status"=>"ok",
					"list"=>$list
			);
			apiReturn($result);
		}else{
			apiReturn("false");	
		}		
	}
	public function getVolume(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$id = I('post.id');
		if(!$id){
			apiReturn("false");
			return;
		}
		$volume = D('Volume')->getById($id);
		if(!$volume){
			apiReturn("false2");
			return;
		}
		$result = array(
				"status"=>"ok",
				"volume"=>$volume
		);
		apiReturn($result);
	}
	public function getVolumeBySerialNumber(){
		if(!IS_POST){
			apiReturn("error");
			return;
		}
		$serialNumber = I('post.serialNumber');
		if(!$serialNumber){
			apiReturn("false");
			return;
		}
		$volume = D('Volume')->getBySerialNumber($serialNumber);
		if(!$volume){
			apiReturn("false2");
			return;
		}
		$result = array(
				"status"=>"ok",
				"volume"=>$volume
		);
		apiReturn($result);
	}
}