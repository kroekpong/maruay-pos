<?php include '../../header.php' ;?>

<div class="content-wrapper yung">
	<!-- หัวข้อ         -->
	<section class="content-header">
		<h1>
			<i class="fa fa-industry"></i>&nbsp;&nbsp;PRTR
		</h1>
	</section>
	<!--ค้นหา  -->
	<section class="content">


		<!--ผลลัพธ์  -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<!-- 					<div class="box-header with-border"> -->
					<!-- 						<h3 class="box-title">Result</h3> -->
					<!-- 					</div> -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="box-tools pull-right">
									<button type="button"
										class="btn btn-box-tool btn-success btn-table"
										data-toggle="modal" data-target="#myModal">
										<i class="fa fa-plus"></i> Add
									</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<fieldset>
									<legend>List of Target Chemical.</legend>

								</fieldset>
								<div class="table-responsive">
									<table class="table table-striped table-bordered " id="myTable" >
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th>Name of Chemical substance</th>
												<th class="text-center">Molecula Formula</th>
												<th class="text-center">CAS No.</th>
												<th class="text-center">TPCC</th>
												<th class="text-center">TPAC</th>
												<th class="text-center">Active</th>

												<th></th>

											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1.</td>
												<td>Acetaldehyde</td>
												<td>CH3CHO</td>
												<td>75-07-0</td>
												<td class="text-center"></td>
												<td class="text-center"></td>
												<td class="text-center">Yes</td>

												<td class="text-center">
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table">Delete</button>
												</td>
											</tr>
											<tr>
												<td>2.</td>
												<td>Acetone</td>
												<td>C3H6O</td>
												<td>67-64-1</td>
												<td class="text-center">X</td>
												<td class="text-center"></td>
												<td class="text-center">No</td>

												<td class="text-center">
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table">Delete</button>
												</td>
											</tr>
											<tr>
												<td>3.</td>
												<td>Acrylamide</td>
												<td>C3H5NO</td>
												<td>67-64-1</td>
												<td class="text-center"></td>
												<td class="text-center">x</td>
												<td class="text-center">Yes</td>
												<td class="text-center">
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table">Delete</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- TAP -->
						<!-- 						<div class="nav-tabs-custom"> -->
						<!-- 							<ul class="nav nav-tabs" id="tab_tpac"> -->
						<!-- 								<li class="active"><a href="#tab_1" data-toggle="tab">TSP</a></li> -->
						<!-- 								<li><a href="#tab_2" data-toggle="tab">SOx</a></li> -->
						<!-- 								<li><a href="#tab_3" data-toggle="tab">SOx 24(HR)</a></li> -->
						<!-- 								<li><a href="#tab_4" data-toggle="tab">NOx</a></li> -->
						<!-- 								<li><a href="#tab_5" data-toggle="tab">Formalin</a></li> -->
						<!-- 							</ul> -->
						<!-- 							<ul class="nav nav-tabs hidden" id="tab_tpcc"> -->
						<!-- 								<li class="active"><a href="#tab_1" data-toggle="tab">CO</a></li> -->
						<!-- 								<li><a href="#tab_1" data-toggle="tab">NOx</a></li> -->
						<!-- 							</ul> -->
						<!-- 							<div class="tab-content"> -->
						<!-- 								<div class="tab-pane active" id="tab_1"> -->

						<!-- 								</div> -->
						<!-- 								<div class="tab-pane" id="tab_2">NO MORE DATA.</div> -->
						<!-- 								<div class="tab-pane" id="tab_3">NO MORE DATA.</div> -->
						<!-- 							</div> -->
						<!-- 						</div> -->


					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Chemical</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">

					<fieldset>

<!-- 						<legend></legend> -->
						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">Name of Chemical
										substance</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group"></div>
							</div>
						</div>

						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">Molecula Formula </label>
									<div class="col-md-6">
										<input id="M10" name="M10" type="text" placeholder=""
											class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								
							</div>
						</div>

						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">CAS No. </label>
									<div class="col-md-6">
										<input type="text" placeholder=""
											class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group"></div>
							</div>
						</div>

						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">TPCC</label>
									<div class="col-md-6">
										  <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" checked>ใช้งาน
										  <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4" >ไม่ใช้งาน
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group"></div>
							</div>
						</div>
						
						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">TPAC </label>
									<div class="col-md-6">
										  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>ใช้งาน
										  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" >ไม่ใช้งาน
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group"></div>
							</div>
						</div>
						
						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">Status </label>
									<div class="col-md-6">
										<select class="form-control" name="Factory" id="Factory">
    										<option value="TPAC_1" selected>Active</option>
    										<option value="TPAC_2">Unactive</option>

										</select>
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group"></div>
							</div>
						</div>
						
					</fieldset>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<script type="text/javascript">
$(function () {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    locale: {
          format: 'YYYY'
      }
  }, function (start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
  $('input[name="monthinput"]').datepicker({
  autoclose: true,
  minViewMode: 1,
  format: 'MM/yyyy'
}).on('changeDate', function(selected){
      // startDate = new Date(selected.date.valueOf());
      // startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
      // $('.to').datepicker('setStartDate', startDate);
  }); 
});
function clickSearch() {
  
  //document.getElementById("tabSarchResult").style.visibility = "visible"
  var companyName = $('select[name=companyname]').val();
  if (companyName=="TPAC"){
    $( "#tab_tpcc" ).addClass( "hidden" );
    $( "#tab_tpac" ).removeClass( "hidden" );

  }else{
    $( "#tab_tpac" ).addClass( "hidden" );
    $( "#tab_tpcc" ).removeClass( "hidden" );
  }
};

// $("#datepicker").datepicker({
//     format: "yyyy",
//     viewMode: "years", 
//     minViewMode: "years"
// });

$('#datetimepicker6').datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
$('#datetimepicker7').datepicker({
    useCurrent: false, //Important! See issue #1075
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
$('#datetimepicker8').datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
$("#datetimepicker6").on("dp.change", function (e) {
    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
});
$("#datetimepicker7").on("dp.change", function (e) {
    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
});

$('#myTable').DataTable();
</script>
<?php include '../../footer.php' ;?>