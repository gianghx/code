// $(function() { alert()
//     // var table = $('#bootstrap-data-table-export').DataTable();
//     // $('#bootstrap-data-table-export tbody').on( 'click', 'tr', function () { alert()
//     // //console.log( table.row( this ).data() );
//     // });
// });

function add() {
    document.getElementById("form-client").reset();
    document.getElementById("id").value=0;
}

function edit(index) {
    var table = $('#bootstrap-data-table-export').DataTable();
    // alert( table.row(0).data() );
    document.getElementById("id").value=table.cell(index,0).data();
    document.getElementById("name").value=table.cell(index,1).data();
    document.getElementById("value").value=table.cell(index,2).data();
    document.getElementById("kieu").value=table.cell(index,3).data();
    document.getElementById("tinhtrang").value=table.cell(index,4).data();
}
