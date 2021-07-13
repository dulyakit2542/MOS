function getMonthFromString(mon){
    return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
 }
function dateThai(date) {
    var month = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let datesplit = date.split('-');
    return dateT = `${datesplit[2]} ${month[parseInt(datesplit[1])]} ${parseInt(datesplit[0]) + 543}`
}
function dateThai2(date) {
    var month = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let datesplit = date.split('/');
    return dateT = `${datesplit[1]} ${month[parseInt(datesplit[0])]} ${parseInt(datesplit[2]) + 543}`
}
function dateThaiJs(date) {
    var month = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let datesplit = date.split(' ');
    return dateT = `${datesplit[2]} ${month[getMonthFromString(datesplit[1])]} ${parseInt(datesplit[3]) + 543}, ${datesplit[4]} น.`
}
