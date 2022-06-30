<style>
	.form_validation_error
	{
	font-size: 10px;
    color: #e31b1b;
    background: white;
	}
	</style>
<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="<?php asset('assets/images/logo-img.png') ?>" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>have an account allready? <a href="<?php url('login') ?>">Sign up here</a>
										</p>
										<?php getalert(); ?>
									</div>
									<div class="d-grid">
									<div class="form-body">

									<?php echo form_open_multipart('join', array('autocomplete'=>'off','method'=>'post','class'=>'row g-3','id' => 'my_id')); ?>
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text"
												value="<?php echo set_value('firstname'); ?>" name='firstname' class="form-control" id="inputFirstName" placeholder="Jhon">
											    
												<?php echo form_error('firstname'); ?>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text"
												value="<?php echo set_value('lastname'); ?>"
												name='lastname' class="form-control" id="inputLastName" placeholder="Deo">
												<?php echo form_error('lastname'); ?>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" 
												value="<?php echo set_value('email'); ?>"
												name='email' class="form-control" id="inputEmailAddress" placeholder="example@user.com">
												<?php echo form_error('email'); ?>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" 
													value="<?php echo set_value('password'); ?>"
													name='password' class="form-control border-end-0" 
													id="inputChoosePassword" value="12345678" 
													placeholder="Enter Password">
													<?php echo form_error('password'); ?>
												</div>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Confirm Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" 
													value="<?php echo set_value('passconf'); ?>"
													name='passconf' class="form-control border-end-0"
													 id="inputChoosePassword" value="12345678" 
													 placeholder="Enter Password">
                                                <?php echo form_error('passconf'); ?>
												</div>
											</div>
											

											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select class="form-select" name='country' id="inputSelectCountry" aria-label="Default select example">
												 <option value=''>Please Select the Country</option>	
												<option value='91' selected>India</option>
													<option value="1">United Kingdom</option>
													<option value="2">America</option>
													<option value="3">Dubai</option>
												</select>
												 <?php echo form_error('country'); ?>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name='submit' class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
                                    </div>
									
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>