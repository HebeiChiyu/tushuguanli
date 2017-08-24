<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#formDB").submit(function(){
			ok = true;
			host = $("#HOST").val();
			name = $("#NAME").val();
			user = $("#USER").val();
			port = $("#PORT").val();
			if(!host){
				$("#checkHost").html("数据库地址不能为空");
				ok = false;
			}
			if(!name){
				$("#checkName").html("数据库名称不能为空");
				ok = false;
			}
			if(!user){
				$("#checkUser").html("用户名不能为空");
				ok = false;
			}
			if(!port){
				$("#checkPort").html("端口不能为空");
				ok = false;
			}
			return ok;
		});
		$("#PORT").change(function(){
			if($("#PORT").val() == ""){
				$("#checkPort").html("端口不能为空");
			}else{
				$("#checkPort").html("");
			}
		});
		$("#HOST").change(function(){
			if($("#HOST").val() == ""){
				$("#checkHost").html("数据库地址不能为空");
			}else{
				$("#checkHost").html("");
			}
		});
		$("#USER").change(function(){
			if($("#USER").val() == ""){
				$("#checkUser").html("用户名不能为空");
			}else{
				$("#checkUser").html("");
			}
		});
		$("#NAME").change(function(){
			if($("#NAME").val() == ""){
				$("#checkName").html("数据库名称不能为空");
			}else{
				$("#checkName").html("");
			}
		});
	});
</script>
</head>
<body>
	<form action="" method="POST" id="formDB">
		<p>数据库地址:<input type="text" id="HOST" name="DB_HOST" value="localhost"/><span id="checkHost"></span></p>
		<p>数据库名:<input type="text" name="DB_NAME" id="NAME" value="book"/><span id="checkName"></span></p>
		<p>用户名:<input type="text" name="DB_USER" id="USER" value="root"/><span id="checkUser"></span></p>
		<p>密码:<input type="password" name="DB_PWD" id="PWD" value=""/></p>
		<p>端口:<input type="text" name="DB_PORT" id="PORT" value="3306"/><span id="checkPort"></span></p>
		<p><input type="submit"/></p>
	</form>
</body>
</html>