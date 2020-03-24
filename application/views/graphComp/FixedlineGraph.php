<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">FixedLine subscriber Graph</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="card-header">
          <h3 class="card-title">FixedLine Subscriber Information</h3>
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
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Subscriber FixedLine Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="comsubmotblid" class="table table-bordered table-striped">
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
  </div>
</div>
    <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="comsubmotblid2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Year</th>
                    <th>Total Number of Subscriber</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  $month=""; if($fixedline_total!=""){ ?>
                    <?php foreach($fixedline_total as $i=> $Total):?>
                     <tr>
                      <td> <?php echo $Total['year'];?> </td>
                      <td> <?php echo $Total['Subscriber'];?> </td>
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
    <br>
    </section>
     <section class="col-lg-5 connectedSortable">
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                </div>
              </div>
            </div>

          </section>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      
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
  $(function () {
    $("#comsubmotblid").DataTable();
    $('#comsubmotblid1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

</script>  