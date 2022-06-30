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
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add  New Tax</button>
</div>

<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>
<tr>
<th>Sr.No</th>
<th>Name</th>
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
       
        <h4 class="modal-title">Edit Tax</h4>
      </div>
      <div class="modal-body">
       


                                     <?php echo form_open('tax-update',
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
												<h6 class="mb-0">Priority</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='priority' required class='form-control'>
                                                    <option value=''>Select priority</option>
                                                    <option  value='0' <?php if($z['priority']==0) {echo 'selected';} ?> >0</option>
                                                    <option  value='1' <?php if($z['priority']==1) {echo 'selected';} ?> > 1</option>
                                                    <option  value='2' <?php if($z['priority']==2) {echo 'selected';} ?> > 2</option>
                                                    <option  value='3' <?php if($z['priority']==3) {echo 'selected';} ?> > 3</option>
                                                    <option  value='4' <?php if($z['priority']==4) {echo 'selected';} ?> > 4</option>
                                                    <option  value='5' <?php if($z['priority']==5) {echo 'selected';} ?> > 5</option>



                                                    
                                                    
                                                </select>
												
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
       
        <h4 class="modal-title">Add new Tax</h4>
      </div>
      <div class="modal-body">
       
      <?php echo form_open('tax-add',
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
												<h6 class="mb-0">Priority</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='priority' required class='form-control'>
                                                    <option value=''>Select priority</option>
                                                    <option  value='0'>0</option>
                                                    <option  value='1'> 1</option>
                                                    <option  value='2'> 2</option>
                                                    <option  value='3'> 3</option>
                                                    <option  value='4'> 4</option>
                                                    <option  value='5'> 5</option>



                                                    
                                                    
                                                </select>
												
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
