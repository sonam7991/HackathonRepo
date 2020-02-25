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
        <h3 class="card-title">Generate Report Financial Revenue</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
                   <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label>Main Category</label>
                     <select id="maincat" name="maincat" class="form-control" onchange="sowList(this.value)">
                      <option value=""> Select</option>
                      <option value="mobile"> Revinue Mobile</option>
                      <option value="isp"> Revinue ISP</option>
                      <option value="fixedline"> Revinue FixedLine</option>
                      <option value="arpu"> Revinue APRU</option>
                      <option value="overall"> Revinue Overall</option>
                    </select>  
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <label>Sub Category</label>
                    <select id="mobile"name="report_type" class="form-control" onchange="generateReport(this.value,'t_revenue_mobile_main')">
                      <option value=""> Select</option>
                      <option value="Mrc"> Mrc</option>
                      <option value="E_load">E_load</option>
                      <option value="In_And_Vas"> In_And_Vas</option>
                      <option value="Online_App">Online_App</option>
                      <option value="Inter_Connect"> Inter_Connect</option>
                      <option value="International_Roming"> International_Roming</option>
                      <option value="In_And_Vas_International"> In_And_Vas_International</option>
                      <option value="Prepaid"> Prepaid</option>
                      <option value="Postpaid"> Postpaid</option>
                      <option value="Total_Revinue"> Total_Revinue</option>
                    </select>
                    <select id="isp"name="report_type" name="report_type" class="form-control" onchange="generateReport(this.value,'t_revenue_isp_main')">
                       <option value=""> Select</option>
                        <option value="Leased_line"> Leased_line</option>
                        <option value="Domain_Name">Domain_Name</option>
                        <option value="Data_Center"> Data_Center</option>
                        <option value="Broad_Band">Broad_Band</option>
                        <option value="EPR_Service"> EPR_Service</option>
                    </select>
                    <select id="fixedline"name="report_type" class="form-control" onchange="generateReport(this.value,'t_revenue_fixed_line_main')">
                        <option value=""> Select</option>
                        <option value="Telephone_Service"> Telephone_Service</option>
                        <option value="Int_ISD">Int_ISD</option>
                        <option value="Total_Revenue"> Total_Revenue</option>
                    </select>
                    <select id="arpu"name="report_type"  class="form-control" onchange="generateReport(this.value,'t_revenue_arpu_main')">
                       <option value=""> Select</option>
                        <option value="Prepaid"> Prepaid</option>
                        <option value="Postpaid">Postpaid</option>
                    </select>
                    <select id="overall"name="report_type" class="form-control" onchange="generateReport(this.value,'t_revenue_other_main')">
                       <option value=""> Select</option>
                        <option value="Other_Income"> Other_Income</option>
                        <option value="Total_Revenue">Total_Revenue</option>
                        <option value="Sale_Of_Product">Sale_Of_Product</option>                        
                    </select>
                  </div>
                </div> 
                <br />
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
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
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="sliderDetails" class="table table-bordered table-striped">
                        <thead>
                          <tr>
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
                          <?php  $month=""; if($Details_Report!=""){ ?>
                            <?php foreach($Details_Report as $i=> $rep): 
                              
                              if($i>0){
                                $month=$month.','.$rep['header'];
                              }
                              else{
                                $month=$rep['header'];
                              }?>
                              <td> <?php echo $rep['header'];?> </td>
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
    </section>
  </div>
</section>
<script src="<?php echo base_url();?>assest/admin/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
   $('#mobile').hide();
  $('#isp').hide();
  $('#fixedline').hide();
  $('#arpu').hide();
  $('#overall').hide();
  $('#report_year').val('<?php echo $year;?>');
  $('#maincat').val('<?php echo $rtype;?>');
  $('#'+'<?php echo $subtype;?>').show();
  $('#<?php echo $subtype;?>').val('<?php echo $subtypeval;?>');
  function generateReport(id,table){
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
        $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/loadreportPage/revenue-financial/'+table+'/'+id+'/0/'+$("#report_year").val()+'/'+$("#maincat").val());
        setTimeout($.unblockUI, 1000);
    }
  }
  function removereer(errid){
    $('#mobile').val("");
    $('#isp').val("");
    $('#fixedline').val("");
    $('#arpu').val("");
    $('#overall').val("");
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
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','Sep','Oct','Nov','Dec'],
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
  function sowList(id){
    $('#mobile').hide();
    $('#isp').hide();
    $('#fixedline').hide();
    $('#arpu').hide();
    $('#overall').hide();
    $('#'+id).show();
    
  }
 
</script>
