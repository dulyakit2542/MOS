canBtn = (id, e) => {
	var data = {
		train_member_admin_date: new Date(),
		train_member_status: $("#status_wait").val(),
		train_member_admin: $("#admin_check").val(),
	};
	console.log(data);
	// console.log(e);
	console.log(id);
	var url = base_url + "api_train/train_room/program_train_approve/" + id;
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		contentType: "json",
		error: function () {
			e.style.display = "none";
			console.log("not");
			e.closest(".col-12").children[4].style.display = "flex";
		},
		success: function () {
			e.style.display = "none";
			console.log("success");
			e.closest(".col-12").children[0].style.display = "flex";
			e.closest(".col-12").children[1].style.display = "flex";
			e.closest(".col-12").children[2].style.display = "none";
			e.closest(".col-12").children[3].style.display = "none";
		},
	});
};

cancelBtn = (id, e) => {
	var data = {
				train_member_admin_date: new Date,
				train_member_status: $('#status_wait').val(),
				train_member_admin: $('#admin_check').val(),
		
			};
	console.log(data);
	// console.log(e);
	console.log(id);
	swal({
		title: "คำเตือน!",
		text: "หากยกเลิกการอนุมัติข้อมูลการลงทะเบียนจะเปลี่ยนสถานะเป็นรออนุมัติ คุณต้องการยกเลิกหรือไม่ ?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {
			var url = base_url + "api_train/train_room/program_train_approve/" + id;
			$.ajax({
				type: "POST",
				url: url,
				data: data,
				contentType: "json",
				error: function () {
					e.style.display = "none";
					console.log("not");
					e.closest(".col-12").children[0].style.display = "flex";
				},
				success: function () {
					e.style.display = "none";
					console.log("success");
					e.closest(".col-12").children[0].style.display = "flex";
					e.closest(".col-12").children[1].style.display = "none";
				},
			});
		} else {
			swal("คุณไม่ได้ยกเลิก");
		}
	});
};

passBtn = (id, e) => {
	var data = {
		train_member_admin_date: new Date(),
		train_member_status: $("#status_pass").val(),
		train_member_admin: $("#admin_check").val(),
	};
	console.log(data);
	// console.log(e);
	console.log(id);
	var url = base_url + "api_train/train_room/program_train_approve/" + id;
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		contentType: "json",
		error: function () {
			e.style.display = "none";
			console.log("not");
			e.closest(".col-12").children[0].style.display = "flex";
			e.closest(".col-12").children[1].style.display = "flex";
		},
		success: function () {
			e.style.display = "none";
			console.log("success");
			e.closest(".col-12").children[4].style.display = "flex";
			e.closest(".col-12").children[1].style.display = "none";
			e.closest(".col-12").children[2].style.display = "flex";
		},
	});
};

failBtn = (id, e) => {
	var data = {
		train_member_admin_date: new Date,
		train_member_status: $('#status_not').val(),
		train_member_admin: $('#admin_check').val(),
	};
	console.log(data);
	// console.log(e);
	console.log(id);
	var url = base_url + "api_train/train_room/program_train_approve/" + id;
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		contentType: "json",
		error: function () {
			e.style.display = "none";
			console.log("not");
			e.closest(".col-12").children[0].style.display = "flex";
			e.closest(".col-12").children[1].style.display = "flex";
		},
		success: function () {
			e.style.display = "none";
			console.log("success");
			e.closest(".col-12").children[4].style.display = "flex";
			e.closest(".col-12").children[0].style.display = "none";
			e.closest(".col-12").children[3].style.display = "flex";
		},
	});
};
