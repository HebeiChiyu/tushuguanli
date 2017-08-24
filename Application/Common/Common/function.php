<?php
	function checkVerify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	function makeCache($name,$value = null,$path = ""){
		$dir = $path?"./".$path:".";
		if(!is_dir($dir)){
			mkdirs($path);
		}
		if(file_exists($dir."/".$name)){
			unlink($dir."/".$name);
		}
		if(!$value){
			return;
		}
		$str = serialize($value);
		file_put_contents($dir."/".$name, $str);
	}
	function getCache($name,$path){
		if(!$name || !$path){
			return;
		}
		$dir = $path?"./".$path:".";
		if(!file_exists($dir."/".$name)){
			return;
		}
		return unserialize(file_get_contents($dir."/".$name));
	}
	function chiffrement($str){
		return md5($str.C('CHIFFREMENT_CODE'));
	}
	
	function apiReturn($str){
		if(!is_array($str)){
			if(!is_string($str)){
				echo '{
				"status":"function error"
				}';
			}else{
				echo '{
					"status":"'.$str.'"
				}';
			}
		}else{
			echo '{';
			$length = count($str);
			$i = 1;
			foreach($str as $key=>$value){
				echo '"'.$key.'":';
				if(is_array($value)){
					echo '{';
					apiReturnInner($value);
					echo '}';
				}else{
					echo '"'.$value.'"';
				}
				if($i != $length){
					echo ',';
				}
				$i++;
			}
			echo '}';
		}
	}
	function apiReturnInner($array){
		$length = count($array);
		$i = 1;
		foreach($array as $key=>$value){
			echo '"'.$key.'":';
			if(is_array($value)){
				echo '{';
				apiReturnInner($value);
				echo '}';
			}else{
				echo '"'.$value.'"';
			}
			if($i != $length){
				echo ',';
			}
			$i++;
		}
	}
	
	
	
	function mkdirs($path,$root = "./"){
		$pathTemp = explode("/",$path,2);
		mkdir($root."/".$pathTemp[0]);
		if($pathTemp[1]){
			mkdirs($pathTemp[1],$root."/".$pathTemp[0]);
		}
	}
	function saveConfig($config){
		if(!is_array($config)){
			return false;
		}
		$path = "Application/Common/Conf/selfConfig.php";
		$str = "<?php
				return array(";
		foreach($config as $key=>$value){
			if(!is_string($value) && !is_numeric($value)){
				return false;
			}
			$str .= "'".$key."'=>'".$value."',";
		}
		$str .= ");?>";
		if(file_put_contents($path, $str)){
			return true;
		}
		return false;
	}
	function recordOperation($operation,$content){
		if(!$operation || !$content){
			return;
		}
		
	}
	function checkLogin(){
		$user = session("user");
		$expire = session("expire");
		if(!$user){
			return;
		}
		if(!$expire || $expire < time()){
			return;
		}
		$sessionTime = C("sessionTime")?C("sessionTime"):1200;
		session("expire",time()+$sessionTime);
		return $user;
	}
	function checkClassified($classified){
		//For test
		return true;
		
		
		$user = session("user");
		if(!$classified){
			return false;
		}
		foreach($user['classified'] as $c){
			if($c['name'] == $classified){
				return true;
			}
		}
		return false;
	}
?>