$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false}]
    });
});

function add() {
    document.getElementById("id").value=0;
    document.getElementById("form-client").reset();
}

function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
     document.getElementById("dienthoai").value=table.cell(index,2).data();
     document.getElementById("email").value=table.cell(index,3).data();
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
