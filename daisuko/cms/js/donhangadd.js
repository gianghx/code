$(function () {
    $("#detail").DataTable({
        paging: false,
        searching: false,
        ordering: false,
        bInfo : false,
        columnDefs: [{targets: [0], visible: false, searchable: false},
          {targets: [2], className: 'dt-right'}]
    });
});

function add(id,gia,name) {
    document.getElementById("form-client").reset();
    document.getElementById("tenhang").value=name;
    document.getElementById("dongia").value=Comma(gia);
    document.getElementById("id").value=id;
}

function addrow() {
    var table = $('#detail').DataTable();
    var id = document.getElementById("id").value;
    var tenhang = document.getElementById("tenhang").value;
    var dongia = document.getElementById("dongia").value;
    var soluong = document.getElementById("soluong").value;
    var chietkhau = document.getElementById("chietkhau").value;
    var chietkhaupt = document.getElementById("chietkhaupt").value;
    dongia=dongia.replace(/,/g, '');
    chietkhau=chietkhau.replace(/,/g, '');
    var thanhtien = (dongia-chietkhau)*(1-chietkhaupt/100)*soluong;
    thanhtien = Math.round(thanhtien);
    var tong=document.getElementById("tong").innerHTML;
    tong = tong.replace(/,/g, '');
    tong = parseInt(tong)+parseInt(thanhtien);
    table.row.add([id,tenhang,soluong,Comma(dongia),Comma(chietkhau),chietkhaupt,Comma(thanhtien)]).draw(false);
    document.getElementById("tong").innerHTML = Comma(tong);
}

function save() {
    var khachhang = document.getElementById("khachhang").value;
    var nhanvien = document.getElementById("nhanvien").value;
    var quanhuyen = document.getElementById("quanhuyen").value;
    if(khachhang==0 || nhanvien==0 || quanhuyen==0)
        alert('Bạn cần nhập đầy đủ thông tin khách hàng, người phụ trách và quận huyện')
    else {
        var diachi = document.getElementById("diachi").value;
        var sotien = document.getElementById("tong").innerHTML;
        var phiship = document.getElementById("ship").innerHTML;
        var table = $('#detail').DataTable();
        var data = table.rows().data();
        var i;
        var x={};
        for (i = 0; i < data.length; i++)
            x[i] = data[i];
        var jsondata = JSON.stringify(x);
        $.post('donhangadd/save',{data:jsondata,khachhang:khachhang,nhanvien:nhanvien,sotien:sotien,diachi:diachi,phiship:phiship},
        function (result) {
            if (result.success) {
                window.location.href = 'donhang';
            } else {
                alert(result.msg);
            }
        },'json');
    }
}

function quanhuyen(id) {
    $.get("donhangadd/quanhuyen?id="+id, function(data, status){
        document.getElementById("qh").innerHTML=data;
    });
}

function diachi(id) {
    $.get("donhangadd/diachi?id="+id, function(data, status){
        document.getElementById("diachi").value=data;
    });
}

function phiship(value) {
     document.getElementById("ship").innerHTML=Comma(value);
}
