<style>
table.dataTable tbody tr {
    background-color: #014b84;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
<div class="card">
    
<div class="card-body">

<div style='float:risght;'>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add  New karyalaya</button>
</div>

<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>
<tr>
<th>Sr.No</th>
<th>karyalaya Name</th>
<th>Staus</th>
<th>Delete</th>
</tr>
</thead>

<tbody>
    <?php 
    $r=0; foreach($n_zones as $z) {  ?>
    <tr>
        <td><?=++$r?></td>
        <td><?=$z['name']?></td>
        <td><?php if($z['status']==1) { echo 'Active';}else { echo 'De-Active';} ?></td>
        <td>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?=$z['id']?>">Edit</button>
    </td>

    </tr> 
    <?php } ?>
</tbody>
</table>


<?php foreach($n_zones as $z) {  ?>


<div id="myModal<?=$z['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Edit karyalaya</h4>
      </div>
      <div class="modal-body">
       


                                     <?php echo form_open('karyalaya-update',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?>
									
									 <input type='hidden' value='<?=$z['id']?>' name='id'>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='name' class="form-control" value="<?=$z['name']?>" />
											</div>
										</div>

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Status</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='status' class='form-control'>
                                                    <option value=''>Select Status</option>

                                                    <option  value='1' <?php if($z['status']==1) {echo 'selected';} ?> > Active</option>
                                                    
                                                    <option  value='0' <?php if($z['status']==0) {echo 'selected';} ?> > De-Active</option>
                                                    
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


<?php } ?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add new karyalaya</h4>
      </div>
      <div class="modal-body">
       
      <?php echo form_open('karyalaya-add',
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
       $.noConflict();
        $('.dataTable1').DataTable({

          dom: 'Blfrtip',
    buttons: [
      {
      extend: 'pdf',
      title: '<?=time()?>',
      //exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }, {
      extend: 'excel',      title: '<?=time()?>', // exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }, {
      extend: 'csv',
      title: '<?=time()?>',//  exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }],
        //   'processing': true,
        //   'serverSide': true,
        //   'serverMethod': 'post',
        //   'ajax': {
        //      'url':'<?=base_url('zonejson')?>'
        //   },
        //   'columns': [
             
        //      { data: 'name',bSortable: false },
        //      { data: 'status',bSortable: false },
        //      { data: 'link1',bSortable: false },                                   
        //   ]
        });
     });
</script>
