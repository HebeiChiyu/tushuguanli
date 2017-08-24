<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url:"<?php echo U('/API/client/getClientById');?>",
		type:"POST",
		async:false,
		dataType:"json",
		data:{
			id:"<?php echo ($id); ?>"
		},
		success:function(result){
			if(result.status != "ok"){
				console.log(result);
				alert("会员信息获取失败");
				return;
			}
			client = result.client;
			$("#divResult").html("获取成功");
			console.log(client);
		},
		error:function(){
			alert("会员信息获取失败2");
		}
	});
});
</script>
</head>
<body>
	<div id='divResult'></div>
</body>
</html>