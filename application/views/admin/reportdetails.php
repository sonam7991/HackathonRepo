<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php if($Total_Active_User!=""){?><?=explode(".",$Total_Active_User->Total_Active)[0]?> <?php }else{?>0<?php }?></h3>
                <p>Subscribe B-Mobile Active Users</p>
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

        <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Target and Achievement</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  
                </div>
                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Target
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> Achievement
                  </span>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>


<!-------------<section class="content">
        
	<div class="box box-success">
        <div class="box-header">
          <i class="fa fa-desktop"></i>
          <h3 class="box-title">Guidelines</h3>
        </div>
        <div class="box-body chat" id="">
        	<ul class="timeline">
	            <li class="time-label">
                  	<span class="bg-red">
	                   Bhutan Telecom MIS
                  	</span>
	            </li>
	            <li>
	              <i class="fa fa-envelope-o bg-yellow"></i>
	              <div class="timeline-item">
	                <h3 class="timeline-header no-border">
	                	<ul>
	                		<li>Management Department or Marketing Division have to upload file and give input to this system.</li>
	                	</ul>
	                </h3>
	              </div>
	            </li>
	            <li>
	              <i class="fa fa-laptop bg-blue"></i>
	              <div class="timeline-item">
	                <h3 class="timeline-header no-border">
	                	<ul>
	                		<li>As an user you will get the report of various data depending on your selected category.</li>
	                		<li>As a general user you will only get to view report with different graphical output.</li>
	                	</ul>
	                </h3>
	              </div>
	            </li>
	            <li>
	              <i class="fa fa-navicon bg-success"></i>
	              <div class="timeline-item">
	                <h3 class="timeline-header no-border">
	                	<ul>
	                		<li>	User can change their details by going to their profile.</li>
	                		<li>	Only Administrator have the power to delete record.</li>
	                	</ul>
	                </h3>
	              </div>	
	            </li>
         	 	
	        </ul>
	        
        </div>

	</div>

	<div class="box box-warning">
        <div class="box-header">
          <i class="fa fa-desktop"></i>
          <h3 class="box-title">Aim and Objectives</h3>
        </div>
        <div class="box-body chat" id="">
        	<h4>
        	<ul class="timeline">
	            <li class="time-label">
                  	<span class="bg-green">
	                   AIMS
                  	</span>
	            </li>
	            <li>
	            	<div class="timeline-item">
	            		 The application aims to dynamically accommodate data and give accurate report at fastest way.
	            	</div>
	           </li>
	           <li class="time-label">
                  	<span class="bg-green">
	                   OBJECTIVES
                  	</span>
	            </li>
	            <li>
	            	<div class="timeline-item">
	            		Reduce time constraints.
	            	</div>
	            	<div class="timeline-item">
	            		Reduce work load.
	            	</div>
	            	<div class="timeline-item">
	            		Enable employee to get report for clarity.
	            	</div>
	            	<div class="timeline-item">
	            		For effective and efficient process.
	            	</div>
	           </li>
         	 	
	        </ul></h3>
	        
        </div>
        <div class="box-footer">
						              
    </div>
	</div>
</section>
-------------->