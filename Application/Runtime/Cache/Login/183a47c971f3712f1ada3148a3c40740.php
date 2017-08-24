<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#imgVerify").click(function(){
			$("#imgVerify").attr("src","<?php echo U('/API/verify');?>");
		});
		$("#formLogin").submit(function(){
			login = $('#login').val();
			pwd = $('#pwd').val();
			verify = $('#verify').val();
			ok = false
			$.ajax({
				url:"<?php echo U('/API/login/login');?>",
				async:false,
				dataType:"JSON",
				type:"POST",
				data:{
					login:login,
					pwd:pwd,
					verify:verify
				},
				success:function(data){
					result = eval("("+data+")");
					if(result.status == "ok"){
						ok = true;
						$("#code").val(result.code);
						$("#pwd").val(result.pwd);
					}else{
						switch(result.status){
						case "login empty":
							alert("请输入登录名");
							break;
						case "login error":
							alert("用户名错误");
							break;
						case "pwd empty":
							alert("请输入密码");
							break;
						case "verify error":
							alert("验证码输入错误");
							break;
						case "login lock":
							alert("账号已锁定");
							break;
						default:
							alert("未知错误");
							break;
						}
						$("#imgVerify").attr("src","<?php echo U('/API/verify');?>");
					}
				}
			});
			return ok;
		});
	});
</script>
</head>
<body>
	<form action="" method="POST" id="formLogin">
		<input type="hidden" name="code" id="code"/>
		<p>login:<input type="text" id="login" name="login" value="<?php echo ($data["login"]); ?>"/><?php echo ($error["login"]); ?></p>
		<p>pwd:<input type="password" id="pwd" name="pwd"/><?php echo ($error["pwd"]); ?></p>
		<p>verify:<input type="text" name="verify" id='verify' maxlength="4"/><img src="<?php echo U('/API/verify');?>" id="imgVerify"/></p>
		<p><input type="submit" /></p>
	</form>
	<div id="test"></div>
</body>
</html>