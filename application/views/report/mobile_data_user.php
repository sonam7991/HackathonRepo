<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Generate Reports</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Generate Report for Subscriber Data Users</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xl-12">
                     <label>Select Year</label>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xl-12">
                    <p class="text-center">
                      <select name="report_type" name="report_type" class="form-control" onchange="generateReport(this.value)">
                        <option value=""> Select</option>
                        <option value="2019"> 2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>                
                      </select>
                    </p>
                  </div>
                </div>
                
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-success">
                        <div class="card-header with-border">
                          <h3 class="card-title">Bar Chart</h3>

                          <div class="card-tools pull-right">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="sliderDetails" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>2G</th>
                            <th>3G</th>
                            <th>4G</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                          <?php  $month=""; if($Details_Report!=""){ ?>
                            <?php foreach($Details_Report as $i=> $rep): 
                            $month=$rep['2_G_User'].','.$rep['3_G_User'].','.$rep['4_G_User'];?>
                             <td> <?php echo $rep['2_G_User'];?> </td>
                            <td> <?php echo $rep['3_G_User'];?> </td>
                            <td> <?php echo $rep['4_G_User'];?> </td>
                          <?php endforeach; }?>
                          </tr>
                            <input type="hidden" name="" id="valudasd" value="<?=$month?>">
                        </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</section>
<script src="<?php echo base_url();?>assest/admin/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
  function generateReport(id){
     /*$.blockUI
        ({ 
          css: 
          { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
          } 
        });*/
      $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/mobile_data_user/mobile_data_user/'+id);
       /*window.open('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/detailReport/'+id, '_blank');*/
      //setTimeout($.unblockUI, 1000); 
  }

  $(function () {
    var str=[$('#valudasd').val()];
    var mnts=JSON.parse("[" + str + "]");
    var areaChartData = {
      labels  : ['2G', '3G', '4G'],
      datasets: [
        {
         // label               : '',
          fillColor           : '#FFFFFF',
          //data                : mnts
        },
        {
          label               : 'asdfa sdfm,sad',
          fillColor           : 'rgba(60,141,188,0.9)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : mnts
        }
      ]
    }
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
   //barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    var barChartOptions                  = {   
     
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<1; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })

</script>
