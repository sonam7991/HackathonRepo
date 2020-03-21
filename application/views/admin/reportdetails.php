<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Details for year: </li>
        </ol>
      </div>
      <div class="col-sm-5">
         <select class="form-control" id="selectedyearid" onchange="loadpagedashboard('<?php echo base_url();?>index.php?baseController/dashboard',this.value)">
          <option value="2020">2020</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          </select>
      </div>
    </div>
  </div>
</section>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php if($Total_Active_User!=""){?><?=explode(".",$Total_Active_User->Total_Active)[0]?> <?php }else{?>0<?php }?></h3>
                <p>Sub. B-Mobile Active Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php if($fixedLine!=""){?><?=explode(".",$fixedLine->Subscriber)[0]?> <?php }else{?>0<?php }?></h3>
                <p>Subcriber Fixed Line User</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php if($isp!=""){?><?=explode(".",$isp->Broad_Band_count)[0]?> <?php }else{?>0<?php }?></h3>
                <p>ISP (Broad Band)</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php if($isp!=""){?><?=explode(".",$isp->Lease_Line_Count)[0]?> <?php }else{?>0<?php }?></h3>
                <p>ISP (Lease Band)</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <?php $this->load->view('admin/targetAndAchievement/revenueAchievement.php'); ?> 
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <?php $this->load->view('admin/targetAndAchievement/salesvivophone.php'); ?> 
            
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
           <?php $this->load->view('admin/targetAndAchievement/activeUserAchievement.php'); ?> 
          </div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <?php $this->load->view('admin/targetAndAchievement/postpaidAchievemnt.php'); ?> 
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <?php $this->load->view('admin/targetAndAchievement/prepaid.php'); ?> 
          </div>
         
        </div>
      </div>
    </section>

    
  
<script type="text/javascript">
function generateReport(year){
    $.blockUI
        ({ 
          css: 
          { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius':  '10px', 
              opacity: .5, 
              color: '#fff' 
          } 
        });
        $("#mainContentdiv").load('<?php echo base_url();?>index.php?adminController/Subscriber_bmobile/reportdetails/subscriber_b/'+year);
          setTimeout($.unblockUI, 1000); 
  }

</script>