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
<section class="content">
      <div class="container-fluid">
        <div class="card-header">
          <h3 class="card-title">Postpaid Active Vs Prepaid Active</h3>
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
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="comsubmotblid" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Dzongkhag</th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>March</th>
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>Sept</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  $month=""; if($fixedline_Report_dzongkhagWise!=""){ ?>
                    <?php foreach($fixedline_Report_dzongkhagWise as $i=> $dzo):?>
                     <tr>
                      <td> <?php echo $dzo['Dzongkhag'];?> </td>
                      <td> <?php echo $dzo['Jan'];?> </td>
                      <td> <?php echo $dzo['Feb'];?> </td>
                      <td> <?php echo $dzo['March'];?> </td>
                      <td> <?php echo $dzo['Aprl'];?> </td>
                      <td> <?php echo $dzo['May'];?> </td>
                      <td> <?php echo $dzo['Jun'];?> </td>
                      <td> <?php echo $dzo['July'];?> </td>
                      <td> <?php echo $dzo['Aug'];?> </td>
                      <td> <?php echo $dzo['Sep'];?> </td>
                      <td> <?php echo $dzo['Oct'];?> </td>
                      <td> <?php echo $dzo['Nov'];?> </td>
                      <td> <?php echo $dzo['Dec'];?> </td>
                    </tr>
                  <?php endforeach; }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row pt-4" id="donwbtn" style="display: none">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
        <button class="btn btn-primary" type="button" onclick="exportTableToExcel('comsubmotblid', 'fixedLine')"><i class="fa fa-download"></i> Export Table Data To Excel File</button>
      </div>
    </div>
    </section>

      
<script type="text/javascript">
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
        $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/fixedlinegraph/FixedlineGraph/fixedline/'+year);
          setTimeout($.unblockUI, 1000); 
  }

</script>  