
 

<!-- Modal -->
<div class="modal " tabindex="-1"  role="dialog" id="userModal"   data-backdrop="static">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-edit"></i> เพิ่ม/แก้ไข ผู้ใช้งานระบบ </h4>
           
                 
			</div>
			
            <div class="modal-body">
				
			<div class="row">
						<div class="col-md-12 " >
 


			<form class="form-horizontal " id="user-form" method="post" >

				<div class="row">
					<div class="col-md-12" >
							
							<div class="form-group">
								<label class="col-sm-3 control-label">ชื่อ <font color="#FF0000" size="+1">*</font></label>
								<div class="col-sm-8">                                          
										<input type="hidden" id="employee_ID" name="employee_ID"   value="">
										<input type="text" id="employee_name" name="employee_name"  class="form-control" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">นามสกุล <font color="#FF0000" size="+1">*</font></label>
								<div class="col-sm-8">                                          
										<input type="text" id="employee_surname" name="employee_surname"  class="form-control" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">เบอร์โทรศัพท์ </label>
								<div class="col-sm-8">                                          
										<input type="text" id="tel" name="tel"  class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">ตำแหน่ง </label>
								<div class="col-sm-8">                                          
										<select class="form-control " id="role" name="role" >
												<option value="พนักงานขาย">พนักงานขาย</option>
												<option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">เมนูการใช้งาน </label>
								<div class="col-sm-9">                                          
									<div class="checkbox">
										<label> <input type="checkbox" id="fn1" name="fn1" value="fn1"> เมนูขายสินค้า </label> &nbsp;
										<label> <input type="checkbox" id="fn2" name="fn2" value="fn2"> เมนูคลังสินค้า </label> &nbsp;
										<label> <input type="checkbox" id="fn3" name="fn3" value="fn3"> เมนูสรุปยอดขาย </label> &nbsp;
										<label> <input type="checkbox" id="fn4" name="fn4" value="fn4"> เมนูตั้งค่า </label> &nbsp;
									</div>
								 </div>
							</div>

							<hr>
							<div class="form-group">
								<label class="col-sm-3 control-label">รหัสผู้ใช้งาน <font color="#FF0000" size="+1">*</font></label>
								<div class="col-sm-8">                                          
										<input type="text" id="user_ID" name="user_ID"  class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">รหัสผ่าน <font color="#FF0000" size="+1">*</font></label>
								<div class="col-sm-8">                                          
										<input type="text" id="password" name="password"  class="form-control" value="">
								</div>
							</div>


					</div>   
				</div>   
							
	</form>

<!-- ------------ -->

	</div>
</div>	  

			
				<div class="modal-footer">
					
					<button type="button" class="btn btn-success" onclick="doUpdateUser()">
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

	function clearUser() {
				
		$("#p_name").val('');
		$("#p_code").val('ระบบอัตโนมัติ');

		isauto = true;
	}

	
	function doUpdateUser() {
	 
		if($('#employee_name').val().length==0) {
			swal("","กรุณาระบุ ชื่อ !","warning");
			$('#employee_name').focus();
			return false;
		}
		if($('#employee_surname').val().length==0) {
			swal("","กรุณาระบุ นามสกุล !","warning");
			$('#employee_surname').focus();
			return false;
		}
		if($('#user_ID').val().length==0) {
			swal("","กรุณาระบุ รหัสผู้ใช้งาน !","warning");
			$('#user_ID').focus();
			return false;
		}
		if($('#password').val().length==0) {
			swal("","กรุณาระบุ รหัสผ่าน !","warning");
			$('#password').focus();
			return false;
		}



	    var method = "update";
	    var txttype = "แก้ไขข้อมูล";
		if(!isEdit){
			method = "save";
			txttype = "เพิ่มข้อมูล";
		}

		$.ajax({
            type: 'POST',
			data: $('#user-form').serialize(),
            url: 'service/user_service.php?method='+method+'&user_id='+'<? echo $pos_user_id?>',
            success: function(data) {

                // console.log(data['status']);
				if(data['status'] == "duplicate"){
					swal("", "รหัสผู้ใช้ ["+$('#user_ID').val()+"] มีอยู่แล้วในระบบ !" ,"warning");
				}else	if(data['status'] == "success"){
					// setTimeout(function() {
						$('#userModal').modal('hide')

						$.notify(txttype+"ผู้ใช้งาน สำเร็จ !", 'success' );
						// doSearch();
						reloadTable();
				}
			
            }
        });

	}

	 
	var isEdit = false ;
	function openModalUser(pdata) {

		isEdit = false ;
		$("#user-form")[0].reset(); 

		if(pdata) {	
			isEdit = true ;
			for (var key in pdata) {
				if (pdata.hasOwnProperty(key)) {
					$('#'+key).val( pdata[key]);
					$('#'+key).prop('checked', (pdata[key]=='1')  );
				}
			}
		}

		$("#userModal").modal(); 

	} 
	   

</script>



  
  