<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="brand-link">
  <img src="<?php echo base_url();?>uploads/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="logo-lg"><b>BT-DASHBOARD</b></span>
  </a>
  <div class="sidebar"> 
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if($this->session->userdata('Role_Id')=="1"){?>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/addUser/')">
             <i class="nav-icon fa fa-user-plus"></i> Add User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/ListUser/')">
            <i class="nav-icon fa fa-users"></i> List Users
            </a>
          </li>
        <?php } if($this->session->userdata('Role_Id')!="3"){?>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/revenue/')">
            <i class="nav-icon fa fa-download"></i> Import Revenue Finacial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-mobile/')">
            <i class="nav-icon fa fa-download"></i> Import Subs  B-Mobile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/subsb-fixedline/')">
            <i class="nav-icon fa fa-download"></i> Import Subs Fixed-Line
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/mobile_data_user/')">
            <i class="nav-icon fa fa-download"></i> Import Subs Data User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/vas/')">
            <i class="nav-icon fa fa-download"></i> Import Subscriber VAS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadimportPage/isp/')">
            <i class="nav-icon fa fa-download"></i> Import Subscriber ISP
            </a>
          </li>
      <?php }?>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Subs B-Mobile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/revenue-financial/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Revenue
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-fixedline/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Subs Fixed-Line
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/mobile_data_user/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Subs Data User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"  onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/vas/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Subscriber VAS
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/isp/')">
          <i class="nav-icon fa fa-align-justify"></i> Generate Subscriber ISP
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>