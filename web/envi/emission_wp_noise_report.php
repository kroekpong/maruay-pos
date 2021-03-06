<?php include '../../header.php' ;?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-industry"></i>&nbsp;&nbsp;Workplace Noise Result
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

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="paramType" class="col-lg-4 control-label">Company</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="companyname" id="companyname">
                                            <option value="TPAC" selected>TPAC</option>
                                            <option value="TPCC">TPCC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="paramType" class="col-lg-4 control-label">สาร</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="companyname" id="companyname">
                                            <option value="TPAC">MC</option>
                                            <option value="TPCC" selected>HE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="paramCode" class="col-lg-4 control-label">From Year</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="year">
                                            <option>--- All ---</option>
												<?php for($i=2012;$i<=2018;$i++): ?>
													<option><?php echo $i; ?></option>
												<?php endfor; ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="paramCode" class="col-lg-4 control-label">To Year</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="year">
                                            <option>--- All ---</option>
                                            <?php for($i=2012;$i<=2018;$i++): ?>
                                                <option><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
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
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Result</h3>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="tab_tpac">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">Packing unit</a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab">Pellitizing</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <canvas id="tap1chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <canvas id="tap2chart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>

    </section>

</div>

<?php include '../../footer.php' ;?>
<script type="text/javascript">
    
    // chart 
    new Chart(document.getElementById("tap1chart"), {
        type: 'bar',
        data: {
            labels: ["2012", "2013"],
            datasets: [
                {
                    label: "TPAC1",
                    backgroundColor: "#3498DB",
                    data: [0.4, 0.3]
                }, {
                    label: "TPAC2",
                    backgroundColor: "#16A085",
                    data: [0.6, 0.9]
                }
            ]
        },
        options: {
            title: {
                display: false,
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
                    value: 0.11,
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

     // chart 
     new Chart(document.getElementById("tap2chart"), {
        type: 'bar',
        data: {
            labels: ["2012", "2013"],
            datasets: [
                {
                    label: "TPAC1",
                    backgroundColor: "#00c0ef",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }, {
                    label: "TPAC2",
                    backgroundColor: "#ff851b",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }
                , {
                    label: "TPAC2",
                    backgroundColor: "#605ca8",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }
            ]
        },
        options: {
            title: {
                display: false,
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
                    value: 0.11,
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
        $("#reportResult2").show();
        $("#reportResult3").show();
        $("#reportResult4").show();
        $("#reportResult5").show();
        $("#reportResult6").show();

    }

</script>