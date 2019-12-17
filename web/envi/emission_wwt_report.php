<?php include '../../header.php' ;?>

<div class="content-wrapper">
	<!-- หัวข้อ         -->
	<section class="content-header">
		<h1>
			<i class="fa fa-industry"></i>&nbsp;&nbsp;WWT
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
										<label for="paramCode" class="col-lg-4 control-label">WWT</label>
										<div class="col-lg-6">
												<select class="form-control" name="companyname"
													id="companyname">
													<option value="Temp" selected>Temp</option>
													<option value="pH">pH</option>
													<option value="SS">SS</option>
													<option value="SS">TDS</option>
													<option value="BOD">BOD</option>
													<option value="COD">COD</option>
													<option value="OG">OG</option>
													<option value="TOC">TOC</option>
												</select>
											</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="paramCode" class="col-lg-4 control-label">Year
											From</label>
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

								<div class="col-lg-6">
									<div class="form-group">
										<label for="paramCode" class="col-lg-4 control-label">Year To</label>
										<div class="col-lg-6">
											<div class='input-group date' id='datetimepicker7'>
												<input type='text' class="form-control" value="2555" /> <span
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
<!-- 									<button type="button" -->
<!-- 										class="btn btn-box-tool btn-success btn-table" -->
<!-- 										data-toggle="modal" data-target="#myModal"> -->
<!-- 										<i class="fa fa-plus"></i> Add -->
<!-- 									</button> -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<fieldset>
									<legend>Concrete Pit (TPAC1)</legend>
										<div class="row">
											<div class="col-md-12 text-center" >
												<img src="../../assets/img/imgWWT1.png" />
											</div>
										</div>
								</fieldset>

								<fieldset>
									<legend>Concrete Pit (TPAC2)</legend>
									<div class="row">
											<div class="col-md-12 text-center" >
												<img src="../../assets/img/imgWWT2.png" />
											</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>Concrete Pit (TPAC3)</legend>
									<div class="row">
											<div class="col-md-12 text-center" >
												<img src="../../assets/img/imgWWT1.png" />
											</div>
										</div>
								</fieldset>


							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal -->




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