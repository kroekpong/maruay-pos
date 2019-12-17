<?php include '../../header.php' ;?>


   <div class="content-wrapper">
        
            <section class="content-header">
                <h3><i class="fa  fa-graduation-cap"></i> Calibration certificate  </h3>
                
            </section>
            
            <section class="content">
         


		<div class="row"><div class="col-lg-12">
		
		

<!-- 	#####  SEARCH >>>>> ####------------------- -->
		
		
<!-- 		  <fieldset><div class="well"> -->
 <div class="box box-primary">
 
		 <div class="box-header with-border">
              <h3 class="box-title">Criteria</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
         </div>
          
          <div class="box-body">
            
		   <form class="form-horizontal" id="myForm" commandname="sysParam" method="post"> 
		    
		      <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramType" class="col-lg-4 control-label">Department</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="department">
                       		<option value="">--- ALL ---</option>
                       	 	<option value="">SHE    </option> 
							<option value="">VP1    </option> 
							<option value="">VP2    </option> 
							<option value="">QR-POM </option> 
							<option value="">QR-VP  </option> 
							<option value="">QC-PT  </option> 
							<option value="">RD-PT  </option> 
							<option value="">POM    </option> 
							<option value="">MT     </option> 
                      </select>
                    </div>
                  </div>
             </div>
	          
	          
	           <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramCode" class="col-lg-4 control-label">Equipment Code</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="">
                    </div>
                  </div>
             </div>
	          
             
		      <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramDesc" class="col-lg-4 control-label">Serial No.</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="" >
                    </div>
                  </div>
             </div>
	          
	          
	          <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramStatus" class="col-lg-4 control-label">Status</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="active">
                       	<option value="">--- ALL ---</option>
                       	 
					        <option value="Y">Active</option>
					     
					        <option value="N">Inactive</option>
					    
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
				</div>
<!--             </fieldset> -->
            
        </div>
        </div>
        </div>
<!-- 	##### <<<<<  SEARCH ####------------------- -->
	
		<!-- 	##### <<<<<  TABLE RESULT ####------------------- -->
<!-- 		<button type="button" class="btn btn-primary" onclick="doAdd()"><i class="fa fa-plus"></i>&nbsp;Add Parameter</button> -->
<!-- 		  <br> -->
<!-- 		  <br> -->
		  <div class="box box-primary"   id="rs_table"> 
			 <div class="box-header with-border">
	              <h3 class="box-title">Result</h3>
	              <div class="box-tools pull-right">
<!-- 	                <button type="button" class="btn btn-box-tool btn-success btn-table"  onclick="doAdd()"><i class="fa fa-plus"></i> Add -->
<!-- 	                </button> -->
	              </div>
	            </div>
		 
		 	<div class="box-body"> 
 
 
			 <table  id="result-table" class="table table-striped  dataTable no-footer" style="width:100%">
				<thead  align="center" >
					<tr>
					<th align="center" >Action</th>
					<th align="center" >Department</th>
					<th align="center" >Equipment Code</th>
					<th align="center" >Serial No.</th>
					<th align="center"  >Brand</th>
					<th align="center"  >Model</th>
					<th align="center"  >Last Cal. Date</th>
					<th align="center" >Serviced By</th>
<!-- 					<th align="center" >Cal. Time Std.</th> -->
					</tr> 
				</thead>
				<tbody>
					<tr>
					<td class=" text-center">
						<a data-toggle="modal" data-target="#editModal" >
							<i class="fa fa-edit fa-lg"></i>
						</a>
					</td>
					<td align="center">SHE</td>
					<td align="left">3SE-507</td>
					<td align="left">0301311-047</td>
					<td align="left">Industrial Scientific</td>
					<td align="left">Multigas Detector, ITX</td>
					<td align="right">10/06/2018</td>
					<td align="left">Linde</td>
<!-- 					<td align="left">1 Months</td> -->
					</tr>
					<tr>
					<td class=" text-center">
						<a data-toggle="modal" data-target="#editModal" >
							<i class="fa fa-edit fa-lg"></i>
						</a>
					</td>
					<td align="center">SHE</td>
					<td align="left">3SE-512</td>
					<td align="left">0504000-368</td>
					<td align="left">Industrial Scientific</td>
					<td align="left">Multigas Detector, ITX</td>
					<td align="right">10/07/2018</td>
					<td align="left">Brave</td>
<!-- 					<td align="left">1 Months</td> -->
					</tr>
					<tr><td class=" text-center">
						<a data-toggle="modal" data-target="#editModal" >
							<i class="fa fa-edit fa-lg"></i>
						</a>
					</td>
					<td align="center">SHE</td>
					<td align="left">3SE-514</td>
					<td align="left">12071WC-001</td>
					<td align="left">Industrial Scientific</td>
					<td align="left">Multigas Detector. MX6</td>
					<td align="right">10/08/2018</td>
					<td align="left">Brave</td>
<!-- 					<td align="left">6 Months</td> -->
					</tr>
					</tbody>
				</table>
			 
 
	 
				</div>
			
		</div>
		
<!-- 	<hr> -->
	

	
	
	
		<!-- 	##### <<<<< JAVASCRIPT ####------------------- -->
 <script>
 	
 	function doAdd(){
// 		location = "user_add_edit.php";
		
 		$('#editModal').modal('show');
 	}
 	
 	function doSearch(){
		$("#rs_table").show();
	}

	function doClear(){
		$("#rs_table").hide();
	}

	 $('#result-table').DataTable({
		 ordering: false
	});
	 
	 
	 $(document).ready(function() {
		 
// 	 	$('#editModal').modal('toggle');
		 
	 });
	 

		/* var rsTable = $('#result-table').DataTable({
			autoWidth: false,
			data:[],
		    columns: [
		     	{ 
		     		"data": "paramCode"
		     		,"sWidth": "2%"
			        ,"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
			            var txt = $roleEdit? "<a href='/SHEWeb/param/paramEdit.htm?paramId="+oData.paramId+"'><i class='fa fa-edit fa-lg'></i></a>" : "";
			        	if($roleEdit&&$roleDel){ txt +=	"&nbsp;|&nbsp;" };
			        	if($roleDel){ txt += "<a href='javascript:void(0)' onclick=\"doDel('"+oData.paramId+"','"+oData.paramCode+"')\"><i class='fa fa-trash-o fa-lg'></i></a>" };
			            $(nTd).html(txt);
			        } 
	            },
		     	{ "data": "paramCode","sWidth": "5%" },
				{ "data": "paramType","sWidth": "10%" },
				{ "data": "descTh","sWidth": "10%" },
				{ "data": "descEn","sWidth": "10%" }, 
				{ "data": "active" ,"sWidth": "5%"},
				{ "data": "sortNo" ,"sWidth": "5%"},
				{ "data": "createDateStr" ,"sWidth": "5%"}
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,1,2,5,6,7] }
		    ],
		    ordering: false,
	   	   	destroy: true
		 }); */
		
		/* $("#searchBtn").click(function(){
		  	doSearch();
        }); */
		
	
</script>
	

     </section>
            
</div>


<?php include 'gas_certificate_edit.php' ;?>

<?php include '../../footer.php' ;?>