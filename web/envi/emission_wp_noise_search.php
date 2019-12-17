<?php include '../../header.php' ;?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
			<i class="fa fa-industry"></i>&nbsp;&nbsp;Workplace Noise Result
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
										<select class="form-control" name="year">
											<option>--- All ---</option>
												<?php for($i=2012;$i<=2018;$i++): ?>
													<option><?php echo $i; ?></option>
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
											<button type="button" class="btn btn-success" >Add
												<i class="fa fa-plus"></i>
											</button>
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
			<div class="col-md-12" style="display: none;" id="resultSearch1">
				<?php include 'emission_wp_noise_search_result1.php' ;?>
			</div>
			<div class="col-md-12" style="display: none;" id="resultSearch2">
				<?php include 'emission_wp_noise_search_result2.php' ;?>
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
						<label class="col-sm-4 control-label"></label>
						<label class="col-sm-7 control-label"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">TPAC1</label>

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
						<label class="col-sm-4 control-label"></label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">3rd</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">4th</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
						</div>
						<label class="col-sm-1 control-label text-left"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">TPAC2</label>

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
						<label class="col-sm-4 control-label"></label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">3rd</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">4th</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
						</div>
						<label class="col-sm-1 control-label text-left"></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">TPAC3</label>

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
						<label class="col-sm-4 control-label"></label>

						<div class="col-sm-7">
							<label class="col-sm-1 control-label">3rd</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label class="col-sm-1 control-label">4th</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
						</div>
						<label class="col-sm-1 control-label text-left"></label>
					</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	function clickSearch() {
		var companyName = $('select[name=companyname]').val();
		if (companyName=="TPAC"){
			$("#resultSearch1").show();
			$("#resultSearch2").hide();
		}else{
			$("#resultSearch1").hide();
			$("#resultSearch2").show();
		}
	}

</script>
<?php include '../../footer.php' ;?>