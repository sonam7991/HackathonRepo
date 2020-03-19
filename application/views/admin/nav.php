<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="brand-link">
  <img src="<?php echo base_url();?>uploads/btlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>BI-DASHBOARD</b></span>
  </a>
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($this->session->userdata('Role_Id')=="1"){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active" onclick="loadpage('<?php echo base_url();?>index.php?adminController/dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/addUser/')">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/ListUser/')">
                  <i class="nav-icon fa fa-users"></i>
                  <p>List Users</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Target Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadTarget/addTarget/')">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>Add Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadTarget/ListTarget/')">
                  <i class="nav-icon fa fa-users"></i>
                  <p>List Targrt</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
          <?php } if($this->session->userdata('Role_Id')!="3"){?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-download"></i>
              <p>
                Import Data
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/revenue/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Revenue Finacial</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-mobile/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Subscriber B-Mobile</p>
                </a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-fixedline/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Subscriber Fixed-Line</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/mobile_data_user/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Subscriber Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/vas/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Subscriber VAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/isp/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Import Subscriber ISP</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
          <?php }?>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class=" fas fa-chart-pie"></i>
              <p>
                View & Generate Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/')">                  
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Subscriber B-Mobile</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/revenue-financial/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Revenue Report</p>
                </a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-fixedline/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Subscriber Fixed-Line</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/mobile_data_user/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Subscriber DataUser</p> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/vas/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Subscriber VAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/isp/')">
                  <i class="fa fa-chevron-right"></i>
                  <p>Generate Subscriber ISP</p>
                </a>
              </li>
            </ul>
           </li>
           <!--------------------------------New Features------------------------------------->
           <!--------------------------------Mail Function------------------------------------
           <li class="nav-item has-treeview">
            <a  class="nav-link" href="#">
              <i class="nav-icon far fa-envelope"></i>
              <p>Mailbox
                <i class="fas fa-angle-left right"></i><span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/newPage/mailbox/')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/newPage/compose/')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/newPage/read-mail/')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>----------------------------------->
          <!-----------------------------------Market Target Analysis------------------->
         <div class="dropdown-divider"></div>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" >
              <i class="nav-icon fas fa-edit"></i>
              <p>Market Target Analysis
                <i class="fas fa-angle-left right"></i><span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/financialtarget/financial_target/')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Finanical Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/financialtarget/non_financial_target/')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non-Finanical Target</p>
                </a>
              </li>
            </ul>
          </li>



        </ul>
      </nav>
</aside>