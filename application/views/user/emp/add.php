
  

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

















       
      <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Add New Employee</h5>
              <hr/>
              <div class="form-body mt-4">
              <?php echo form_open('save-emp',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?> 
              
              
              <div class="row">
                   <div class="col-lg-6">
                   <div class="border border-3 p-4 rounded">
                  
                   <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">First Name</label>
                        <input type="emasil" class="form-control"  name='fname' value="<?php echo set_value('fname'); ?>" placeholder="Enter First Name">       <?php echo form_error('fname'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Last Name</label>
                        <input type="emsail" class="form-control"  name='lname' value="<?php echo set_value('lname'); ?>"  placeholder="Enter Last Name">       <?php echo form_error('lname'); ?>
                      </div>
                      
                    <div class="mb-3">
                            <label for="inputProductType" class="form-label">Sex</label>
                            <select class="form-select" name='sex' id="inputProductType">
                                <option  <?php echo  set_select('sex', '', TRUE); ?> >Select Sex</option>
                                <option <?php echo  set_select('sex', 'Male'); ?> >Male</option>
                                <option <?php echo  set_select('sex', 'Fe-Male'); ?> >Fe-Male</option>
                                <!-- <option value="3">Three</option> -->
                              </select>
                              <?php echo form_error('sex'); ?>
                          </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name='dob' value="<?php echo set_value('dob'); ?>"  placeholder="Enter">   
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
                                <?php $s=select('usertype',array('status'=>1)); 
                                foreach($s as $ss){
                                ?>
                                <option value="<?=$ss['id']?>"  <?php echo  set_select('role', $ss['id']); ?> ><?=$ss['name']?></option>
                                <?php } ?>
                                <!-- <option value="3">Three</option> -->
                              </select>
                              <?php echo form_error('role'); ?>
                          </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Salary</label>
                        <input type="number" class="form-control"  name='salary' value="<?php echo set_value('salary'); ?>"  placeholder="Enter Salary">       <?php echo form_error('salary'); ?>
                      </div>
                    


                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Qulification</label>
                        <input type="text" class="form-control" name='qulification' value="<?php echo set_value('qulification'); ?>"   placeholder="Enter Qulification">       <?php echo form_error('qulification'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Date Of joining</label>
                        <input type="date" class="form-control" name='doj'  value="<?php echo set_value('doj'); ?>"  placeholder="Enter">       <?php echo form_error('doj'); ?>
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
                        <input type="text" class="form-control" name='address' value="<?php echo set_value('address'); ?>"  placeholder="">       <?php echo form_error('address'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Phone No</label>
                        <input type="text" class="form-control" name='phone' value="<?php echo set_value('phone'); ?>"   placeholder="">       <?php echo form_error('phone'); ?>
                      </div>

                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Mobile No</label>
                        <input type="text" class="form-control" name='mobile' value="<?php echo set_value('mobile'); ?>"  placeholder="">       <?php echo form_error('mobile'); ?>
                      </div>


                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Email</label>
                        <input type="text" class="form-control" name='email' value="<?php echo set_value('email'); ?>"   placeholder="">       <?php echo form_error('email'); ?>
                      </div>
                    </div>
                    </div>

                   <div class="col-lg-6">
                    <div class="border border-3 p-4 rounded">
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">City</label>
                        <input type="text" class="form-control" name='city' value="<?php echo set_value('city'); ?>"   placeholder="Enter City">       <?php echo form_error('city'); ?>
                      </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Zip Code</label>
                        <input type="number" class="form-control" name='zipcode' value="<?php echo set_value('zipcode'); ?>"  placeholder="Enter Zipcode">       <?php echo form_error('zipcode'); ?>
                      </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">State</label>
                      
                        
                   
                     
<select  id="state" class="form-control" name='state'>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>      <?php echo form_error('state'); ?>
                     
                      </div>
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">County</label>
<select id="county" name="county" class="form-control">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India" selected>India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
      <?php echo form_error('county'); ?>
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
                        <input type="text" class="form-control" name='bankname' value="<?php echo set_value('bankname'); ?>"  placeholder="">      <?php echo form_error('bankname'); ?>
                      </div>

                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Account Type</label>
                        <input type="text" class="form-control" name='acctype'  value="<?php echo set_value('acctype'); ?>"  placeholder="">       <?php echo form_error('acctype'); ?>
                      </div>

                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Account Number</label>
                        <input type="text" class="form-control" name='accno' value="<?php echo set_value('accno'); ?>"   placeholder="">
                        <?php echo form_error('accno'); ?>
                      </div>
                      
                      
                      
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">IFSC Code</label>
                        <input type="text" class="form-control" name='ifsc' value="<?php echo set_value('ifsc'); ?>"   placeholder="">
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
                        <input type="text" class="form-control" name='empcode' value="<?php echo set_value('empcode'); ?>"   placeholder="Enter empcode">
                        <?php echo form_error('empcode'); ?>
                      </div>

                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">UserName</label>
                        <input type="text" class="form-control" name='username' value="<?php echo set_value('username'); ?>"   placeholder="Enter UserName">
                        <?php echo form_error('username'); ?>
                      </div>
                  
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Password</label>
                        <input type="te" class="form-control" name='password' value="<?php echo set_value('password'); ?>"   placeholder="Enter Password">
                        <?php echo form_error('password'); ?>
                      </div>
                 
                      <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Confirm Password</label>
                        <input type="te" class="form-control" name='cpassword' value="<?php echo set_value('cpassword'); ?>"  placeholder="Enter Confirm Password">
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
