function manage_room_train_edit(data) {
    console.log(data);
    window.location.href = base_url+'admin/manage_room_train_edit/' + data;
}

async function get_program_home() {
    var url = base_url + 'api_program/home/get_program';
    await $.ajax({
        type: 'GET',
        url: url,
        contentType: "json",
        error: function () {
            {
                swal("ข้อมูลกลุ่มอบรมซ้ำ", {
                    icon: "warning",
                })
            }
        },
        success: function (res) {
            let result = JSON.parse(res);
            const get_program = document.getElementById('get_program');
            get_program.innerHTML = ""
            result.result.map((items, idx) => {
                console.log(items);
                
                let btn_html = "";
                if (new Date() == new Date(items.train_room_date_ex).setHours(23, 00, 00)) {
                    btn_html = `<a href="#"  class="badge badge-pill badge-danger">วันนี้</a>
                    `
                } else if (new Date() < new Date(items.train_room_date_ex).setHours(23, 00, 00)) {
                    btn_html = `<h7 >${dateThai2(items.train_room_date_ex)} </h7>
                    `
                } else if (new Date() > new Date(items.train_room_date_ex).setHours(23, 00, 00)) {
                    btn_html = `<a href="#" class="badge badge-pill badge-danger">หมดเขต</a>
                    `
                }
                let badge_status = ""
                if (items.train_room_status == '5000') {
                    badge_status = `<a href="#" class="badge badge-pill badge-danger">ปิด</a>`
                } else {
                    badge_status = `<a href="#" class="badge badge-pill badge-success">เปิด</a>`
                }

                get_program.innerHTML += `<tr>
                        <td style="vertical-align: middle;">${items.train_room_id}</td>
                        <td style="vertical-align: middle;">${items.program_name}</td>
                        <td style="vertical-align: middle;" align="center">${badge_status}</td>
                        <td align="center" style="vertical-align: middle;">${btn_html}</td>
                        <td style="vertical-align: middle;">${items.train_room_name}</td>
                        <td style="vertical-align: middle;">${items.train_room_count < items.train_room_max ? `<h7  style="color: green;">${items.train_room_count}/${items.train_room_max}</h7>` : `<h7  style="color: red;">${items.train_room_count}/${items.train_room_max}</h7>`}</td>
                        <td style="vertical-align: middle;">${items.train_room_admin}, ${dateThaiJs(items.train_room_admin_date)}</td>
                        <td align="center" style="hight:1pt vertical-align: middle;" >
                                <a class="mb-1 btn btn-pill btn-success "  style="color: white;" onclick="manage_room_train_edit('${items.train_room_id}')">
                                    แก้ไข
                                </a>
                                <a class="mb-1 btn btn-pill btn-danger" style="color: white;" onclick="delete_train_room('${items.train_room_id}')">
                                    ลบ
                                </a>
                        </td>
                    </tr>`
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            })
        }
    })
}
get_program_home()

function add_train_room() {
    var data = {
        train_room_id: $('#train_room_id').val(),
        program_type_id: $('#program_type_id').val(),
        train_room_name: $('#train_room_name').val(),
        train_room_date_ex: $('#train_room_date_ex').val(),
        train_room_status: $('#train_room_status').val(),
        train_room_max: $('#train_room_max').val(),
        train_room_admin: $('#train_room_admin').val(),
        train_room_admin_date: new Date,
    }
    console.log(data);
    Swal.fire({
        title: 'Are you sure?',
        text: "คุณต้องการเพิ่มห้องอบรมหรือไม่?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    })
        .then((result) => {
            if (data['train_room_name'] == "" || data['train_room_date_ex'] == "") {
                Swal.fire({
                    icon: 'info',
                    text: 'กรุณากรอกข้อมูลให้ครบ',
                })
            } else {
                if (result.isConfirmed) {

                    var url = base_url + 'api_train/train_room/add_train_room/';
                    $.ajax({
                        type: 'INSERT',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'ผิดพลาด',
                                text: 'มีรหัสหรือชื่อกลุ่มนี้อยู่แล้ว',
                            })
                        },
                        success: function () {
                            Swal.fire(
                                'สำเร็จ!',
                                'เพิ่มห้องอบรมเรียบร้อยแล้ว.',
                                'success'
                            )
                            setTimeout(function () {
                                location.reload();
                            }, 500);;
                        }
                    })
                } else {
                    swal("คุณไม่ได้บันทึกข้อมูล");
                }
            }
        });
}


function save_train_room(id) {
    var data = {
        train_room_id: $('#train_room_id').val(),
        program_type_id: $('#program_type_id').val(),
        train_room_name: $('#train_room_name').val(),
        train_room_date_ex: $('#train_room_date_ex').val(),
        train_room_status: $('#train_room_status').val(),
        train_room_max: $('#train_room_max').val(),
        train_room_admin: $('#train_room_admin').val(),
        train_room_admin_date: new Date,
    }
    console.log(data);
    Swal.fire({
        title: 'Are you sure?',
        text: "คุณต้องการเพิ่มห้องอบรมหรือไม่?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    })
        .then((result) => {
            if (data['train_room_name'] == "" || data['train_room_date_ex'] == "" || data['train_room_id'] == "" || data['train_room_max'] == "") {
                Swal.fire({
                    icon: 'info',
                    text: 'กรุณากรอกข้อมูลให้ครบ',
                })
            } {
            if (result.isConfirmed) {
                var url = base_url+'api_train/train_room/edit_train_room/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'ผิดพลาด',
                                text: 'มีรหัสหรือชื่อกลุ่มนี้อยู่แล้ว',
                            })
                        }
                    },
                    success: function () {
                        Swal.fire(
                            'สำเร็จ!',
                            'บันทึกข้อมูลสำเร็จ',
                            'success'
                        )
                        setTimeout(function () {
                            window.location = base_url+'admin/manage_room_train';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }
        }});
}



function delete_train_room(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "คุณต้องการลบห้องอบรมหรือไม่?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    })
        .then((result) => {
            if (result.isConfirmed) {
                var url = base_url+'api_train/train_room/delete_train_room/' + id;
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    contentType: "json",
                    success: function () {
                        Swal.fire(
                            'สำเร็จ!',
                            'ลบห้องอบรมสำเร็จ.',
                            'success'
                        )
                        setTimeout(function () {
                            location.reload();
                        }, 1000);;
                    }
                })
            } else {
                swal("ยกเลิก");
            }
        });
}
