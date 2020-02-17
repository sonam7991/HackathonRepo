<!--------------<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class=" active header">
      	 <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="logo">
	      <i class="fa fa-dashboard"></i>  <b>Dashboard</b>
	    </a>
      </li>
      <?php if($this->session->userdata('Role_Id')=="1"){?>
      	<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
        	 	<a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/addUser/')">
            		<i class="fa fa-chevron-right"></i> Add User
            	</a>
            </li>
            <li>
            	<a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/ListUser/')">
            	<i class="fa fa-chevron-right"></i> List Users
            	</a>
            </li>
          </ul>
        </li> 	 	   		
      	<?php } if($this->session->userdata('Role_Id')!="3"){?>
      	<li class="treeview">
          <a href="#">
           <i class="fa fa-download"></i>
	          <span>Import Data</span>
        	  <span class="pull-right-container">
              <span class="label label-primary pull-right">6</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/revenue/')">
                <i class="fa fa-chevron-right"></i> Revenue Finacial
              </a>
            </li>
            <li>
        	 	<a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-mobile/')">
            		<i class="fa fa-chevron-right"></i> Subscriber B-Mobile
            	</a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-fixedline/')">
                <i class="fa fa-chevron-right"></i> Subscriber Fixed-Line
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/mobile_data_user/')">
                <i class="fa fa-chevron-right"></i> Subscriber Data User
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/vas/')">
                <i class="fa fa-chevron-right"></i> Subscriber VAS
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/isp/')">
                <i class="fa fa-chevron-right"></i> Subscriber ISP
              </a>
            </li>
          </ul>
        </li> 
        <?php }?>

        <li class="treeview">
          <a href="#">
           <i class="fa fa-area-chart"></i>
            <span>View/Generate Report</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">6</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/')">
                <i class="fa fa-chevron-right"></i> Subscriber B-Mobile
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/revenue-financial/')">
                <i class="fa fa-chevron-right"></i> Revenue
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-fixedline/')">
                <i class="fa fa-chevron-right"></i> Subscriber Fixed-Line
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/mobile_data_user/')">
                <i class="fa fa-chevron-right"></i> Subscriber Data User
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/vas/')">
                <i class="fa fa-chevron-right"></i> Subscriber VAS
              </a>
            </li>
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/isp/')">
                <i class="fa fa-chevron-right"></i> Subscriber ISP
              </a>
            </li>
          </ul>
        </li>
    </ul>
  </section>
</aside>----------------->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="brand-link">
    <img src="assest/admin/version3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="logo-lg"><b>BT-DASHBOARD</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="#" onerror="this.src='<?php echo base_url();?>uploads/logo.png'" class="user-image" alt="User Image">
              
        </div>
        <div class="info">
          <a href="#" class="d-block"> <span class="hidden-xs"><?php echo $this->session->userdata('Full_Name');?></span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($this->session->userdata('Role_Id')=="1"){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a class="nav-link active" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/addUser/')">
             <i class="far fa-circle nav-icon"></i> Add User
              </a>
            </li>
            <li>
              <a class="nav-link active" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/ListUser/')">
              <i class="far fa-circle nav-icon"></i> List Users
              </a>
            </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>