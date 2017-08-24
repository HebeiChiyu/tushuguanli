<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	client = null;
	listBorrow = new Array;
	$("#clientIndex").focus();
	$("#clientIndex").keypress(function(e){
		if(e.keyCode != 13){
			return;
		}
		checkClient();
	});
	$("#checkClient").click(function(){
		checkClient();
	});
	$("#serialNumber").keypress(function(e){
		if(e.keyCode != 13){
			return;
		}
		addBook();
	});
	$("#addBook").click(function(){
		addBook();
	});
	$("#goSubmit").click(function(){
		//console.log(JSON.stringify(listBorrow));
		if(listBorrow.length == 0){
			alert("未选择所需解约的书籍");
			return;
		}
		if(client == null){
			alert("请确认会员信息");
			return;
		}
		$.ajax({
			url:"<?php echo U('/API/borrow/borrowBook');?>",
			async:false,
			dataType:"json",
			type:"POST",
			data:$("#formBorrow").serialize(),
			success:function(result){
				console.log(result);
				if(result.status != "ok"){
					alert("失败");
					return;
				}
				alert("操作成功");
				$("#clientIndex").val("");
				$("#serianNumber").val("");
				client = null;
				listBorrow = new Array();
				$("#clientIndex").focus();
				$("#serialNumber").attr("disable",true);
				$("#goSubmit").attr("disable",true);
			},
			error:function(){
				alert("失败2");
			}
		});
	});
});
function checkClient(){
	$.ajax({
		url:"<?php echo U('/API/client/getClient');?>",
		async:false,
		type:"POST",
		dataType:"json",
		data:{
			index:$("#clientIndex").val()
		},
		success:function(result){
			if(result.status != "ok"){
				console.log(result);
				alert("未找到会员");
				return;
			}
			client = result.client;
			alert("会员查找成功");
			$("#client").val(client.id);
			//TODO 此处加显示会员信息
		},
		error:function(){
			alert("会员查询失败");
		}
	});
}
function addBook(){
	$.ajax({
		url:"<?php echo U('/API/book/getVolumeBySerialNumber');?>",
		async:false,
		type:"POST",
		dataType:"json",
		data:{
			serialNumber:$("#serialNumber").val()
		},
		success:function(result){
			if(result.status != "ok"){
				alert("书籍未找到"+result.status);
				return;
			}
			volume = result.volume;
			if(volume.status != "in"){
				alert("此书已借出,不能再次借出");
				return;
			}
			for(i = 0;listBorrow[i];i++){
				if(listBorrow[i].id == volume.id){
					alert("此书已在列表内");
					return;
				}
			}
			listBorrow.push(result.volume);	
			$("#formBorrow").append("<input type='hidden' name='list[]' value='"+volume.id+"'/>");
			$("#serialNumber").val("");
			//TODO 显示借书条目和添加删除功能
			$("#right").html("");
			for(i = 0;listBorrow[i];i++){
				$("#right").append("<p>"+listBorrow[i].parent.title+"</p>");
			}
		},
		error:function(){
			alert("书籍查找失败");
		}
	});
}
</script>
</head>
<body>
	<div id="left" style="float:left;">
		<p>会员卡号码:<input type="text" name="clientIndex" id="clientIndex"/><button id="checkClient">查找</button></p>
		<p>所借图书编码:<input type="text" name="serialNumber" id="serialNumber"/><button id="addBook">添加</button></p>
		<p><button id="goSubmit">确定</button></p>
	</div>
	<div id="right" style="float:left;"></div>
	<form id="formBorrow">
		<input type="hidden" name="client" id="client"/>
	</form>
</body>
</html>