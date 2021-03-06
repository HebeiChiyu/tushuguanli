<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	thing = null;
	thingClass = null;
	$("#index").keypress(function(e){
		if(e.keyCode != 13){
			return;
		}
		$.ajax({
			url:"<?php echo U('/API/book/getThingByIndex');?>",
			async:false,
			dataType:"json",
			type:"POST",
			data:{
				index:$("#index").val()
			},
			success:function(result){
				console.log(result);
				thing = result.thing;
				thingClass = result.class;
				$("#serialNumber").attr("disabled",false);
				$("#goSubmit").attr("disabled",false);
				$("#serialNumber").focus();
				//TODO 如果类型是magazine，显示更多的内容
			},
			error:function(){
				alert("失败");
			}
		});
	});
	$("#formVolume").submit(function(e){
		e.preventDefault();
		$("#goSubmit").attr("disabled","disabled");
		$("#serialNumber").attr("disabled","disabled");
		$.ajax({
			url:"<?php echo U('/API/book/addVolume');?>",
			type:"POST",
			async:true,
			dataType:"json",
			data:{
				parent:thing.id,
				class:thingClass,
				serialNumber:$("#serialNumber").val()
			},
			success:function(result){
				if(result.status == "ok"){
					alert("成功");
					$("#index").val("");
					$("#serialNumber").val("");
					$("#index").focus();
				}else{
					alert("失败");
					console.log(result);
					$("#goSubmit").attr("disabled","");
					$("#serialNumber").attr("disabled","");
				}
			},
			error:function(){
				alert("失败");
				$("#goSubmit").attr("disabled","");
				$("#serialNumber").attr("disabled","");
			}
		});
	});
});
</script>
</head>
<body>
	<p>书籍ISBN/条形码:<input type="text" name="index" id="index"/></p>
	<form action="" method="POST" id="formVolume">
		<p>序列号:<input type="text" name="serialNumber" id="serialNumber" disabled="disabled"/></p>
		<p><input type="submit" id="goSubmit" value="确定" disabled="disabled"/></p>
	</form>
</body>
</html>