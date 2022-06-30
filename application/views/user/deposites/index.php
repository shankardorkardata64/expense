<style>
table.dataTable tbody tr {
    background-color: #014b84;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
</style>
<div class="card">
<div class="card-body">

<div class="table-responsive">
<table  class='dataTable table table-striped table-bordered'>
<thead>
<tr>
    <th>Address-ID</th>
    <th>Address</th>
    <!-- <th>For Amount</th> -->
    <th>Buyer Email</th>
    <th>Date</th>
    
    <th>View Transactions</th>
    </tr>
</thead>
</table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

  <!-- Script -->
  <script type="text/javascript">


  
     $(document).ready(function(){
       $.noConflict();
        $('.dataTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url('depositejson')?>'
          },
          'columns': [
             { data: 'tranaction_id',bSortable: false },
             { data: 'address',bSortable: false },
             { data: 'buyer_email',bSortable: false },
             { data: 'date',bSortable: false },
             { data: 'link1',bSortable: false },                                   
          ]
        });
     });
     </script>
