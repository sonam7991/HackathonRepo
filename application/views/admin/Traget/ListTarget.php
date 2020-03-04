<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Manage Target Details</li>
        </ol>
      </div>
    </div>
  </div>
</section>
	 <section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Manage Target Details</h4>
              </div>
              <div class="card-body">
	    	<?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'uerdet', 'enctype' => 'multipart/form-data'));?>
	    	<div class="row">
	        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        		<table id="sliderDetails" class="table table-bordered">
			            <thead>
			              <tr>
			                <th>Sl No.</th>
			                <th>Year</th>
			                <th>Financial Target</th>
			                <th>ARPU Postpaid</th>
			                <th>ARPU Prepaid</th>
                      <th>Active Users</th>
			                <th>Sales of Vivo Phones</th>
			                <th>Action</th>
			              </tr>
			            </thead>
			            <tbody>
		            	 	<?php foreach($targetlist as $i=> $event): ?>
			                <tr>
			                  <td><?=$i+1?></td>
			                  <td> <?php echo $event['Year'];?> </td>
			                  <td> <?php echo $event['Revenue'];?> </td>
			                  <td> <?php echo $event['Arpu_post'];?> </td>
			                  <td> <?php echo $event['Arpu_pre'];?> </td>
			                  <td> <?php echo $event['Active_user'];?> </td>
                        <td> <?php echo $event['Vivophone'];?> </td>
                                    <td>
                           <button type="button" class="btn btn-info btn-block" onclick="showrole('<?php echo $event['Id']?>','<?php echo $event['Year']?>','<?php echo $event['Revenue']?>','<?php echo $event['Arpu_post']?>','<?php echo $event['Arpu_pre']?>','<?php echo $event['Active_user']?>','<?php echo $event['Vivophone']?>')"><i class="fa fa-edit"></i>Update</button>

                           <button type="button" class="btn btn-danger btn-block" onclick="deletetarget('<?php echo $event['Id']?>')"><i class="fa fa-times"></i>Delete</button>
                        </td>
                        
			              	</tr>
			               	<?php endforeach; ?>
			            </tbody>
			        </table>
			    </div>

</div>
	    
	</div>
</section>
 <div class="modal fade" id="deleteSlider">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Update Target</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'targetupdate', 'enctype' => 'multipart/form-data'));?>
  				 	<div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="Year" id="Year" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="ftarget" id="ftarget" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="arpupre" id="arpupre" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="arpupost" id="arpupost" class="form-control">
                        </div>
                    </div>
                </div>
			          <div class="form-group row">
                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="activeu" id="activeu" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="sales" id="sales" class="form-control">
                        </div>
                </div>
                <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <input type="hidden" name="deleteId" id="deleteId">
                          <button class="btn btn-success" type="button" onclick="updatetargetdetails()"> <i class="fa fa-check"></i>Update</button>
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
  function updatetargetdetails(){
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
      var url='<?php echo base_url();?>index.php?adminController/updatetargetdetails/ListTarget';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#targetupdate").serialize()}; 
      $("#targetupdate").ajaxSubmit(options);
      $('#deleteSlider').modal('hide');
      setTimeout($.unblockUI, 600); 
    }
function showrole(id,year,revenue,arpupost,arpupre,au,vivo){
    $('#Year').val(year);
    $('#Revenue').val(revenue);
    $('#Arpu_post').val(arpupost);
    $('#Arpu_pre').val(arpupre);
    $('#Active_user').val(au);
    $('#Vivophone').val(vivo);
    $('#deleteId').val(id);
    $('#deleteSlider').modal('show');
  }
 
</script>
  	
