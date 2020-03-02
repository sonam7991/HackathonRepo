<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Mobile subscriber Graph</li>
        </ol>
      </div>
    </div>
  </div>
</section>
    <!----------------------------------Subscriber B-mobile New Registred Customer------------------------->
    <section class="content">
      <div class="container-fluid">
        <div class="card-header">
          <h3 class="card-title">Subscriber B-mobile New Registered Customer</h3>
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
                      <select name="report_type" name="report_type" class="form-control" onchange="generatetotal(this.value)">
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
                <h3 class="card-title">Bar Chart for the year: <span id="appendyear"></span></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChartRegistered" style="height:270px"></canvas>
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
      </section>
        <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="sliderDetails" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th></th>
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
                            <td> Total Active Users </td>
                          <?php  $month=""; $total=0; if($Details_ta!=""){ ?>
                            <?php foreach($Details_ta as $i=> $rep): 
                            if($i>0){
                              $month=$month.','.$rep['Total_Active'];
                            }
                            else{
                              $month=$rep['Total_Active'];
                            }
                            $total=$total + (int) $month;
                            ?>
                            <td> <?php echo $rep['Total_Active'];?> </td>
                          <?php endforeach; }?>
                          </tr>

                          <tr>
                            <td> Total Disconnected Users </td>
                          <?php  $month1=""; $total1=0;if($Details_td!=""){ ?>
                            <?php foreach($Details_td as $i=> $rep): 
                            if($i>0){
                              $month1=$month1.','.$rep['Disconnected'];
                            }
                            else{
                              $month1=$rep['Disconnected'];
                            }
                            $total=$total1 + (int) $month1;
                            ?>
                            <td> <?php echo $rep['Disconnected'];?> </td>
                          <?php endforeach; }?>
                          </tr>
                            <input type="hidden" name="" id="ta" value="<?=$month?>">
                            <input type="hidden" name="" id="total" value="<?=$total?>">
                            <input type="hidden" name="" id="td" value="<?=$month1?>">
                            <input type="hidden" name="" id="total1" value="<?=$total1?>">

                        </tbody>
                    </table>
                </div>
            </div>
    </section>

<script type="text/javascript">
  $('#appendyear').html('<?php echo $year;?>');


  //Graph for New Registered Customer
function generatetotal(year){
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
        $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/comparegraph/userscount/bcompare/'+year);
          setTimeout($.unblockUI, 1000); 
  }
  $(function () {
    var str=[$('#ta').val()];
    var mnts=JSON.parse("[" + str + "]");
    var str=[$('#td').val()];
    var mnts1=JSON.parse("[" + str + "]");
    var str=[$('#td').val()];
    var mnts1=JSON.parse("[" + str + "]");
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','Sep','Oct','Nov','Dec'],
      datasets: [
        {
          label               : 'New Registered Customers',
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
          label               : 'Total Disconnected',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : mnts
        },
        {
          label               : 'Total Disconnected',
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
/************Bar Chart For New Registered************************/
    var barChartCanvas = $('#barChartRegistered').get(0).getContext('2d')
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
    var totalpei2=$('#total1').val();
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = {
      labels: [
          'New Registered Customers', 
          'Prepaid  Active Users',
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