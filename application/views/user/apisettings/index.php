
   <div class='row'>

<?php
	$selectnum=count($api_keys);

?>

<?php if($selectnum!=0) { ?>
   <div class='col-md-9'>

   
                 <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example"
                             class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sr.No</th>
										<th>Tag</th>
                                        
                                        <th>Public Key</th>
										<th>Private Key</th>
                                        
										<th>Added On</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
                                    <?php $i=0; foreach($api_keys as $k){?>
									<tr>
										<td><?=++$i?></td>
                                        <td><?=$k['tag']?></td>
                                        <td><?=$k['public_key']?></td>
										<td><?=$k['private_key']?></td>
										<td><?=$k['date']?></td>
										<td><?=$k['status']==1?'Active':'Deactive';?></td>
										

									</tr>
                                    <?php } ?>
									
								</tbody>
								<tfoot>
									<tr>
										<th>Sr.No</th>
                                        <th>Tag</th>
										<th>Public Key</th>
										<th>Private Key</th>
										<th>Date</th>
										<th>Status</th>
										
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
                    </div>
</div>
<?php } ?>
<div class='col-md-3'>
<a href='<?=base_url('create-api-keys')?>' class='btn btn-info'>Create New Api Keys</a>
</div>

   
   </div>


   <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>

	