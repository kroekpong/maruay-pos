<?php include '../../header.php' ;?>

        <div class="content-wrapper">
        
            <section class="content-header">
                <h3><i class="fa fa-hashtag"></i> Parameter Config</h3>
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
                    <label for="paramType" class="col-lg-4 control-label">Parameter Type</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="paramType">
                       	<option value="">--- ALL ---</option>
                       	 
                       	 	<option value="ACTIVE_TYPE">Active Status [สถานะใช้งาน]</option>

					    
                       	 	<option value="COURSE_TYPE">Course Type [ประเภทหลักสูตร]</option>

					    
                       	 	<option value="OWNER_TYPE">Contractor Type [ประเภทบุคคล]</option>

					    
                       	 	<option value="GENDER">Gender [เพศ]</option>

					    
                       	 	<option value="TITLE">Title [คำนำหน้าชื่อ]</option>

					    
                       	 	<option value="COMPANY">Company [ชื่อบริษัท]</option>

					    
                       	 	<option value="POSITION_MASTER">Job Position [ตำแหน่ง]</option>

					    
                       	 	<option value="SECTION_MASTER">Section/Department [หน่วยงาน/แผนก]</option>

					    
                       	 	<option value="PARAM_TYPE">*** Master Parameter ***</option>

					    
                      </select>
                    </div>
                  </div>
             </div>
	          
	          
	           <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramCode" class="col-lg-4 control-label">Parameter Code</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="paramCode">
                    </div>
                  </div>
             </div>
	          
             
		      <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramDesc" class="col-lg-4 control-label">Description TH/EN</label>
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="descTh">
                    </div>
                  </div>
             </div>
	          
	          
	          <div class="col-lg-6">
	          <div class="form-group">
                    <label for="paramStatus" class="col-lg-4 control-label">Status</label>
                    <div class="col-lg-6">
                       <select class="form-control" name="active">
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
		  <div class="box box-primary"  style="display: none;" id="rs_table"> 
			 <div class="box-header with-border">
	              <h3 class="box-title">Result</h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add
	                </button>
	              </div>
	            </div>
		 
		 <div class="box-body"> 
<!-- 		<div class="bs-docs-section"> -->
<!-- 			<div class="bs-component"> -->
				<div id="result-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="result-table_length"><label>Show <select name="result-table_length" aria-controls="result-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="result-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="result-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped  dataTable no-footer" id="result-table" cellspacing="0" width="100%" role="grid" aria-describedby="result-table_info">
					<thead>
						<tr role="row"><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 2%;">Action</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 5%;">Param Code</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 10%;">Param Type</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 10%;">Desc TH</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 10%;">Desc EN</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 5%;">Status</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 5%;">Sort No.</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 5%;">Create Date     </th></tr>
					</thead>
				<tbody><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=1"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">Y</td><td class=" text-center">ACTIVE_TYPE</td><td>ใช้งาน</td><td>Active</td><td class=" text-center">ใช้งาน</td><td class=" text-center">1</td><td class=" text-center">29/11/2016</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=2"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">N</td><td class=" text-center">ACTIVE_TYPE</td><td>ไม่ใช้งาน</td><td>Inactive</td><td class=" text-center">ใช้งาน</td><td class=" text-center">2</td><td class=" text-center">29/11/2016</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=826"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">BAIWA</td><td class=" text-center">COMPANY</td><td>บริษัท ใบวา จำกัด</td><td>BAIWA Co., Ltd.</td><td class=" text-center">ไม่ใช้งาน</td><td class=" text-center">1</td><td class=" text-center">22/11/2017</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=819"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">TPCC</td><td class=" text-center">COMPANY</td><td>TPCC</td><td>TPCC</td><td class=" text-center">ใช้งาน</td><td class=" text-center">2</td><td class=" text-center">09/10/2017</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=818"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">TPAC</td><td class=" text-center">COMPANY</td><td>TPAC</td><td>TPAC</td><td class=" text-center">ใช้งาน</td><td class=" text-center">3</td><td class=" text-center">09/10/2017</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=864"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">SMS</td><td class=" text-center">COMPANY</td><td>SMS</td><td>SMS</td><td class=" text-center">ใช้งาน</td><td class=" text-center">4</td><td class=" text-center">22/03/2018</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=865"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">CCContent</td><td class=" text-center">COMPANY</td><td>CC Content</td><td>CC Content</td><td class=" text-center">ใช้งาน</td><td class=" text-center">5</td><td class=" text-center">22/03/2018</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=866"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">SLC</td><td class=" text-center">COMPANY</td><td>SLC</td><td>SLC</td><td class=" text-center">ใช้งาน</td><td class=" text-center">6</td><td class=" text-center">22/03/2018</td></tr><tr role="row" class="odd"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=867"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">Manpower</td><td class=" text-center">COMPANY</td><td>Manpower</td><td>Manpower</td><td class=" text-center">ใช้งาน</td><td class=" text-center">7</td><td class=" text-center">22/03/2018</td></tr><tr role="row" class="even"><td class=" text-center"><a data-toggle="modal" data-target="#myModal"  href= "/SHEWeb/param/paramEdit.htm?paramId=868"><i class="fa fa-edit fa-lg"></i></a></td><td class=" text-center">IGG</td><td class=" text-center">COMPANY</td><td>IGG</td><td>IGG</td><td class=" text-center">ใช้งาน</td><td class=" text-center">8</td><td class=" text-center">22/03/2018</td></tr></tbody></table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="result-table_info" role="status" aria-live="polite">Showing 1 to 10 of 75 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="result-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="result-table_previous"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="result-table_ellipsis"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="7" tabindex="0">8</a></li><li class="paginate_button next" id="result-table_next"><a data-toggle="modal" data-target="#myModal"  href= "#" aria-controls="result-table" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
			</div>
<!-- 		</div> -->
		
	<!-- 	##### <<<<<  TABLE RESULT ####------------------- -->


	</div>
	
<!-- 	<hr> -->
	

	
	
	
		<!-- 	##### <<<<< JAVASCRIPT ####------------------- -->
 <script>
 	
	 	function doAdd(){
			location = "user_add_edit.php";
	 	}
	 	
	 	/* function doDel(paramId, name){
			bootbox.confirm({
			    title: "Confirm",
			    size: 'small',
			    message: _confirmDelTxt+" : "+name,
			    buttons: {
			        cancel: {
			            label: '<i class="fa fa-times"></i> Cancel'
			        },
			        confirm: {
			            label: '<i class="fa fa-check"></i> Confirm',
			            className: 'btn-success'
			        }
			    },
			    callback: function (result) {
			        if(result){
			        	$.ajax({
				            url: cPath+"/param/paramDelete?paramId="+paramId
				        }).done(function (result) {
					        bootbox.alert({
							    message: _successDelTxt,
							    size: 'small',
							    callback: function(){doSearch();}
							});
			            }).fail(function (jqXHR, textStatus, errorThrown) { 
			            });
			        }
			    }
			});
		}; */
		
		/* function doSearch(){
			$.ajax({
	            url: cPath+"/param/getSysParamTable.json",
	            data: $('#myForm').serialize()
	        }).done(function (result) {
	            rsTable.clear().draw();
	            if(result.recordsTotal>0){
		            rsTable.rows.add(result.data).draw();
	            }else{
	            	bootbox.alert({
					    message: "No Data Found!",
					    size: 'small'
					});
	            }
            }).fail(function (jqXHR, textStatus, errorThrown) { 
                  // needs to implement if it fails
            });
	 	}; */


	 	function doSearch(){
			$("#rs_table").show();
		}
	 function doClear(){
			$("#rs_table").hide();
		}
		
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
	



<!-- </div> -->

<!--         </div> -->
        
<!--       </div> -->
      <!-- /.row -->

     </section>
            
</div>

<?php include 'param_add_edit.php' ;?>


<?php include '../../footer.php' ;?>