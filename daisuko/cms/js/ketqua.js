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

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function xoadon(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?"))
        $.ajax({
            url: BASE_URL + '/ketqua/del?id='+id,
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
                    window.location.href = BASE_URL + "/ketqua";
                } else {
                    alert(result.msg);
                }
            }
        });
}

function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
     document.getElementById("hinhanh").value=table.cell(index,3).data();
     document.getElementById("mota").value=table.cell(index,4).data();
     document.getElementById("vitri").value=table.cell(index,5).data();
}

function renew() {
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
        alert('Vui lòng chọn phiên cần làm mới!');
    }else{
        // alert("Sở thích là: " + result);
        // document.getElementById("giatri").value=result;
        if (confirm("Bạn có chắc chắn muốn làm mới những phiên đã chọn?"))
            // window.location.href = 'ketqua/renew?giatri=' + result;
            $.ajax({
                url: BASE_URL + '/ketqua/renew?giatri=' + result,
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
            // window.location.href = 'ketqua/renew?giatri=' + result;
            $.ajax({
                url: BASE_URL + '/ketqua/delmulti?giatri=' + result,
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
                        window.location.href = BASE_URL + "/ketqua";
                    } else {
                        alert(result.msg);
                    }
                }
            });
        // document.getElementById("formduyet").submit();
    }
}

function edit(id){
    $.post(
        BASE_URL + '/ketqua/edit', {
            id: id,
        },
        function(data) {
            document.getElementById("content_result").innerHTML=data;
        }
    );
}
