<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	result = null;
	$.ajax({
		url : "<?php echo U('/API/admin/listAdmin');?>",
		async : true,
		type : "POST",
		dataType:"json",
		/*
		data : {
			name : name,
			sex : sex,
			dateBirth : dateBirth,
			identity : identity,
			tel : tel,
			nation : nation,
			origin : origin
		},
		*/
		success : function(result) {
			if(result.status != "ok"){
				alert("失败");
				return;
			}
			list = result.list;
			$("#resultTbody").html("");
			for(i = 0;list[i];i++){
				$("#resultTbody").append("<tr>");
				$("#resultTbody").append("<td>"+list[i].name+"</td>");
				$("#resultTbody").append("<td>"+list[i].sex+"</td>");
				$("#resultTbody").append("<td>"+list[i].datebirth+"</td>");
				$("#resultTbody").append("<td>"+list[i].identity+"</td>");
				$("#resultTbody").append("<td>"+list[i].tel+"</td>");
				$("#resultTbody").append("<td>"+list[i].nation+"</td>");
				$("#resultTbody").append("<td>"+list[i].origin+"</td>");
				$("#resultTbody").append("<td>"+list[i].timelastlogin+"</td>");
				if(list[i].statuslock == 0){
					$("#resultTbody").append("<td>正常</td>");
				}else{
					$("#resultTbody").append("<td>锁定</td>");
				}
				$("#resultTbody").append("<td><a href='<?php echo U('/setting/user/detailuser/id');?>/"+list[i].id+"'>详情</a></td>");
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
	<!-- 检索 -->
	<!-- 
	<div id="serch">
		<table>
			
		</table>
	</div>
	-->
	<!-- 显示 -->
	<div id="result">
		<table id="resultTable">
			<thead>
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>身份证号码</th>
					<th>联系电话</th>
					<th>民族</th>
					<th>籍贯</th>
					<th>上一次链接时间</th>
					<th>账号状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="resultTbody">
			</tbody>
		</table>
	</div> 
</body>
</html>