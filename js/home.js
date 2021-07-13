function dateThai(date){
    var month = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let datesplit = date.split('-');
    return dateT = `${datesplit[2]} ${month[parseInt(datesplit[1])]} ${parseInt(datesplit[0])+543}`
 }
 function dateThai2(date) {
    var month = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let datesplit = date.split('/');
    return dateT = `${datesplit[1]} ${month[parseInt(datesplit[0])]} ${parseInt(datesplit[2]) + 543}`
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
                if (new Date() <= new Date(items.train_room_date_ex).setHours(23, 00, 00)) {
                    btn_html = `<a class="btn btn-orange btn-rounded waves-effect waves-light"> 
                    <strong class="h2" style="font-size:100% ; color:white" onclick="program_regis('${items.train_room_id}')"> ลงทะเบียนอบรม</strong></a>
                    <h5></h5><h4 class="h6">หมดเขต ${dateThai2(items.train_room_date_ex)} </h4>
                    `
                } else if (new Date() > new Date(items.train_room_date_ex)) {
                    btn_html = `<a class="btn btn-blue-grey disabled">
                    <strong class="h2" style="font-size:100%; color:white"> หมดเขตลงทะเบียน</strong></a>
                    <h5></h5><h4 class="h6" style="color: red;">หมดเขตลงทะเบียน </h4>
                    `
                }
                if (items.train_room_count >= items.train_room_max) {
                    btn_html = `<a class="btn btn-blue-grey disabled">
                    <strong class="h2" style="font-size:100%; color:white"> ที่นั่งเต็ม</strong></a>
                    <h5></h5><h4 class="h6">หมดเขต ${dateThai2(items.train_room_date_ex)} </h4>
                    `
                }
                if (items.train_room_status == '5000') {
                    btn_html = `<a class="btn btn-blue-grey disabled">
                    <strong class="h2" style="font-size:100%; color:white"> ยังไม่เปิดให้บริการ</strong></a>
                    <h5></h5><h4 class="h6" > ยังไม่เปิดให้บริการ </h4>
                    `
                }

                get_program.innerHTML += `<div class="col-md-3 mb-6 overlay">
						<section>
							<div class="card1">
								<div class="view view-cascade ">
									<img style="border-top-left-radius: 5px; border-top-right-radius: 5px;" src="${base_url}/files/program_image/${items.program_imge}" class="card-img-top" alt="">
									<a>
										<div class="mask rgba-white-slight"></div>
									</a>
								</div>
								<div class="card-body card-body-cascade text-center">
									<h4 class="h6"><strong>${items.program_name}</strong></h4>
									<h4 class="h6"><strong>กลุ่มลงทะเบียน  ${items.train_room_name}</strong></h4>
									<h6 class="h6">จำนวนที่นั่งคงเหลือ  <h6>
											<strong>
												${items.train_room_count < items.train_room_max ? `<h6 class="h6" style="color: green;">${items.train_room_count}/${items.train_room_max}</h6>` : `<h6 class="h6" style="color: red;">${items.train_room_count}/${items.train_room_max}</h6>`}
											</strong></h6>
										</h6>
                                        ${btn_html}
								</div>
							</div>
						</section>
					</div>`
            })
        }
    })
}
setInterval(() => {
    get_program_home()
}, 15000)
get_program_home()


// function renderHtml(data) {
//     const get_test = document.getElementById('get_test');
//     const count = document.getElementById('count');
//     get_test.innerHTML = ""
//     var countdata = data.length;
//     count.innerHTML = `<h6 class="h6"> ผลการค้นหาทั้งหมด ${countdata} </h6>`
//     data.map((items, idx) => {
//         get_test.innerHTML += `
//         <div class="col-md-4 mt-3">
//             <div class="card" style="width: 18rem;">
//                 <div class="card-body">
//                     <h5 class="card-title">${items.title}</h5>
//                     <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
//                     <p class="card-text">${items.body}</p>
//                     <a href="#" class="card-link">${items.userId} </a>
//                     <a href="#" class="card-link">Another link</a>
//                 </div>
//             </div>
//     </div>
    
//     `
//     })
// }

// var list_post = [];
// async function get_program_test() {
//     const get_test = document.getElementById('get_test');
//     var url = 'https://jsonplaceholder.typicode.com/posts';
//     await $.ajax({
//         type: 'GET',
//         url: url,
//         contentType: "json",
//         error: function () {
//             {
//                 swal("ข้อมูลกลุ่มอบรมซ้ำ", {
//                     icon: "warning",
//                 })
//             }
//         },
//         success: function (res) {
//             list_post = res;
//             renderHtml(res);
//             console.log(res);

//         }

//     })
// }
// get_program_test()

// function search() {

//     const keywords = document.getElementById('search').value
//     const arrfilter = list_post.filter((items) => {
//         return items.userId == parseInt(keywords)

//     })
//     console.log(arrfilter);
//     renderHtml(arrfilter);
// }


