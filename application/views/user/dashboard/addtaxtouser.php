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
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Tax Name</th>
        <th>Add New </th>
<!--         
        <th>Add Pending</th>
      -->
        <th>New Payable</th>
      </tr>
    </thead>
    <tbody>

    <?php echo form_open('citizen-tax-add',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); ?>
									<input type='hidden' name='user_id' value='<?=$user_id?>'>
									
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
        <tr>
        <td><?=$s['name']?></td>
        <td><input type='number'  name='<?=$s['invoice_id']?>_new' value='<?=$s['total']?>'  class='form-control new<?=$s['invoice_id']?>'></td>
    
        <!--<td><input type='number'  name='<?=$s['invoice_id']?>_pending' value='<?=$s['pending']?>'  class='form-control pending<?=$s['invoice_id']?>'></td>-->
        <td><input type='text'  readonly  value='<?=$s['pending']?>/<?=$s['new']?>'  class='form-control all<?=$s['invoice_id']?>'></td>
        </tr>
      <?php } ?>
      
    </tbody>
  </table>

  <div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<input type="submit"
                                                 class="btn btn-light px-4" value="Save Changes" />
											</div>
										</div>

                                        <?php echo form_close();?>
</div></div>

<?php foreach($sle as $s)
        { ?>
<script>
    // $(document).ready(function() {
    // $('.pending<?=$s['invoice_id']?>,.new<?=$s['invoice_id']?>').on('change keyup paste', function () {
 
         $(document).ready(function() {
    $('.new<?=$s['invoice_id']?>').on('change keyup paste', function () {
 
        //var pending = $(".pending<?=$s['invoice_id']?>").val();
        var newi = $(".new<?=$s['invoice_id']?>").val();
        
        // let text2 = "/";
        // let result1 = pending.concat(text2);
        // let result = result1.concat(newi);

        // var all = Number(pending)+Number(newi);
       
        
        $(".all<?=$s['invoice_id']?>").val(newi);
       // alert(all);
    });

});

//     });

// });

</script>

<?php } ?>
<script>
     $(document).ready(function() {
//     $('#tv_taken').change(function() {
//     window.location = <?=$url?>" + $(this).val();
// });


$("#tv_taken").on('change',function(){
   
  var date=$("#tv_taken").val();
//alert(date);

  window.location = "<?=$url?>"+date;

});
});
    </script>
