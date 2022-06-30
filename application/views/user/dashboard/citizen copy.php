
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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

<div style='float:risght;'>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add  New Zone</button>
</div>


<?php

// $this->db->select('n_citizen.id as cid,n_citizen.name as cname,n_citizen.en_name,n_citizen.house_no,n_citizen.mobile_no,n_karyalaya.name as kname,n_zones.name as nname,n_citizen.property_type');
// $this->db->from('n_citizen');
// $this->db->join('n_karyalaya', 'n_karyalaya.id = n_citizen.karyalay', 'left');
// $this->db->join('n_zones', 'n_zones.id = n_citizen.zone', 'left');
// $query = $this->db->get()->result_array(); 
// print_r($query);

?>
<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>

<tr>
 <th></th> 
<th>Srno</th>
<th>Name</th>
<th>Name En</th>
<th>House No</th>
<th>Mobile No</th>
<th>Karyalaya</th>
<th>Locality</th>
<th>Type</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
</tr>

</thead>
</table>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add new Zone</h4>
      </div>
      <div class="modal-body">
       
      <?php echo form_open('citizen-add',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?>
									
									
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='name' class="form-control" value="" />
											</div>
										</div>

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Status</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='status' required class='form-control'>
                                                    <option value=''>Select Status</option>

                                                    <option  value='1'> Active</option>
                                                    
                                                    <option  value='0'  > De-Active</option>
                                                    
                                                </select>
												
											</div>
										</div>

                                        


										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<input type="submit"
                                                 class="btn btn-info px-4" value="Save Changes" />
											</div>
										</div>

                                        <?php echo form_close();?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>

</div>
  <script type="text/javascript">
  $(document).ready(function(){
       $.noConflict();
        $('.dataTable1').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url('citizenjson')?>'
          },
          'columns': [
             {
                "className":      'dt-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
             },
             { data: 'srno',bSortable: false },
             { data: 'name',bSortable: false },
             { data: 'en_name',bSortable: false },
             { data: 'house_no',bSortable: false },
             { data: 'mobile_no',bSortable: false },
             { data: 'kname',bSortable: false },
             { data: 'zname',bSortable: false },
             { data: 'property_type',bSortable: false },
             { data: 'link1',bSortable: false },
             { data: 'link2',bSortable: false },
             { data: 'link3',bSortable: false },                                   
          ]
        });
     });


     function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.en_name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$('.dataTable1 tbody').on('click', 'td.dt-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown()) 
        {
            row.child.hide();
            tr.removeClass('shown');
        }
        else 
        {
            row.child( format(row.data()),"p-0" ).show();
            tr.addClass('shown');
        }
    } );
</script>