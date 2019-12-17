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
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Criteria</h3>
					</div>
					<div class="box-body">
						<form class="form-horizontal" id="myForm" commandname="sysParam"
							method="post">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="paramType" class="col-lg-4 control-label">Company</label>
										<div class="col-lg-6">
											<select class="form-control" name="companyname"
												id="companyname">
												<option value="TPAC" selected>TPAC</option>
												<option value="TPCC">TPCC</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="paramCode" class="col-lg-4 control-label">Year</label>
										<div class="col-lg-6">
											<div class='input-group date' id='datetimepicker6'>
												<input type='text' class="form-control" value="2553" /> <span
													class="input-group-addon"> <span
													class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="form-group ">
										<div class="col-lg-12 text-center">
											<button type="reset" class="btn btn-default">
												&nbsp;Clear <i class="fa fa-refresh"></i>
											</button>
											&nbsp;&nbsp;
											<button type="button" id="searchBtn" class="btn btn-primary"
												onclick='clickSearch()'>
												Search <i class="fa fa-search"></i>
											</button>
											&nbsp;&nbsp;
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--ผลลัพธ์  -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Result</h3>
					</div>
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
									<legend>Emission Total</legend>

								</fieldset>
								<div class="table-responsive text-center">
									<table class="table table-striped table-bordered ">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th>Name of Chemical substance</th>
												<th class="text-center">Emission volum Total</th>
												<th class="text-center">Transpot volum Total</th>
												<th class="text-center">Aie</th>
												<th class="text-center">Water</th>
												<th class="text-center">Solid</th>

												<th></th>

											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1.</td>
												<td>Methanol</td>
												<td>20,799.12</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>

												<td>
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table"
														>Delete</button>
												</td>
											</tr>
											<tr>
												<td>2.</td>
												<td>Toluene</td>
												<td>1.23</td>
												<td>2,000.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>

												<td>
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table"
														>Delete</button>
												</td>
											</tr>
											<tr>
												<td>3.</td>
												<td>Ethylene Glycol</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td>
													<button type="button"
														class="btn btn-box-tool btn-warning btn-table"
														data-toggle="modal" data-target="#myModal">Edit</button>
													<button type="button"
														class="btn btn-box-tool btn-danger btn-table"
														>Delete</button>
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
				<h4 class="modal-title">PRTR</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="paramType" class="col-lg-4 control-label">Company</label>
								<div class="col-lg-6">
									<select class="form-control" name="Company" id="Company">
										<option value="TPAC" selected>TPAC</option>
										<option value="TPCC">TPCC</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="paramCode" class="col-lg-4 control-label">Year </label>
								<div class="col-lg-6">
									<div class='input-group date' id='datetimepicker8'>
										<input type='text' class="form-control" value="2553" /> <span
											class="input-group-addon"> <span
											class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<fieldset>

						<legend>Emission Total</legend>
						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">Name of Chemical
										substance</label>
									<div class="col-md-6">
										<select class="form-control" name="Name" id="Name">
											<option value="Methanol" selected>Methanol</option>
											<option value="Toluene">Toluene</option>
										</select>
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
									<label class="col-md-6 control-label" for="M4">Emission volum
										Total </label>
									<div class="col-md-6">
										<input id="M10" name="M10" type="number" placeholder=""
											class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group">(kg/year)</div>
							</div>
						</div>

						<div class="row">
							<div class=col-md-8>
								<div class="form-group">
									<label class="col-md-6 control-label" for="M4">Transpot volum
										Total </label>
									<div class="col-md-6">
										<input id="M11" name="M11" type="number" placeholder=""
											class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group">(kg/year)</div>
							</div>
						</div>

						<div class="row">
							<div class=col-md-4>
								<div class="form-group">
									<label class="col-md-3 control-label" for="M10">Air</label>
									<div class="col-md-7 ">
										<input type="text" placeholder=""
											class="form-control input-md">
									</div>

								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group">
									<label class="col-md-3 control-label" for="M10">Water</label>
									<div class="col-md-7">
										<input type="text" placeholder=""
											class="form-control input-md">
									</div>
								</div>
							</div>
							<div class=col-md-4>
								<div class="form-group">
									<label class="col-md-3 control-label" for="M10">Solid</label>
									<div class="col-md-7">
										<input type="text" placeholder=""
											class="form-control input-md">
									</div>

								</div>
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


</script>
<?php include '../../footer.php' ;?>