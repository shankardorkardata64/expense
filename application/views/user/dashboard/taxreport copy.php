

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
<div class="row">
    <table id="employees" class="table table-striped" style="width:100%">
      <thead>
        <tr>
<th>Sr</th>
<th>Name</th>
<th>En Name</th>
<th>House No</th>
<th>Mobile</th>
<th>Tax</th>
<th>amount</th>
<th>Year</th>

        </tr>
      </thead>
    </table>
  </div>

<script>
    

$(document).ready(function() {
    $.noConflict();
  var table = $("#employees").DataTable({
          'processing': true,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
            'url':'<?=base_url('taxreportjson')?>'
          },
    buttons: [{
      extend: 'pdf',
      title: 'Customized PDF Title',
      filename: 'customized_pdf_file_name'
    }, {
      extend: 'excel',
      title: 'Customized EXCEL Title',
      filename: 'customized_excel_file_name'
    }, {
      extend: 'csv',
      filename: 'customized_csv_file_name'
    }],
             columns: [
             { data: 'srno',bSortable: false },
             { data: 'name',bSortable: false },
             { data: 'en_name',bSortable: false },
             { data: 'house_no',bSortable: false },
             { data: 'mobile_no',bSortable: false },
             { data: 'tax',bSortable: false },
             { data: 'amount',bSortable: false },
             { data: 'year',bSortable: false },
           
               
    ],
    order: [[1, "asc"]]
  });

});

</script>