
  

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
    <div class="col-lg-2">
                 
</div>
                   <div class="col-lg-4">
                 
                   <div class="border border-3 p-4 rounded">
                

    <?php
if($action=='edit')
{
    $s=$a='';
    $hea='Edit expences';

}
else
{
    $a='readonly';
    $s='disabled="true"';
    $hea='Reject expences';
} ?>


<h5> <?=$hea?> </h5>
    <hr>
                   <?php echo form_open_multipart('edit-reject',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 
              
  
                   <div class="mb-3">
                            <label for="inputProductType" class="form-label">Select Category</label>
                            <select  required <?=$a?>  <?=$s?> class="form-select" name='type' id="inputProductType">
                                <option  <?php echo  set_select('type', '', TRUE); ?> >Select Please</option>
                              <?php foreach($expences_type as $e) { ?>
                                <option <?php echo  set_select('type', $e['tid']); ?>  <?php if($ex[0]['type']==$e['tid']){ echo 'selected';} ?> value="<?=$e['tid']?>"><?=$e['name']?></option>
                                <?php } ?>
                              </select>
                              <?php echo form_error('type'); ?>
                          </div>


                   <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Amount</label>
                        <input <?=$a?> type="number" class="form-control"  name='amount' value="<?php echo $ex[0]['amount']; ?>" placeholder="Enter Amount">       <?php echo form_error('amount'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Note if any</label>
                        <input <?=$a?> type="emsail" class="form-control"  name='note' value="<?php echo $ex[0]['note']; ?>" value="<?php echo set_value('note'); ?>"  placeholder="Note if any">       <?php echo form_error('note'); ?>
                      </div>
                    


                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Attachment (if you have any) </label>
                        <input type="file" class="form-control"  name='userfile'  placeholder="select file ">       <?php echo form_error('file'); ?>
                      </div>

                    

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of Expence</label>
                        <input <?=$a?> type="date" class="form-control" name='edate' value="<?php echo $ex[0]['edate']; ?>"  placeholder="Enter">   
                            <?php echo form_error('edate'); ?>
                      </div>
                      
                      <input type='hidden' name='id'  value="<?php echo $ex[0]['id']; ?>"> 
                      
                    </div> 
                    <?php
                      if($action=='reject')
{?>

<input type='hidden' name='staus'  value="2"> 
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Reject Note if any</label>
                        <input  type="emsail" class="form-control"  name='rejectnote'  required  placeholder="Reject Note if any ">       <?php echo form_error('note'); ?>
                      </div>
                      <?php } ?>
                 
   <?php
                      if($action=='edit')
{?>
                 
                    <div class="col-12">
                  <div class="d-grid">
                     <button type="submit" class="btn btn-light">Edit Expence</button>
                  </div>
              </div>
<?php } else {?>

    <div class="col-12">
                  <div class="d-grid">
                     <button type="submit" class="btn btn-light">Reject  Expence</button>
                  </div>
              </div>
<?php } ?>
              <?php echo form_close();?>
                </div><!--end row-->


               
                
  <!-- Script -->
  <script type="text/javascript">


  
     $(document).ready(function(){
       $.noConflict();
        $('.dataTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'data' : {
            'id' :<?=$id?> 
            },
          'ajax': {
             'url':'<?=base_url('getexpencesjson')?>'
          },
          'columns': [
             { data: 'type',bSortable: false },
             { data: 'amount',bSortable: false },
             { data:'edate',bSortable: false},
             { data: 'status' },
                                          
          ],
          'buttons': [
            'copy', 'excel', 'pdf'
        ],
        });
     });
     </script>

                   </div>
                   </div>