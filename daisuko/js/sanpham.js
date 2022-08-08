$(function () {
    $("#example").DataTable({
        "fixedHeader": true,
        "ajax": "sanpham/datatable",
        "paging": true,
        "searching": true,
        "ordering": false,
        columns: [
            { data: "stt" },
            { data: "ma_sp"},
            { data: "name","width": "20%"  },
            { data: "hinhanh"},
            { data: "gianiemyet"},
            { data: "giaban" },
            { data: "nhanvien" },
            { data: "action" },
          ],
    });
});

// $(function () {
//     $("#example").DataTable({
//         stateSave: true,
//         fixedHeader: true,
//         ordering: false,
//         "processing": true,
//         "serverSide": true,
//         "ajax": "sanpham/getdata",
//         columnDefs: [{targets: [1], visible: false, searchable: false},
//         {targets: [7], visible: false, searchable: false},
//         {targets: [8], visible: false, searchable: false},
//         {targets: [9], visible: false, searchable: false},
//         {targets: [10], visible: false, searchable: false},
//         {targets: [11], visible: false, searchable: false},
//         {targets: [12], visible: false, searchable: false},
//         {targets: [14], visible: false, searchable: false},
//         {targets: [15], visible: false, searchable: false},
//         {targets: [16], visible: false, searchable: false},
//         {targets: [17], visible: false, searchable: false},
//         {targets: [18], visible: false, searchable: false},
//         {targets: [19], visible: false, searchable: false},
//         {targets: [20], visible: false, searchable: false},
//         {targets: [21], visible: false, searchable: false},
//         {targets: [23], visible: false, searchable: false}]
//     });
// });

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function nsx(){
    alert();
    document.querySelector(".nsx").selectedIndex=10;
}


function edit(index) {

    var table = $('#example').DataTable();
    console.log(table.row(index).data());
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("masp").value=table.cell(index,1).data();
    document.getElementById("name").value=table.cell(index,2).data();
    document.getElementById("hinhanh0").value=table.cell(index,10).data();
    $('#image0').attr('src',table.cell(index,10).data());
    document.getElementById("hinhanh1").value=table.cell(index,14).data();
    $('#image1').attr('src',table.cell(index,14).data());
    document.getElementById("hinhanh2").value=table.cell(index,15).data();
    $('#image2').attr('src',table.cell(index,15).data());
    document.getElementById("hinhanh3").value=table.cell(index,16).data();
    $('#image3').attr('src',table.cell(index,16).data());
    document.getElementById("gianiemyet").value=Comma(table.cell(index,4).data());
    document.getElementById("giaban").value=Comma(table.cell(index,5).data());
    document.getElementById("vitri").value=table.cell(index,12).data();
    document.getElementById("url").value=table.cell(index,13).data();
    document.getElementById("name_en").value=table.cell(index,19).data();
    tinymce.get("mota").setContent(table.cell(index,6).data());
    tinymce.get("motaen").setContent(table.cell(index,17).data());
    tinymce.get("thanhphan").setContent(table.cell(index,7).data());
    tinymce.get("noidungen").setContent(table.cell(index,18).data());
    var opt=table.cell(index,11).data();
    var opt1=table.cell(index,20).data();
    var banchay=table.cell(index,22).data();
    if (banchay==1)
        document.getElementById("banchay").checked = true;
    else
        document.getElementById("banchay").checked = false;

    $("#danhmuc").val(opt).find("option[value=" + opt +"]").attr('selected', true);
    $("#nhasx").val(opt).find("option[value=" + opt1 +"]").attr('selected', true);
    // document.getElementById("opt"+opt).selected = "true";

}

function uploadFile(i){
    var myform = new FormData($('#form-client')[0]);
    $.ajax({
        url: "sanpham/thayanh?index="+i,
        type: 'post',
        data: myform,
        contentType: false,
        processData: false,
        success: function(data){
            var result = JSON.parse(data)
            if (result.success) {
               console.log(result.file);
               $('#image'+i).attr('src', HOME_URL+'/uploads/sanpham/'+result.file);
               $('#hinhanh'+i).val(HOME_URL+'/uploads/sanpham/'+result.file);
            }
            else {
              // $('#msg').html(result.msg);
              // $('#thongbao').modal('show');
              alert (result.msg);
            }
        },
    },'json');
}
