<?php include '../../header.php' ;?>

        <div class="content-wrapper">
        
            <section class="content-header">
					<h3><i class="fa fa-users"></i> User Management</h3>
            </section>
            
            <section class="content">
            
<!--       <div class="row"> -->
<!--         <div class="col-md-12"> -->
        
<!--           <div class="box box-primary"> -->
<!--             <div class="box-header with-border"> -->
<!--               <h3 class="box-title">BOX-TITLE</h3> -->
<!--             </div> -->
<!--             <div class="box-body"> -->
            
<!--            <div class="container"> -->

<!-- 		<div class="page-header"> -->
<!-- 			<div class="row"> -->
<!-- 				<br> -->
<!-- 				<div class="col-lg-8 col-md-7 col-sm-6"> -->
<!-- 					<h3><i class="fa fa-users"></i> User Management</h3> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</div> -->



		<div class="row"> <div class="col-lg-12">	
		
		

<!-- 	#####  SEARCH >>>>> ####------------------- -->
	
		
		 <div class="box box-primary"> 
		 <div class="box-header">
              <h3 class="box-title">Criteria</h3>
            </div>
		 
		 
		 <div class="box-body">
		 
<!-- 		  <fieldset><div class="well"> -->
		   <form class="form-horizontal" id="myForm" commandname="userProfile" method="post"> 
		    
		     <div class="col-lg-6">
	          	<div class="form-group">
                    <label for="paramCode" class="col-lg-4 control-label">User Name</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="userName">
                    </div>
                  </div>
             </div>
	          
	         <div class="col-lg-6">
	          	<div class="form-group">
                    <label for="paramCode" class="col-lg-4 control-label">First/Last Name</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="firstNameTh">
                    </div>
                  </div>
             </div>
	          
             
		      <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramDesc" class="col-lg-4 control-label">Role</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="activeFlg">
                       	<option value="">--- ALL ---</option>
					        <option value="">SHE Admin</option>
					        <option value="">SHE Staff</option>
					        <option value="">Env. Admin</option>
					        <option value="">Env. User</option>
					        <option value="">Area Representative</option>
					        <option value="">Area Supervisor</option>
					        <option value="">Area Section Manager</option>
                      </select>
                    </div>
                  </div>
             </div>
	          
	          
	          <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramStatus" class="col-lg-4 control-label">Status</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="activeFlg">
                       	<option value="">--- ALL ---</option>
                       	 
					        <option value="Y">ใช้งาน</option>
					     
					        <option value="N">ไม่ใช้งาน</option>
					    
                      </select>
                      
                    </div>
                  </div>
             </div>
	          

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group "> 
							<div class="col-lg-12 text-center">
								<button type="reset" class="btn btn-default" onclick="doClear()"> &nbsp;Clear <i class="fa fa-refresh"></i></button>&nbsp;&nbsp;
								<button type="button" id="searchBtn" class="btn btn-primary" onclick="doSearch()">Search <i class="fa fa-search"></i></button>&nbsp;&nbsp;
<!-- 								<button type="button" class="btn btn-warning" disabled>Export <i class="fa fa-file-excel-o"></i></button> -->
							</div>
						</div>
					</div>
				</div>

				</form>
<!-- 				</div> -->
<!--             </fieldset> -->
            
	        </div>
	        </div>  <!-- ---BOX -->
        </div>
        </div>
<!-- 	##### <<<<<  SEARCH ####------------------- -->
	
		<!-- 	##### <<<<<  TABLE RESULT ####------------------- -->
<!-- 		<button type="button" class="btn btn-primary" onclick="doAdd()"><i class="fa fa-plus"></i>&nbsp;Add User</button> -->
<!-- 		  <br> -->
<!-- 		  <br> -->
		  
		  
		<div class="row " style="display: none;" id="rs_table"><div class="col-lg-12">	
		   <div class="box box-primary"> 
			 <div class="box-header with-border">
	              <h3 class="box-title">Result</h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
	                </button>
	              </div>
	            </div>
		 
		 <div class="box-body">
		 
		 
		<div class="bs-docs-section">
			<div class="bs-component">
				<div id="result-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="result-table_length"><label>Show <select name="result-table_length" aria-controls="result-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="result-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="result-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped  dataTable no-footer" id="result-table" cellspacing="0" width="100%" role="grid" aria-describedby="result-table_info">
					<thead>
						<tr role="row"><th class="text-center col-action sorting_disabled" rowspan="1" colspan="1" style="width: 60px;">Action</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">User Name</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">User Role</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">First Name</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Last Name</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Mobile</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Email</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Company</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Status</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Create Date  </th></tr>
					</thead>
				<tbody><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=1"><i class="fa fa-edit fa-lg"></i></a></td><td>admin</td><td>Admin,Edit,Export,View</td><td>System</td><td>Admin</td><td class=" text-center">354678</td><td class=" text-center">admin.tpac-tpcc@baiwa.co.th</td><td class=" text-center">TPCC</td><td class=" text-center">ใช้งาน</td><td class=" text-center">14/11/2016</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=10"><i class="fa fa-edit fa-lg"></i></a></td><td>kroekpong</td><td>Admin,Delete,Edit,View</td><td>Kroekpong</td><td>Sakulchai</td><td class=" text-center">098-305-8707</td><td class=" text-center">kroekpong@baiwa.co.th</td><td class=" text-center">อื่นๆ</td><td class=" text-center">ใช้งาน</td><td class=" text-center">29/11/2016</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=13"><i class="fa fa-edit fa-lg"></i></a></td><td>demouser</td><td>Edit,View</td><td>Demo</td><td>User</td><td class=" text-center">8888</td><td class=" text-center">demouser@baiwa.co.th</td><td class=" text-center">อื่นๆ</td><td class=" text-center">ไม่ใช้งาน</td><td class=" text-center">21/08/2017</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=14"><i class="fa fa-edit fa-lg"></i></a></td><td>ekapon</td><td>Admin,Edit,View</td><td>ekapon</td><td>xxx</td><td class=" text-center">099999999999</td><td class=" text-center">ekapon@ccccc.com</td><td class=" text-center">TPAC</td><td class=" text-center">ใช้งาน</td><td class=" text-center">12/10/2017</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=16"><i class="fa fa-edit fa-lg"></i></a></td><td>test</td><td>Admin,Delete,Export,View</td><td>View</td><td>UserView</td><td class=" text-center">54534</td><td class=" text-center">fdf</td><td class=" text-center">อื่นๆ</td><td class=" text-center">ใช้งาน</td><td class=" text-center">30/03/2018</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=17"><i class="fa fa-edit fa-lg"></i></a></td><td>ball</td><td>Admin,Delete,Edit,View</td><td>b</td><td>xsfs</td><td class=" text-center">hg</td><td class=" text-center">j</td><td class=" text-center">อื่นๆ</td><td class=" text-center">ใช้งาน</td><td class=" text-center">09/05/2018</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "#?edit=Y&amp;userId=18"><i class="fa fa-edit fa-lg"></i></a></td><td>jjdd</td><td>Admin,Delete</td><td>jj</td><td>ff</td><td class=" text-center"></td><td class=" text-center"></td><td class=" text-center">CC Content</td><td class=" text-center">ใช้งาน</td><td class=" text-center">09/05/2018</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="result-table_info" role="status" aria-live="polite">Showing 1 to 7 of 7 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="result-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="result-table_previous"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="result-table_next"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
				
			</div>
		</div>
		
			</div>
		</div>


		</div>
		
	
	</div>
            
     </section>
            
</div>
	
	
		<!-- 	##### <<<<< JAVASCRIPT ####------------------- -->
 <script>
 function doAdd(){
		location = "user_add_edit.php";
	}
 function doSearch(){
		$("#rs_table").show();
	}
 function doClear(){
		$("#rs_table").hide();
	}
</script>

<?php include 'user_add_edit.php' ;?>
	
<?php include '../../footer.php' ;?>