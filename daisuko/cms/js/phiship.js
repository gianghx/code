$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false,
        columnDefs: [{targets: [0], visible: false, searchable: false}]
    });
});


function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("thanhpho").value=table.cell(index,1).data();
     document.getElementById("quanhuyen").value=table.cell(index,2).data();
     document.getElementById("phiship").value=table.cell(index,3).data();
}
