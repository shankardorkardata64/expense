<!--start header -->
<style>
	.ScrollStyle
{
    max-height: 500px;
    overflow-y: scroll;
}
</style>
<?php 
$wallet=getuser($this->session->userdata('id'))['wallet'];
 ?>
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<?=$this->session->userdata('name')?> <br> Rs.<?=$wallet?>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									
								</div>
							</li>
				
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?=$this->session->userdata('name')?><br>(<?=$this->session->userdata('rolename')?>) <br> Rs.<?=$wallet?></p>
								
							</div>
						</a>
						<!-- <ul class="dropdown-menu dropdown-menu-end">-->
						<!--	<li><a class="dropdown-item" href="<?=base_url('profile')?>"><i class="bx bx-user"></i><span>Profile</span></a>-->
						<!--	</li>-->
						<!--	<li><a class="dropdown-item" href="<?=url('logout')?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>-->
						<!--	</li>-->
						<!--</ul>-->
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->