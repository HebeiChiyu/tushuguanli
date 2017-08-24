<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	types = null;
	presses = null;
	libaries = null;
	$.ajax({
		url:"<?php echo U('/API/Book/getListTypeAndPressAndlibary');?>",
		dataType:"json",
		async : false,
		type : "POST",
		success : function(result) {
			if(result.status == "ok"){
				presses = result.press;
				types = result.type;
				libaries = result.libary;
			}else{
				alert("出版社列表获取失败");
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){ 
			alert("出版社列表获取失败");
		}
	});
	if(types){
		for(i = 0;types[i];i++){
			$("#type").append("<option value='"+types[i]['id']+"'>"+types[i]['name']+"</option>");
		}
	}
	if(presses){
		for(i = 0;presses[i];i++){
			$("#press").append("<option value='"+presses[i]['id']+"'>"+presses[i]['name']+"</option>");
		}
	}
	if(libaries){
		for(i = 0;libaries[i];i++){
			$("#libary").append("<option value='"+libaries[i]['id']+"'>"+libaries[i]['name']+"</option>");
		}
	}
	$("#formBook").submit(function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"<?php echo U('/API/book/addMagazine');?>",
			/*
				data:$("#formBook").serialize()
				对于日期不好用，待调试
			*/
			data:{
				ISSN:$("#ISSN").val(),
				codeBar:$("#codeBar").val(),
				title:$("#title").val(),
				periodPublish:$("#periodPublish").val(),
				page:$("#page").val(),
				type:$("#type").val(),
				press:$("#press").val(),
				libary:$("#libary").val(),
				language:$("#language").val(),
				position:$("#position").val(),
			},
			async:false,
			dataType:"json",
			error:function(){
				alert("失败");
			},
			success:function(result){
				console.log(result);
				if(result.status == "ok"){
					alert("成功");
					$('#formBook')[0].reset();
				}else{
					alert("失败");
				}
			}
		});
	});
});
</script>
</head>
<body>
	<div id="book">
		<form id="formBook" action="" method="POST">
			<p>ISSN/CN:<input type="text" name="ISSN" id="ISSN"/></p>
			<p>编码:<input type="text" name="codeBar" id="codeBar"/></p>
			<p>名称:<input type="text" name="title" id="title"/></p>
			<p>页数:<input type="text" name="page" id="page"/></p>
			<p>出版周期:<select name="periodPublish" id="periodPublish">
				<option value="">请选择……</option>
				<option value="日刊">日刊</option>
				<option value="周刊">周刊</option>
				<option value="半月刊">半月刊</option>
				<option value="月刊">月刊</option>
				<option value="季刊">季刊</option>
				<option value="半年刊">半年刊</option>
				<option value="年刊">年刊</option>
				<option value="其他">其他</option>
			</select></p>
			<p>分类:<select name="type" id="type">
				<option value="">请选择……</option>
			</select></p>
			<p>出版社:<select name="press" id="press">
				<option value="">请选择……</option>
			</select></p>
			<p>藏馆:<select name="libary" id="libary">
				<option value="">请选择……</option>
			</select></p>
			<p>语言:<select name="language" id="language">
				<option value="中文">中文</option>
				<option value="英文">英文</option>
				<option value="法文">法文</option>
				<option value="德文">德文</option>
				<option value="日文">日文</option>
				<option value="西班牙文">西班牙文</option>
				<option value="葡萄牙文">葡萄牙文</option>
				<option value="其他">其他</option>
			</select></p>
			<p>存放位置:<input type="text" name="position" id="position"/></p>
			<!-- <p>标签:<input type="text" name="tag" id="tag"/>多个标签用空格分开</p> -->
			<p><input type="submit" value="确定"/><input type="reset" value="重置"/></p>	
		</form>
	</div>
</body>
</html>