$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false},
        {targets: [5], visible: false, searchable: false}]
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
     document.getElementById("hinhanh").value=table.cell(index,5).data();
     document.getElementById("mota").value=table.cell(index,3).data();
     document.getElementById("url").value=table.cell(index,4).data();
}
