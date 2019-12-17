<?php include '../../header.php' ;?>

<div class="content-wrapper">

<section class="content-header">
<h1>
<i class="fa fa-industry"></i>&nbsp;&nbsp;Ambient Air (24 HR)
</h1>
</section>


  <section class="content">

    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Criteria</h3>
          </div>
          <div class="box-body">

            <form class="form-horizontal" id="myForm" commandname="sysParam" method="post">

              <div class="col-lg-3">
                <div class="form-group">
                  <label for="paramType" class="col-lg-4 control-label">Company</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="companyname" id="companyname">
                      <option value="TPAC" selected>TPAC</option>
                      <option value="TPCC">TPCC</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="paramType" class="col-lg-4 control-label">สารตรวจวัด</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="companyname" id="companyname">
                      <option value="TPCC" >Benzene</option>
                      <option value="TPAC" selected>Methylene Chloride</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-5">
                <div class="form-group">
                  <label for="paramCode" class="col-lg-4 control-label">Period</label>
                  <div class="col-lg-8">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="daterange">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group ">
                    <div class="col-lg-12 text-center">
                      <button type="reset" class="btn btn-default"> &nbsp;Clear
                        <i class="fa fa-refresh"></i>
                      </button>&nbsp;&nbsp;
                      <button type="button" id="searchBtn" class="btn btn-primary" onclick='clickSearch()'>Search
                        <i class="fa fa-search"></i>
                      </button>&nbsp;&nbsp;
                      <!-- 								<button type="button" class="btn btn-warning" disabled>Export <i class="fa fa-file-excel-o"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-primary" style="display: none;" id="resultSearch">
              <div class="box-header with-border" >
                <h3 class="box-title">พื้นที่ชุมชน</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
	            </div>

          <div class="box-body">

            <form role="form">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="chart">
                    <canvas id="tsp_tpac"></canvas>
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <!-- row -->
            </form>
          </div>
          <!-- /.box-body -->
        </div>

        <div class="box box-primary" style="display: none;" id="resultSearch2">
              <div class="box-header with-border" >
                <h3 class="box-title">พื้นที่โรงงาน</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
	            </div>

          <div class="box-body">

            <form role="form">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="chart">
                    <canvas id="plant_point"></canvas>
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <!-- row -->
            </form>
          </div>
          <!-- /.box-body -->
        </div>

      </div>

    </div>
    <!-- /.row -->

  </section>

</div>
<?php include '../../footer.php' ;?>

<script type="text/javascript">
// chart 
new Chart(document.getElementById("tsp_tpac"), {
	    type: 'line',
	    data: {
	      labels: ["Jun 15", "Feb 15", "Mar 15","Apl 15","May 15","Jun 15","Jul 15","Aug 15","Sep 15","Oct 15","Nov 15","Dec 15"],
	      datasets: [
	        {
            fill: false,
            label: "โรงเรียนบ้านหนองแฟบ",
            borderColor:"#16A085",
	          backgroundColor: "#16A085",
	          data: [3.89,1.81,1.88,0.7,0.51,0.56,2.71,2.29,0.56,1.04,2.64,1.32]
	        }, {
            fill: false,
            label: "ชุมชนบ้านชากกลาง",
            borderColor:"#F39C12",
	          backgroundColor: "#F39C12",
	          data: [3.55,3.2,0.76,0.63,0.63,0.63,1.46,1.32,0.56,0.49,2.57,2.02]
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: true,
	        text: 'Benzene'
      }
    //   ,annotation: {
    //   annotations: [{
    //     type: 'line',
    //     mode: 'horizontal',
    //     scaleID: 'y-axis-0',
    //     value: 210,
    //     borderColor: "#E74C3C",
    //     borderWidth: 2,
    //     borderDash: [5, 5],
    //     label: {
    //       enabled: false,
    //       //content: 'Test label'
    //     }
    //   }]
    // }
	    }
	});
  ///

  new Chart(document.getElementById("plant_point"), {
	    type: 'line',
	    data: {
	      labels:  ["Jun 15", "Feb 15", "Mar 15","Apl 15","May 15","Jun 15","Jul 15","Aug 15","Sep 15","Oct 15","Nov 15","Dec 15"],
	      datasets: [
	        {
            fill: false,
            label: "โรงงาน",
            borderColor:"#16A085",
	          backgroundColor: "#16A085",
	          data: [6.26,31.78,39.91,72.94,127.01,40.81,151.51,34.24,4.66,6.57,7.79,65.11]
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: true,
	        text: 'Benzene'
      },annotation: {
      annotations: [{
        type: 'line',
        mode: 'horizontal',
        scaleID: 'y-axis-0',
        value: 210,
        borderColor: "#E74C3C",
        borderWidth: 2,
        borderDash: [5, 5],
        label: {
          enabled: false,
          //content: 'Test label'
        }
      }]
    }
	    }
	});

  $(function () {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      locale: {
        format: 'MMMM/YYYY'
      }
    }, function (start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });
  function clickSearch() {
    $("#resultSearch").show();
    $("#resultSearch2").show();
    var companyName = $('select[name=company]').val();
    var chart = document.getElementById("chart");
    if (companyName == "1") {
      chart.src = "../../assets/img/chart_Ambient_tsp.png"
    } if (companyName == "2") {
      chart.src = "../../assets/img/ambien_sox.png"
    } if (companyName == "3") {
      chart.src = "../../assets/img/ambien_nox_tpac.png"
    } if (companyName == "4") {
      chart.src = "../../assets/img/ambien_nox_tpcc.png"
    } if (companyName == "6") {
      chart.src = "../../assets/img/ambien_co.png"
    }
  }

</script>