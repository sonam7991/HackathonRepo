<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Financial</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="card-header">
          <h3 class="card-title">Finanical Target</h3>
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
                      <select name="report_type" id="report_type" class="form-control" onchange="generateReport(this.value)">
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
              </div>
            </div>
          </div>

        <section class="content">
        <div class="form-group row">
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart for the Year: <span id="appendyear"></span></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="height:270px"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="height:270px">
                  <span id="pietol"></span>
                </canvas>
              </div>
            </div>
          </div>
        </div>

      </section>
        <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="comsubmotbl" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Type</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <tr>
                            <td> Revenue Target </td>
                            <?php  $month=""; $total=0;if($ftarget!=""){
                              foreach($Months as $i=> $mon): 
                                $display=0;$currentmon=0;
                                foreach($ftarget as $j=> $rep): 
                                  if($i+1==$rep['Month']){
                                    $display=$rep['m_revenue'];
                                    $currentmon=$rep['m_revenue'];
                                  }
                                endforeach;
                                if($i>0){
                                  $month=$month.','.$currentmon;
                                }
                                else{
                                  $month=$currentmon;
                                }
                                $total=$total + (int) $month;
                              
                              ?>
                              <td> <?php echo $display;?> </td>
                            <?php endforeach; }?>
                          </tr>

                          <tr>
                            <td>Acheivement </td>
                          <?php  $month1=""; $total1=0; if($mtarget!=""){
                            foreach($Months as $i=> $mon):  
                              $display=0;$currentmon=0;
                              foreach($mtarget as $k=> $rep): 
                                if($i+1==$rep['Month']){
                                  $display=$rep['Grand_Total'];
                                  $currentmon=$rep['Grand_Total'];
                                }
                              endforeach;
                              if($i>0){
                                $month1=$month1.','.$currentmon;
                              }
                              else{
                                $month1=$currentmon;
                              }
                              $total1=$total1 + (int) $month1;
                               //$total1=$total1 + (int) $month1;
                            ?>
                            <td> <?php echo $display;?> </td>
                          <?php endforeach; }?>
                          </tr>
                            <input type="hidden" name="" id="pvpa" value="<?=$month?>">
                            <input type="hidden" name="" id="total" value="<?=$total?>">
                            <input type="hidden" name="" id="pvpa1" value="<?=$month1?>">
                            <input type="hidden" name="" id="total1" value="<?=$total1?>">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row pt-4" id="donwbtn" style="display: none">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                <button class="btn btn-primary" type="button" onclick="exportTableToExcel('comsubmotbl', 'post-vs-pre')"><i class="fa fa-download"></i> Export Table Data To Excel File</button>
              </div>
            </div>
    </section>
<script type="text/javascript">
  $('#appendyear').html('<?php echo $year;?>');
  $('#report_type').val('<?php echo $year;?>');
  if('<?php echo $year;?>'!=""){
    $('#donwbtn').show();
  }
  function generateReport(year){
    $.blockUI
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
        });
        $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/financialtarget/financial_target/Companytarget/'+year);
          setTimeout($.unblockUI, 1000); 
  }

  $(function () {
    var str=[$('#pvpa').val()];
    var mnts=JSON.parse("[" + str + "]");
    var str=[$('#pvpa1').val()];
    var mnts1=JSON.parse("[" + str + "]");
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','Sep','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'Revenue Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : mnts1
        },
        {
          label               : 'Revenue Achivement',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : mnts
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
/*************************BarChart For Total Postpaid and Total Prepaid************************/
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })


    var tatlpie1=$('#total').val();
    $('#pietol').html("tsotasdfknjsad: "+tatlpie1);
    var mnts=JSON.parse("[" + str + "]");
    var totalpei2=$('#total1').val();
    var mnts1=JSON.parse("[" + str + "]");

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = {
      labels: [
          'Revenue Target', 
          'Revenue Achivement',
      ],
      datasets: [
        {
          data: [tatlpie1,totalpei2],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieData        = pieData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
  })

</script>  