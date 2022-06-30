
  

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












<?php 
    $user=$this->db->get_where('users',array('id'=>$id))->result_array()[0];
//print_r($user[]);

?>




       
      <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Update Employee</h5>
              <hr/>
              <div class="form-body mt-4">
              <?php echo form_open('update-emp',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 
              <input name='id' type='hidden' value='<?=$id?>' ?>
              
              <div class="row">
                   <div class="col-lg-6">
                   <div class="border border-3 p-4 rounded">
                  
                   <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">First Name</label>
                        <input type="emasil" class="form-control"  name='fname' value="<?php echo $user['fname']; ?>" placeholder="Enter First Name">       <?php echo form_error('fname'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Last Name</label>
                        <input type="emsail" class="form-control"  name='lname' value="<?php echo $user['lname']; ?>"  placeholder="Enter Last Name">       <?php echo form_error('lname'); ?>
                      </div>
                      
                    <div class="mb-3">
                            <label for="inputProductType" class="form-label">Sex</label>
                            <select class="form-select" required name='sex' id="inputProductType">
                                <option  value='' >Select Sex</option>
                                <option <?php echo  set_select('sex', 'Male'); ?>  <?php  if($user['sex']=='Male') { echo  'selected';  } ?> >Male</option>
                                <option <?php echo  set_select('sex', 'Fe-Male'); ?> <?php  if($user['sex']=='Fe-Male') { echo  'selected';  } ?> >Fe-Male</option>
                                <!-- <option value="3">Three</option> -->
                              </select>
                              <?php echo form_error('sex'); ?>
                          </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name='dob' value="<?php echo $user['dob']; ?>"  placeholder="Enter">   
                            <?php echo form_error('dob'); ?>
                      </div>
                      
                      
                    </div>
                   </div>

                   <div class="col-lg-6">
                    <div class="border border-3 p-4 rounded">
                     
                      <div class="mb-3">
                            <label for="inputProductType" class="form-label">Role</label>
                            <select class="form-select"  name='role' id="inputProductType">
                                <option>Select Role</option>
                                <?php $s=select('usertype'); 
                                foreach($s as $ss){
                                ?>
                                <option value="<?=$ss['id']?>"  <?php  if($user['role']==$ss['id']) { echo  'selected';  } ?> ><?=$ss['name']?></option>
                                <?php } ?>
                                <!-- <option value="3">Three</option> -->
                              </select>
                              <?php echo form_error('role'); ?>
                          </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Salary</label>
                        <input type="number" class="form-control"  name='salary' value="<?php echo $user['salary']; ?>"  placeholder="Enter Salary">       <?php echo form_error('salary'); ?>
                      </div>
                    


                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Qulification</label>
                        <input type="text" class="form-control" name='qulification' value="<?php echo $user['qulification']; ?>"   placeholder="Enter Qulification">       <?php echo form_error('qulification'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of joining</label>
                        <input type="date" class="form-control" name='doj'  value="<?php echo $user['doj']; ?>"  placeholder="Enter">       <?php echo form_error('doj'); ?>
                      </div>
                    

                         
                      </div> 
                  </div>
                  </div>
             </div><!--end row 1-->

<hr>

             <H4>
                 Contact Details
             </H4>



                   <div class="row">
                   <div class="col-lg-6">
                   <div class="border border-3 p-4 rounded">
                  
                       <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Address</label>
                        <input type="text" class="form-control" name='address' value="<?php echo $user['address']; ?>"  placeholder="">       <?php echo form_error('address'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Phone No</label>
                        <input type="text" class="form-control" name='phone' value="<?php echo $user['phone']; ?>"   placeholder="">       <?php echo form_error('phone'); ?>
                      </div>

                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Mobile No</label>
                        <input type="text" class="form-control" name='mobile' value="<?php echo $user['mobile']; ?>"  placeholder="">       <?php echo form_error('mobile'); ?>
                      </div>


                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Email</label>
                        <input type="text" class="form-control" name='email' value="<?php echo $user['email']; ?>"   placeholder="">       <?php echo form_error('email'); ?>
                      </div>
                    </div>
                    </div>

                   <div class="col-lg-6">
                    <div class="border border-3 p-4 rounded">
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">City</label>
                        <input type="text" class="form-control" name='city' value="<?php echo $user['city']; ?>"   placeholder="Enter City">       <?php echo form_error('city'); ?>
                      </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Zip Code</label>
                        <input type="number" class="form-control" name='zipcode' value="<?php echo $user['zipcode']; ?>"  placeholder="Enter Zipcode">       <?php echo form_error('zipcode'); ?>
                      </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">State</label>
                        <input type="datse" class="form-control" name='state' value="<?php echo $user['state']; ?>"   placeholder="Enter State">      <?php echo form_error('state'); ?>
                      </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">County</label>
                        <input type="datse" class="form-control"  name='county' value="<?php echo $user['county']; ?>"  placeholder="Enter County">       <?php echo form_error('county'); ?>
                      </div>
                      </div> 
                     </div>
                    </div>
                   



<div class="row">
                   <div class="col-lg-6">
                   <hr>

<h4>Bank Detail</h4>

                   <div class="border border-3 p-4 rounded">
                  
                       <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Bank Name</label>
                        <input type="text" class="form-control" name='bankname' value="<?php echo $user['bankname']; ?>"  placeholder="">      <?php echo form_error('bankname'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Account Type</label>
                        <input type="text" class="form-control" name='acctype'  value="<?php echo $user['acctype']; ?>"  placeholder="">       <?php echo form_error('acctype'); ?>
                      </div>

                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Account Number</label>
                        <input type="text" class="form-control" name='accno' value="<?php echo $user['accno']; ?>"   placeholder="">
                        <?php echo form_error('accno'); ?>
                      </div>




                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">IFSC Code</label>
                        <input type="text" class="form-control" name='ifsc' value="<?php echo $user['ifsc']; ?>"   placeholder="">
                        <?php echo form_error('ifsc'); ?>
                      </div>


                    </div>
                    </div>

                   <div class="col-lg-6">
                       
                   <hr>
<h4>Login Detail</h4>

                    <div class="border border-3 p-4 rounded">
                    
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">EMP Code</label>
                        <input type="text" class="form-control" name='empcode' readonly value="<?php echo $user['empcode']; ?>"   placeholder="Enter empcode">
                        <?php echo form_error('empcode'); ?>
                      </div>

                    
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">UserName</label>
                        <input type="text" class="form-control" name='username' readonly value="<?php echo $user['username']; ?>"   placeholder="Enter UserName">
                        <?php echo form_error('username'); ?>
                      </div>
                  
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Password</label>
                        <input type="te" class="form-control" name='password'    placeholder="Enter Password">
                        <?php echo form_error('password'); ?>
                      </div>
                 
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Confirm Password</label>
                        <input type="te" class="form-control" name='cpassword'  placeholder="Enter Confirm Password">
                        <?php echo form_error('cpassword'); ?>
                      </div>
                 

                      </div> 
                     </div>
                    </div>
                    </div><!--end row-->



                    </div><!--end row-->


                    <div class="col-12">
									  <div class="d-grid">
                                         <button type="submit" class="btn btn-light">Save Employee</button>
									  </div>
								  </div>

             

                                  <?php echo form_close();?>



            </div>
          </div>
      </div>

</div>
<!--end page wrapper -->

<script src="<?=asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')?>"></script>
<script>
$(document).ready(function () {
    $('#image-uploadify').imageuploadify();
})
</script>
