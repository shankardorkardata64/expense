<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<!-- <img src="<?php asset('assets/images/logo-icon.png') ?>" class="logo-icon" alt="logo icon"> -->
				</div>
				<div>
					<h4 class="logo-text">Vertical Logo</h4> 
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			
			<li><a href="<?=base_url('dashboard')?>" class="has-agrrow">
			<div><i class='bx bx-home-circle'></i>
			</div>
			<div class="menu-title">Dashboard</div>
			</a>
			</li>

		  		  
		<?php 	if($this->session->userdata('role')==1)
 {    ?>
 
 
 	<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title"> Employee</div>
					</a>
					<ul>


					
					<li> <a href="<?=base_url('manage-emp')?>"><i class="bx bx-right-arrow-alt"></i>Manage All Employee</a>
						</li>

				    	<li> 
							<a href="<?=base_url('add-emp')?>"><i class="bx bx-right-arrow-alt"></i>Add New Employee</a>
						</li>
					
						
					</ul>
				</li>

			

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title"> Settings</div>
					</a>
					<ul>


					
					<li> 
					<a href="<?=base_url('manage-role')?>"><i class="bx bx-right-arrow-alt"></i>Roles</a>
					</li>

				    	<li> 
							<a href="<?=base_url('expences-category')?>"><i class="bx bx-right-arrow-alt"></i>Expences Category</a>
						</li>
					
						<li> 
							<a href="<?=base_url('expences-type')?>"><i class="bx bx-right-arrow-alt"></i>Expences Type</a>
						</li>
					
					
											<li> 
							<a href="<?=base_url('setting')?>"><i class="bx bx-right-arrow-alt"></i>System Setting</a>
						</li>
					
						
					</ul>
				</li>
		
 

 
 <?php } ?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
<?php 	if($this->session->userdata('role')!=1)
 {    ?>
			<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title"> Expences</div>
					</a>
					<ul>
                        
                        <li><a href="<?=base_url('add-ex')?>"><i class="bx bx-right-arrow-alt"></i>Add expense</a>
						</li>

		                <li><a href="<?=base_url('addprepaid')?>"><i class="bx bx-right-arrow-alt"></i><?php if($this->session->userdata('role')!=4) { ?> User <?php }else {  } ?> Pre-Pay Wallet</a>
						</li>


                        <?php  if($this->session->userdata('role')==3 OR $this->session->userdata('role')==2){   ?>
						<li> <a href="<?=base_url('action-on-ex')?>"><i class="bx bx-right-arrow-alt"></i>Manage Expences</a></li>
						<?php } ?>		
						
						
					</ul>
		   </li>
		   
		   <?php 	if($this->session->userdata('role')==3 OR $this->session->userdata('role')==2){    ?>
		   	<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title"> Report</div>
					</a>
					<ul>
					    <li><a href="<?=base_url('report')?>"><i class="bx bx-right-arrow-alt"></i>Expence Report</a></li>
                    </ul>
            </li>					    
					    
					    <?php } ?>

		   
		   
		   
		   
		   
<?php } ?>



			
				
			
				  <li><a href="<?=base_url('profile')?>" class="has-agrrow">
			<div><i class='bx bx-user'></i>
			</div>
			<div class="menu-title">Profile</div>
			</a>
			</li>
			
			
			
				<li><a href="<?=base_url('logout')?>" class="has-agrrow">
			<div><i class='bx bx-log-out-circle'></i>
			</div>
			<div class="menu-title">Logout</div>
			</a>
			</li>

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->