<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Import Data</li>
        </ol>

      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Load Data for Finanical(Revenue)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'importform', 'enctype' => 'multipart/form-data'));?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group row">
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label>Please mention the year :<span class="text-danger">*</span></label>
                         <input type="number" name="Year" class="form-control" id="Year">
                      </div>
                       <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label>Please select the month :<span class="text-danger">*</span></label>
                         <select name="month" id="month" class="form-control">
                           <option value="">Select</option>
                           <option value="1">January</option>
                           <option value="2">Febaury</option>
                           <option value="3">March</option>
                           <option value="4">April</option>
                           <option value="5">May</option>
                           <option value="6">June</option>
                           <option value="7">July</option>
                           <option value="8">Agust</option>
                           <option value="9">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                         </select>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Upload the Financial Statements here :<span class="text-danger">*</span></label>
                          <input type="file" name="frevenue" onclick="removeer('frevenue_err')" id="frevenue" class="form-control">
                          <span id="frevenue_err"  class="text-danger"></span>
                      </div>
                  </div>
                  </div>                  
                  <div class="form-group">
                      <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                        <button class="btn btn-success pull-right" type="button" onclick="updaterv()"> Upload</button>
                      </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!------------------------------------------IMPORT VIEW----------------------------------------->
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">View Data for Finanical(Revenue)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <table id="comsubmotblid" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Year</th>
                <th>Month</th>                           
                <th>Service Revenue Id</th>                      
                <th>January</th>
                <th>Feburary</th>
                <th>March</th>
                <th>April</th>
                <th>May</th>
                <th>June</th>
                <th>July</th>
                <th>August</th>
                <th>September</th>
                <th>October</th>
                <th>November</th>
                <th>December</th>
            </tr>
        </thead>
        <tbody>
                    <?php foreach($revenuelist as $i=> $event): ?>
                      <tr>
                        <td><?=$i+1?></td>
                        <td> <?php echo $event['Year'];?> </td>
                        <td> <?php echo $event['Month'];?> </td>
                        <td> <?php echo $event['Service_Revenue_Id'];?> </td>
                        <td> <?php echo $event['Jan'];?> </td>
                        <td> <?php echo $event['Feb'];?> </td>
                        <td> <?php echo $event['Mar'];?> </td>
                        <td> <?php echo $event['Apr'];?> </td>
                        <td> <?php echo $event['May'];?> </td>
                        <td> <?php echo $event['Jun'];?> </td>
                        <td> <?php echo $event['July'];?> </td>
                        <td> <?php echo $event['Aug'];?> </td>
                        <td> <?php echo $event['Sep'];?> </td>
                        <td> <?php echo $event['Oct'];?> </td>
                        <td> <?php echo $event['Nov'];?> </td>
                        <td> <?php echo $event['Dec'];?> </td>
                                    <td>
                        <button type="button" class="btn btn-info btn-block" onclick="showrole('<?php echo $event['Id']?>','<?php echo $event['Year']?>','<?php echo $event['Month']?>','<?php echo $event['Service_Revenue_Id']?>','<?php echo $event['Jan']?>','<?php echo $event['Feb']?>','<?php echo $event['Mar']?>','<?php echo $event['Apr']?>','<?php echo $event['May']?>','<?php echo $event['Jun']?>','<?php echo $event['July']?>','<?php echo $event['Aug']?>','<?php echo $event['Sep']?>','<?php echo $event['Oct']?>','<?php echo $event['Nov']?>','<?php echo $event['Dec']?>')"><i class="fa fa-edit"></i>Update</button>

                           <button type="button" class="btn btn-danger btn-block" onclick="deletetarget('<?php echo $event['Id']?>')"><i class="fa fa-times"></i>Delete</button>
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

<script type="text/javascript">
  
    function updaterv(){
      if(validate()){
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
        var url='<?php echo base_url();?>index.php?adminController/insertrevenueexcelData/';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#importform").serialize()}; 
        $("#importform").ajaxSubmit(options);
        setTimeout($.unblockUI, 600); 
      }
    }
    function validate(){
      
      var returntype=true;
      var parts=$('#frevenue').val().split('.');
      var ext = parts[parts.length - 1];
      if($('#frevenue').val()==""){
        $('#frevenue_err').html('Please attach this excel file');  
        returntype=false;
      }
      else if(isvalidFile(ext)==false){
        $('#frevenue_err').html('Not a valid file. Please provide xls,xlsx and csv');  
        returntype=false;
      }
      return returntype; 
    }
    function removeer(errid){
      $('#'+errid).html('');  
    }
    function isvalidFile(ext) {
        switch (ext) {
        case 'xls':
        case 'xlsx':
        case 'csv':
            //etc
            return true;
        }
        return false;
    }
    $(function () {
    $("#comsubmotblid").DataTable();
    $('#comsubmotblid1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  	
