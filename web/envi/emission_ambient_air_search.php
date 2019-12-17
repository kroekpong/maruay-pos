<?php include '../../header.php' ;?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
		<i class="fa fa-industry"></i>&nbsp;&nbsp;Ambient Air (7 day)
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Criteria</h3>
					</div>
					<div class="box-body">
            
					<form class="form-horizontal" id="myForm" commandname="sysParam" method="post"> 
					 
					   <div class="col-lg-6">
					   <div class="form-group">
							 <label for="paramType" class="col-lg-4 control-label">Company</label>
							 <div class="col-lg-6">
								<select class="form-control" name="companyname" id= "companyname">
										 <option value="TPAC" selected>TPAC</option>
										 <option value="TPCC">TPCC</option>
							   </select>
							 </div>
						   </div>
					  </div>
					   
					   
						<div class="col-lg-6">
					   <div class="form-group">
							 <label for="paramCode" class="col-lg-4 control-label">Period</label>
							 <div class="col-lg-6">
							 <div class="input-group date" name="daterange">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" >
										</div>
							 </div>
						   </div>
					  </div>
						 <div class="row">
							 <div class="col-lg-12">
								 <div class="form-group "> 
									 <div class="col-lg-12 text-center">
										 <button type="reset" class="btn btn-default"> &nbsp;Clear <i class="fa fa-refresh"></i></button>&nbsp;&nbsp;
										 <button type="button" id="searchBtn" class="btn btn-primary" onclick='clickSearch()'>Search <i class="fa fa-search"></i></button>&nbsp;&nbsp;
		 <!-- 								<button type="button" class="btn btn-warning" disabled>Export <i class="fa fa-file-excel-o"></i></button> -->
									 </div>
								 </div>
							 </div>
						 </div>
		 
						 </form>
						 </div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
			<!-- /.box-footer -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-md-12" style="display: none;" id="resultSearch">
				<div class="box box-solid">
				<div class="box-header with-border">
	              <h3 class="box-title">Result</h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
	                </button>
	              </div>
	            </div>
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs" id="tab_tpac">
								<li class="active">
									<a href="#tab_1" data-toggle="tab">TSP</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">SOx</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">SOx 24(HR)</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">NOx</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">Formalin</a>
								</li>
							</ul>
							<ul class="nav nav-tabs hidden" id="tab_tpcc">
								<li class="active">
									<a href="#tab_1" data-toggle="tab">CO</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">NOx</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<form role="form">

										<table class="table table-bordered table-striped" id="tableTab1">
											<thead class="bg-green color-palette">
												<tr>
													<th class="text-center" width="5%" rowspan="2"> No.</th>
													<th class="text-center" width="30%" rowspan="2"> Period</th>
													<th class="text-center" width="20%" colspan="2">โรงงาน</th>
													<th class="text-center" width="20%" colspan="2" >โรงเรียนบ้านหนองแฟบ</th>
													<th class="text-center" width="20%" colspan="2">ชุมชนบ้านชากกลาง</th>
													<th class="text-center" rowspan="3" width="5%">Edit </th>
												</tr>
												<tr>
													<th class="text-center">Min</th>
													<th class="text-center">Max</th>
													<th class="text-center">Min</th>
													<th class="text-center">Max</th>
													<th class="text-center">min</th>
													<th class="text-center" style="border-right-width:1px;">max</th>
												</tr>

											</thead>
											<tbody>
												<tr>
													<td class="text-center">1</td>
													<td class="text-center">Jun 2012</td>
													<td class="text-center">0.058</td>
													<td class="text-center">0.093</td>
													<td class="text-center">0.017</td>
													<td class="text-center">0.049</td>
													<td class="text-center">0.039</td>
													<td class="text-center">0.058</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
												<tr>
													<td class="text-center">2</td>
													<td class="text-center">Mar 2013</td>
													<td class="text-center">0.038</td>
													<td class="text-center">0.05</td>
													<td class="text-center">0.019</td>
													<td class="text-center">0.051</td>
													<td class="text-center">0.039</td>
													<td class="text-center">0.066</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
												<tr>
													<td class="text-center">3</td>
													<td class="text-center">Aug 2013</td>
													<td class="text-center">0.036</td>
													<td class="text-center">0.07</td>
													<td class="text-center">0.022</td>
													<td class="text-center">0.045</td>
													<td class="text-center">0.029</td>
													<td class="text-center">0.065</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
												<tr>
													<td class="text-center">4</td>
													<td class="text-center">Aug 2014</td>
													<td class="text-center">0.036</td>
													<td class="text-center">0.07</td>
													<td class="text-center">0.022</td>
													<td class="text-center">0.045</td>
													<td class="text-center">0.029</td>
													<td class="text-center">0.065</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
												<tr>
													<td class="text-center">5</td>
													<td class="text-center">Nov 2014</td>
													<td class="text-center">0.036</td>
													<td class="text-center">0.07</td>
													<td class="text-center">0.022</td>
													<td class="text-center">0.045</td>
													<td class="text-center">0.029</td>
													<td class="text-center">0.065</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
											</tbody>
										</table>

										<!-- row -->
									</form>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="tab_2">
									NO MORE DATA.
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="tab_3">
									NO MORE DATA.
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div>
					</div>
					<!-- /.box-body -->

				</div>
				<!-- /.box -->

			</div>
			<!-- /.box-footer -->
		</div>

	</section>

</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<form class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Date</label>

						<div class="col-sm-7">
							<div class="col-sm-1"></div>
							<div class="col-sm-9">
							<div class="input-group date" id="monthinput">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control form-control-1 input-sm" >
							</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">โรงงาน</label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">Min</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">Max</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>

						</div>
						<label class="col-sm-1 control-label text-left"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">โรงเรียนบ้านหนองแฟบ</label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">Min</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">Max</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>

						</div>
						<label class="col-sm-1 control-label text-left "></label>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">ชุมชนบ้านชากกลาง</label>
						<div class="col-sm-7">
							<label class="col-sm-1 control-label">Min</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">Max</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
						</div>
						<label class="col-sm-1 control-label text-left "></label>
					</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<?php include '../../footer.php' ;?>
<script type="text/javascript">
	$(function () {
		$('input[name="daterange"]').daterangepicker({
			opens: 'left',
			locale: {
      			format: 'MMMM/YYYY'
    		}
		}, function (start, end, label) {
			console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		});
	});
	function clickSearch() {
		$("#resultSearch").show();
		//document.getElementById("tabSarchResult").style.visibility = "visible"
		var companyName = $('select[name=companyname]').val();
		if (companyName=="TPAC"){
			$( "#tab_tpcc" ).addClass( "hidden" );
			$( "#tab_tpac" ).removeClass( "hidden" );

		}else{
			$( "#tab_tpac" ).addClass( "hidden" );
			$( "#tab_tpcc" ).removeClass( "hidden" );
		}
	}

	$('#monthinput').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'MM/yyyy'
	}).on('changeDate', function(selected){
        // startDate = new Date(selected.date.valueOf());
        // startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        // $('.to').datepicker('setStartDate', startDate);
    }); 

</script>