
  

<style>
    .error
    {
        color:red;
    }
    </style>
<!--start page wrapper -->
    <div class="page-content">
 <!-------------------------------------------->

    <!------------------------->



            
              
    <div class="row">
                

                <div class="col-lg-12">
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
    <h5> All User expences list </h5>
    <hr>
    <?php
    ?>
<div class="table-responsive">
<table  class='dataTable table table-striped table-bordered'>
<thead>
<tr>
    <th>Username</th>
     <th>Type</th>
     <th>Amount</th>
     <th>attachmnet</th>
     <th>Added On </th>
     <th>Status</th>
     <th>Approve</th>
     <th>Reject</th>
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
          "order": [[ 4, "desc" ]], //or asc 

          'serverSide': true,
          'serverMethod': 'post',
          'data' : {
            'id' :<?=$id?> 
            },
          'ajax': {
             'url':'<?=base_url('getexpencesjson')?>'
          },
          'columns': [
            { data: 'username',bSortable: false }, 
            { data: 'type',bSortable: false },
             { data: 'amount',bSortable: false },
             { data: 'file' },
             { data:'edate',bSortable: false},
             { data: 'status' },
             { data: 'approve' },
             { data: 'reject' },
                                          
          ],
          'buttons': [
            'copy', 'excel', 'pdf'
        ],
        });
     });
     </script>

                   </div>
                   </div>