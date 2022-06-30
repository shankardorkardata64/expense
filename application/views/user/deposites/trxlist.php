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
    <h5> All Transactions related to adddress <?=$request['coin']?> : <?=$request['address']?> </h5>
    <hr>
<div class="table-responsive">
<table  class='dataTable table table-striped table-bordered'>
<thead>
<tr>
    <th>cbtrxid</th>
     <th>Address</th>
     
     <th>From Address</th>
    <th>Amount</th>
    
    <th>Hash</th>
    <th>status</th>
    <th>IPN Recived</th>
    <th>View Transactions</th> 
    </tr>
</thead>
</table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<?php 
$id=3;
?>
  <!-- Script -->
  <script type="text/javascript">


  
     $(document).ready(function(){
       $.noConflict();
        $('.dataTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'data' : {
            'id' :<?=$id?> 
            },
          'ajax': {
             'url':'<?=base_url('trxjson')?>'
          },
          'columns': [
             { data: 'cbtrxid',bSortable: false },
             { data: 'address',bSortable: false },
             { data:'from_address',bSortable: false},
             { data: 'amount' },
             { data: 'hash',bSortable: false },
             {data:'status',bSortable: false},
             { data: 'date' },
             { data: 'link1',bSortable: false },                                   
          ],
          'buttons': [
            'copy', 'excel', 'pdf'
        ],
        });
     });
     </script>
