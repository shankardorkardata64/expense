
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">

                            <?php echo form_open('report',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 


	<div class='search'>							
  <div class='row'>
  <div class="col-lg-3">
  <?php 
  $c=date('Y');
  $cmius=date('Y')-5;
  $cmplu=date('Y')+5;
  ?>
  
  <select class="form-control ps-5 radiuss-30" name='year' placeholder='Enter Year' > 
  <option value=''>Select Year</option>
  <option value=''>All</option>
 
    <?php 
    
    for($i=$cmius;$i<=$cmplu;$i++)
    {
    ?>
 <option value="<?=$i?>"  <?php if($i==$this->session->userdata('search_year')){ echo 'Selected'; } ?>><?=$i?></option>

<?php } ?>
    </select>
    </div>
  

  <div class="col-lg-3">
  <?php 
  $expences_type=$this->db->get_where('expences_type',array('status'=>1))->result_array();
  ?>
  <select class="form-control ps-5 radiuss-30" name='type' placeholder='Enter Expences Type' > 
    <option value=''>Select Expence Type</option>
    <option value=''>All</option>

    <?php 
    
    foreach($expences_type as $e)
    {
    ?>
 <option value="<?=$e['id']?>"  <?php if($e['id']==$this->session->userdata('search_type')){ echo 'Selected'; } ?> ><?=$e['name']?></option>

<?php } ?>
    </select>
</div>
<!-- <?=$this->session->userdata('search_status')?> -->
  <div class="col-lg-3">
  <select class="form-control ps-5 radiuss-30" name='status' placeholder='Enter Expences Status' > 
  <option value=''    <?php if($this->session->userdata('search_status')=='') { echo ''; } ?> >All</option>
  <option value='0'   <?php if($this->session->userdata('search_status')==0) { echo ''; } ?>>Pending</option>
    <option value='1' <?php if($this->session->userdata('search_status')==1) { echo ''; } ?> >Accepted</option>
    <option value='2' <?php if($this->session->userdata('search_status')==2){ echo ''; } ?> >Rejected</option>
    </select>
</div>


<div class="col-lg-3">
  
<?php  $users=$this->db->get_where('users',array('status'=>1))->result_array();

?>  
<select class="form-control" name='username'>
<option value=''>All</option>
<?php foreach($users as $u)  {
  if($u['role']!=1) {
  ?>
  <option value="<?=$u['id']?>"  <?php if($u['id']==$this->session->userdata('search_username')){ echo 'Selected'; } ?> ><?=$u['username']?></option>
  
  <?php  } } ?>

</select>

 </div>

<hr>
 <div class='row'>
  <div class="col-lg-3">

  <select  class="form-control" id="myselection">
	<option value=''>Advance Search</option>
	<option value="One">None</option>
	<option value="Two"   <?php if($this->session->userdata('search_month')!=''){ echo 'Selected'; } ?> >Monthwise</option>
	<option value="Three" <?php if($this->session->userdata('search_from')!=''){ echo 'Selected'; } ?> >Between Dates</option>
</select>
  </div>

  <div class="col-lg-3 myDivs"  id="showOne" style='display:none; ' <?php if($this->session->userdata('search_month')!=''){ ?> style='display:block;'<?php  } ?> >
     <!-- <input type='' class="form-control ps-5 radius-30"  name='month' placeholder='Select Month' > -->
     
<select size="1" class="form-control" name="month">
  <option value=''>All</option>
<option <?php if(date('m')==01)  { echo 'selectged'; } ?>  value="01">January</option>
<option <?php if(date('m')==02)  { echo 'selectegd'; } ?> value="02">February</option>
<option <?php if(date('m')==03)  { echo 'selectegd'; } ?> value="03">March</option>
<option <?php if(date('m')==04)  { echo 'selectedg'; } ?> value="04">April</option>
<option <?php if(date('m')==05)  { echo 'selectedg'; } ?> value="05">May</option>
<option <?php if(date('m')==06)  { echo 'selectedg'; } ?> value="06">June</option>
<option <?php if(date('m')==07)  { echo 'selectedg'; } ?> value="07">July</option>
<option <?php if(date('m')==8)   { echo 'selectedg'; } ?> value="08">August</option>
<option <?php if(date('m')==9)   { echo 'selectedg'; } ?> value="09">September</option>
<option <?php if(date('m')==10)  { echo 'selectedg'; } ?> value="10">October</option>
<option <?php if(date('m')==11)  { echo 'selectedg'; } ?> value="11">November</option>
<option <?php if(date('m')==12)  { echo 'selectedg'; } ?>  value="12">December</option>
</select>

  </div>

  <div class="col-lg-3 myDisv" id="showTwo1" style='display:none;'  <?php if($this->session->userdata('search_from')!=''){ ?> style='display:block;'<?php  } ?> >
  <input type='date' class="form-control ps-5 radius-30" name='from' placeholder='From Date'>
  </div>  
  
  <div class="col-lg-3 myDisv" id="showTwo2" style='display:none;' <?php if($this->session->userdata('search_to')!=''){ ?> style='display:block;'<?php  } ?>>
  <input type='date' class="form-control ps-5 radius-30"  name='to' placeholder='to Date'>
  </div>

  <div class="col-lg-3 myDisv" id="showfgTwo2" style='dispfglay:none;'>
 
  
  <button type="submit" class="btn btn-light">Search record</button>
  </div>
 </div>

 </div>

</form>


 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

 
<script>
$(document).ready(function(){
    $('#myselection').on('change', function(){
    	var demovalue = $(this).val(); 
           $("#showOne").hide();
            $("#showTwo1").hide();
            $("#showTwo2").hide();      
      
        
        if(demovalue=='One')
        {  
            $("#showOne").hide();
            $("#showTwo1").hide();
            $("#showTwo2").hide();      
        }

       if(demovalue=='Two')
        {
            $("#showOne").show();           
        }

        if(demovalue=='Three')
        {
            $("#showTwo1").show();
            $("#showTwo2").show();            
        }
        
    });
});
</script> 

							</div>
						  <div class="ms-auto">
                        </div>
						</div>
						<div class="table-responsive">
                        <?php
                      //echo '<pre>'; //print_r($rec);
                        ?>
							<table class="table mb-0 dataTable1" style='dispddlay:none;'>
								<thead class="table-light">
									<tr>
										<th>Expense#</th>
										<th>Employee Name</th>
                    <th>Month</th>
                    <th>Year</th>
										<th>Expense Type</th>
                    <th>Note (if any)</th>
										<th>Amount(in INR)</th>
										<th>Type</th>

										<th>Date</th>
                    <th>Status</th>
									</tr>
								</thead>
								<tbody>
									
                                
                                <?php 
                                $ta=0;
                                
                                foreach($rec as $e) { 
                                  $ta=$ta+$e['amount'];
                                  
                                 
 $s='Pending'; $c='orange';
 if($e['staus']==1) { $s='Accepted'; $c='Green';}
 if($e['staus']==2) { $s='Rejected'; $c='red';}
 
                                  
                                  ?>
                                <tr>
										<td>
											<div class="d-flex align-items-center">
											
												<div class="ms-2">
													<h6 class="mb-0 font-14">#EX-<?=$e['id']?></h6>
												</div>
											</div>
										</td>
										<td><?=$this->db->get_where('users',array('id'=>$e['user_id']))->row()->username?>(<?php echo $this->db->get_where('usertype',array('id'=>$this->db->get_where('users',array('id'=>$e['user_id']))->row()->role))->row()->name;?>)
                  </td>
                  <td><?=date('m',strtotime($e['edate']))?></td>
                  <td><?=date('Y',strtotime($e['edate']))?></td>

                  <td>
                  <?=@$this->db->get_where('expences_type',array('id'=>$e['type']))->row()->name?>
                  </td>
								    <td><?=$e['note']?></td>
                		<td><?=$e['amount']?></td>
                   
                    <td><?=$e['wallet_type']?></td>
                    
										<td><?=$e['edate']?></td>
										<td><div class="badge rounded-pill bg-light p-2 text-uppercase px-3" style='color:<?=$c?>'><i class='bx bxs-circle me-1'>


                    </i>
                    
                  
 <?php echo $s;
 ?>                  
                  </div></td>
										
									</tr>
<?php } ?>
  </tbody>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total=INR <?=$ta?></td> <td></td><td></td><td></td>
                                </tr>
							</table>
						</div>
					</div>
				</div>


			</div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
       $.noConflict();
        $('.dataTable1').DataTable({
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[ 7, "desc" ]], //or asc 
          dom: 'Blfrtip',
          
    buttons: [
      {
      extend: 'pdf',
      title: '<?='Expenese_'.time()?>',
      filename: '<?='Expenese_'.time()?>'
    }, {
      extend: 'excel',      title: '<?='Expenese_'.time()?>',
      filename: '<?='Expenese_'.time()?>'
    }, {
      extend: 'csv',
      title: '<?='Expenese_'.time()?>',
      filename: '<?='Expenese_'.time()?>'
    }],
        });
     });
</script>
