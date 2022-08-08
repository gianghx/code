$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false},
          {targets: [5], visible: false, searchable: false},{targets: [7], visible: false, searchable: false},{targets: [8], visible: false, searchable: false}],
        language: {
            sProcessing: "Đang xử lý...",
            sLengthMenu: "Xem _MENU_ mục",
            sZeroRecords: "Không tìm thấy dòng nào phù hợp",
            sInfo: "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            sInfoEmpty: "Đang xem 0 đến 0 trong tổng số 0 mục",
            sInfoFiltered: "(được lọc từ _MAX_ mục)",
            sInfoPostFix: "",
            sSearch: "Tìm:",
            sUrl: "",
            oPaginate: {
                sFirst: "Đầu",
                sPrevious: "Trước",
                sNext: "Tiếp",
                sLast: "Cuối",
            },
        },
        processing: true, // tiền xử lý trước
        aLengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100],
        ], // danh sách số trang trên 1 lần hiển thị bảng
    });
    $("#url").show();
    $("#baiviet").hide();
    $("#danhmuc").hide();
    $("#sanpham").hide();
    $("#loaisanpham").hide();
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value = 0;
}

function edit(index) {
    var table = $("#example").DataTable();
    // var data = table.data();
    // alert( JSON.stringify(data) );
    var cha = table.cell(index, 5).data();
    var kieu = table.cell(index, 2).data();
    var url = table.cell(index, 3).data();
    if (kieu==1) {
        $("#url").hide();
        $("#baiviet").show();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
        if (document.getElementById("bv-"+url))
            document.getElementById("bv-"+url).selected = "true";
    } else if (kieu==2) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").show();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
        if (document.getElementById("dm-"+url))
            document.getElementById("dm-"+url).selected = "true";
    } else if (kieu==3) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").show();
        $("#loaisanpham").hide();
        if (document.getElementById("sp-"+url))
          document.getElementById("sp-"+url).selected = "true";
    } else if (kieu==4) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").show();
        if (document.getElementById("lsp-"+url))
            document.getElementById("lsp-"+url).selected = "true";
    } else {
        $("#url").show();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
        document.getElementById("url").value = url;
    }
    document.getElementById("id").value = table.cell(index, 0).data();
    document.getElementById("name").value = table.cell(index, 7).data();
    document.getElementById("name_en").value = table.cell(index, 8).data();
    document.getElementById("opt"+kieu).selected = "true";
    document.getElementById("thutu").value = table.cell(index, 4).data();
    document.getElementById("sub").value = table.cell(index, 6).data();
    if (cha>0)
        document.getElementById("cha"+cha).selected = "true";
    else
        document.getElementById("cha0").selected = "true";
}

function move() {
    var opt = document.getElementById("phanloai").value;
    if(opt==1) {
        $("#url").hide();
        $("#baiviet").show();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
    } else if(opt==2) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").show();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
    } else if(opt==3) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").show();
        $("#loaisanpham").hide();
    } else if(opt==4) {
        $("#url").hide();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").show();
    } else {
        $("#url").show();
        $("#baiviet").hide();
        $("#danhmuc").hide();
        $("#sanpham").hide();
        $("#loaisanpham").hide();
    }
}
