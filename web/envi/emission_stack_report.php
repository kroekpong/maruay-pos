<?php include '../../header.php' ;?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-industry"></i>&nbsp;&nbsp;Stack Result
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
                                            <option>เลือก</option>
                                            <?php for($i=0;$i<=5;$i++): ?>
                                            <option>
                                                <?php echo 2018-$i; ?>
                                            </option>
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
                                            <option>เลือก</option>
                                            <?php for($i=0;$i<=5;$i++): ?>
                                            <option>
                                                <?php echo 2018-$i; ?>
                                            </option>
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

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary" id="reportResult" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-487_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_1"></canvas>
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
            <!-- content chart section 2 -->
            <div class="col-md-6">
                <div class="box box-primary" id="reportResult2" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-487_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_2"></canvas>
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

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary" id="reportResult" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-487_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_1"></canvas>
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
            <!-- content chart section 2 -->
            <div class="col-md-6">
                <div class="box box-primary" id="reportResult2" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-487_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_2"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult3" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">3V-487_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_3"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult4" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">3V-487_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_4"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult5" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-681_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_5"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult6" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">V-681_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_6"></canvas>
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


            <div class="col-md-6">
                <div class="box box-primary" id="reportResult7" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">2V-681_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_7"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult8" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">2V-681_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_8"></canvas>
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


            <div class="col-md-6">
                <div class="box box-primary" id="reportResult9" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">3V-681_O2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_9"></canvas>
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

            <div class="col-md-6">
                <div class="box box-primary" id="reportResult10" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">3V-681_Emission</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <form role="form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="chart">
                                        <canvas id="mc_10"></canvas>
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

    </section>

</div>

<?php include '../../footer.php' ;?>
<script type="text/javascript">
    // chart 
    new Chart(document.getElementById("mc_1"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [47.01, 0, 61.57, 0, 54.23]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 1.6, 0, 0, 0]
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
                    value: 556,
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
    /// mc2

    new Chart(document.getElementById("mc_2"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0, 0.01, 0, 0.002, 0.002]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0.00045, 0, 0,0.097]
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
                    value: 0.097,
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

    new Chart(document.getElementById("mc_3"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [66.54, 0, 0, 0, 127]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 6.81, 3.42, 0,229.04]
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
                    value: 1029,
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

    new Chart(document.getElementById("mc_4"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0.006, 0, 0, 0, 0.009]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0.00057, 0.00001, 0,0.02]
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


    new Chart(document.getElementById("mc_5"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0.006, 0, 0, 6.85, 66.09]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0,0, 0,3.15]
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
                    value: 241.6,
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


    new Chart(document.getElementById("mc_6"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0, 0, 0, 0, 0.023]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0,0, 0,0.025]
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
                    value: 0.466,
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



    new Chart(document.getElementById("mc_10"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0, 0, 0, 0, 0.023]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0,0, 0,0.025]
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
                    value: 0.466,
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


    new Chart(document.getElementById("mc_7"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0, 0, 0, 0, 0.023]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0,0, 0,0.025]
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
                    value: 0.466,
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


    new Chart(document.getElementById("mc_8"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [0.14, 0.085, 0, 0, 0.103]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 0.107,0.07, 0,0.063]
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
                    value: 0.466,
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


    new Chart(document.getElementById("mc_9"), {
        type: 'bar',
        data: {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [
                {
                    label: "1st",
                    backgroundColor: "#3498DB",
                    data: [7.59, 5.23, 0, 3.42, 8.5]
                }, {
                    label: "2nd",
                    backgroundColor: "#16A085",
                    data: [0, 6.94,5.09,0 ,4.72]
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
                    value: 126.1,
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
        $("#reportResult7").show();
        $("#reportResult8").show();
        $("#reportResult9").show();
        $("#reportResult10").show();

    }

</script>