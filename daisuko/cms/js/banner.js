$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}


function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
     document.getElementById("hinhanh").value=table.cell(index,3).data();
     document.getElementById("mota").value=table.cell(index,4).data();
     document.getElementById("vitri").value=table.cell(index,5).data();
     document.getElementById("link").value=table.cell(index,6).data();
}
