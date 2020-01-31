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
  	 	
   		<?php } if($this->session->userdata('Role_Id')=="2"){ ?>
   			<li class="treeview" id="contact">
	        <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadPage/search/')">
	          <i class="fa fa-search"></i>
	          <span>Search</span>
	        </a>
      	</li> 
   		<?php } if($this->session->userdata('Role_Id')!="2"){?>
   		<li class="treeview" id="contact">
	        <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadPage/application/')">
	          <i class="fa fa-chevron-circle-right"></i>
	          <span>Application</span>
	        </a>
	      </li>

      	<?php }?>
      	
    </ul>
  </section>
</aside>