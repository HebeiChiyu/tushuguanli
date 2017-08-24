$(document).ready(function() {
		$("#submit").click(function() {
			check = true;
			name = $("#name").val();
			if (!name) {
				$("#checkName").html("姓名不能为空");
				check = false;
			} else {
				$("#checkName").html("");
			}
			sex = $("#sex").val();
			if (!sex) {
				$("#checkSex").html("性别不能为空");
				check = false;
			} else {
				$("#checkSex").html("");
			}
			dateBirth = $("#dateBirth").val();
			if (!dateBirth) {
				$("#checkDateBirth").html("出生日期不能为空");
				check = false;
			} else {
				$("#checkDateBirth").html("");
			}
			identity = $("#identity").val();
			if (!identity) {
				$("#checkIdentity").html("身份证号码不能为空");
				check = false;
			} else {
				$("#checkIdentity").html("");
			}
			tel = $("#tel").val();
			if (!tel) {
				$("#checkTel").html("电话不能为空");
				check = false;
			} else {
				$("#checkTel").html("");
			}
			nation = $("#nation").val();
			origin = $("#origin").val();
			if (!check) {
				return;
			}
			$.ajax({
				url : 'http://localhost/tushuguanli/API/admin/addAdmin',
				async : true,
				type : "POST",
				dataType:"json",
				data : {
					name : name,
					sex : sex,
					dateBirth : dateBirth,
					identity : identity,
					tel : tel,
					nation : nation,
					origin : origin
				},
				success : function(result) {
					if(result.status != "ok"){
						alert("失败");
						return;
					}
					alert("成功");
					history.go(0);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("失败");
					return;
				},
			});
		});
	});