
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog  modal-lg" >

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Add/Edit User</h4>
			</div>
			
			<form class="form-horizontal" id="form" action="userSave.htm" method="post" command="userProfile" data-toggle="validator" novalidate="true">
		     
<!-- 	           <fieldset class="well"><div class="w  "> -->
	           
	                <input type="hidden" class="form-control" name="userId" value="">
	                   <div class="row">
						<div class="col-lg-12"><br>
						</div>
					</div>
					
				<div class="row">  
					<div class="col-lg-6">
					
				  		 <div class="form-group has-feedback">
			                    <label for="" class="col-lg-4 control-label">User Name</label>
			                    <div class="col-lg-6">
			                    	
				                       <input type="text" class="form-control" name="userName" data-minlength="4" maxlength="10" data-remote="checkExist" data-remote-error="User Name already exists." data-error="Minimum of 4 characters" required="">
				                      		<div class="help-block with-errors"></div>
									
									
			                    </div>
		                  </div>
				            
				        
				  			<div class="form-group has-feedback">
				              <label for="" class="col-lg-4 control-label"> Password</label>
				              <div class="col-lg-6">
				                <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" data-error="Minimum of 6 characters" required="">
				                <div class="help-block with-errors"></div>
				              </div>
				            </div>
			              
				 	</div>
				 	
					<div class="col-lg-6">
					
						  <div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Role</label>
			                    <div class="col-lg-6">
			                       <div class="btn-group bootstrap-select show-tick form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="roleCode" title="--- Please Select ---" aria-expanded="false"><span class="filter-option pull-left">--- Please Select ---</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" style="max-height: 256.5px; overflow: hidden; min-height: 95px;"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 244.5px; overflow-y: auto; min-height: 83px;"><li data-original-index="0"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Admin</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Delete</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Edit</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Export</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">View</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectpicker" id="roleCode" name="roleCode" title="--- Please Select ---" multiple="" required="" tabindex="-98">
									    
									     	<option value="1">Admin</option>
									    
									     	<option value="4">Delete</option>
									    
									     	<option value="3">Edit</option>
									    
									     	<option value="5">Export</option>
									    
									     	<option value="2">View</option>
									    
									</select></div>
			                    </div>
			              </div>
				            
				            <div class="form-group has-feedback">
				              <label for="" class="col-lg-4 control-label">Confirm Password</label>
				              <div class="col-lg-6">
				                <input type="password" data-minlength="6" class="form-control" data-match="#inputPassword" data-error="Minimum of 6 characters" data-match-error="Password Not Match" required="">
				              	<div class="help-block with-errors"></div>
				              </div>
				            </div> 
				 	</div>
				</div>
	         
	         <div class="row">
						<div class="col-lg-12"><hr>
						</div>
					</div>
	         
		         <div class="row">  
			          <div class="col-lg-6">
			          
		            		<div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Title</label>
			                    <div class="col-lg-6">
			                       <select class="form-control" name="title" required="">
									    
									     	<option value="MR">นาย</option>
									    
									     	<option value="MS">นางสาว</option>
									    
									     	<option value="AJ">อาจารย์</option>
									    
									     	<option value="MRS">นาง</option>
									    
									     	<option value="NONE">ไม่ระบุ</option>
									    
								</select>
			                    </div>
			               </div>
		                  <div class="form-group">
		                    <label for="" class="col-lg-4 control-label">First Name</label>
		                    <div class="col-lg-6">
		                      <input type="text" class="form-control" name="firstNameTh" value="" required="">
		                    </div>
		                  </div>
		                  
		                  <div class="form-group">
		                    <label for="" class="col-lg-4 control-label">Mobile</label>
		                    <div class="col-lg-6">
		                      <input type="text" class="form-control" name="mobile" value="">
		                    </div>
		                  </div>
		                  <div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Email</label>
			                    <div class="col-lg-6">
			                      <input type="text" class="form-control" name="email" value="">
			                    </div>
			                  </div>
			          </div>
			          
			          
		<!-- 	        ------------  Left Side -->
			          <div class="col-lg-6">
			          
			          		 <div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Gender</label>
			                    <div class="col-lg-6">
			                       <select class="form-control" name="gender">
									    
									     	<option value="M">ชาย</option>
									    
									     	<option value="F">หญิง</option>
									    
									     	<option value="N">ไม่ระบุ</option>
									    
								</select>
			                    </div>
			                  </div>
			                  
		<!-- 	          		   <div class="form-group"> -->
		<!-- 	                    <label for="" class="col-lg-4 control-label">Password</label> -->
		<!-- 	                    <div class="col-lg-6"> -->
		<!-- 	                      <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" required> -->
		<!-- 	                    </div> -->
		<!-- 	                  </div> -->
			                  
		<!-- 	                  <div class="form-group"> -->
		<!-- 	                    <label for="" class="col-lg-4 control-label">Confirm Password</label> -->
		<!-- 	                    <div class="col-lg-6"> -->
		<!-- 	                      <input type="password" data-minlength="6" class="form-control"  data-match="#inputPassword" data-match-error="Password Not Match" required> -->
		<!-- 	                    </div> -->
		<!-- 	                  </div> -->
			                  
			                  
			                  <div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Last Name</label>
			                    <div class="col-lg-6">
			                      <input type="text" class="form-control" name="lastNameTh" value="" required="">
			                    </div>
			                  </div>
			                  
					         <div class="form-group">
			                    <label for="" class="col-lg-4 control-label">Company</label>
			                    <div class="col-lg-6">
			                     	<select class="form-control" name="companyCode" required="">
										<option value="">--- Please Select ---</option>
									    
									     	<option value="TPCC">TPCC</option>
									    
									     	<option value="TPAC">TPAC</option>
									    
									     	<option value="SMS">SMS</option>
									    
									     	<option value="CCContent">CC Content</option>
									    
									     	<option value="SLC">SLC</option>
									    
									     	<option value="Manpower">Manpower</option>
									    
									     	<option value="IGG">IGG</option>
									    
									     	<option value="SRITONG">ศรีทองคาร์เร้นจ์</option>
									    
									     	<option value="DOCTOR">แพทย์</option>
									    
									     	<option value="NURSE">พยาบาล</option>
									    
									     	<option value="SCL">SCL</option>
									    
									     	<option value="OTHER">อื่นๆ</option>
									    
									</select>
			                    </div>
			                  </div>
	                  
	                  
			                  <div class="form-group">
			                    <label for="paramStatus" class="col-lg-4 control-label">Status</label>
			                    <div class="col-lg-6">
			                       <select class="form-control" name="activeFlg">
			                       	 
								        <option value="Y">ใช้งาน</option>
								     
								        <option value="N">ไม่ใช้งาน</option>
								    
			                      </select>
			                      
			                    </div>
			                  </div>
			           </div>
		     	 </div>
	     	 
	     	 
<!-- 				 <div class="row"> -->
<!-- 						<div class="col-lg-12"> -->
<!-- 							<div class="form-group ">  -->
<!-- 								<div class="col-lg-12 text-center"> -->
<!-- 								<button type="button" id="cancelBtn" class="btn btn-default"><i class="fa fa-times-circle"></i> Cancel </button> -->
									
<!-- 										&nbsp; <button type="button" id="saveBtn" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>&nbsp;&nbsp; -->
									
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						</div> -->
<!-- 					</div> -->
					
<!-- 				</div> -->
<!--             </fieldset> -->
            
	 
	 </form>
	 
			<div class="modal-footer">
				<button type="button" class="btn btn-default  pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
				 &nbsp; <button type="button" id="saveBtn" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-square-o"></i> Save</button> 
				
			</div>
			
		</div>

	</div>
