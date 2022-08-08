$(function () {
    $("#example").DataTable({
        fixedHeader: true,
        ordering: false
    });
});

function add() {
    document.getElementById("id").value=0;
    document.getElementById("form-client").reset();
    $("#danhmuccha").val(0).find("option[value=" + 0 +"]").attr('selected', true);
}

function edit(index) {
     var table = $('#example').DataTable();
     document.getElementById("id").value=table.cell(index,0).data();
     document.getElementById("name").value=table.cell(index,1).data();
     document.getElementById("name_en").value=table.cell(index,2).data();
     document.getElementById("hinhanh").value=table.cell(index,8).data();
     document.getElementById("mota").value=table.cell(index,4).data();
     document.getElementById("mota_en").value=table.cell(index,5).data();
     document.getElementById("url").value=table.cell(index,7).data();
     document.getElementById("thutu").value=table.cell(index,10).data();
     var cha = table.cell(index, 9).data();
    $("#danhmuccha").val(cha).find("option[value=" + cha + "]").attr('selected', true);
     document.getElementById(cha).classList="LC LCA";
     note(document.getElementById(cha));
}
