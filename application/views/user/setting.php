
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
						
							<div class="col-lg-6">
								<div class="card">
                                   
                                <div class="card-header">
                                    Update System Settins
</div>
									<div class="card-body">
                                    <?php echo form_open('setting',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); ?>
									
									<?php 
                                    $setting=$this->db->get_where('setting',array('type'=>'text'))->result_array();
                                    foreach($setting as $s)
                                    {
                                    ?>
                                    <input type='hidden' name='type' value='<?=$s['type']?>'>
										<div class="row mb-3">
											<div class="col-sm-3">
											<h6 class="mb-0"><?=$s['lname']?></h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name="<?=$s['name']?>" class="form-control" value="<?=$s['value']?>"/>
											</div>
										</div>
<?php  } ?>


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