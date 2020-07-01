<?php include 'constant.php' ;?>

<?php include 'baht_text.php' ;?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
	  
	  
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="<?php echo $uri ; ?>assets/bower_components/font-awesome/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/AdminLTE.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link href="<?php echo $uri ; ?>assets/img/pos/khotdee_circle.png" rel="shortcut icon">

<style> 

thead {
    color: white;
    background-color: #777 !important;
    -webkit-print-color-adjust: exact; 
}

.center{
  text-align: center !important;
}

.title-inv{
  background-color: #777 !important;
  font-size: 20px;
  padding: 0.5em 0.6em;
}

.pr-90{
  padding-right: 85px;
}

.name{
  font-size: 20px;
}

.baht-txt{
  font-size: 14px;
}


.box-r { 
    margin-bottom: 10px; 
    min-height: 180px;
}
/* .box-hd {
  border-bottom: 1px solid #eee;
} */

 .box-border{
  border: 1px solid #ccc;
  border-radius: 10px;  
 }

.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}

.table {
    font-size: 12px;
}

.t-item {
    font-size: 12px; 
    /* border: none; */
    border: 1px solid #ddd;
    
}

.pr-5 {
  padding-right: 8px;
}

.pl-5{
  padding-left: 8px;
}

.t-item>thead>tr>td , .t-item>tbody>tr>td{ 
    /* border: none;    */
    border-right: 1px solid #ddd;
    border-left: 1px solid #ddd;
  }

/* .text-right{
  text-align: right;
} */
 
@media print {
  .wrapper{            
    display: block;
    width: auto;
    height: auto;
    overflow: visible;  
  }
 

}
 

   table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }

</style>
  
</head>



<?


  session_start();
	include("config_service.php");

 $inv_no = $_REQUEST['inv'];
 $total_change = $_REQUEST['change'];



 $u_id = $_REQUEST['u_id'];
 $u_name = $_REQUEST['u_name'];
 $u_addr = $_REQUEST['u_addr'];
 $u_tel = $_REQUEST['u_tel'];
 $u_create = $_REQUEST['u_create'];
 $u_mail = $_REQUEST['u_mail'];


 $create_date =  "";


 $rows= array();

  $saleHeader_ID=$inv_no;


  $sql_rest = " SELECT a.* ,   ROUND(a.price,2) as sell_price , a.amount as total_price ,
  p.qty AS old_qty_update , (p.qty + a.qty) AS new_qty_update , 
  ROUND(h.total_amount,2) total_amount, ROUND(h.total_discount,2) total_discount
  ,  emp.employee_name , emp.employee_surname
  FROM tb_SaleDetail  a 
  left join  tb_SaleHeader h   on a.saleHeader_ID = h.saleHeader_ID
  LEFT JOIN  tb_ProductMaster p   ON p.product_ID = a.product_ID
  LEFT JOIN  tb_Employee emp  ON emp.user_ID = h.employee_ID
  WHERE   a.saleHeader_ID= '".$saleHeader_ID."' and  h.sale_status = 'S' " ;

  $q_list_rest = mysql_query($sql_rest) or die("Could not query");
  $rows= array();
  while($result=mysql_fetch_assoc($q_list_rest)) {
    $rows[]=$result;


    $u_create = $result['employee_name'].' '.$result['employee_surname'];
    $create_date = $result['create_date'];
  }
 



?>



<body onload="window.print();">
<!-- <body  > -->
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
  <!--   <div class="row">
      <div class="col-xs-12">
        <p class="page-header">
            <strong> <? echo $pos_name; ?> 
          <b class="pull-right">ใบส่งสินค้า/ใบกำกับภาษี</b><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </p>
      </div>
    </div> -->
    <!-- info row -->

 <div class="row box-hd">
      <div class="col-xs-6">
      <strong class="name"><? echo $pos_name; ?>  </strong>
      <address>
         77/2-77/3 หมู่ที่ 1 ต.บ้านเก่า  
         อ.พานทอง  จ.ชลบุรี  21060 <br>
         โทรศัพท์ : 093-3262848<br>
         เลขประจำตัวผู้เสียภาษี : 3200300166004
       </address>
 </div>

    <div class="col-xs-6 ">
    <span class="label label-primary pull-right title-inv"> ใบส่งสินค้า/ใบกำกับภาษี</span>
    <br><br><br> <span class="pull-right pr-90"><strong style="font-size: 20px"> ต้นฉบับ </strong></span>
    
  </div>

    </div>

    <div class="row invoice-info">

      <div class="col-xs-6  pr-5 ">

           <div class="box-body box-border  box-r">
         

         <table class="table table-borderless">
            <tr>
              <th style="width:30%">ชื่อลูกค้า</th>
              <td ><?echo  $u_name;?></td>
            </tr>

            <!-- <tr>
              <th >เลขประจำตัวผู้เสียภาษี</th>
              <td ><?echo $u_id;?></td>
            </tr> -->

            <tr>
              <th >ที่อยู่</th>
              <td><?echo $u_addr;?></td>
            </tr>

            <tr>
              <th >โทรศัพท์</th>
              <td><?echo $u_tel;?></td>
            </tr>
             
            <tr>
              <th >อีเมล</th>
              <td><?echo $u_mail;?></td>
            </tr>
             
          </table>

            </div>
        <!-- <strong>ลูกค้า  </strong>
        <address>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br> 
          Email: info@almasaeedstudio.com
        </address> -->
      </div> 
       
      <div class="col-xs-6  pl-5 ">
        <div class="box-body box-border  box-r">
          <!-- <b>เลขที่ใบกำกับ : </b><? echo $inv_no; ?><br>
          <b>วันที่ :</b> <? echo date("d/m/Y H:i:s") ;?><br> -->
          <!-- <b>Account:</b> 968-34567 -->


          <table class="table table-borderless">
            <tr>
              <th style="width:30%">เลขที่ใบกำกับ</th>
              <td ><?echo  $inv_no;?></td>
            </tr>
 
            <tr>
              <th style="width:25%">เลขที่อ้างอิง</th>
              <td ><?echo  $inv_no;?></td>
            </tr>
 

            <tr>
              <th >วันที่ทำรายการ</th>
              <td><?echo $create_date;?></td>
            </tr>

            <tr>
               <th >ผู้ทำรายการ</th>
              <td><?echo $u_create;?></td>
            </tr>
             
          </table>




          </div>
      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 ">
        <table class="table t-item">
          <thead >
          <tr >
            <th class="center" width="6%">#</th>
            <th class="center">รายการสินค้า</th>
            <th class="center"  width="10%">จำนวน</th> 
            <th class="center"  width="12%">ราคา/หน่วย</th>
            <th class="center" width="10%">ส่วนลด</th>
            <th class="center" width="12%">จำนวนเงิน</th>
          </tr>
          </thead>
          <tbody>
          

          <? 
            $ic = 1;
            // echo json_encode($rows);
            $total_amount = 0;
            $total_dis = 0;
            foreach($rows as $item) {  
            
             
              $discount = $item['discount']>0?  number_format($item['discount'], 2) :'';
              $sell_price = number_format($item['sell_price'], 2);
              $total_price = number_format($item['total_price'], 2);
             
              $total_amount = $item['total_amount'];
              $total_dis = $item['total_discount'];

             

              $total_vat  = ($total_amount * 7 ) / 107;
              $total_bf  = $total_amount - $total_vat ;

              $total = $total_amount + $total_dis ;
          ?>

          <tr>
            <td  class="center"><? echo $ic++; ?></td>
            <td><? echo $item['product_Name']; ?>  </td>
            <td class="center"><? echo $item['qty']. ' '. $item['unit_name']; ?></td>
            <td class="text-right"><? echo  $sell_price; ?></td>
            <td class="text-right"><? echo $discount ; ?></td>
            <td class="text-right" ><? echo $total_price; ?></td>
          </tr>

          <? }  ?>

          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-7">
        <!-- <p class="lead">Payment Methods:</p> -->
        <p class="well well-sm no-shadow center baht-txt"  >
           (<? echo baht_text($total_amount); ?>)
        </p>
      </div>
      <!-- /.col -->

      <div class="col-xs-5">
        <!-- <p class="lead">Amount Due 2/22/2014</p> -->

        <div class="table-responsive">
          <table class="table table-borderless" style="margin-bottom: 0px;">
            <!-- <tr>
              <th style="width:55%">รวมเป็นเงิน</th>
              <td class="text-right"><?echo number_format($total, 2);?></td>
            </tr>
            <tr>
              <th>หักส่วนลดทั้งหมด</th>
              <td class="text-right"><?echo number_format($total_dis, 2);?></td>
            </tr> -->
            <tr>
              <th>มูลค่ารวมก่อนภาษี</th>
              <td class="text-right"><?echo number_format($total_bf, 2);?></td>
            </tr> 
            <tr>
              <th>ภาษีมูลค่าเพิ่ม (7%)</th>
              <td class="text-right"><?echo number_format($total_vat, 2);?></td>
            </tr>
            <tr>
              <th>มูลค่ารวมสุทธิ</th>
              <td class="text-right"><?echo number_format($total_amount, 2);?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>


<!-- <hr> -->

  <div class="row center">
  <hr> 
      <div class="col-xs-3 ">
ผู้รับสินค้า<br>
<br>   ____________________<br>
<br>วันที่ _______________
      </div> 
      <div class="col-xs-3 ">
ผู้ส่งสินค้า<br>
<br>   ____________________<br>
<br>วันที่ _______________
      </div>   
      <div class="col-xs-3">

ผู้รับเงิน<br>
<br>   ____________________<br>
<br>วันที่ _______________

      </div>   
      <div class="col-xs-3">
ผู้อนุมัติ<br>
<br>   ____________________<br>
<br>วันที่ _______________

      </div> 


    </div>

<br>
<br>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<div style="page-break-after: always"></div>

<!-- ./wrapper -->
</body>
</html>
