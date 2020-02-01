<aside class="main-sidebar">
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
            		<i class="fa fa-chevron-right"></i> Add user
            	</a>
            </li>
            <li>
            	<a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/listUser/')">
            	<i class="fa fa-chevron-right"></i> List users
            	</a>
            </li>
          </ul>
        </li> 	 	
   		
      	<?php }?>
      	<li class="treeview" id="contact">
	        <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadPage/search/')">
	          <i class="fa fa-search"></i>
	          <span>Search</span>
	        </a>
      	</li>
      	<li class="treeview">
          <a href="#">
           <i class="fa fa-download"></i>
	          <span>Import Data</span>
        	  <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
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
            	<a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/listUser/')">
            	<i class="fa fa-chevron-right"></i> List users
            	</a>
            </li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
           <i class="fa fa-area-chart"></i>
            <span>View/Generate Report</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadreportPage/subsb-mobile/')">
                <i class="fa fa-chevron-right"></i> Subscriber B-Mobile
              </a>
            </li>
            <li>
              <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadAdminPage/listUser/')">
              <i class="fa fa-chevron-right"></i> List users
              </a>
            </li>
          </ul>
        </li>
    </ul>
  </section>
</aside>