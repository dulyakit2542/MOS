failBtn = (id, e) => {
	var data = {
		status_train_date: $('#date').val(),
		status_train: $('#status_not').val(),
		wait_for_test: $('#status_not').val(),
		admin: $('#admin').val(),

	}
	console.log(data);
	// console.log(e);
	console.log(id);
	var url = base_url + 'api/program/program_train/' + id;
	$.ajax({
		type: 'POST',
		url: url,
		data: data,
		contentType: "json",
		error: function () {
			e.style.display = 'none'
			console.log("not");
			e.closest('.col-12').children[0].style.display = 'flex'
			e.closest('.col-12').children[1].style.display = 'flex'
		},
		success: function () {
			e.style.display = 'none'
			console.log("success");
			e.closest('.col-12').children[4].style.display = 'flex'
			e.closest('.col-12').children[0].style.display = 'none'
			e.closest('.col-12').children[3].style.display = 'flex'
		}
	})

	
}


	

