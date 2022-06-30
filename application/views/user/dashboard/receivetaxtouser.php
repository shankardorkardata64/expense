<?php

$this->db->order_by('priority','DESC');
$sle=$this->db->get_where('n_taxes',array('status'=>1,'isdeleted'=>0))->result_array();
$c=0;
foreach($sle as $s)
{
$c=$this->db->get_where('n_tax_invoice',array('tax_id'=>$s['id'],'year'=>$year,'user_id'=>$user_id))->num_rows();
if($c==0)
{
    $ins=array('user_id'=>$user_id,'tax_id'=>$s['id'],'pending'=>'0','new'=>'0','total'=>'0','year'=>$year);
    $this->db->insert('n_tax_invoice',$ins);
}
} 
$url=base_url().$this->uri->segment(1).'/'.en($user_id).'/';
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




<div class="row">
											<div class="col-sm-3">
</div>
<div class="col-sm-6">
                                            <div class="form-group">

                                            <label class="sr-only">Select Financial Year</label>
											
												           
<select id='tv_taken' class='form-control'>
<option  <?php if(en($year)==en('2021-2022')) { echo 'selected';} ?>  value='<?=en('2021-2022')?>'>2021-2022</option>
<option  <?php if(en($year)==en('2022-2023')) { echo 'selected';} ?> value='<?=en('2022-2023')?>' >2022-2023</option>
</select>
											</div> </div>
										</div>
                                        <hr>
                                        
                             

<div class="card">
<div class="card-body">
    <?php //echo en('2021-2022')?>
  
<center><h4>Current  Due Tax :- Rs. <?php echo (totaltax($user_id));?> </h4> </center>

<center><h4>Pending old  Due Tax :- Rs. <?php echo (totaltaxp($user_id));?> </h4> </center>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    <label for="staticEmail2" class="sr-only font-weight-bold">Select Mode of Payment</label>
    </div>
    <div class="col-sm">

    <form class="form-inline">
  <div class="form-group mb-6">
  
    
<select id='mode' class='form-control'>
    <option value=''>Select Please </option>
    <option value='cash'>Cash</option>
    <?php 
    if(totaltax($user_id)!=0){
    
    ?>
    <option value='cheque'>Cheque</option>
   <?php } ?>
</select>
  </div>
</form>

</div>
    <div class="col-sm">
    
    </div>
  </div>
</div>
<hr>

<script>
    
$(document).ready(function(){
    $("#mode").change(function(){
        var demovalue = $(this).val();     

if(demovalue=='cheque')
{
    $("#cheque").show();
    $("#cash").hide();
}
else if(demovalue=='cash')
{
    $("#cheque").hide();
    $("#cash").show();
}   
else
{
    $("#cheque").hide();
    $("#cash").hide();
}
});
});
</script>
<div id='cheque' style='display:none;'>

<?php echo form_open('cheque-add-tax',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); ?>
					
                    <input type='hidden' name='user_id' value='<?=$user_id?>'>
                    <input type='hidden' name='year' value='<?=$year?>'>
                    <input type='hidden' name='table' value='n_tax_invoice'>
                    <input type='hidden' name='amount' value='<?=totaltax($user_id)?>'>
  <div class="form-group">
    <label for="exampleInputEmail1">Bank Name</label>
    <input type="text" name='bankname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter bank name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Cheque No</label>
    <input name="chequeno" class="form-control" id="exampleInputPassword1" placeholder="Enter cheque Number">
  </div>
  
  <div class="form-group faorm-check">
  <label for="exampleInputEmail1">Status</label>
    <select class="form-control" name='status'>
        <option>Submited</option>
        <option>Cleared</option>
        <option>Bounced</option>
</select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- id,user_id,in_id,table,mode,amount,paymnetstatus(paid,submited,boused),date, -->

</div>

<table class="table table-bordered" style='display:none;' id='cash'>
    <thead>
      <tr>
        <th>TAX</th>
        <th>Total Amount</th>
        <th>Allready Paid</th>
        <th>Add New Amount </th>
        <th>New Pending will</th>
        <th>save</th>
      </tr>
    </thead>
    <tbody>

  
									
        <?php 

$this->db->select('n_tax_invoice.id as invoice_id,n_tax_invoice.user_id,n_tax_invoice.tax_id,n_tax_invoice.pending,n_tax_invoice.new,n_tax_invoice.total,n_taxes.name,n_taxes.priority,n_taxes.status,n_taxes.isdeleted');
$this->db->from('n_tax_invoice');
$this->db->join('n_taxes', 'n_taxes.id = n_tax_invoice.tax_id', 'left');
$this->db->where('n_taxes.isdeleted',0);
$this->db->where('n_taxes.status',1);
$this->db->where('n_tax_invoice.user_id',$user_id);
$this->db->where('n_tax_invoice.year',$year);
$sle=$records = $this->db->get()->result_array();
        foreach($sle as $s)
        {
        ?>
          <?php echo form_open('citizen-tax-update',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); ?>
									<input type='hidden' name='user_id' value='<?=$user_id?>'>
        <tr>
        <td><?=$s['name']?></td>
     
        <td><input type='number'   name='total' readonly value='<?=$s['total']?>' class='form-control total<?=$s['invoice_id']?>'></td>
        <td>
            <input type='number' readonly  name='paid' value='<?=$s['new']?>'  class='form-control pending<?=$s['invoice_id']?>'></td>
        <td><input type='number'  name='amount' min=0; max='<?=$s['pending']?>' value=''  required  class='form-control new<?=$s['invoice_id']?>'></td>
    
        <td><input type='text'  readonly    name='new'  value='<?=$s['pending']?>'  class='form-control all<?=$s['invoice_id']?>'></td>
    <td>
    <input type="submit"
                                                 class="btn btn-light px-4" value="Save Changes" />
    </td>
    
    
    </tr>
        <input type='hidden' value='<?=$s['invoice_id']?>' name='id'>
      
        <?php echo form_close();?>
        <?php } ?>
      
    </tbody>
  </table>

  <div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												
											</div>
										</div>

                                       
</div></div>

<?php foreach($sle as $s)
        { ?>
<script>
    // $(document).ready(function() {
    // $('.pending<?=$s['invoice_id']?>,.new<?=$s['invoice_id']?>').on('change keyup paste', function () {
 
         $(document).ready(function() {
    $('.new<?=$s['invoice_id']?>').on('change keyup paste', function () {
 
        //var newi = $(".new<?=$s['invoice_id']?>").val();
        var total= $(".total<?=$s['invoice_id']?>").val();
        var pending= $(".pending<?=$s['invoice_id']?>").val();
        var newi = $(".new<?=$s['invoice_id']?>").val();
         var payable=Number(total)-Number(pending)-Number(newi);
        $(".all<?=$s['invoice_id']?>").val(payable);
       
    });

});

//     });

// });

</script>

<?php } ?>

<script>
     $(document).ready(function() {
$("#tv_taken").on('change',function(){
   
  var date=$("#tv_taken").val();

  window.location = "<?=$url?>"+date;

});
});
    </script>
