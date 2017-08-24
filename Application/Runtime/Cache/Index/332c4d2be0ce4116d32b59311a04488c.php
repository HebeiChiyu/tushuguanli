<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	list = null;
	$.ajax({
		url : "<?php echo U('/API/book/listVolume');?>",
		async : false,
		type : "POST",
		dataType:"json",
		data : {
			/*
			parent : $("#parent").val(),
			serialNumber : $("#serialNumber").val(),
			status : $("#status").val(),
			*/
			class:"book"
		},
		success : function(result) {
			if(result.status != "ok"){
				alert("失败");
				return;
			}
			list = result.list;
			console.log(list);
			$("#resultTbody").html("");
			for(i = 0;list[i];i++){
				$("#resultTbody").append("<tr>");
				$("#resultTbody").append("<td>"+list[i].parent.title+"</td>");
				$("#resultTbody").append("<td>"+list[i].serialnumber+"</td>");
				switch(list[i].status){
				case "in":
					$("#resultTbody").append("<td>在库</td>");
					break;
				case "out":
					$("#resultTbody").append("<td>借出</td>");
					break;
				default:
					$("#resultTbody").append("<td>未知</td>");
					break;
				}
				$("#resultTbody").append("<td><a href='<?php echo U('/index/book/detailBookVolume');?>/"+list[i].id+"'>详情</a></td>");
				$("#resultTbody").append("</tr>");
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert("失败");
			return;
		},
	});
});
</script>
</head>
<body>
	<table id="resultTable">
			<thead>
				<tr>
					<th>所属图书</th>
					<th>编码</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="resultTbody">
			</tbody>
		</table>
</body>
</html>