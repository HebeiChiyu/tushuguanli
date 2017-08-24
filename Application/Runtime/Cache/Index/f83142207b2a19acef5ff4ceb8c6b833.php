<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#serialNumber").keypress(function(e){
		serialNumber = $("#serialNumber").val();
		if(serialNumber){
			$("#doReturn").attr("disabled",false);
		}else{
			$("#doReturn").attr("disabled",true);
			return;
		}
		if(e.keyCode != 13){
			return;
		}
		doReturn();
	});
	$("#doReturn").click(function(){
		serialNumber = $("#serialNumber").val();
		if(serialNumber){
			$("#doReturn").attr("disabled",false);
		}else{
			$("#doReturn").attr("disabled",true);
			return;
		}
		doReturn();
	});
});
function doReturn(){
	$.ajax({
		url:"<?php echo U('/API/borrow/returnBook');?>",
		type:"POST",
		async:false,
		dataType:"json",
		data:{
			serialNumber:$("#serialNumber").val()
		},
		success:function(result){
			console.log(result);
			if(result.status != "ok"){
				alert("失败");
				return;
			}
			alert("成功");
			$("#serialNumber").val("");

		}
	});
}
</script>
</head>
<body>
	<input type="text" id="serialNumber"/><button id="doReturn" disabled="disabled">还书</button>
</body>
</html>