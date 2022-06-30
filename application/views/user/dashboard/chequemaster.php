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


<div class="table-responsive">
<table  class='dataTable1 table'>
<thead>
<tr>
<th>Sr.No</th>
<th>Citizen Name</th>
<th>Citizen mobile</th>
<th>For Tax</th>
<th>Amount</th>
<th>Status</th>
<th>Bank name</th>
<th>Cheque No</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    <?php 
    $n_zones=$this->db->get_where('n_paid',array('mode'=>2,'status'=>'Submited'))->result_array();

    $r=0; foreach($n_zones as $z) {  ?>
    <tr>
        <td><?=++$r?></td>
        <td><?=$this->db->get_where('n_citizen',array('id'=>$z['user_id']))->row()->name?></td>
        <td><?=$this->db->get_where('n_citizen',array('id'=>$z['user_id']))->row()->mobile_no?></td>
        <td><?php  if($z['table']=='n_tax_invoice_w') { echo 'Water Bill'; }
                   if($z['table']=='n_tax_invoice') { echo 'Tax  Paymnet'; }
        ?></td>
            <td>Rs. <?php echo $z['amount']; ?></td>
        <td><?php echo $z['status']; ?></td>
        <td><?php echo $z['bankname']; ?></td>
        <td><?php echo $z['chequeno']; ?></td>


        <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?=$z['id']?>">Edit</button></td>

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
       
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
       


                                     <?php echo form_open('cheque-update',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?>
									
									 <input type='hidden' value='<?=$z['id']?>' name='id'>

                                     <input type='hidden' value='<?=$z['year']?>' name='year'>
                                     <input type='hidden' value='<?=$z['user_id']?>' name='user_id'>
                                     <input type='hidden' value='<?=$z['table']?>' name='table'>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Cheque number</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required nadme='name' readonly class="form-control" value="<?=$z['chequeno']?>" />
											</div>
										</div>


                                        
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">bank name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required namde='name' readonly class="form-control" value="<?=$z['bankname']?>" />
											</div>
										</div>

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Status</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='status' required class='form-control'>
                                                    <option value=''>Select Status</option>
                                                    <option  <?php if($z['status']=='Submited') {echo 'selected';} ?> >  Submited</option>
                                                    <option  <?php if($z['status']=='Cleared') {echo 'selected';} ?> > Cleared</option>
                                                    <option  <?php if($z['status']=='Bounced') {echo 'selected';} ?> >Bounced</option>
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
