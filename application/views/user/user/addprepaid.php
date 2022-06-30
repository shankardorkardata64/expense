
  

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

    <?php
$role=$this->session->userdata('role');
if($role==3){
?>
                   <div class="col-lg-4">
                 
                   <div class="border border-3 p-4 rounded">
                   <h5> Add  Pre-Pay  Wallet Balance </h5>
    <hr>
                   <?php echo form_open_multipart('addprepaid',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 
              
  
                   <div class="mb-3">
                       
                            <label for="inputProductType" class="form-label">Select User</label>
                            <select required class="form-select" name='userid' id="inputProductType">
                                <option  value=''  <?php echo  set_select('userid', '', TRUE); ?> >Select User</option>
                              <?php foreach($users as $e) { ?>
                                <option <?php echo  set_select('userid', $e['id']); ?>  value="<?=$e['id']?>"><?=$e['username']?></option>
                                <?php } ?>
                              </select>
                              <?php echo form_error('userid'); ?>
                          </div>


                   <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Amount</label>
                        <input type="number" required  class="form-control"  name='amount' value="<?php echo set_value('amount'); ?>" placeholder="Enter Amount">       <?php echo form_error('amount'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Note if any</label>
                        <input type="emsail"  class="form-control"  name='note' value="<?php echo set_value('note'); ?>"  placeholder="Note if any">       <?php echo form_error('note'); ?>
                      </div>
                    
                    
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of Expence</label>
                        <input type="date"  required class="form-control" name='edate' value="<?php echo set_value('edate'); ?>"  placeholder="Enter">   
                            <?php echo form_error('edate'); ?>
                      </div>
                      
                      
                    </div> 
                
<div class="col-12">
                  <div class="d-grid">
                     <button type="submit" class="btn btn-light">Add Pre-Pay  balance</button>
                  </div>
              </div>


              <?php echo form_close();?>
                </div><!--end row-->

<?php } ?>

<?php if($role==3)
{ ?>
                <div class="col-lg-8">
<?php } else { ?>
    <div class="col-lg-12">
<?php } ?>
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
    <h5> Pre-Pay  Wallet Logs </h5>
    <hr>
<div class="table-responsive">
<table  class='dataTable table table-striped table-bordered'>
<thead>
<tr>
     <th>User</th>
     <th>Old Amount</th>
     <th>Action</th>
     <th>Amount</th>
     <th>New Amount</th>
     <th>Note</th>
     <th>Added By</th>
     <th>Date</th>
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
          "order": [[ 2, "desc" ]], //or asc 

          'serverMethod': 'post',
          'data' : {
            'id' :<?=$id?> 
            },
          'ajax': {
             'url':'<?=base_url('getwalletlogjson')?>'
          },
          'columns': [
            { data: 'name',bSortable: true },
             { data: 'before_amount',bSortable: true },
             { data: 'action',bSortable: true },
             { data: 'amount',bSortable: true },
             { data: 'new_amount',bSortable: true },
             {data:'note'},
             {data:'added_by'},
             {data:'date'} 
                                          
          ],
          'buttons': [
            'copy', 'excel', 'pdf'
        ],
        });
     });
     </script>

                   </div>
                   </div>