
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url();?>index.php?baseController/dashboard" class="nav-link">Home</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle" style="font-size:28px; color: red">
          </i>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="#" class="">
            <div class="user text-center">
              <img src="<?php echo base_url();?>uploads/user1-128x128.jpg" style="width:80px" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <hr>
              <div class="user-body">
                
                 <a href="#" class="btn btn-success" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadPage/profie/<?php echo $this->session->userdata('User_table_id');?>')">Profile</a>

                 <a href="#" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-logout"> Sign out</a>
              </div>
            </div>
          </a>
        </div>
      </li>
  </ul>
</nav>
</header>
<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Sign Out</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to logout ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url();?>index.php?baseController/logout"> <button type="button"  class="btn btn-primary">Yes</button></a>
            </div>
          </div>
        </div>
  </div>
      
     