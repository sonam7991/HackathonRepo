<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Generate Report for <span id="reportName">VAS</span></h3>
          </div>
          <div class="box-body">
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
                      </select>
                    </p>
                  </div>
                </div>
                
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-success">
                        <div class="box-header with-border">
                          <h3 class="box-title">Bar Chart</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                          </div>
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
                            <th>B-Wallet New</th>
                            <th>B-Wallet Total</th>
                            <th>B-Wallet Trowa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                          <?php  $month=""; if($Details_Report!=""){ ?>
                            <?php foreach($Details_Report as $i=> $rep): 
                            $month=$rep['B_Wallet_New'].','.$rep['B_Wallet_Total'].','.$rep['B_Wallet_Towa'];?>
                             <td> <?php echo $rep['B_Wallet_New'];?> </td>
                            <td> <?php echo $rep['B_Wallet_Total'];?> </td>
                            <td> <?php echo $rep['B_Wallet_Towa'];?> </td>
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
      <!-- /.col -->
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
      $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/vas/vas/'+id);
       /*window.open('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/detailReport/'+id, '_blank');*/
      //setTimeout($.unblockUI, 1000); 
  }

  $(function () {
    var str=[$('#valudasd').val()];
    var mnts=JSON.parse("[" + str + "]");
    var areaChartData = {
      labels  : ['B-Wallet New', 'B-Wallet Total', 'B-Wallet Trowa'],
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
