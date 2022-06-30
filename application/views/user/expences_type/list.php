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
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add  New Expences Type</button>
</div>

<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>
<tr>
<th>Sr.No</th>
<th>Expences Type Name</th>
<th>Category</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    <?php 

    $expences_category=select('expences_category');
    $e=$expences_type;

    $r=0; foreach($e as $z) {  ?>
    <tr>
        <td><?=++$r?></td>
        <td><?=$z['name']?></td>
        <td><?=$this->db->get_where('expences_category',array('id'=>$z['cat']))->row()->name?></td>
        <td><?php if($z['status']==1) { echo 'Active';}else { echo 'De-Active';} ?></td>
        <td>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?=$z['id']?>">Edit</button>
    </td>

    </tr> 
    <?php } ?>
</tbody>
</table>


<?php foreach($e as $z) {  ?>


<div id="myModal<?=$z['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Edit Expences Type</h4>
      </div>
      <div class="modal-body">
       


                                     <?php echo form_open('expences-type-edit',
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
												<h6 class="mb-0">Expences Category</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='cat' class='form-control'>
                                                    <option value=''>Select Status</option>
  <?php foreach($expences_category as $z1){ ?>
                                                    <option  value='<?=$z1['id']?>' <?php if($z['cat']==$z1['id']) {echo 'selected';} ?> > <?=$z1['name']?></option>
                                          <?php } ?>          
                                                    
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
       
        <h4 class="modal-title">Add new Expences Type</h4>
      </div>
      <div class="modal-body">
       
      <?php echo form_open('expences-type-add',
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
												<h6 class="mb-0">Expences Category</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='cat' class='form-control'>
                                                    <option value=''>Select Status</option>
                                            <?php foreach($expences_category as $z1){ ?>
                                                   <option  value='<?=$z1['id']?>' > <?=$z1['name']?></option>
                                            <?php } ?>          
                                                    
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
          
          dom: 'Blfrtip',
    buttons: [
      {
      extend: 'pdf',
      title: '<?=time()?>',
      exportOptions: { columns: [0,1,2,3]},
      filename: '<?=time()?>'
    }, {
      extend: 'excel',      title: '<?=time()?>',  exportOptions: { columns: [0,1,2,3]},
      filename: '<?=time()?>'
    }, {
      extend: 'csv',
      title: '<?=time()?>',  exportOptions: { columns: [0,1,2,3]},
      filename: '<?=time()?>'
    }],
        //   'processing': true,
        //   'serverSide': true,
        //   'serverMethod': 'post',
        //   'ajax': {
        //      'url':'<?=base_url('Expences Typejson')?>'
        //   },
        //   'columns': [
             
        //      { data: 'name',bSortable: false },
        //      { data: 'status',bSortable: false },
        //      { data: 'link1',bSortable: false },                                   
        //   ]
        });
     });
</script>
