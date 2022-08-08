$(function () {

    $("#example").DataTable({

        fixedHeader: true,

        ordering: false,
        paging: false

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

      document.getElementById("name_en").value=table.cell(index,2).data();

}







