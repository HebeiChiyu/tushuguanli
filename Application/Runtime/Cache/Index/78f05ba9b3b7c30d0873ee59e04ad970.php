<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#identity").change(function(){
		str = $("#identity").val();
		if(str.length == 18){
			date = str[6]+str[7]+str[8]+str[9]+"-"+str[10]+str[11]+"-"+str[12]+str[13];
			$("#dateBirth").val(date);
		}
	});
	$("#goSubmit").click(function(){
		serialNumber = $("#serialNumber").val();
		if(!serialNumber){
			alert("会员编号不能为空");
			return;
		}
		name = $("#name").val();
		if(!name){
			alert("会员姓名不能为空");
			return;
		}
		sex = $("#sex").val();
		if(!sex){
			alert("请选择会员性别");
			return;
		}
		tel = $("#tel").val();
		if(!tel){
			alert("电话不能为空");
			return;
		}
		if(isNaN(tel)){
			alert("电话号码格式错误");
			return;
		}
		identity = $("#identity").val();
		dateBirth = $("#dateBirth").val();
		nation = $("#nation").val();
		origin = $("#origin").val();
		etc = $("#etc").val();
		$.ajax({
			url:"<?php echo U('/API/client/addClient');?>",
			type:"POST",
			async:false,
			dataType:"json",
			data:{
				serialNumber:serialNumber,
				name:name,
				sex:sex,
				tel:tel,
				identity:identity,
				dateBirth:dateBirth,
				nation:nation,
				origin:origin,
				etc:etc
			},
			success:function(result){
				if(result.status != "ok"){
					alert("失败");
					console.log(result);
					return;
				}
				alert("成功");
			},
			error:function(){
				alert("失败");
			}
		});
	});
});
</script>
</head>
<body>
	<p>会员编号:<input type="text" name="serialNumber" id="serialNumber"/></p>
	<p>姓名:<input type="text" name="name" id="name"/></p>
	<p>性别:<select name="sex" id="sex">
		<option value="">请选择……</option>
		<option value="男">男</option>
		<option value="女">女</option>
	</select></p>
	<p>身份证号码:<input type="text" name="identity" id="identity"/></p>
	<p>出生日期:<input type="date" name="dateBirth" id="dateBirth"/></p>
	<p>联系电话:<input type="text" name="tel" id="tel"/></p>
	<p>民族:<input type="text" name="nation" id="nation"/></p>
	<p>籍贯:<input type="text" name="origin" id="origin"/></p>
	<p>备注:<textarea name="etc" id="etc"></textarea></p>
	<p><button id="goSubmit">确定</button><button id="goReset">重置</button></p>
</body>
</html>