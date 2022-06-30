<div class="pasge-wrapper">
    <hr>
			<div class="page-content">
				
				<!-- <form  method='post'>
				    
				  
				  <select name='cmonth'>
				  <option value='today'>Today only</option>
				  <option value='cw'>This Week only</option>
				     
				  <option value='cm'>Current Month</option>
				      <option value='lsm'>Last Six Month</option>
				      <option value=''>All</option>
				      
				  </select>
				    <input type='submit'>
				</form> -->
				
				<?php
				$cm=$r='';
				if($_POST)
				{
				    $r=1;
				 $cm=$this->input->post('cmonth');
				
				    
				}
				?>
				
				
				
				<?php
				
$wallet=getuser($this->session->userdata('id'))['wallet'];

if($this->session->userdata('role')==4)
{
 $this->db->select_sum('amount');
 
 if($cm=='cm')
 {
 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
 }
 if($cm=='today')
 {
	 $this->db->where('WEEK(date) =',' WEEK(now()))');
 }
 if($cm=='cw')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
 }
 
 if($cm=='lsm')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
 }


				 
 $allexpences=$this->db->get_where('expences',array('user_id'=>$this->session->userdata('id')))->result_array()[0]['amount'];

//echo $this->db->last_query();

$this->db->select_sum('amount');
if($cm=='cm')
 {
 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
 }
 if($cm=='today')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 1 DAYS )');
 }
 if($cm=='cw')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
 }
 
 if($cm=='lsm')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
 }  
				 
 $allaexpences=$this->db->get_where('expences',array('user_id'=>$this->session->userdata('id'),'staus'=>1))->result_array()[0]['amount'];

//echo $this->db->last_query();
 $this->db->select_sum('amount');
 if($cm=='cm')
 {
 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
 }
 if($cm=='today')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 1 DAYS )');
 }
 if($cm=='cw')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
 }
 
 if($cm=='lsm')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
 }  
				 
 $allpexpences=$this->db->get_where('expences',array('user_id'=>$this->session->userdata('id'),'staus'=>0))->result_array()[0]['amount'];



}


if($this->session->userdata('role')==2 OR  $this->session->userdata('role')==3)
{

$this->db->select_sum('amount'); 
if($cm=='cm')
{
$this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
}
if($cm=='today')
{
	$this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 1 DAYS )');
}
if($cm=='cw')
{
	$this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
}

if($cm=='lsm')
{
	$this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
}
				 
 $allexpences=$this->db->get('expences')->result_array()[0]['amount'];

 $this->db->select_sum('amount'); 
 
 if($cm=='cm')
 {
 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
 }
 if($cm=='today')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 1 DAYS )');
 }
 if($cm=='cw')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
 }
 
 if($cm=='lsm')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
 }
 $allaexpences=$this->db->get_where('expences',array('staus'=>1))->result_array()[0]['amount'];


 $this->db->select_sum('amount'); 
 if($cm=='cm')
 {
 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 30 DAYS )');
 }
 if($cm=='today')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 1 DAYS )');
 }
 if($cm=='cw')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 7 DAYS )');
 }
 
 if($cm=='lsm')
 {
	 $this->db->where('date <=','DATE_ADD(NOW(),INTERVAL 120 DAYS )');
 }
				 
 $allpexpences=$this->db->get_where('expences',array('staus'=>0))->result_array()[0]['amount'];

}



?>
<?php 
if($this->session->userdata('role')!=1)
{ ?> <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-12">

				<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Expences Recorded</p>
										<h4 class="my-1">Rs 
									<?=$allexpences?></h4>
									</div>
									<div class="widgets-icons ms-auto" style="background: green;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart1"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Expense Appoved</p>
                                        <h4 class="my-1">Rs 
										<?=$allaexpences?></h4>
										
									</div>
									<div class="widgets-icons ms-auto" style="background: red;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart2"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Expense Pending</p>
                                        <h4 class="my-1">Rs.<?=$allpexpences?></h4>
										
									</div>
									<div class="widgets-icons ms-auto" style="background: green;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart3"></div>
							</div>
						</div>
					</div>
                  
					
					<!-- <div class="col-lg-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Nalpatti Pending</p>
										<h4 class="my-1">Rs 45</h4>
										
									</div>
									<div class="widgets-icons ms-auto" style="background: red;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart3"></div>
							</div> 


						</div>
					</div> -->


				</div>
                <hr>

				<?php } ?>











<?php			
if($this->session->userdata('role')!=4)
{

	$this->db->where('role!=',1);
	$allexpences = $this->db->count_all_results('users');

	$this->db->where('role!=',1);
    $this->db->where('status',1);
	$allaexpences = $this->db->count_all_results('users');

	$this->db->where('role!=',1);
	$this->db->where('status',0);
	$allpexpences = $this->db->count_all_results('users');



?>





				<div class='row'>
				<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">All Users</p>
										<h4 class="my-1"><?=$allexpences?></h4>
									</div>
									<div class="widgets-icons ms-auto" style="background: green;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart1"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Active Users</p>
                                        <h4 class="my-1"> 
										<?=$allaexpences?></h4>
										
									</div>
									<div class="widgets-icons ms-auto" style="background: red;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart2"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Deactive Users</p>
                                        <h4 class="my-1"><?=$allpexpences?></h4>
										
									</div>
									<div class="widgets-icons ms-auto" style="background: green;"><i class='bx bx-wallet'></i>
									</div>
								</div>
								<div id="chart3"></div>
							</div>
						</div>
					</div>

				</div>
                <hr>

				<?php } ?>