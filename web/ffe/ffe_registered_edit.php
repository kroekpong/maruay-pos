
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
		     
<!-- 	           <fieldset class="well"><div class="w  "> -->
	           
		 <div class="box-body">  
				
				
				<div class="row">  
				
					<div class="col-lg-6">
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Department </label>
			                    <div class="col-lg-6">
			                    <select class="form-control" name="">
										<option value="" selected="selected">SHE</option> 
										<option value="">VP1</option> 
										<option value="">VP2</option> 
			                      </select>
			                    </div>
		                  </div>
				        
		                   <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Area Supervisor</label>
			                    <div class="col-lg-6">
			                    	<select class="form-control" name="">
											<option value="" >--- None ---</option> 
				                      </select>
			                    </div>
		                  </div>
				 	</div>
				 	
					<div class="col-lg-6">
				  		 
		                   <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Area Representative</label>
			                    <div class="col-lg-6">
			                     <select class="form-control" name="">
											<option value="">--- None ---</option> 
			                      </select>
			                    </div>
		                  </div>
				        
		                   <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Area Section Mgn.</label>
			                    <div class="col-lg-6">
				                    <select class="form-control" name="">
											<option value=""  >--- None ---</option> 
				                      </select>
			                    </div>
		                  </div>
				 	</div>
				 	
				</div>
	         
	         	<div class="row">
					<div class="col-md-12">
						<h4 class="border-bottom">Specification</h4>
					</div>
				</div>
					
		         <div class="row">  
			        
			           <div class="col-lg-6">
			             <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">FFE Type</label>
			                    <div class="col-lg-6">
				                     <select class="form-control" name="">
											<option value="" selected="selected">Gas Detector</option> 
				                      </select>
			                    </div>
		                  </div>
		                  
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
			                    <label for="" class="col-lg-5 control-label">Tag No.	</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control" value="3SE-507">
			                    </div>
		                  </div>
				  		 <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Brand</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="Industrial Scientific">
			                    </div>
		                  </div>
				         <div class="form-group">
			                    <label for="" class="col-lg-5 control-label">Specification</label>
			                    <div class="col-lg-6">
				                       <input type="text" class="form-control"  value="">
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
