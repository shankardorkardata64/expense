
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
                                    <?php echo form_open('citizen-update',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); ?>
									
									
<input type='hidden' name='id' value="<?=$users['id']?>" />
                                    <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='name'  class="form-control" value="<?=$users['name']?>" />
											</div>
										</div>

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">English Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='en_name' class="form-control" value="<?=$users['en_name']?>" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">House Number</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='house_no' class="form-control" value="<?=$users['house_no']?>" />
											</div>
										</div>


                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile Number</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='mobile_no' class="form-control" value="<?=$users['mobile_no']?>" />
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Karyalaya</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='karyalay' required class='form-control'>
                                                    <option value=''>Select</option>
 <?php 
$kk=select('n_karyalaya',array('status'=>1,'isdeleted'=>0));
foreach($kk as $k){
 ?>
                                                    <option  value='<?=$k['id']?>'  <?php 
                                                    if($k['id']==$users['karyalay']) { echo 'selected'; } ?> ><?=$k['name']?></option>
                   
                                                    <?php } ?>
                                                </select>
												
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Locality/Zone</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='zone' required class='form-control'>
                                                    <option value=''>Select</option>

                                                    <?php 
$kk=select('n_zones',array('status'=>1,'isdeleted'=>0));
foreach($kk as $k){
 ?>
                                                    <option  value='<?=$k['id']?>' <?php if($k['id']==$users['zone']){ echo 'selected'; }?> ><?=$k['name']?></option>
                   
                                                    <?php } ?>
                                                    
                                                </select>
												
											</div>
										</div>

                                       


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Property Type</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='property_type' required class='form-control'>
                                                    <option value=''>Select Type</option>

                                                    <option  value='Residential' <?php if('Residential'==$users['property_type']){ echo 'selected'; }?> > Residential</option>
                                                    
                                                    <option  value='Commercial' <?php if('Commercial'==$users['property_type']){ echo 'selected'; }?> > Commercial</option>
                                                    
                                                </select>
												
											</div>
										</div>



										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nal Connection?</h6>
											</div>
											<div class="col-sm-9">
                                                <select name='water_tax' required class='form-control'>
                                                    <option value='NULL'>No Connection Required</option>

                                                    <?php 
$kk=select('n_taxes_w',array('status'=>1,'isdeleted'=>0));
foreach($kk as $k){
 ?>
                                                    <option <?php if($k['id']==$users['water_tax']){ echo 'selected'; }?>   value='<?=$k['id']?>'><?=$k['name']?></option>
                   
                                                    <?php } ?>
                                                    
                                                </select>
												
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Pending Since</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='pending_from' class="form-control" value="<?=$users['pending_from']?>" />
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<input type="submit"
                                                 class="btn btn-light px-4" value="Save Changes" />
											</div>
										</div>

                                        <?php echo form_close();?>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>