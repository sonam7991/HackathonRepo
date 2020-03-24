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
                      </p>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Select Month</label>
                    <select name="report_type" id="selectMonth" class="form-control" onchange="generateReport(this.value)">
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
                    <table id="datausertbl" class="table table-bordered table-striped">
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
                <div class="row pt-4" id="donwbtn" style="display: none">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                    <button class="btn btn-primary" type="button" onclick="exportTableToExcel('datausertbl', 'Data-user')"><i class="fa fa-download"></i> Export Table Data To Excel File</button>
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
   $('#report_type').val('<?php echo $year;?>');
    if('<?php echo $year;?>'!=""){
      $('#donwbtn').show();
    }
  function generateReport(id){
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
         $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/mobile_data_user/mobile_data_user/'+id+'/'+$('#report_year').val());
        setTimeout($.unblockUI, 1000); 
  }
}
function removereer(errid){
    $('#selectMonth').val("");
    $('#'+errid).html('');  
  }
  function validateMonth(){
    var rety=true;
    if($("#report_year").val()==""){
      $('#report_year_err').html('Please select year');
      rety=false;
    }
    return rety;
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
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0
      
    barChartData.datasets[1].strokeColor = '#00a65a'
    var barChartOptions                  = {   
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  });

</script>
