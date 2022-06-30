
	<link href="<?=asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')?>" rel="stylesheet" />

    
  

<style>
    .error
    {
        color:red;
    }
    </style>
<!--start page wrapper -->
    <div class="page-content">
 <!-------------------------------------------->


 <link href="<?=asset('assets/plugins/select2/css/select2.min.css')?>" rel="stylesheet" />
	<link href="<?=asset('assets/plugins/select2/css/select2-bootstrap4.css')?>" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style>
table.dataTable tbody tr {
    background-color: #014b84;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
.odd
{
    background-color: #014b84 !important;
    
}
table.dataTable tbody tr td a
{
    color: #fff;
} 
</style>

   







       
      <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Add New Employee</h5>
              <hr/>
              <div class="form-body mt-4">
            
 <table id="users"  style='displsay:none' class="table table-striped" style="width:100%">
      <thead>
        <tr>
<th>Employee ID</th>
<th>Name</th>
<th>User Name</th>
<th>status</th>
<th>Role</th>
<th>Edit</th>
<th>Activate/Deactivate</th>
<th>Delete</th>
        </tr>
      </thead>
      </table>



            </div>
          </div>
      </div>

</div>
<!--end page wrapper -->



<script>
    

    $(document).ready(function() {
        $.noConflict();
      var table = $("#users").DataTable({
              'processing': true,
              "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
              'serverSide': true,
              'serverMethod': 'post',
              'ajax': {
                'url':'<?=base_url('usersjson')?>'
              }, 
        dom: 'Blfrtip',
        buttons: [
          {
          extend: 'pdf',
           exportOptions: {
                columns: [0,1,2,3,4]
            },
          title: '<?='EMP_'.time()?>',
          filename: '<?='EMP_'.time()?>'
        }, {
          extend: 'excel',     
          exportOptions: {
                columns: [0,1,2,3,4]
            },
          title: '<?='EMP_'.time()?>',
          filename: '<?='EMP_'.time()?>'
        }, {
          extend: 'csv',
          exportOptions: {
                columns: [0,1,2,3,4]
            },
          title: '<?='EMP_'.time()?>',
          filename: '<?='EMP_'.time()?>'
        }],
                 columns: [
                 { data: 'srno',bSortable: false },
                 { data: 'fname',bSortable: false },
                 { data: 'username',bSortable: false },
                 { data: 'status',bSortable: false },
                 { data: 'role',bSortable: false },
                 { data: 'link1',bSortable: false },
                 { data: 'link2',bSortable: false },
                     { data: 'link3',bSortable: false },
                
                   
        ],
        order: [[1, "asc"]]
      });
    
    });
    
    </script>
    
    
        <!------------------------->
    
    
    
    
    
    
    
    
    
    
<script src="<?=asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')?>"></script>
<script>
$(document).ready(function () {
    $('#image-uploadify').imageuploadify();
})
</script>
