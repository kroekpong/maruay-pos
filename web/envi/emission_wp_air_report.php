<?php include '../../header.php' ;?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-industry"></i>&nbsp;&nbsp;Workplace Air Result
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
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Result</h3>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="tab_tpac">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">TSP</a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab">Benzene</a>
                        </li>
                        <li>
                            <a href="#tab_3" data-toggle="tab">Formaldehyde</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <h4 class="border-bottom">Packing Unit</h4>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <canvas id="tap1"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <?php $name2 = array("Formalin Plant","Monomer Plant", "Polymer Plant");
                                    for ($j=0; $j < count($name2); $j++):
                            ?>
                            <h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <canvas id="tap2<?php echo $j; ?>"></canvas>
                                </div>
                            </div>
                            <?php endfor; ?>
                            
                        </div>

                        <div class="tab-pane" id="tab_3">
                            <?php $name3 = array("Formalin Plant","Monomer Plant", "Polymer Plant", "Wast water treatment (WWT)");
                                    for ($j=0; $j < count($name3); $j++):
                            ?>
                             <h4 class="border-bottom"><?php echo $name3[$j]; ?></h4>
                             <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <canvas id="tap3<?php echo $j; ?>"></canvas>
                                </div>
                            </div>
                             <?php endfor; ?>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>


    </section>

</div>


<script type="text/javascript">
    // chart 
    new Chart(document.getElementById("tap1"), {
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
<?php for ($j=0; $j < count($name2); $j++): ?>
    new Chart(document.getElementById("tap2<?php echo $j; ?>"), {
        type: 'bar',
        data: {
            labels: ["2012", "2013"],
            datasets: [
                {
                    label: "TPAC1",
                    backgroundColor: "#3498DB",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }, {
                    label: "TPAC2",
                    backgroundColor: "#16A085",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }
                , {
                    label: "TPAC3",
                    backgroundColor: "#f56954",
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
<?php endfor; ?>

<?php for ($j=0; $j < count($name3); $j++): ?>
    new Chart(document.getElementById("tap3<?php echo $j; ?>"), {
        type: 'bar',
        data: {
            labels: ["2012", "2013"],
            datasets: [
                {
                    label: "TPAC1",
                    backgroundColor: "#3498DB",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }, {
                    label: "TPAC2",
                    backgroundColor: "#16A085",
                    data: [<?php echo '0.'.rand(111,900); ?>, <?php echo '0.'.rand(111,900); ?>]
                }
                , {
                    label: "TPAC3",
                    backgroundColor: "#f56954",
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
<?php endfor; ?>


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
<?php include '../../footer.php' ;?>