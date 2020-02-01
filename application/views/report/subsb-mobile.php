<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Generate Report for <span id="reportName">Subscriber B-Mobile</span></h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xl-12">
                    <label>Subscribe B-Mobile</label>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xl-12">
                    <p class="text-center">
                      <select name="report_type" name="report_type" class="form-control" onchange="generateReport(this.value)">
                        <option value=""> Select</option>
                        <option value="Prepaid_Active"> Prepaid Active</option>
                        <option value="Prepaid_Passive"> Prepaid Passive</option>
                        <option value="Prepaid_Total"> Prepaid Total</option>
                        <option value="Post_Active"> Post Paid Active</option>
                        <option value="Post_Passive"> Post Paid Passive</option>
                        <option value="Post_Total"> Post Paid Total</option>
                        <option value="Total_Active"> Total Active</option>
                        <option value="Total_Registered"> Total Registered</option>
                        <option value="Disconnected"> Disconnected</option>
                        <option value="HLR"> HLR</option>                    
                      </select>
                    </p>
                  </div>
                </div>
                <?php  $month=""; if($Details_Report!=""){ ?>
                  <?php foreach($Details_Report as $i=> $rep): 
                  if($i>0){
                    $month=$month.','.$rep['Total_Registered'];
                  }
                  else{
                    $month=$rep['Prepaid_Active'];
                  }
                    
                 endforeach; }?>
                  <input type="hidden" name="" id="valudasd" value="<?=$month?>">
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
              </div>
            </div>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
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
      $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/detailReport/'+id);
       /*window.open('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/detailReport/'+id, '_blank');*/
      //setTimeout($.unblockUI, 1000); 
  }

  $(function () {
    var str=[$('#valudasd').val()];
    var mnts=JSON.parse("[" + str + "]");
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','Sep','Oct','Nov','Dec'],
      datasets: [
        {
        },
        {
          label               : 'Digital Goods',
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
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    var barChartOptions                  = {      
     
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })

</script>
