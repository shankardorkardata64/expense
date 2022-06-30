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

<link href="<?=asset('assets/plugins/select2/css/select2.min.css')?>" rel="stylesheet" />
	<link href="<?=asset('assets/plugins/select2/css/select2-bootstrap4.css')?>" rel="stylesheet" />
  
<div class="card">
    
<div class="card-body">

<div style='float:risght;'>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add  New Expences Category</button>
</div>

<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>
<tr>
<th>Sr.No</th>
<th>Expences Category Name</th>
<th>Staus</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    <?php 

    $role=select('usertype');
    $e=$this->db->get('expences_category')->result_array();

    $r=0; foreach($e as $z) {  ?>
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


<?php foreach($e as $z) {  ?>


<div id="myModal<?=$z['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Edit Expences Category</h4>
      </div>
      <div class="modal-body">
       


                                     <?php echo form_open('expences-category-edit',
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

                                        
                                        
                                         <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">For User type</h6>
											</div>
											<div class="col-sm-9">

                                                <select  name='type[]' class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
                                                    
<?php $zone=$this->db->get_where('usertype',array('status'=>1))->result_array();
foreach($zone as $xd){ ?>
                                                    <option  value='<?=$xd['id']?>' <?php //if($z['zone_id']==$xd['id']) {echo 'selected';} ?> > <?=$xd['name']?></option>
                         <?php } ?>                           
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
       
        <h4 class="modal-title">Add new Expences Category</h4>
      </div>
      <div class="modal-body">
       
      <?php echo form_open('expences-category-add',
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

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">For User type</h6>
											</div>
											<div class="col-sm-9">

                                                <select  name='type[]' class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
                                                    
<?php $zone=$this->db->get_where('usertype',array('status'=>1))->result_array();
foreach($zone as $xd){ ?>
                                                    <option  value='<?=$xd['id']?>' <?php //if($z['zone_id']==$xd['id']) {echo 'selected';} ?> > <?=$xd['name']?></option>
                         <?php } ?>                           
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
      exportOptions: {
                columns: [0,1,2]
            },
      title: '<?=time()?>',
      //exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }, {
      extend: 'excel',
      
      exportOptions: {
                columns: [0,1,2]
            },title: '<?=time()?>', // exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }, {
      extend: 'csv',
      
      exportOptions: {
                columns: [0,1,2]
            },
      title: '<?=time()?>',//  exportOptions: { columns: [1,2,3,4,5]},
      filename: '<?=time()?>'
    }],
        //   'processing': true,
        //   'serverSide': true,
        //   'serverMethod': 'post',
        //   'ajax': {
        //      'url':'<?=base_url('Expences Categoryjson')?>'
        //   },
        //   'columns': [
             
        //      { data: 'name',bSortable: false },
        //      { data: 'status',bSortable: false },
        //      { data: 'link1',bSortable: false },                                   
        //   ]
        });
     });
</script>

<script src="<?=asset('assets/plugins/select2/js/select2.min.js')?>"></script>
	<script>
		$('.multiple-select').select2({
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>