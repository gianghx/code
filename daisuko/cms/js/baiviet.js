$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false},
        {targets: [4], visible: false, searchable: false},
        {targets: [5], visible: false, searchable: false},
        {targets: [6], visible: false, searchable: false},
        {targets: [7], visible: false, searchable: false},
        {targets: [8], visible: false, searchable: false},
        {targets: [9], visible: false, searchable: false},
        {targets: [11], visible: false, searchable: false},
        {targets: [12], visible: false, searchable: false},
        {targets: [13], visible: false, searchable: false}]
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function edit(index) {
    var table = $('#example').DataTable();
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("name").value=table.cell(index,2).data();
    document.getElementById("hinhanh").value=table.cell(index,6).data();
    document.getElementById("vitri").value=table.cell(index,8).data();
    document.getElementById("url").value=table.cell(index,9).data();
    document.getElementById("name_en").value=table.cell(index,11).data();
    tinymce.get("mota").setContent(table.cell(index,4).data());
    tinymce.get("motaen").setContent(table.cell(index,12).data());
    tinymce.get("noidung").setContent(table.cell(index,5).data());
    tinymce.get("noidungen").setContent(table.cell(index,13).data());
    var opt=table.cell(index,7).data();
    document.getElementById("opt"+opt).selected = "true";
}



// function edit(id) {
//     $.post('data/getrow',{id:id},function (result) {
//         if (result.success) {
//              document.getElementById("id").value=id;
//              document.getElementById("fname").value=result.data['name'];
//              document.getElementById("lname").value=result.data['name'];
//              document.getElementById("dob").value=result.data['ngay_sinh'];
//              document.getElementById("sex").value=result.data['gioi_tinh'];
//              document.getElementById("address").value=result.data['dia_chi'];
//              document.getElementById("postal").value=result.data['postal'];
//              document.getElementById("city").value=result.data['thanh_pho'];
//              document.getElementById("country").value=result.data['country'];
//              document.getElementById("email").value=result.data['email'];
//              document.getElementById("mobile").value=result.data['dien_thoai'];
//         } else {
//             alert(result.err);
//         }
//     },'json');
// }
