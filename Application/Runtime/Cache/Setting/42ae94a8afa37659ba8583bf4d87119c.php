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
			console.log(result);
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
				</tr>
			</thead>
			<tbody id="resultTbody">
			</tbody>
		</table>
	</div> 
</body>
</html>