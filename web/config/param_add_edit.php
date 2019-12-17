
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog " >

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Add/Edit Parameter</h4>
			</div>
			
	<form class="form-horizontal" id="form" action="paramSave.htm" method="post" command="sysParam">  
			          
			
				<div class="row">
				<div class="col-lg-12">
				
<!-- 				     <div class="form-group "> -->
<!-- 	                    <label for="paramCode" class="col-lg-4 control-label">Parameter Id</label> -->
<!-- 	                    <div class="col-lg-6"> -->
	                       <input type="hidden" class="form-control" name="paramId" value="0">
<!-- 	                    </div> -->
<!-- 	             </div> -->
				<br>
		          <div class="form-group ">
	                    <label for="paramType" class="col-lg-4 control-label">Parameter Type</label>
	                    <div class="col-lg-6">
							<div class="btn-group bootstrap-select form-control show-tick"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="--- Please Select ---"><span class="filter-option pull-left">--- Please Select ---</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Active Status [สถานะใช้งาน]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Course Type [ประเภทหลักสูตร]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Contractor Type [ประเภทบุคคล]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Gender [เพศ]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Title [คำนำหน้าชื่อ]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Company [ชื่อบริษัท]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Job Position [ตำแหน่ง]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Section/Department [หน่วยงาน/แผนก]</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">*** Master Parameter ***</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectpicker show-tick" data-live-search="true" name="paramType" title="--- Please Select ---" required="" tabindex="-98"><option class="bs-title-option" value="">--- Please Select ---</option>
<!-- 								<option value="" >--- Please Select ---</option> -->
							    
							     	<option value="ACTIVE_TYPE">Active Status [สถานะใช้งาน]</option>
							    
							     	<option value="COURSE_TYPE">Course Type [ประเภทหลักสูตร]</option>
							    
							     	<option value="OWNER_TYPE">Contractor Type [ประเภทบุคคล]</option>
							    
							     	<option value="GENDER">Gender [เพศ]</option>
							    
							     	<option value="TITLE">Title [คำนำหน้าชื่อ]</option>
							    
							     	<option value="COMPANY">Company [ชื่อบริษัท]</option>
							    
							     	<option value="POSITION_MASTER">Job Position [ตำแหน่ง]</option>
							    
							     	<option value="SECTION_MASTER">Section/Department [หน่วยงาน/แผนก]</option>
							    
							     	<option value="PARAM_TYPE">*** Master Parameter ***</option>
							    
							</select></div>
	                    </div>
	             </div>
		          
		          <div class="form-group ">
	                    <label for="paramCode" class="col-lg-4 control-label">Parameter Code</label>
	                    <div class="col-lg-6">
	                       <input type="text" class="form-control" name="paramCode" value="" required="">
	                    </div>
	             </div>
	             
		          <div class="form-group ">
	                    <label for="paramDesc" class="col-lg-4 control-label">Description TH</label>
	                    <div class="col-lg-6">
	                       <input type="text" class="form-control" name="descTh" value="" required="">
	                    </div>
	             </div>
	             
		          <div class="form-group ">
	                    <label for="paramDesc" class="col-lg-4 control-label">Description EN</label>
	                    <div class="col-lg-6">
	                       <input type="text" class="form-control" name="descEn" value="" required="">
	                    </div>
	             </div>
		          
		          <div class="form-group ">
	                    <label for="sortNo" class="col-lg-4 control-label">Sort No.</label>
	                    <div class="col-lg-6">
	                       <input type="number" class="form-control" name="sortNo" value="" min="1" required="">
	                    </div>
	             </div>
		          
		          <div class="form-group ">
	                    <label for="paramStatus" class="col-lg-4 control-label">Status</label>
	                     <div class="col-lg-6">
	                       <select class="form-control" name="active">
<!-- 	                       	<option value="">--- ALL ---</option> -->
 								 
							        <option value="Y">ใช้งาน</option>
							     
							        <option value="N">ไม่ใช้งาน</option>
							    
	                      </select>
	                    </div>
	               </div>
	</div>
	</div>
	
					 
					
					</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default  pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
				 &nbsp; <button type="button" id="saveBtn" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-square-o"></i> Save</button> 
				
			</div>
			
		</div>

	</div>
