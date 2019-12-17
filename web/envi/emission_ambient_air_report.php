<?php include '../../header.php' ;?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-industry"></i>&nbsp;&nbsp;Ambient Air (7 day)
        </h1>
    </section>


    <section class="content">

        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report</h3>
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
                                            <option value="TPAC" selected>TSP</option>
                                            <option value="TPCC">SOx</option>
                                            <option value="TPAC">SOx 24(HR)</option>
                                            <option value="TPCC">NOx</option>
                                            <option value="TPAC">Formalin</option>
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

                <div class="box box-primary" id="reportResult" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">ค่ามาตรฐานฝุ่นละอองรวมในบรรยากาศ ไม่เกิน 0.330 ppm</h3>
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

            </div>

        </div>
        <!-- /.row -->

    </section>

</div>
<?php include '../../footer.php' ;?>

<script type="text/javascript">
    // chart 
    new Chart(document.getElementById("tsp_tpac"), {
        type: 'bar',
        data: {
            labels: ["Jun 2012", "Mar 2013", "Aug 2013", "Feb 2014", "Jun 2014", "Feb 2015", "Sep 2015"],
            datasets: [
                {
                    label: "โรงงาน",
                    backgroundColor: "#3498DB",
                    data: [0.093, 0.05, 0.07, 0.078, 0.068, 0.047, 0.031]
                }, {
                    label: "โรงเรียนบ้านหนองแฟบ",
                    backgroundColor: "#16A085",
                    data: [0.049, 0.051, 0.045, 0.132, 0.077, 0.046, 0.034]
                }, {
                    label: "ชุมชนบ้านชากกลาง",
                    backgroundColor: "#F39C12",
                    data: [0.058, 0.066, 0.065, 0.098, 0.092, 0.071, 0.037]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'TSP'
            },
            animation: {
                onComplete: function () {
                    var ctx = this.chart.ctx;
                    var fontSize = 10;
                    var fontStyle = 'bold';
                    var fontFamily = Chart.defaults.global.defaultFontFamily;
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset) {
                        for (var i = 0; i < dataset.data.length; i++) {
                            for (var key in dataset._meta) {
                                var model = dataset._meta[key].data[i]._model;
                                var dataval = dataset.data[i];
                                var lb = dataval;
                                if (dataval > 0) {
                                    ctx.fillText(lb, model.x, model.y);
                                }
                            }
                        }
                    });
                }
            }, annotation: {
                annotations: [{
                    type: 'line',
                    mode: 'horizontal',
                    scaleID: 'y-axis-0',
                    value: 0.33,
                    borderColor: "#E74C3C",
                    borderWidth: 2,
                    borderDash: [5, 5],
                    label: {
                        enabled: false,
                        // content: 'Test label'
                    }
                }]
            }
        }
    });
    ///

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
        $("#reportResult").show();
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