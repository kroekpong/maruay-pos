
<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog  modal-lg" >

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Add/Edit</h4>
			</div>
			
			<form class="form-horizontal" id="form" action="userSave.htm" method="post" command="userProfile" data-toggle="validator" novalidate="true">
		     
	           
		 <div class="box-body">  
				
				
	         
	         	<div class="row">
					<div class="col-md-12">
						<h4 class="border-bottom">Specification</h4>
					</div>
				</div>
					
		         <div class="row">  
			          
			           <div class="col-lg-6">
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Serial No.</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="0301311-047">
			                    </div>
		                  </div>
				         <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Model</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="Multigas Detector, ITX">
			                    </div>
		                  </div>
				 	</div>
					<div class="col-lg-6">
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Brand</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="Industrial Scientific">
			                    </div>
		                  </div>
				         <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Measurement Range</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="">
			                    </div>
		                  </div>
				 	</div>
		     	 </div>
		     	 
		     	 
		     	 <div class="row">
					<div class="col-md-12">
						<h4 class="border-bottom">Calibration</h4>
					</div>
				</div>
				
		     	   <div class="row">  
			          
			           <div class="col-lg-6">
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Cal. standard</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control" value="">
			                    </div>
		                  </div>
				         <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Serviced By</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control" value="Linde">
			                    </div>
		                  </div>
				 	</div>
					<div class="col-lg-6">
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Cal. Time</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control" value="6">
			                    </div>
		                  </div>
				         <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Cal. Time Unit</label>
			                    <div class="col-lg-6">
			                       <select class="form-control" name="">
										<option value="" selected="selected">Month</option> 
										<option value="">Year</option> 
										<option value="">Day</option> 
			                      </select>
			                    </div>
		                  </div>
				 	</div>
		     	 </div>
		     	 
		     	 
		     	 
	    </div> 	 
	     	 
	     	 
		<div class="modal-footer">
			<button type="button" class="btn btn-default  pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			 &nbsp; <button type="button" id="saveBtn" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-square-o"></i> Save</button> 
			
		</div>
		
	 </form>
	 
			
		</div>

	</div>
