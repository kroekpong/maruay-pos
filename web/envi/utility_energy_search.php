<?php include '../../header.php' ;?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Utility
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
						<form  class="form-horizontal" >
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Company</label>
										<div class="col-md-8">
											<select class="form-control" name="companyname" id= "companyname">
													<option value="TPAC" selected>TPAC</option>
													<option value="TPCC">TPCC</option>
											</select>
										</div>
									</div>
								</div><!-- col-md-6 -->

								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Year</label>
										<div class="col-md-8">
											<select class="form-control" name="year">
												<option>--- All ---</option>
												<?php for($i=2012;$i<=2018;$i++): ?>
													<option><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
								</div><!-- col-md-4 -->
							</div><!-- row -->
							<div class="row">
								<div class="col-md-12 text-center">
									<button type="reset" class="btn btn-default" onclick="doClear()"> &nbsp;Clear <i class="fa fa-refresh"></i></button>&nbsp;&nbsp;
									<button type="button" id="searchBtn" class="btn btn-primary" onclick="doSearch()">Search <i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>

		</div>
		
		<!-- /.row -->
		<div class="row" style="display: none;" id="rs_table">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Result</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn  btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<table id="result-table"  class="table table-bordered"   >
									<thead class="bg-green color-palette">
										<tr>
											<th class="text-center">Year</th>
											<th class="text-center">Product</th>
											<th class="text-center">
												Electrical<br/>(Kg-CO2/Ton product)
											</th>
											<th class="text-center">
												Water Consumption<br/>(Kg-CO2/Ton product)
											</th>
											<th class="text-center">
												Steam Consumption<br/>(Kg-CO2/Ton product)
											</th>
											<th class="text-center">Total</th>
											<th class="text-center" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i = 2012; $i<= 2018;$i ++): ?>
										<tr>
											<td class="text-right"><?php echo $i; ?></td>
											<td class="text-right">
												<?php echo (rand(7000,8400)).".00";?>
											</td>
											<td class="text-right">
												<?php $elect =  (rand(600,740)).".00";
														echo $elect;
												?>
											</td>
											<td class="text-right">
												<?php $wat =  (rand(1,10)).".00";
														echo $wat;
												?>
											</td>
											<td class="text-right">
												<?php $steam =  (rand(1,10)).".00";
														echo $steam;
												?>
											</td>
											<td class="text-right"><?php echo ($elect+$wat+$steam).".00";?></td>
											<td class="text-center">
												<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-edit"></i> Edit
												</button>
											</td>
										</tr>
										<?php endfor; ?>
									</tbody>
								</table>
							</div> <!-- col-md-12 -->
						</div> <!-- row -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
		<!-- /.row -->
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
						<label class="col-sm-3 control-label">Product</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Electrical</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" >
						</div>
						<label class="col-sm-3 control-label text-left">Kg-CO2</label>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Water</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" >
						</div>
						<label class="col-sm-3 control-label text-left">Kg-CO2</label>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Steam</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" >
						</div>
						<label class="col-sm-3 control-label text-left ">Kg-CO2</label>
					</div>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<script>
	$('#result-table').DataTable({
		 "ordering": false,
		 "paging": false
		 });

	function doSearch(){
		$("#rs_table").show();
	}
 function doClear(){
		$("#rs_table").hide();
	}

	 
</script>
<?php include '../../footer.php' ;?>