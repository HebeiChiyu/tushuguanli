<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/tushuguanli/Public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#serchIndex').keypress(function(event){
		$magazine = null;
		if(event.keyCode != 13){
			return;
		}
		$.ajax({
			url:"<?php echo U('/API/Book/getMagazine');?>",
			type:"POST",
			dataType:"json",
			async:true,
			data:{
				"index":$("#serchIndex").val()
			},
			success:function(result){
				if(result.status == "ok"){
					magazine = result.magazine;
					$('#magazine').val(magazine.id);
					console.log(magazine);
				}else{
					alert("未找到相关期刊");
				}
			},
			error:function(result){
				alert("失败");
			}
		});
	});
	$("#formPeriod").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:"<?php echo U('/API/Book/addMagazinePeriod');?>",
			type:"POST",
			dataType:"json",
			async:true,
			data:{
				magazine:magazine.id,
				datePublish:$("#datePublish").val(),
				periodCode:$("#periodCode").val(),
				periodTotalCode:$("#periodTotalCode").val()
			},
			success:function(result){
				if(result.status == "ok"){
					alert("成功");
					$("#formPeriod")[0].reset();
				}else{
					alert("失败");
				}
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
	<div id="period">
		<p>ISSN/CN/条形码:<input type="text" id="serchIndex"/></p>
		<form id="formPeriod" action="" method="POST">
			<p>出版日期:<input type="date" name="datePublish" id="datePublish"/></p>
			<p>期号:<input type="text" name="periodCode" id="periodCode"/></p>
			<p>总第<input type="number" name="periodTotalCode" id="periodTotalCode"/>期</p>
			<p><input type="submit" value="确定" /><input type="reset" value="重置"/></p>
		</form>
	</div>
</body>
</html>