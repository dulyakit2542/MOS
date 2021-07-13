function edit_profile(id) {
    window.location.href = base_url+'user/user_edit/' + id;
}
function insertdata(id) {
    window.location.href = base_url+'user/user_edit/' + id;
}
function user_list_detail(id) {
    window.location.href = base_url+'admin/user_list_detail/' + id;
}


function user_edit(id) {
    var datacheck = {
        user_image: $('#img_profile').val().substring(12),
    }
    if (datacheck['user_image'] == ""){
        var data = {
            phone: $('#phone').val(),
            advisor: $('#advisor').val(),
        }
    }else{
        var data = {
            phone: $('#phone').val(),
            advisor: $('#advisor').val(),
            user_image: $('#img_profile').val().substring(12),
        }
    }
    // console.log(data.image.substring(12));
    console.log(data);

    swal({
        title: "คำเตือน!",
        text: "คุณต้องการเปลี่ยนแปลงข้อมูลติดต่อหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/user/edit_profile/' + id;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    error: function () {
                        {
                            swal("มีชื่อรูปภาพซ้ำกัน กรุณาเปลี่ยนชื่อรูปภาพตามชื่อจริง", {
                                icon: "warning",
                            })
                        }
                    },
                    success: function () {
                        document.getElementById("user_img").submit();
                        swal("แก้ไขข้อมูลสำเร็จ", {
                            icon: "success",

                        })
                        setTimeout(function () {
                            window.location = base_url+'user/';
                        }, 500);;
                    }
                })
            } else {
                swal("คุณไม่ได้ทำการเปลี่ยนแปลง");
            }
        });
}

function create_user() {
    var data = {
        prefix: $('#phone').val(),
        fname: $('#phone').val(),
        lname: $('#phone').val(),
        personal_id: $('#phone').val(),
        student_id: $('#phone').val(),
        username: $('#phone').val(),
        password: $('#phone').val(),
        section: $('#phone').val(),
        phone: $('#phone').val(),
        advisor: $('#advisor').val(),
        image: $('#phone').val(),
    }
    // console.log(data);
    swal({
        title: "คำเตือน!",
        text: "คุณต้องการบันทึกข้อมูลหรือไม่?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var url = base_url+'api/user/insert_user/';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: "json",
                    success: function () {
                        swal("บันทึกข้อมูลสำเร็จ", {
                            icon: "success",
                        })
                        setTimeout(function () {
                            window.location = base_url+'user/';
                        }, 1500);;
                    }
                })
            } else {
                swal("คุณไม่ได้บันทึกข้อมูล");
            }
        });
}


async function get_user() {
    var id = document.getElementById('personal_id').value;
    var url = base_url + 'api_user/user/get_user/'+id;
    await $.ajax({
        type: 'GET',
        url: url,
        contentType: "json",
        error: function () {
            {
                swal("get_user ผิดพลาด", {
                    icon: "warning",
                })
            }
        },
        success: function (res) {
            let result = JSON.parse(res);
            const get_user_img = document.getElementById('get_user_img');
            get_user_img.innerHTML = ""
            result.result.map((items, idx) => {
                console.log(items);
                get_user_img.innerHTML += `<img src="${base_url}files/user_img/${items.user_image}" class="user-image rounded-circle" alt="User Image" />`
            })
        }
    })
}
setInterval(() => {
    get_user()
}, 15000)
get_user()

