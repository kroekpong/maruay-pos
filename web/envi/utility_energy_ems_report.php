<?php include '../../header.php' ;?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Emission Source Report
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
												<?php for($i=2018;$i>=2012;$i--): ?>
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
						<h3 class="box-title">Emission Source</h3>
					</div>
					<div class="box-body text-center">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<canvas id="rs-graph" width="250px"></canvas>
						</div>
						<div class="col-md-3"></div>
						
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
		<!-- /.row -->
	</section>

</div>

<script>
	new Chart($("#rs-graph"), {
		   type: 'pie',
		    data: {
		    	 labels: [ "Electricity", "Water Consumption", "Steam consumption" ],
		         datasets: [{
		           label: "Emission Source",
		           backgroundColor: [ "#8e5ea2","#3cba9f","#e8c3b9" ],
		           data: [4,34,54]
		        }
		      ]
		    },
		    options: {
		      title: {
		        display: true,
		         text: '[ Company : TPAC ]  [ Year : 2018 ]'
		      }
		    }
	});

	function doSearch(){
		$("#rs_table").show();
	}
 	function doClear(){
		$("#rs_table").hide();
	}
	
</script>
<?php include '../../footer.php' ;?>