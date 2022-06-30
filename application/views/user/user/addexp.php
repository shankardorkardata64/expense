
  

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
                   <div class="col-lg-4">
                 
                   <div class="border border-3 p-4 rounded">
                   <h5> Add expences </h5>
    <hr>
                   <?php echo form_open_multipart('addex',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 
              
     <div class="mb-3">
                       
                       <label for="inputProductType" class="form-label">Type</label>
                       <select required class="form-select" name='wallet_type' id="inputProductType">
                           <option  value=''  <?php echo  set_select('wallet_type', '', TRUE); ?> >Select Please</option>
                           <option <?php echo  set_select('wallet_type', 'Post-Pay'); ?>  value="Post-Pay">Post-Pay</option>
                           <option <?php echo  set_select('wallet_type', 'Pre-Pay'); ?>  value="Pre-Pay">Pre-Pay</option>
                          
                         </select>
                         <?php echo form_error('wallet_type'); ?>
                     </div>

                   <div class="mb-3">
                       
                            <label for="inputProductType" class="form-label">Select Category</label>
                            <select required class="form-select" name='type' id="inputProductType">
                                <option  value=''  <?php echo  set_select('type', '', TRUE); ?> >Select Please</option>
                              <?php foreach($expences_type as $e) { ?>
                                <option <?php echo  set_select('type', $e['tid']); ?>  value="<?=$e['tid']?>"><?=$e['name']?></option>
                                <?php } ?>
                              </select>
                              <?php echo form_error('type'); ?>
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
                        <label for="inputProductTitle" class="form-label">Attachment (if you have any) </label>
                        <input type="file" class="form-control"  name='userfile'  placeholder="select file ">       <?php echo form_error('file'); ?>
                      </div>

                    
                    
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of Expence</label>
                        <input type="date"  required class="form-control" name='edate' value="<?php echo set_value('edate'); ?>"  placeholder="Enter">   
                            <?php echo form_error('edate'); ?>
                      </div>
                      
                      
                    </div> 
                
<div class="col-12">
                  <div class="d-grid">
                     <button type="submit" class="btn btn-light">Add Expence</button>
                  </div>
              </div>


              <?php echo form_close();?>
                </div><!--end row-->


                <div class="col-lg-8">
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
    <h5> All Your expences list </h5>
    <hr>
<div class="table-responsive">
<table  class='dataTable table table-striped table-bordered'>
<thead>
<tr> <th>Pay Type</th>
     <th>ExpenseType</th>
     <th>Amount</th>
     <th>Date</th>
     <th>Status</th>
     <th>Attachmnet</th>
     <th>Edit</th>
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
          "order": [[ 3, "desc" ]], //or asc 

          'serverMethod': 'post',
          'data' : {
            'id' :<?=$id?> 
            },
          'ajax': {
             'url':'<?=base_url('getexpencesjson1')?>'
          },
          'columns': [
                   { data: 'wallet_type',bSortable: true },
             { data: 'type',bSortable: true },
             { data: 'amount',bSortable: true },
             { data:'edate',bSortable: true},
             { data: 'status' },
             { data: 'file' },
             { data: 'link2' },
                                          
          ],
          'buttons': [
            'copy', 'excel', 'pdf'
        ],
        });
     });
     </script>

                   </div>
                   </div>