

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

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
div.dt-button-collection {
  width: 1215px;
}

</style>  
<div class="row">

<?php echo form_open('',
                                     array('autocomplete'=>'off','method'=>'post',
                                     'class'=>'rojw g-j3','id' => 'mjy_id')); 
                                     ?>
									
									
										<div class="row ">
											<div class="col-sm-3">
                      <h6 class="mb-0">Date From</h6>
												<input type="date" required name='from' class="form-control" value="<?php
                        
                        if($this->session->userdata('from')!=''){
                        echo date('Y-m-d',strtotime($this->session->userdata('from')));
                        }
                        ?>" />
											</div>


                 
											
											<div class="col-sm-3">
                            
												<h6 class="mb-0">Date To</h6>
												<input type="date" required name='to' class="form-control" value="<?php 
                         if($this->session->userdata('to')!=''){
                        echo date('Y-m-d',strtotime($this->session->userdata('to')));
                         }
                        ?>" />
											</div>

                      <div class="col-sm-3">
                      <input type="submit" class="btn btn-info px-4" value="Search" style="margin-top: 19px;">
                          </div>

										</div>

                                        
                     



                                        <?php echo form_close();?>
                                        <br>

                                        <br>
                                        <br>

<hr>

    <table id="employees11"  style='displsay:none' class="table table-striped" style="width:100%">
      <thead>
        <tr>
<th>Sr</th>
<th>Name</th>
<th>En Name</th>
<th>House No</th>
<th>Mobile</th>
<th>Tax</th>
<th>amount</th>
<th>Date</th>
<th>Year</th>
<th>Print</th>
        </tr>
      </thead>
    </table>




  </div>

<script>
    

$(document).ready(function() {
    $.noConflict();
  var table = $("#employees11").DataTable({
          'processing': true,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
            'url':'<?=base_url('taxreportjson')?>'
          }, 
    dom: 'Blfrtip',
    buttons: [
      {
      extend: 'pdf',
      title: '<?='TAX_'.time()?>',
      filename: '<?='TAX_'.time()?>'
    }, {
      extend: 'excel',      title: '<?='TAX_'.time()?>',
      filename: '<?='TAX_'.time()?>'
    }, {
      extend: 'csv',
      title: '<?='TAX_'.time()?>',
      filename: '<?='TAX_'.time()?>'
    }],
             columns: [
             { data: 'srno',bSortable: false },
             { data: 'name',bSortable: false },
             { data: 'en_name',bSortable: false },
             { data: 'house_no',bSortable: false },
             { data: 'mobile_no',bSortable: false },
             { data: 'tax',bSortable: false },
             { data: 'amount',bSortable: false },
             { data: 'date',bSortable: false },
             { data: 'year',bSortable: false },
             { data: 'link1',bSortable: false },

               
    ],
    order: [[1, "asc"]]
  });

});

</script>