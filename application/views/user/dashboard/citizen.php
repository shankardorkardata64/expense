
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<style>
    td.details-control {
  cursor: pointer;
}
tr.shown td.details-control i {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

</style>
<style>
table.table tbody tr {
    background-color: #014b84;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
</style>  
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add new Citizen</button>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Add new Citizen</h4>
      </div>
      <div class="modal-body">
     

      <?php echo form_open('citizen-add',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?>
									
									
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='name' class="form-control" value="" />
											</div>
										</div>

                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">English Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='en_name' class="form-control" value="" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">House Number</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='house_no' class="form-control" value="" />
											</div>
										</div>


                                        
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile Number</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='mobile_no' class="form-control" value="" />
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
                                                    <option  value='<?=$k['id']?>'><?=$k['name']?></option>
                   
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
                                                    <option  value='<?=$k['id']?>'><?=$k['name']?></option>
                   
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

                                                    <option  value='Residential'> Residential</option>
                                                    
                                                    <option  value='Commercial'> Commercial</option>
                                                    
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
                                                    <option  value='<?=$k['id']?>'><?=$k['name']?></option>
                   
                                                    <?php } ?>
                                                    
                                                </select>
												
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Pending Since</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" required name='pending_from' class="form-control" value="" />
											</div>
										</div>


										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<input type="submit"
                                                 class="btn btn-info px-4" value="Save Changes" />
											</div>
										</div>

                                        <?php echo form_close();?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="row">
    <table id="employees" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th></th>
        
<th>Name</th>
<th>house_no</th>
<th>Mobile</th>
<th>Karyalay</th>
<th>Zone</th>
<th>Property Type</th>
<th>Edit</th>
<th>Delete</th>
        </tr>
      </thead>
    </table>
  </div>

<script>
    

function format(d) {
  return (
    '<table class="table" cellpadding="10" cellspacing="0" border="0" style="padsding-left:50px;">' +
    '<tr class="table-primary">' +
    "<td>English Name:</td>" +
    "<td>" +
    d.name +
    "</td>" +
    "</tr>" +
   
    '<tr class="table-primary">' +
    "<td>House number:</td>" +
    "<td>" +
    d.house_no +
    "</td>" +
    "</tr>" +


    '<tr class="table-primary">' +
    "<td>Mobile number:</td>" +
    "<td>" +
    d.mobile_no +
    "</td>" +
    "</tr>" +


    '<tr class="table-primary">' +
    "<td>Kshetriy Karyalaya:</td>" +
    "<td>" +
    d.kname +
    "</td>" +
    "</tr>" +


    '<tr class="table-primary">' +
    "<td>Locality:</td>" +
    "<td>" +
    d.zname +
    "</td>" +
    "</tr>" +

    '<tr class="table-primary">' +
    "<td>Type:</td>" +
    "<td>" +
    d.property_type +
    "</td>" +
    "</tr>" +
   


   
    "</table>"
  );
}

$(document).ready(function() {
    $.noConflict();
  var table = $("#employees").DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
            'url':'<?=base_url('citizenjson')?>'
          },
          dom: 'Blfrtip',
    buttons: [
      {
      extend: 'pdf',
      title: '<?='Citizen_'.time()?>',
      exportOptions: { columns: [1,2,3,4,5,6]},
      filename: '<?='Citizen_'.time()?>'
    }, {
      extend: 'excel',      title: '<?='Citizen_'.time()?>',  exportOptions: { columns: [1,2,3,4,5,6]},
      filename: '<?='Citizen_'.time()?>'
    }, {
      extend: 'csv',
      title: '<?='Citizen_'.time()?>',  exportOptions: { columns: [1,2,3,4,5,6]},
      filename: '<?='Citizen_'.time()?>'
    }],
    columns: [
      {
        className: "details-control",
        orderable: false,
        data: null,
        defaultContent: '<i class="material-icons">expand_more</i>'
      },

  
            // { data: 'srno',bSortable: false },
             { data: 'name',bSortable: false },
            //  { data: 'en_name',bSortable: false },
              { data: 'house_no',bSortable: false },
              { data: 'mobile_no',bSortable: false },
             { data: 'kname',bSortable: false },
             { data: 'zname',bSortable: false },
              { data: 'property_type',bSortable: false },
            // { data: 'link1',bSortable: false },
             { data: 'link2',bSortable: false },
             { data: 'link3',bSortable: false },      
    ],
    order: [[1, "asc"]]
  });

  $("#employees tbody").on("click", "td.details-control", function() {
    var tr = $(this).closest("tr");
    var row = table.row(tr);

    if (row.child.isShown()) {
      row.child.hide();
      tr.removeClass("shown");
    } else {
      row.child(format(row.data()), "p-0").show();
      tr.addClass("shown");
    }
  });
});

</script>
