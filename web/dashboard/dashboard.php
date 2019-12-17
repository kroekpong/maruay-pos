<?php include '../../header.php' ;?>

        <div class="content-wrapper">
            <section class="content">
            
            
      <div class="row">
      
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">CO2 Emission : TPAC
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="co2_tpac" ></canvas>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Emission Source : TPAC
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="em_tpac"></canvas>
              </div>
            </div>
          </div>
        </div>
        
        
  </div>
      <div class="row">
      
        <div class="col-md-8">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">CO2 Emission : TPCC
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="co2_tpcc" ></canvas>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Emission Source : TPCC
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="em_tpcc"></canvas>
              </div>
            </div>
          </div>
        </div>
        
        
  </div>
          
   

     </section>
            
 </div>
 
 <script>

 var ctx1 = $('#co2_tpac').get(0).getContext('2d');
 new Chart(ctx1, {
	    type: 'bar',
	    data: {
	      labels: ["Electricity", "Water Consumption", "Steam consumption"],
	      datasets: [
	        {
	          label: "2015",
	          backgroundColor: "red",
	          data: [133,221,783]
	        }, {
	          label: "2016",
	          backgroundColor: "#8e5ea2",
	          data: [408,547,675]
	        }, {
	          label: "2017",
	          backgroundColor: "#e8c3b9",
	          data: [433,457,755]
	        }, {
	          label: "2018",
	          backgroundColor: "#3cba9f",
	          data: [323,347,654]
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: false
// 	        text: 'CO2 Emission (TPAC)'
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
			
			        this.data.datasets.forEach(function (dataset)
			        {
			            for (var i = 0; i < dataset.data.length; i++) {
			                for(var key in dataset._meta)
			                {
			                    var model = dataset._meta[key].data[i]._model;
			                    var dataval = dataset.data[i];
			                    var lb =  dataval;
			                    if(dataval>0){
			                    	ctx.fillText(lb, model.x, model.y);
			                    }
			                }
			            }
			        });
			    }
			}
	    }
	});


 
 new Chart(document.getElementById("co2_tpcc"), {
	    type: 'bar',
	    data: {
	      labels: ["Electricity", "Water Consumption", "Steam consumption"],
	      datasets: [
	        {
	          label: "2015",
	          backgroundColor: "#3e95cd",
	          data: [133,221,783]
	        }, {
	          label: "2016",
	          backgroundColor: "#8e5ea2",
	          data: [408,547,675]
	        }, {
		          label: "2018",
		          backgroundColor: "#3cba9f",
		          data: [323,347,654]
		        
	        }, {
	          label: "2017",
	          backgroundColor: "#e8c3b9",
	          data: [433,457,755]
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: false
// 	        text: 'CO2 Emission (TPCC)'
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
			
			        this.data.datasets.forEach(function (dataset)
			        {
			            for (var i = 0; i < dataset.data.length; i++) {
			                for(var key in dataset._meta)
			                {
			                    var model = dataset._meta[key].data[i]._model;
			                    var dataval = dataset.data[i];
			                    var lb =  dataval;
			                    if(dataval>0){
			                    	ctx.fillText(lb, model.x, model.y);
			                    }
			                }
			            }
			        });
			    }
			}
	    }
	});

 
new Chart(document.getElementById("em_tpac"), {
    type: 'pie',
    data: {
      labels: [ "Electricity", "Water Consumption", "Steam consumption" ],
      datasets: [{
        label: "Emission Source",
        backgroundColor: [ "#8e5ea2","#3cba9f","#e8c3b9" ],
        data: [4,34,54]
      }]
    },
    options: {
      title: {
    	  display: true,
        text: 'Year : 2018'
      }
    }
});

new Chart(document.getElementById("em_tpcc"), {
    type: 'pie',
    data: {
    	 labels: [ "Electricity", "Water Consumption", "Steam consumption" ],
         datasets: [{
           label: "Emission Source",
           backgroundColor: [ "#8e5ea2","#3cba9f","#e8c3b9" ],
           data: [4,34,54]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Year : 2018'
      }
    }
});
</script>
        
<?php include '../../footer.php' ;?>
