<?php include '../../header.php' ;?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
			<i class="fa fa-industry"></i>&nbsp;&nbsp;Stack Result
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
										<select class="form-control" name="companyname" id="companyname">
											<option value="TPAC">TPAC</option>
											<option value="TPCC" selected>TPCC</option>
										</select>
									</div>
								</div>
							</div>


							<div class="col-lg-6">
								<div class="form-group">
									<label for="paramCode" class="col-lg-4 control-label">Year</label>
									<div class="col-lg-6">
										<select class="form-control" name="year">
											<option>เลือก</option>
											<?php for($i=0;$i<=5;$i++): ?>
											<option>
												<?php echo 2018-$i; ?>
											</option>
											<?php endfor; ?>
										</select>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group ">
										<div class="col-lg-12 text-center">
											<button type="reset" class="btn btn-default"> &nbsp;Clear
												<i class="fa fa-refresh"></i>
											</button>&nbsp;&nbsp;
											<button type="button" id="searchBtn" class="btn btn-primary" onclick='clickSearch()'>Search
												<i class="fa fa-search"></i>
											</button>&nbsp;&nbsp;
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
						<!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
	                </button>
	              </div> -->
					</div>
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs" id="tab_tpac">
								<li class="active">
									<a href="#tab_1" data-toggle="tab">MC</a>
								</li>
								<li>
									<a href="#tab_2" data-toggle="tab">HE</a>
								</li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<form role="form">

										<table class="table table-bordered table-striped " id="tableTab1">
											<thead class="bg-green color-palette">
												<tr>
													<th class="text-center" width="30%" rowspan="2"> Stack</th>
													<th class="text-center" width="30%" colspan="2"> O2</th>
													<th class="text-center" width="30%" colspan="2">Emission</th>
													<th class="text-center" rowspan="3" width="10%">Edit </th>
												</tr>
												<tr>
													<th class="text-center">1st</th>
													<th class="text-center">2nd</th>
													<th class="text-center">1st</th>
													<th class="text-center" style="border-right-width:1px;">2nd</th>
												</tr>

											</thead>
											<tbody>
												<tr>
													<td class="text-center">V-487</td>
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
													<td class="text-center">3V-487</td>
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
													<td class="text-center">V-681</td>
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
													<td class="text-center">2V-681</td>
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
													<td class="text-center">3V-681</td>
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
									<form role="form">

										<table class="table table-bordered table-striped " id="tableTab1">
											<thead class="bg-green color-palette">
												<tr>
													<th class="text-center" width="30%" rowspan="2"> Stack</th>
													<th class="text-center" width="30%" colspan="2"> O2</th>
													<th class="text-center" width="30%" colspan="2">Emission</th>
													<th class="text-center" rowspan="3" width="10%">Edit </th>
												</tr>
												<tr>
													<th class="text-center">1st</th>
													<th class="text-center">2nd</th>
													<th class="text-center">1st</th>
													<th class="text-center" style="border-right-width:1px;">2nd</th>
												</tr>

											</thead>
											<tbody>
												<tr>
													<td class="text-center">V-681</td>
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
													<td class="text-center">3V-681</td>
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
													<td class="text-center">V-681</td>
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
							</div>
							<!-- /.tab-content -->
						</div>
					</div>
					<!-- /.box-body -->

				</div>
				<!-- /.box -->

			</div>
			<!-- /.box-footer -->

			<!-- for tab tpac -->
			<div class="col-md-12" style="display: none;" id="resultSearch2">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Result</h3>
						<!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
	                </button>
	              </div> -->
					</div>
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs" id="tab_tpac">
								<li class="active">
									<a href="#tab_1" data-toggle="tab">TSP</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">NOx</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">Formaldehyde</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">Benzene</a>
								</li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<form role="form">

										<table class="table table-bordered table-striped " id="tableTab1">
											<thead class="bg-green color-palette">
												<tr>
													<th class="text-center" width="30%" rowspan="2"> Stack</th>
													<th class="text-center" width="30%" colspan="2"> O2</th>
													<th class="text-center" width="30%" colspan="2">Emission</th>
													<th class="text-center" rowspan="3" width="10%">Edit </th>
												</tr>
												<tr>
													<th class="text-center">1st</th>
													<th class="text-center">2nd</th>
													<th class="text-center">1st</th>
													<th class="text-center" style="border-right-width:1px;">2nd</th>
												</tr>

											</thead>
											<tbody>
												<tr>
													<td class="text-center">Z-1123T</td>
													<td class="text-center">122.69</td>
													<td class="text-center">36.43</td>
													<td class="text-center">0.013</td>
													<td class="text-center">0.006</td>
													<td class="text-center">
														<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-edit"></i>
															edit
														</button>
													</td>
												</tr>
												<tr>
													<td class="text-center">G-920U</td>
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
													<td class="text-center">G-920W</td>
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
							</div>
							<!-- /.tab-content -->
						</div>
					</div>
					<!-- /.box-body -->

				</div>
				<!-- /.box -->

			</div>
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
						<label class="col-sm-4 control-label">V-487</label>
						<label class="col-sm-7 control-label"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">O2</label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">1st</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">2nd</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>

						</div>
						<label class="col-sm-1 control-label text-left"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Emission</label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">1st</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">2nd</label>
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
			$('input[name="monthinput"]').datepicker({
				autoclose: true,
				minViewMode: 1,
				format: 'MM/yyyy'
			}).on('changeDate', function (selected) {
				// startDate = new Date(selected.date.valueOf());
				// startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
				// $('.to').datepicker('setStartDate', startDate);
			});
		});
		function clickSearch() {
			
			//document.getElementById("tabSarchResult").style.visibility = "visible"
			var companyName = $('select[name=companyname]').val();
			if (companyName=="TPCC"){
				$("#resultSearch").show();
				$("#resultSearch2").hide();

			}else{
				$("#resultSearch2").show();
				$("#resultSearch").hide();
			}
		}

	</script>