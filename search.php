<?php include 'header.php' ;?>

        <div class="content-wrapper">
         
            
            <section class="content">
         


		<div class="row"><div class="col-lg-12">
		
		

<!-- 	#####  SEARCH >>>>> ####------------------- -->
		
		
<!-- 		  <fieldset><div class="well"> -->
 <div class="box box-primary">

          <div class="box-body">
            
		   <form class="form-horizontal" id="myForm" commandname="sysParam" method="post"> 
		    
	          
	     
	          
             
	          
	    <!--       
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
             </div> -->


			 
	          


				<div class="input-group">
                  <input type="text" name="name" id="name" placeholder="รหัสรายการ" class="form-control">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-flat" onclick="doSearch()">ค้นหา</button>
                      </span>
                </div>

                    <!-- <label for="paramCode" class="col-lg-4 control-label"></label> -->
					<!-- <div class="col-md-8">
						<div class="form-group ">
                    <div class="col-md-12">
                       <input type="text" class="form-control" name="code" placeholder="รหัสรายการ" >
                    </div>
                    </div>
                    </div>

					<div class="col-md-4">
						<div class="form-group "> 
							<div class="col-lg-12 text-center">
								<button type="reset" class="btn btn-default" onclick="doClear()"> &nbsp;ล้าง&nbsp; <i class="fa fa-refresh"></i></button>&nbsp;&nbsp;
								<button type="button" id="searchBtn" class="btn btn-primary" onclick="doSearch()">ค้นหา <i class="fa fa-search"></i></button>&nbsp;&nbsp;
								<button type="button" class="btn btn-warning" disabled>Export <i class="fa fa-file-excel-o"></i></button>
							</div>
						</div>
					</div>-->

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

		  <div class="box box-primary"  style="" id="rs_table"> 
			 <div class="box-header with-border">
	              <h4 class="box-title text-center"> <label id="total-txt">0</label> รายการ</h4>
	              <!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> เพิ่ม
	                </button>
	              </div> -->
	            </div>
		 
		 	<div class="box-body box-comments" id="rs-body"> 

			 


              </div>
              <!-- /.box-comment -->



            </div>




			</div>
		


	</div>


	
<!-- 	<hr> -->
	

	
	
	
		<!-- 	##### <<<<< JAVASCRIPT ####------------------- -->
 <script>

 	  var searchRequest = null;
	  var minlength = 3;


	 	function doAdd(){
			location = "user_add_edit.php";
	 	}
	 	 
		var rowtxt_m = ' <div class="box-comment"> <a href="upload/{img_path}" data-lightbox="{product_id}" data-title="{img_name}">' +
		'<img class="img-circle img-sm" src="upload/{img_src}" >' +
		' </a> <div class="comment-text"> <span class="username"> {name} ' +
		// '<span class="text-muted pull-right">2019-01-03</span> </span> ' +
		'<a href="#" class="label label-danger pull-right" onclick="doDelete({file_id},\'{del_path}\')"><i class="fa fa-trash"></i> ลบ</a>  </span> ' +
		'</div>  </div>';


		function doDelete(fid,img_path){
			swal({
			title: "ยืนยัน",
			text: "ต้องการลบรายการนี้หรือไม่ ?",
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false 
			}, function () {
				$.ajax({
					type: 'POST',
					data: {file_id:fid, img_path:img_path},
					url: "service/product_service.php?method=delete",
					success: function(data) {
						var  title = ("success"==data['status']) ? "ลบรายการสำเร็จ !" : "ผิดพลาด !";
						swal({
						title: title,
						type: data['status'],
						closeOnConfirm: false 
						}, function () {
							// location.reload();
							doSearch();
						}); 
					}
				}); 
				
			});
		}
		

		 $("#name").keyup(function () {
				var that = this,
				value = $(this).val();

				if (value.length >= minlength ) {
					if (searchRequest != null) {
						searchRequest.abort();
					}

					doSearch();
				}
		});		


		function doSearch(){

			 if($('#name').val().trim() == "" ){
				swal('กรุณาระบุ รหัสรายการ');
				$('#name').focus();
				return;
			}

			
			_showLoading(true);


			searchRequest = $.ajax({
				url: "service/product_service.php?method=search",
	            data: $('#myForm').serialize()
	        }).done(function (result) {

			var txt = "";
			$('#rs-body').html('');
			result.forEach(element => {
					var rowtxt = rowtxt_m;
					rowtxt = rowtxt.replace('{product_id}',element['product_id']);
					rowtxt = rowtxt.replace('{file_id}',element['file_id']);
					rowtxt = rowtxt.replace('{name}',element['name']);
					rowtxt = rowtxt.replace('{img_path}',element['img_path']);
					rowtxt = rowtxt.replace('{del_path}',element['img_path']);
					rowtxt = rowtxt.replace('{img_src}',element['img_path']);
					rowtxt = rowtxt.replace('{img_name}',element['img_name']);
					txt += rowtxt ;
				});

					$('#total-txt').html(result.length);
					$('#rs-body').html(txt);

					_showLoading();

	            // rsTable.clear().draw();
	            // if(result.recordsTotal>0){
		        //     rsTable.rows.add(result.data).draw();
	            // }else{
	            // 	bootbox.alert({
				// 	    message: "No Data Found!",
				// 	    size: 'small'
				// 	});
	            // }
            }).fail(function (jqXHR, textStatus, errorThrown) { 
                  // needs to implement if it fails
            });
	 	};


	 	// function doSearch(){
		// 	$("#rs_table").show();
		// }
	 function doClear(){
			// $("#rs_table").hide();
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