<section class="content-header">
  	<h1>
	    Home
	    <small>Company Details</small>
  	</h1>
</section>
<section class="content">
  	<div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Manage Company Details</h3>
	    </div>
	    <button type="button" class="btn btn-primary pull-right" onclick="shpwaddCompany()"> Add new</button>
	    <div class="box-body">
	    	<div class="row">
	        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        		<table id="sliderDetails" class="table table-bordered table-striped">
			            <thead>
			              <tr>
			                <th>Sl No#</th>
			                <th>Name</th>
			                 <th>Company Shortname</th>
			                <th>Action</th>
			              </tr>
			            </thead>
			            <tbody>
		            	 	<?php foreach($companyList as $i=> $event): ?>
			                <tr>
			                  <td><?=$i+1?></td>
			                  <td> <?php echo $event['Company_Name'];?> </td>
			                   <td> <?php echo $event['Company_Shortname'];?> </td>
			             			                  <td>
			                  	 <button type="button" class="btn btn-info btn-block" onclick="showrole('<?php echo $event['Id']?>','<?php echo $event['Company_Name']?>','<?php echo $event['Company_Shortname']?>')"><i class="fa fa-edit"></i>Update</button>
			                  	 <button type="button" class="btn btn-danger btn-block" onclick="deletecompany('<?php echo $event['Id']?>')"><i class="fa fa-times"></i>Delete</button>
			                  </td>
			              	</tr>
			               	<?php endforeach; ?>
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>
</section>
<div class="modal modal-default" id="deleteSlider">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Update Company</h4>
      		</div>
      		<div class="modal-body">
      			<?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'companyupdate', 'enctype' => 'multipart/form-data'));?>
  				 	<div class="row">
			            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            	<div class="form-group">
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                  	<input type="text" name="companyName" id="companyName" class="form-control">
				                </div>
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                  	<input type="text" name="companyshort" id="companyshort" class="form-control">
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                	<input type="hidden" name="deleteId" id="deleteId">
				                	<button class="btn btn-success" type="button" onclick="updatecompanhydetails()"> <i class="fa fa-check"></i>Update</button>
				                </div>
				            </div>
			            </div>
			        </div>
      			</form>
      		</div>
      	</div>
  	</div>
</div>

<div class="modal modal-default" id="addcompanyid">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Add Company</h4>
      		</div>
      		<div class="modal-body">
      			<?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addcompany', 'enctype' => 'multipart/form-data'));?>
  				 	<div class="row">
			            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            	<div class="form-group">
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                  	<input type="text" name="companyName" id="companyName" class="form-control">
				                </div>
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                  	<input type="text" name="companyshort" id="companyshort" class="form-control">
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                	<button class="btn btn-success" type="button" onclick="addcompanhydetails()"> <i class="fa fa-check"></i>Add</button>
				                </div>
				            </div>
			            </div>
			        </div>
      			</form>
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
	
 	function showrole(id,name,shortcode){
 		$('#companyName').val(name);
 		$('#companyshort').val(shortcode);
 		$('#deleteId').val(id);
  		$('#deleteSlider').modal('show');
 	}
  	
  	function deletecompany(id){
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
	      var url='<?php echo base_url();?>index.php?adminController/deletecompany/'+id+'/companyName';
	       $("#mainContentdiv").load(url);
	       setTimeout($.unblockUI, 1000);
  	}
  	
  	function updatecompanhydetails(){
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
      var url='<?php echo base_url();?>index.php?adminController/Updatecompany/companyName';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#companyupdate").serialize()}; 
      $("#companyupdate").ajaxSubmit(options);
      $('#deleteSlider').modal('hide');
      setTimeout($.unblockUI, 600); 
  	}
  	function shpwaddCompany(){
  		
  		$('#addcompanyid').modal('show');
  	}
  	function addcompanhydetails(){
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
      var url='<?php echo base_url();?>index.php?adminController/addcompany/companyName';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addcompany").serialize()}; 
      $("#addcompany").ajaxSubmit(options);
      $('#addcompanyid').modal('hide');
      setTimeout($.unblockUI, 600);
  	}
</script>
  	
