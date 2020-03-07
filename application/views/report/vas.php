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
        <h3 class="card-title">Generate Report for Subscriber VAS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Select Year</label>
                    <select name="report_year" onclick="removereer('report_year_err')" id="report_year" class="form-control" >
                      <option value=""> Select</option>
                      <option value="2019"> 2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                    <span id="report_year_err" class="text-danger"></span>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Select Month</label>
                    <select name="report_type" id="selectMonth" class="form-control" onchange="generateReportvas(this.value)">
                        <option value=""> Select</option>
                        <option value="1"> January</option>
                        <option value="2">Febuary</option>   
                        <option value="3">March</option>   
                        <option value="4">April</option>                 
                        <option value="5">May</option>   
                        <option value="6">June</option>   
                        <option value="7">July</option>   
                        <option value="8">August</option>   
                        <option value="9">September</option>   
                        <option value="10">October</option>   
                        <option value="11">November</option>   
                        <option value="12">December</option>   
                      </select>
                  </div>
                </div>
                <br />
                
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-success">
                        <div class="card-header with-border">
                          <h3 class="card-title">Bar Chart</h3>

                          <div class="card-tools pull-right">
                            <button type="button" class="btn card-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn card-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                    <table id="vasDetails" class="table table-bordered table-striped">
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
                 <div class="row pt-4" id="donwbtn" style="display: none">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                    <button class="btn btn-primary" type="button" onclick="exportTableToExcel('vasDetails', 'vas')"><i class="fa fa-download"></i> Export Table Data To Excel File</button>
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

  $('#report_year').val('<?php echo $year;?>');
  $('#selectMonth').val('<?php echo $Months;?>');
  if('<?php echo $year;?>'!=""){
    $('#donwbtn').show();
  }

  function generateReportvas(id){
    if(validateMonth()){
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
      $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/vas/vas/'+id+'/'+$('#report_year').val());
      setTimeout($.unblockUI, 1000); 
    }
    
  }
  function validateMonth(){
    var rety=true;
    if($("#report_year").val()==""){
      $('#report_year_err').html('Please select year');
      rety=false;
    }
    return rety;
  }
  function removereer(errid){
    $('#selectMonth').val("");
    $('#'+errid).html('');  
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
  });
</script>
