
 

<!-- Modal -->
<div class="modal " tabindex="-1"  role="dialog" id="stockParamModal"   data-backdrop="static">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-edit"></i> เพิ่ม/แก้ไข [ <label id="title-param"></label> ] </h4>
           
                 
			</div>
			
            <div class="modal-body">
				
			<div class="row">
						<div class="col-md-12 " >
 


			<form class="form-horizontal product-form" id="param-form" method="post" >

				<div class="row">
					<div class="col-md-12" >
							 
							<div class="form-group">
								<label class="col-sm-4 control-label">รหัส</label>
								<div class="col-sm-8">                                          
										<input type="text" id="p_code" name="code"  class="form-control" value="ระบบอัตโนมัติ" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label">ชื่อ </label>
								<div class="col-sm-8">                                          
										<input type="text" id="p_name" name="name"  class="form-control" value="">
								</div>
							</div>


					</div>   
				</div>   
							
	</form>

<!-- ------------ -->

	</div>
</div>	  

			
				<div class="modal-footer">
					
					<button type="button" class="btn btn-success" onclick="doUpdateParam()">
						<i class="fa fa-save"></i>&nbsp; บันทึกข้อมูล</button>
					
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง </button>

				</div>
				
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>

	var isauto = true;

	function clearParam() {
				
		$("#p_name").val('');
		$("#p_code").val('ระบบอัตโนมัติ');

		isauto = true;
	}

	
	function doUpdateParam() {
	 
		if($('#p_name').val().length==0)
		{
			swal("","กรุณาระบุชื่อ "+title+" !","warning");
			$('#a-product_Name').focus();
			return false;
		}

	    var method = "update";
	    var txttype = "แก้ไขข้อมูล";
		if(isauto){
			method = "save";
			txttype = "เพิ่มข้อมูล";
		}

		$.ajax({
            type: 'POST',
			data: $('#param-form').serialize(),
            url: 'service/param_service.php?method='+method+'&type='+p_type+'&user_id='+'<? echo $pos_user_id?>',
            success: function(data) {

                // console.log(data['status']);
				if(data['status'] == "duplicate"){
					swal("", title+" ["+$('#p_name').val()+"] มีอยู่แล้วในระบบ !" ,"warning");
				}else	if(data['status'] == "success"){
					// setTimeout(function() {
						$('#stockParamModal').modal('hide')

						$.notify(txttype+"  "+title+" ["+$('#p_name').val()+"] สำเร็จ !", 'success' );
						// doSearch();
					reloadTable(p_type);
				}
			
            }
        });

	}

	 
	 var title = "" ;
	 var p_type = "" ;
	function openModalParam(type, code, name) {
		
		p_type = type;
		clearParam() ;

		if(type == '1'){
			title = "หน่วยนับ" ;
		}else if(type == '2'){
			title = "หมวดหมู่" ;
		}else if(type == '3'){
			title = "สถานที่จัดเก็บ" ;
		}

		if(code){
			isauto = false;
			$("#p_code").val(code);
			$("#p_name").val(name);
		}

		// console.log(code,name,isauto );

		$("#title-param").html(title); 

		$("#stockParamModal").modal(); 

	} 
	   

</script>



  
  