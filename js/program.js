
// function edit_program(id){
//     $('#editprogram').modal('show')
//     let select_code = window.progarm.find(item => (item.id_program_open == id))
//     console.log(select_code);
//     $("#edit_program_id").val(select_code.id_program_open)
//     let edit_program_id = document.querySelector('#edit_program_id')
//     edit_program_id.setAttribute('value', edit_program_id.id)
// }
function show_addprogram() {
    $('#addprogram').modal('show')
}
function show_openprogram() {
    $('#addprogramopen').modal('show')
}
function edit_program_open(id) {
    window.location.href = base_url+'program/edit_program_open/' + id;
}
function exam_page(id) {
    window.location.href = base_url+'exam/register_exam/' + id;
}
function edit_program(id) {
    window.location.href = base_url+'admin/manage_program_edit/' + id;
}
function program_regis(id) {
    window.location.href = base_url+'program/program_regis/' + id;
}
function program_member_list(id) {
    window.location.href = base_url+'program/program_member_list/';
}

function notpass_for_test(id) {
    var data = {
        status_train_date: $('#date').val(),
        status_train: $('#status_not').val(),
        train_member_status: $('#status_not').val(),
    }
    console.log(data);

    var url = base_url+'api/program/program_train/' + id;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: "json",
        error: function () {
            {
                swal("ไม่สามารถทำรายการได้", {
                    icon: "warning",
                })
            }
        },
        success: function () {
            $('#cancel').append(
                `<a class=" btn-rounded btn btn-yt waves-effect waves-light h6" onclick="program_train_cencel(<?php echo $ck->id_member;?>)">
							ยกเลิก
						</a>`
            );
        }
    })

}
function program_train_cencel(id) {
    var data = {
        status_train_date: $('#date').val(),
        train_member_status: $('#status_wait').val(),
    }
    console.log(data);

    var url = base_url+'api/program/program_train/' + id;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: "json",
        error: function () {
            {
                swal("ไม่สามารถทำรายการได้", {
                    icon: "warning",
                })
            }
        },
        success: function () {

        }
    })
}
function programhome() {
    var url = base_url+'api/home/program';
    $.ajax({
        type: 'POST',
        url: url,
        data: {},
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
            result.result.map((items, idx) => {
                console.log(items);
            })
        }
    })
}
function program_train_regis(id) {
    var data = {
        wait_date_for_test: $('#date').val(),
        train_member_status: $('#status').val(),
    }
    console.log(data);
    swal({
        title: "คุณต้องการยืนยันการอบรมหรือไม่ ?",
        text: "หากยืนยันแล้วจะไม่สามารถเปลี่ยนแปลงได้จนกว่าเจ้าหน้าที่จะอนุมัตผลการอบรม",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/program_train_regis/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("คุณยืนยันข้อมูลไว้แล้ว", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        swal("ลงทะเบียนสำเร็จ กรุณารอเจ้าหน้าที่อนุมัติภายใน 3 วันทำการ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'program/program_member_list/';
                        }, 2000);;
                    }
                })
            } else {
                swal("ยกเลิกแล้ว");
            }
        });
}

function program_register() {
    var data = {
        program_open_id: $('#program_open_id').val(),
        personal_id: $('#personal_id').val(),
        date: new Date,
    }
    console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการลงทะเบียนหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/program_register/';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("คุณลงทะเบียนอบรมอยู่แล้ว", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        swal("ลงทะเบียนสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'program/program_member_list/';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้ลงทะเบียน");
            }
        });
}
function exam_register() {
    var data = {
        exam_room_id: $('#exam_room_id').val(),
        personal_id: $('#personal_id').val(),
        exam_member_date: new Date,
        exam_member_status: $('#exam_member_status').val(),
    }
    console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการลงทะเบียนหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/exam/exam_register/';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("คุณทำการลงทะเบียนไว้อยู่แล้ว", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        swal("ลงทะเบียนสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'program/program_member_list/';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้ลงทะเบียน");
            }
        });
}
// programhome()
function new_program() {
    var data = {
        program_name_id: $('#new_program_id').val(),
        program_room: $('#new_program_room').val(),
        program_date: $('#new_program_date').val(),
        program_status: $('#new_program_status').val(),
        program_max: $('#new_program_max').val(),
        edit_program: $('#edit_program').val(),
        edit_program_date: $('#edit_program_date').val(),
    }
    console.log(data);

    swal({
        title: "คำเตือน!",
        text: "คุณต้องการบันทึกข้อมูลหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (data['program_room'] == "" || data['program_date'] == "") {
                swal("กรุณากรอกข้อมูลให้ครบ", {
                    icon: "warning",
                })
            } else {
                if (willDelete) {

                    var url = base_url+'api/program/insert_program/';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            swal("ข้อมูลกลุ่มอบรมซ้ำ", {
                                icon: "warning",
                            })
                        },
                        success: function () {
                            swal("บันทึกข้อมูลสำเร็จ", {
                                icon: "success",
                            })
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

function add_program() {
    var data = {
        program_type_id: $('#new_program_id').val(),
        program_name: $('#new_program_name').val(),
        program_imge: $('#new_program_img').val().substring(12),
        program_type_admin : $('#program_type_admin').val(),
        program_type_admin_date : new Date,
    }
    console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการบันทึกข้อมูลหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (data['program_type_id'] == "" || data['program_name'] == "" || data['program_imge'] == "") {
                swal("กรุณากรอกข้อมูลให้ครบ", {
                    icon: "warning",
                })
            } else {
            if (willDelete) {
                var url = base_url+'api/program/new_program/';
                $.ajax({
                    type: 'INSERT',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("มีข้อมูลโปรแกรมนี้อยู่แล้วหรือชื่อรูปภาพซ้ำกัน", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () { 
                        document.getElementById("program_image").submit();
                        swal("บันทึกข้อมูลสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }}
        });

}

function save_mprogram(id) {
    var datacheck = {
            program_imge: $('#new_program_img').val().substring(12),
    }
    if (datacheck['program_imge'] == ""){
        var data = {
            program_type_id: $('#program_type_id').val(),
            program_name: $('#program_name').val(),
            program_type_admin : $('#program_type_admin').val(),
            program_type_admin_date : new Date,
        }
    }else{
        var data = {
            program_type_id: $('#program_type_id').val(),
            program_name: $('#program_name').val(),
            program_imge: $('#new_program_img').val().substring(12),
            program_type_admin : $('#program_type_admin').val(),
            program_type_admin_date : new Date,
        }
    }
    console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการบันทึกข้อมูลหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/edit_mprogram/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("ข้อมูลกลุ่มอบรมซ้ำ", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        document.getElementById("program_image").submit();
                        swal("บันทึกข้อมูลสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'admin/manage_program';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }
        });
}

function program_member_can(id) {
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "ต้องการยกเลิกการลงทะเบียนหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/delete_program_member/' + id;
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    contentType: "json",
                    success: function () {
                        swal("ยกเลิกการลงทะเบียนสำเร็จ", {
                            icon: "success",
                        })
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
function delete_program(id) {
    console.log(id);     
    swal({
        title: "คำเตือน!",
        text: "ต้องการลบห้องอบรมนี้หรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/delete_program/' + id;
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    contentType: "json",
                    success: function () {
                        swal("ลบสำเร็จ", {
                            icon: "success",
                        })
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

function delete_program_open(id) {

    swal({
        title: "คำเตือน!",
        text: "ต้องการลบห้องอบรมนี้หรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/delete_program_open/' + id;
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    contentType: "json",
                    success: function () {
                        swal("ลบสำเร็จ", {
                            icon: "success",
                        })
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
function save_program(id) {

    var data = {
        program_name_id: $('#edit_program_id').val(),
        program_date: $('#program_date').val(),
        program_status: $('#edit_program_status').val(),
        program_room: $('#edit_program_room').val(),
        program_max: $('#edit_program_max').val(),
        edit_program: $('#edit_program').val(),
        edit_program_date: $('#edit_program_date').val(),
    }
    console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการบันทึกข้อมูลหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/program/edit_program/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("มีข้อมูลโปรแกรมนี้อยู่แล้วหรือชื่อรูปภาพซ้ำกัน", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        swal("บันทึกข้อมูลสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'program/';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }
        });
}