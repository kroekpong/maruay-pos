
 

<!-- Modal -->
<div class="modal " tabindex="-1" role="dialog" id="restProductModal"    data-backdrop="static">
   <div class="modal-dialog  modal-lg">
        <div class="modal-content">
		   
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-search"></i>  คืนการขายสินค้า</h4>
           
                 
			</div>
			
            <div class="modal-body">
					
			 

						<div class="row">
							<div class="col-md-12" >

							<table  id="product-table-return" class="table table-striped table-bordered table-hover dataTable nowrap" style="width:100%" >
								<thead  >
									<tr>
										<th>ลำดับ</th>
										<th>รหัสพักการขาย</th>
										<th>จำนวนสินค้า (รายการ)</th>
										<th>วันที่-เวลา</th>
										<!-- <th>ราคาขาย (บาท)</th> -->
									</tr> 
									</thead>
				

							</table>
						
						</div>
						</div>
						
						<div class="modal-footer">
						
							<!-- <button type="button" onclick="saveProduct()" class="btn btn-primary btn-lg" ><i class="fa fa-save"></i>&nbsp; Update</button> -->
							
							<button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">
								<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง [ESC]</button>
						</div>
				
        </div>
        </div>
    </div>
</div>


  <script>

	function openModalProductRest( ) {

		$("#restProductModal").modal(); 

		// $("#search-product").focus().val('');

		productRestTable = $('#product-table-return').DataTable({
			scrollY:   '280px',
			//  scrollCollapse: true,
			lengthChange:false,
			searching:false,
			paging:   false,
			data:[],
		    columns: [
				{ 
					 "data": "saleHeader_ID" , "width": "6%",
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						$(nTd).html(++iRow);
					}
	            },
		     	{ 
		     		"data": "saleHeader_ID"
					 , "className": "col-id"  , "width": "40%"
	            },
		     	{ 
		     		"data": "total"
					 , "width": "20%"
	            },
		     	{ 
		     		"data": "order_date"
	            }
		      
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,1,2,3] }
		    ],
			ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			// info:     false,
			language : DT_TH['language'] 
		 });  


		doSearchProductRest();

	} 


	function doSearchProductRest(){

		// var name = $("#search-product").val();

		// if(name.trim() == ""){ return false};

		// _showLoading(true);

		$.ajax({
			url: "service/product_service.php?method=search_rest_count",
			data:{ user_id : '<? echo $pos_user_id?>' }
		}).done(function (result) {
			productRestTable.clear().draw();
			productRestTable.rows.add(result).draw();
			// _showLoading();
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			// _showLoading();
		});

	};

	$('#product-table-return').on( 'dblclick', 'tr', function () {
			var data = productRestTable.row( this ).data();
			// console.log(result);

			_tmpId = data['saleHeader_ID'];

			$.ajax({
				url: "service/product_service.php?method=search_rest_list",
				data:{ saleHeader_ID : _tmpId}
			}).done(function (result) {

				dataList = result['dataList'] ;

				$("#p-type").val(result['saleType']);


			 	doSearch();

				 $("#restProductModal").modal('hide'); 

			}).fail(function (jqXHR, textStatus, errorThrown) { 
			});
		
		
			// loadProduct(data['product_ID']);

			// doSearch();
	});


</script>



  
  