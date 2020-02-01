
<header class="main-header">
    <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="logo">
      <span class="logo-mini">BT</span>
      <span class="logo-lg"><b>BT-Dashboard</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="#" onerror="this.src='<?php echo base_url();?>uploads/user.png'" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('Full_Name');?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="#" onerror="this.src='<?php echo base_url();?>uploads/user.png'" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('Full_Name');?>
                </p>
              </li>               
              <li class="user-footer">
                <div >
                  <a href="#" class="btn btn-success btn-flat pull-left" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadPage/profie/<?php echo $this->session->userdata('User_table_id');?>')">Profile</a>
                  <a href="#" class="btn btn-default btn-flat pull-right" data-toggle="modal" data-target="#modal-logout">Sign out</a>
                </div>
              </li>             
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sign Out</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to logout ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url();?>index.php?baseController/logout"> <button type="button"  class="btn btn-primary">Yes</button></a>
        </div>
      </div>
    </div>
  </div>
