<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		book = null;
		$.ajax({
			url:"<?php echo U('/API/book/getBookById');?>",
			type:"POST",
			dataType:"json",
			async:false,
			data:{
				id:<?php echo ($id); ?>
			},
			success:function(result){
				if(result.status == "ok"){
					console.log(result);
					book = result.book;
				}else{
					alert("失败"); 	
				}				
			},
			error:function(result){
				alert("失败");
			}
		});
	});
</script>
</head>
<body>
	<p>js已经写好，成功获取相对应的书籍信息，差页面</p>
</body>
</html>