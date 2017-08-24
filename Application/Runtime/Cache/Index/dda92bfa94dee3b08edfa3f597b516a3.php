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
			id:"<?php echo ($id); ?>",
			class:"book"
		},
		success:function(result){
			console.log(result);
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