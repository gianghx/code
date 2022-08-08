$(function () {
  $("#example").DataTable({
    stateSave: true,
    fixedHeader: true,
    ordering: false,
    lengthMenu: [10, 50, 100, 250, 500]
  });
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
       $('input[type="checkbox"]', '#example').prop('checked', false);
    } else {
     $('input[type="checkbox"]', '#example').prop('checked', true);
     }
     $(this).toggleClass('allChecked');
   });
});

function chitiet(id) {
  $("#largeModal").modal("show");
  $.get("donhang/getrow?id=" + id, function (data, status) {
    // document.getElementById("tbody").innerHTML = data;
    let table = JSON.parse(data);
    document.getElementById("madon").value = table[0].don_hang;
    document.getElementById("diachi").value = table[0].dia_chi;
    document.getElementById("khachhang").value = table[0].ten_khach;
    document.getElementById("dienthoai").value = table[0].dien_thoai;
    document.getElementById("ghichu").value = table[0].ghi_chu;
    document.getElementById("idkh").value = table[0].idkh;
    $("#tinhtrang")
    .val(table[0].tinh_trang)
    .find("option[value=" + table[0].tinh_trang + "]")
    .attr("selected", true);
  });
  // detail
  $.fn.dataTable.ext.errMode = "none";
  var table1=$("#detail").DataTable({
    fixedHeader: true,
    ordering: false,
    processing: true,
    serverSide: true,
    ajax: "donhang/getchitietdon?id="+ id
  });
  table1.ajax.url("donhang/getchitietdon?id=" + id).load();
}

function add() {
  document.getElementById("id").value = 0;
  document.getElementById("form-client").reset();
}

function edit(index) {
  var table = $("#example").DataTable();
  var id = table.cell(index, 0).data();
  document.getElementById("madon").value = table.cell(index, 2).data();
  document.getElementById("khachhang").value = table.cell(index, 3).data();
  document.getElementById("diachi").value = table.cell(index, 4).data();
  document.getElementById("dienthoai").value = table.cell(index, 9).data();
  document.getElementById("thanhtoan").value = table.cell(index, 11).data();
  document.getElementById("ghichu").value = table.cell(index, 10).data();
  $.get("views/donhangdetail.php?id=" + id, function (data, status) {
    document.getElementById("tbody").innerHTML = data;
  });
}

function xoadon(id) {
  if (confirm("Bạn có chắc chắn muốn xóa?")){
    $.ajax({
      url: BASE_URL + '/donhang/xoa?id=' + id,
      type: 'GET',
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(result) {
          var result = eval("(" + result + ")");
          if (result.success == '1') {
              alert(result.msg);
              // window.location.reload();
              window.location.href = BASE_URL + "/donhang";
          } else {
              alert(result.msg);
          }
      }
  });
  }
}

function delmulti() {
  // Khai báo tham số
  var checkbox = document.getElementsByName('all');
  var result = "";

  // Lặp qua từng checkbox để lấy giá trị
  for (var i = 0; i < checkbox.length; i++){
      if (checkbox[i].checked === true){
          result += checkbox[i].value+',';
      }
  }
  if (result=='') {
      alert('Vui lòng chọn phiên cần xóa!');
  }else{
      // alert("Sở thích là: " + result);
      // document.getElementById("giatri").value=result;
      if (confirm("Bạn có chắc chắn muốn xóa những phiên đã chọn?"))
          $.ajax({
              url: BASE_URL + '/donhang/delmulti?giatri=' + result,
              type: 'GET',
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(result) {
                  var result = eval("(" + result + ")");
                  if (result.success == '1') {
                      alert(result.msg);
                      // window.location.reload();
                      window.location.href = BASE_URL + "/donhang";
                  } else {
                      alert(result.msg);
                  }
              }
          });
      // document.getElementById("formduyet").submit();
  }
}
