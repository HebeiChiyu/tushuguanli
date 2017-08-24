<?php

namespace Install\Controller;

use Think\Controller;
use Think\Exception;

class InstallStepController extends Controller {
	public function step1() {
		$data = array (
				"DB_HOST" => "localhost",
				"DB_NAME" => "book",
				"DB_USER" => "root",
				"DB_PWD" => "",
				"DB_PORT" => "3306" 
		);
		if (! IS_POST) {
			$this->assign ( "data", $data );
			$this->display ();
			return;
		}
		$data = I ( 'post.' );
		$dbName = $data['DB_NAME'];
		unset($data['DB_NAME']);
		if (! saveConfig ( $data )) {
			$this->error ( "失败" );
			return;
		}
		foreach($data as $key=>$value){
			C($key,$value);
		}
		$sql = "CREATE DATABASE IF NOT EXISTS ".$dbName." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
		try {
			M ()->execute ( $sql );
		} catch ( Exception $e ) {
			$message = $e->getMessage ();
			$this->assign ( "error", $message );
			$this->display ( "error" );
			return;
		}
		$data['DB_NAME'] = $dbName;
		saveConfig($data);
		header ( "location: " . U ( '/install/installStep/step2' ) );
	}
	public function step2() {
		$sql = file_get_contents("Public/install.sql");
		try {
			M ()->execute ( $sql );
		} catch ( Exception $e ) {
			$message = $e->getMessage ();
			$this->assign ( "error", $message );
			$this->display ( "error" );
			return;
		}
		echo "ok";
	}
}