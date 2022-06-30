<!-- 
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script> -->

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

<style>
    td.details-control {
  cursor: pointer;
}
tr.shown td.details-control i {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

</style>
<style>
table.table tbody tr {
    background-color: #014b84;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
</style>
<h3>Manage Taxes</h3>
<div class="row">
    <table id="employees" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th></th>
        
<th>Name</th>
<!-- <th>En name</th> -->
<th>House No</th>
<th>Mobile No</th>
<th>Tax Amount (Rs.)</th>
<th>Zone</th>
<th>Add Tax</th>
<th>Receive Payment</th>
        </tr>
      </thead>
    </table>
  </div>

<script>
    

function format(d) {
  return (
    '<table class="table" cellpadding="10" cellspacing="0" border="0" style="padsding-left:50px;">' +
    '<tr class="table-primary">' +
    "<td>English Name:</td>" +
    "<td>" +
    d.en_name +
    "</td>" +
    "</tr>" +
   
    '<tr class="table-primary">' +
    "<td>House number:</td>" +
    "<td>" +
    d.house_no +
    "</td>" +
    "</tr>" +


    '<tr class="table-primary">' +
    "<td>Karyalay Name:</td>" +
    "<td>" +
    d.kname +
    "</td>" +
    "</tr>" +


    '<tr class="table-primary">' +
    "<td>Total Payable Tax (Current Year) :</td>" +
    "<td> Rs. " +
    d.totaltax +
    "</td>" +
    "</tr>" +

    
    '<tr class="table-primary">' +
    "<td>Total Payable Tax(all Previus Year) :</td>" +
    "<td> Rs. " +
    d.totaltaxp +
    "</td>" +
    "</tr>" +

   


   
    "</table>"
  );
}

$(document).ready(function() {
    $.noConflict();
  var table = $("#employees").DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
            'url':'<?=base_url('citizenjson')?>'
          },
          dom: 'Blfrtip',
    buttons: [
      {
      extend: 'pdf',
      title: '<?='TAX_'.time()?>',
      exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?='TAX_'.time()?>'
    }, {
      extend: 'excel',      title: '<?='TAX_'.time()?>',
      exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?='TAX_'.time()?>'
    }, {
      extend: 'csv',
      title: '<?='TAX_'.time()?>',exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?='TAX_'.time()?>'
    }],
    columns: [
      {
        className: "details-control",
        orderable: false,
        data: null,
        defaultContent: '<i class="material-icons">expand_more</i>'
      },
            // { data: 'srno',bSortable: false },
              { data: 'name',bSortable: false },
              //{ data: 'en_name',bSortable: false },
              { data: 'house_no',bSortable: false },
              { data: 'mobile_no',bSortable: false },
              { data: 'totaltax',bSortable: false },
              { data: 'zname',bSortable: false },
             // { data: 'property_type',bSortable: false },
           //  { data: 'link1',bSortable: false },
             { data: 'link4',bSortable: false },
             { data: 'link5',bSortable: false },      
    ],
    order: [[1, "asc"]]
  });

  $("#employees tbody").on("click", "td.details-control", function() {
    var tr = $(this).closest("tr");
    var row = table.row(tr);

    if (row.child.isShown()) {
      row.child.hide();
      tr.removeClass("shown");
    } else {
      row.child(format(row.data()), "p-0").show();
      tr.addClass("shown");
    }
  });
});

</script>
