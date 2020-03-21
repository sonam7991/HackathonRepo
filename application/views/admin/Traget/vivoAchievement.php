<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Achievement for Vivo Phone</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
          Achievement Details
        </h4>
        <div class="row">
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
          </div>  
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <button class="btn btn-primary" type="button" onclick="showAddSection()"><i class="fa fa-plus"></i> Add More record</button>
          </div>
        </div>
      </div>
      <div class="card-body">
	       <div class="row">
      	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <?php if($message!="Valid"){?>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger text-center">
                    <?=$message?>
                  </div>
                </div>
              <?php }?>
    		      <table id="sliderDetails" class="table table-bordered">
                <thead>
                  <tr>
		                <th>Sl No.</th>
		                <th>Year</th>
                     <th>Month</th>
		                <th>Achievement</th>
		                <th>Last Update By</th>
		                <th>Last Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
            	 	<?php foreach($vivoList as $i=> $vivo): ?>
	                <tr>
	                  <td><?=$i+1?></td>
	                  <td> <?php echo $vivo['Year'];?> </td>
	                  <td> <?php echo $vivo['Month'];?> </td>
	                  <td> <?php echo $vivo['Achievement'];?> </td>
	                  <td> <?php echo $vivo['Update_by'];?> </td>
	                  <td> <?php echo $vivo['Updated_On'];?> </td>
	                  <td>
	                  	 <button type="button" class="btn btn-info btn-block" onclick="showeditModel('<?php echo $vivo['Id']?>','<?php echo $vivo['Year']?>','<?php echo $vivo['Month']?>','<?php echo $vivo['Achievement']?>')"><i class="fa fa-edit"></i>Update</button>
	                  </td>
	              	</tr>
              	<?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<div class="modal" id="addmodelId">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> <span id="title"></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addFormId', 'enctype' => 'multipart/form-data'));?>
		 	  <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          	<div class="form-group row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Please mention the Year :<span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" placeholder="Year" onclick="removeer('year_err')">
                <span id="year_err"  class="text-danger"></span>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Please mention the Month :<span class="text-danger">*</span></label>
                <input type="number" name="month" id="month" class="form-control" placeholder="month" onclick="removeer('month_err')">
                <span id="month_err"  class="text-danger"></span>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Please mention Achievement:<span class="text-danger">*</span></label>
                <input type="number" name="achievement" id="achievement" class="form-control" placeholder="Achievement" onclick="removeer('achievement_err')">
                <span id="achievement_err"  class="text-danger"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <input type="hidden" name="actiontype" id="actiontype">
                <input type="hidden" name="updateId" id="updateId">
              	<button class="btn btn-success" type="button" onclick="addNewRecord()"><span id="btntxt"></span> </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('.summernote').summernote({
    height:250
	});
	$(function () {
    $('#sliderDetails').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
  });
 	function showAddSection(){
    $('#title').html('Add Achievement');
    $('#btntxt').html('<i class="fa fa-check"></i> Add Records');
    $('#actiontype').val("add");
		$('#addmodelId').modal('show');
 	}
  function addNewRecord(){
    if(validateAddForm()){
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
      var url='<?php echo base_url();?>index.php?adminController/listVivo/add';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addFormId").serialize()}; 
      $("#addFormId").ajaxSubmit(options);
      $('#addmodelId').modal('hide');
      setTimeout($.unblockUI, 1000);
    }
  }
  function showeditModel(id,year,month,achievement){
    $('#title').html('Edit Achievement');
    $('#btntxt').html('<i class="fa fa-edit"></i> Update Records');
    $('#actiontype').val("edit");
    $('#year').val(year);
    $('#month').val(month);
    $('#achievement').val(achievement);
    $('#updateId').val(id);
    $('#addmodelId').modal('show');
  }
  function validateAddForm(){
    var returnt=true;
    if($('#year').val()==""){
      $('#year_err').html('Please mention year');
      returnt=false;
    }
    if($('#month').val()==""){
      $('#month_err').html('Please mention month');
      returnt=false;
    }
    if($('#achievement').val()==""){
      $('#achievement_err').html('Please mention achievement');
      returnt=false;
    }
    return returnt;
  }
  	
  	function deleteuser(id){
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
	      var url='<?php echo base_url();?>index.php?adminController/deleteuser/'+id+'/role';
	       $("#mainContentdiv").load(url);
	       setTimeout($.unblockUI, 1000);
  	}
  	
  	function updaterole(){
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
      var url='<?php echo base_url();?>index.php?adminController/Updaterole/role';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#roleupdate").serialize()}; 
      $("#roleupdate").ajaxSubmit(options);
      $('#deleteSlider').modal('hide');
      setTimeout($.unblockUI, 600); 
  	}

  	function userstatus(id,staus){
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
      var url='<?php echo base_url();?>index.php?adminController/updatestaus/'+id+'/'+staus;
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#uerdet").serialize()}; 
      $("#uerdet").ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 
  	}
 
</script>
  	
