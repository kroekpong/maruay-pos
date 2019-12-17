
 

<!-- Modal -->
<div class="modal " tabindex="-1"  role="dialog" id="finishModal"   data-backdrop="static">
   <div class="modal-dialog modal-finish">
        <div class="modal-content">
           
            <!-- <div class="modal-body"> -->
<!-- 				
			<div class="row">
						<div class="col-md-12 " > -->
 


			<!-- <form class="form-horizontal product-form" id="param-form" method="post" > -->

				<!-- <div class="row"> -->
					<!-- <div class="col-md-12" > -->
								
						<div class="box-body full-height box-finish"  >
						<div class="box-r alert alert-success">
						
								<div class="row">
									<span class="f-horizontal">ส่วนลด (บาท)</span>
									<span >
										<input id="fn-dis"   class="form-control f-fin" value="0.00" readonly >  
									</span>
								</div>	

								<!-- <div class="row"> -->

								<!-- <dt>ส่วนลดทั้งหมด (บาท)</dt>
								<dd><input id="p-total-dis"   class="form-control input-price inline p-0" value="0.00" readonly>  </dd> -->
								<div class="row">
									<span  class="f-horizontal">รวมเป็นเงิน (บาท)</span>
									<span>
										<input id="fn-total"   class="form-control  f-fin" value="0.00"   readonly> 
								 	</span>
								</div>	
								<!-- <dd>0.00</dd> -->
								<div class="row">
									<span  class="f-horizontal">เงินทอน (บาท)</span>
									<span>
										<input id="fn-change"   class="form-control  f-fin f-change" value="0.00"  readonly >  
									</span>
								</div>	
								<!-- <dd>0.00</dd> -->
								
							<!-- </dl> -->
						</div>	
						</div>	


					<!-- </div>   
				</div>   
							 -->
	<!-- </form> -->

<!-- ------------ -->

	<!-- </div> -->
<!-- </div>	   -->

			
				<div class="modal-footer">
					
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง </button>
				</div>
				
        <!-- </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>

	var isauto = true;
 
	function openModalFinish(data) {
		
		// $("#title-param").html(title); 
		// console.log(data);
		$("#finishModal").modal(); 

		$("#fn-dis").val(data['total_discount']); 
		$("#fn-total").val(data['total_amount']); 
		$("#fn-change").val(data['change']); 

		

	} 
	   

</script>



  
  