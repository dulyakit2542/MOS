function exam_room_edit(id) {
    window.location.href = base_url + 'admin/manage_exam_room_edit/' + id;
}
function exam_archive_edit(id) {
    window.location.href = base_url + 'admin/exam_archive_edit/' + id;
}

function new_exam_room() {
    var data = {
        program_name_id: $('#program_name_id').val(),
        exam_room_name: $('#exam_room_name').val(),
        exam_room_date: $('#exam_date').val(),
        program_status: $('#exam_status').val(),
        exam_room_address: $('#exam_address_room').val(),
        exam_room_max: $('#exam_max').val(),
        edit_exam: $('#edit_exam').val(),
        edit_exam_date: $('#edit_exam_date').val(),
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
            if (data['exam_room_name'] == "" || data['exam_room_address'] == "" || data['exam_room_date'] == "") {
                swal("กรุณากรอกข้อมูลให้ครบ", {
                    icon: "warning",
                })
            } else {
                if (willDelete) {
                    var url = base_url + 'api/exam/new_exam_room/';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            {
                                swal("ข้อมูลชื่ออบรมซ้ำ", {
                                    icon: "warning",
                                })
                            }
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

function history_exam_room() {
    var data = {
        exam_room_id: $('#exam_room_id').val(),
        program_name_id: $('#program_name_id').val(),
        exam_room_name: $('#exam_room_name').val(),
        exam_room_date: $('#exam_date').val(),
        exam_room_time: $('#exam_room_time').val(),
        program_status: $('#exam_status').val(),
        exam_room_address: $('#exam_address_room').val(),
        exam_room_max: $('#exam_max').val(),
        edit_exam: $('#edit_exam').val(),
        edit_exam_date: new Date,
    }
    var data1 = {
        exam_room_id: $('#exam_room_id').val(),
        program_name_id: $('#program_name_id').val(),
        exam_room_name: $('#exam_room_name').val(),
        exam_room_date: $('#exam_date').val(),
        exam_room_time: $('#exam_room_time').val(),
        exam_room_address: $('#exam_address_room').val(),
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
            if (data['exam_room_id'] == "" || data['exam_room_name'] == "" || data['exam_room_address'] == "" || data['exam_room_date'] == "") {
                swal("กรุณากรอกข้อมูลให้ครบ", {
                    icon: "warning",
                })
            } else {
                if (willDelete) {
                    var url = base_url + 'api/exam/new_exam_room/';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            {
                                swal("ข้อมูลชื่ออบรมซ้ำ", {
                                    icon: "warning",
                                })
                            }
                        },
                        success: function () {
                            var url = base_url + 'api/exam/history_exam_room/';
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: data1,
                                contentType: "json",
                                error: function () {
                                    {
                                        swal("ข้อมูลชื่ออบรมซ้ำ", {
                                            icon: "warning",
                                        })
                                    }
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
                        }
                    })
                } else {
                    swal("คุณไม่ได้บันทึกข้อมูล");
                }
            }
        });
}


function delete_exam_room(id) {
    swal({
        title: "คำเตือน!",
        text: "ต้องการลบห้องสอบนี้หรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/delete_exam_room/' + id;
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

function save_exam_room(id) {
    var data = {
        exam_room_id: $('#exam_room_id').val(),
        exam_room_name: $('#exam_room_name').val(),
        program_name_id: $('#program_name_id').val(),
        exam_room_date: $('#exam_room_date').val(),
        program_status: $('#program_status').val(),
        exam_room_address: $('#exam_room_address').val(),
        exam_room_max: $('#exam_room_max').val(),
        edit_exam: $('#edit_exam').val(),
        edit_exam_date: new Date,
        exam_room_time: $('#exam_room_time').val(),
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
            if (data['exam_room_id'] == "" || data['exam_room_name'] == "" || data['exam_room_address'] == "" || data['exam_room_date'] == "" || data['exam_room_time'] == "") {
                Swal.fire({
                    icon: 'info',
                    text: 'กรุณากรอกข้อมูลให้ครบ',
                })
            } else {
                if (willDelete) {
                    var url = base_url + 'api/exam/edit_exam_room/' + id;
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            {
                                swal("ผิดพลาด", {
                                    icon: "warning",
                                })
                            }
                        },
                        success: function () {
                            swal("บันทึกข้อมูลสำเร็จ", {
                                icon: "success",
                            })
                            setTimeout(function () {
                                window.location = base_url + 'admin/manage_exam_room';
                            }, 500);;
                        }
                    })
                } else {
                    swal("คุณไม่ได้บันทึกข้อมูล");
                }
            }});
}

function save_exam_archive(id) {
    var data = {
        program_id: $('#program_id').val(),
        exam_archive_id: $('#exam_archive_id').val(),
        exam_archive_name: $('#exam_archive_name').val(),
        program_status: $('#exam_status').val(),
        exam_archive_amount: $('#exam_archive_amount').val(),
        exam_archive_ex: $('#exam_archive_ex').val(),
        edit_exam_archive: $('#edit_exam_archive').val(),
        edit_exam_archive_date: new Date,
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
                var url = base_url + 'api/exam/save_exam_archive/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("ผิดพลาด", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        swal("บันทึกข้อมูลสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url + 'admin/exam_archive';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }
        });
}

function exam_archive_new() {
    var data = {
        program_id: $('#program_id').val(),
        exam_archive_id: $('#exam_archive_id').val(),
        exam_archive_name: $('#exam_archive_name').val(),
        program_status: $('#exam_status').val(),
        exam_archive_amount: $('#exam_archive_amount').val(),
        exam_archive_ex: $('#exam_archive_ex').val(),
        edit_exam_archive: $('#edit_exam_archive').val(),
        edit_exam_archive_date: new Date,
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
            if (data['exam_archive_id'] == "" || data['exam_archive_name'] == "" || data['exam_archive_amount'] == "") {
                swal("กรุณากรอกข้อมูลให้ครบ", {
                    icon: "warning",
                })
            } else {
                if (willDelete) {
                    var url = base_url + 'api/exam/new_exam_archive/';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        contentType: "json",
                        error: function () {
                            {
                                swal("ข้อมูลผิดพลาด", {
                                    icon: "warning",
                                })
                            }
                        },
                        success: function () {
                            swal("เพิ่มชุดข้อสอบสำเร็จ", {
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

function delete_exam_archive(id) {
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "ต้องการลบชุดข้อสอบนี้หรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/delete_exam_archive/' + id;
                $.ajax({
                    type: 'POST',
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

// Exam_member_approve
canExam_approve = (id, e) => {
    var data = {
        exam_archive: $('#canExam_archive').val(),
        exam_member_status: $('#exam_member_status_wait').val(),
        exam_member_alert: $('#canExam_alert').val(),
        admin_date: new Date,
        admin: $('#admin_approve').val(),
    }
    console.log(data);
    // console.log(e);
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "หากยกเลิก สถานะของผู้ใช้จะกลับเป็นรอกำหนดชุดข้อสอบ คุณต้องการยกเลิกหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/exam_member_approve/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[2].style.display = 'flex'
                        swal("ผิดพลาด", {
                            icon: "warning",
                        })
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[1].style.display = 'none'
                        e.closest('.col-18').children[2].style.display = 'none'
                        swal("ยกเลิกสำเร็จ", {
                            icon: "success",
                        })
                    }
                })
            } else {
                swal("คุณไม่ได้ยกเลิก");
            }
        })
}

exam_approve = (id, e) => {
    var data = {
        exam_archive: $('#exam_archive_id').val(),
        exam_member_alert: $('#exam_alert').val(),
        exam_member_status: $('#exam_member_status').val(),
        admin_date: new Date,
        admin: $('#admin_approve').val(),

    }
    console.log(data);
    // console.log(e);
    var url = base_url + 'api/exam/exam_member_approve/' + id;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: "json",
        error: function () {
            e.style.display = 'none'
            console.log("not");
            e.closest('.col-18').children[0].style.display = 'flex'
        },
        success: function () {
            e.style.display = 'none'
            console.log("success");
            e.closest('.col-18').children[0].style.display = 'none'
            e.closest('.col-18').children[1].style.display = 'flex'
            e.closest('.col-18').children[2].style.display = 'flex'
        }
    })
}

exam_approve_change = (id, e) => {
    var data = {
        exam_archive: $('#exam_archive_id').val(),
        exam_member_alert: $('#exam_alert').val(),
        exam_member_status: $('#exam_member_status').val(),
        admin_date: new Date,
        admin: $('#admin_approve').val(),

    }
    console.log(data);
    // console.log(e);
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการเปลี่ยนชุดข้อสอบหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/exam_member_approve/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        swal("ผิดพลาด", {
                            icon: "warning",
                        })
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[1].style.display = 'flex'
                        e.closest('.col-18').children[2].style.display = 'none'
                        swal("เปลี่ยนชุดข้อสอบสำเร็จ", {
                            icon: "success",
                        })
                    }
                })
            } else {
                swal("คุณไม่ได้เปลี่ยนชุดข้อสอบ");
            }
        })
}

canExam_approve_change = (id, e) => {
    var data = {
        exam_archive: $('#canExam_archive').val(),
        exam_member_status: $('#exam_member_status_wait').val(),
        exam_member_alert: $('#canExam_alert').val(),
        admin_date: new Date,
        admin: $('#admin_approve').val(),
    }
    console.log(data);
    // console.log(e);
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "หากยกเลิก สถานะของผู้ใช้จะกลับเป็นรอกำหนดชุดข้อสอบ คุณต้องการยกเลิกหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/exam_member_approve/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[2].style.display = 'flex'
                        swal("ผิดพลาด", {
                            icon: "warning",
                        })
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[1].style.display = 'none'
                        e.closest('.col-18').children[2].style.display = 'none'
                        swal("ยกเลิกสำเร็จ", {
                            icon: "success",
                        })
                    }
                })
            } else {
                swal("คุณไม่ได้ยกเลิก");
            }
        })
}

// Exam_member_score
canExam_member_score = (id, e) => {
    var data = {
        exam_member_score: $('#canExam_member_score').val(),
        exam_member_alert: $('#canExam_alert').val(),
        exam_member_status: $('#canExam_member_status_pass').val(),
        admin_date: $('#date').val(),
        admin: $('#admin').val(),
    }
    console.log(data);
    // console.log(e);
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "หากยกเลิก สถานะของผู้ใช้จะกลับเป็นรอกรอกคะแนน คุณต้องการยกเลิกหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/exam_member_approve/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[1].style.display = 'none'
                        e.closest('.col-18').children[2].style.display = 'flex'
                        swal("ผิดพลาด", {
                            icon: "warning",
                        })
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[1].style.display = 'none'
                        e.closest('.col-18').children[2].style.display = 'none'
                        e.closest('.col-18').children[3].style.display = 'flex'
                        swal("ยกเลิกสำเร็จ", {
                            icon: "success",
                        })
                    }
                })
            } else {
                swal("คุณไม่ได้ยกเลิก");
            }
        })
}
canExam_member_success = (id, e) => {
    var data = {
        exam_member_score: $('#canExam_member_score').val(),
        exam_member_alert: $('#canExam_alert').val(),
        exam_member_status: $('#canExam_member_status_pass').val(),
        admin_date: $('#date').val(),
        admin: $('#admin').val(),
    }
    console.log(data);
    // console.log(e);
    console.log(id);
    swal({
        title: "คำเตือน!",
        text: "หากยกเลิก สถานะของผู้ใช้จะกลับเป็นรอกรอกคะแนน คุณต้องการยกเลิกหรือไม่ ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url + 'api/exam/exam_member_approve/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[0].style.display = 'none'
                        e.closest('.col-18').children[1].style.display = 'flex'
                        swal("ผิดพลาด", {
                            icon: "warning",
                        })
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[1].style.display = 'none'

                        swal("ยกเลิกสำเร็จ", {
                            icon: "success",
                        })
                    }
                })
            } else {
                swal("คุณไม่ได้ยกเลิก");
            }
        })
}
exam_member_score = (id, e) => {
    var data = {
        exam_member_score: $('#' + id + 'exam_member_score').val(),
        exam_member_alert: $('#exam_alert').val(),
        exam_member_status: $('#exam_member_status_pass').val(),
        admin_date: $('#date').val(),
        admin: $('#admin').val(),
    }
    var data1 = {
        exam_score: $('#' + id + 'exam_member_score').val(),
        user_personal: $('#user_personal').val(),
        exam_room_id: $('#exam_room_id').val(),
        exam_archive: $('#exam_archive').val(),
    }
    console.log(data);
    // console.log(e);
    console.log(id);
    if (data['exam_member_score'] == "") {
        swal("กรุณากรอกข้อมูลให้ครบ", {
            icon: "warning",
        })
    } else {
        var url = base_url + 'api/exam/exam_member_approve/' + id;
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            contentType: "json",
            error: function () {
                e.style.display = 'none'
                console.log("not");
                e.closest('.col-18').children[0].style.display = 'flex'
                e.closest('.col-18').children[3].style.display = 'none'
            },
            success: function () {
                var url = base_url + 'api/exam/history_exam_user/';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data1,
                    contentType: "json",
                    error: function () {
                        e.style.display = 'none'
                        console.log("not");
                        e.closest('.col-18').children[0].style.display = 'flex'
                        e.closest('.col-18').children[3].style.display = 'none'
                    },
                    success: function () {
                        e.style.display = 'none'
                        console.log("success");
                        e.closest('.col-18').children[0].style.display = 'none'
                        e.closest('.col-18').children[1].style.display = 'flex'
                        e.closest('.col-18').children[2].style.display = 'flex'
                        e.closest('.col-18').children[3].style.display = 'none'
                    }
                })
            }
        })
    }
}

exam_not = (id, e) => {
    var data = {
        exam_member_score: $('#not_exam_member_score').val(),
        exam_member_status: $('#not_exam_member_status').val(),
        exam_member_alert: $('#exam_alert').val(),
        admin_date: $('#date').val(),
        admin: $('#admin').val(),

    }
    console.log(data);
    // console.log(e);
    console.log(id);
    var url = base_url + 'api/exam/exam_member_approve/' + id;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: "json",
        error: function () {
            e.style.display = 'none'
            console.log("not");
            e.closest('.col-18').children[0].style.display = 'flex'
            e.closest('.col-18').children[3].style.display = 'none'
        },
        success: function () {
            e.style.display = 'none'
            console.log("success");
            e.closest('.col-18').children[0].style.display = 'none'
            e.closest('.col-18').children[1].style.display = 'flex'
            e.closest('.col-18').children[2].style.display = 'flex'
            e.closest('.col-18').children[3].style.display = 'none'
        }
    })
}