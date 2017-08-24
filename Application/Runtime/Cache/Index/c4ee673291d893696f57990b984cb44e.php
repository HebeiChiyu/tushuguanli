<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	volume = null;
	$.ajax({
		url:"<?php echo U('/API/book/getVolume');?>",
		dataType:"json",
		async:false,
		type:"POST",
		data:{
			id:"<?php echo ($id); ?>"
		},
		success:function(result){
			if(result.status != "ok"){
				alert("失败");
				return;
			}
			volume = result.volume;
			console.log(volume);
			alert("ajax调用成功，需页面。数据按F12进入查看");
		},
		error:function(){
			alert("失败");
		}
	})
});
</script>
</head>
<body>

</body>
</html>