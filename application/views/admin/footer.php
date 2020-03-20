<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Design by BhutanSyncITS</a>.</strong> All rights
    reserved.
      <?php  $lastmonth=""; $month=""; 
        $lastactusr=0;$actuser=0;
        $lastarpucount=0;$arpucount=0;
        $lastpostarpucount=0;$postarpucount=0;
        foreach($Months as $i=> $mon): 
          $currentmon=0;$lastmonthach=0;
          $currentactiveusr=0;$lastcurrentactiveusr=0;
          $arpupre=0;$lastarpupre=0;
          $arpupost=0;$lastarpupost=0;
          foreach($achievementrev as $j=> $rep): 
            if($i+1==$rep['Month']){
              $currentmon=$rep['Grand_Total'];
            }
          endforeach;
          foreach($lastachievementrev as $j=> $las): 
            if($i+1==$las['Month']){
              $lastmonthach=$las['Grand_Total'];
            }
          endforeach;

          foreach($achievementActiveUser as $j=> $act): 
            if($i+1==$act['Month']){
              $currentactiveusr=$act['Total_Active'];
            }
          endforeach;
          foreach($lastachieActiveUser as $j=> $lasact): 
            if($i+1==$lasact['Month']){
              $lastcurrentactiveusr=$lasact['Total_Active'];
            }
          endforeach;

          foreach($achievementarpupre as $j=> $act): 
            if($i+1==$act['Month']){
              $arpupre=$act['Prepaid'];
            }
          endforeach;
          foreach($lastachiearpupre as $j=> $lasact): 
            if($i+1==$lasact['Month']){
              $lastarpupre=$lasact['Prepaid'];
            }
          endforeach;

          foreach($achievementpostarpu as $j=> $act): 
            if($i+1==$act['Month']){
              $arpupost=$act['Postpaid'];
            }
          endforeach;
          foreach($lastachiepostarpu as $j=> $lasact): 
            if($i+1==$lasact['Month']){
              $lastarpupost=$lasact['Postpaid'];
            }
          endforeach;
          

          if($i>0){
            $month=$month.','.$currentmon;
            $lastmonth=$lastmonth.','.$lastmonthach;

            $actuser=$actuser.','.$currentactiveusr;
            $lastactusr=$lastactusr.','.$lastcurrentactiveusr;

            $arpucount=$arpucount.','.$arpupre;
            $lastarpucount=$lastarpucount.','.$lastarpupre;

            $postarpucount=$postarpucount.','.$arpupost;
            $lastpostarpucount=$lastpostarpucount.','.$lastarpupost;
          }
          else{
            $month=$currentmon;
            $lastmonth=$lastmonthach;

            $actuser=$currentactiveusr;
            $lastactusr=$lastcurrentactiveusr;

            $arpucount=$arpupre;
            $lastarpucount=$lastarpupre;

            $postarpucount=$arpupost;
            $lastpostarpucount=$lastarpupost;
          } 
        endforeach; ?>
      <input type="hidden" name="" id="valudasd" value="<?=$month?>">
      <input type="hidden" name="" id="lastmonthAchierev" value="<?=$lastmonth?>">

      <input type="hidden" name="" id="monthactusr" value="<?=$actuser?>">
      <input type="hidden" name="" id="lastmonthactusr" value="<?=$lastactusr?>">

      <input type="hidden" name="" id="montharpuprepaid" value="<?=$arpucount?>">
      <input type="hidden" name="" id="lastmontharpuprepaid" value="<?=$lastarpucount?>">

      <input type="hidden" name="" id="montharpupostpaid" value="<?=$postarpucount?>">
      <input type="hidden" name="" id="lastmontharpupostpaid" value="<?=$lastpostarpucount?>">
</footer>

<script src="<?php echo base_url();?>assest/admin/version3/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assest/admin/version3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assest/admin/version3/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assest/jquery.form.js"></script>
<script src="<?php echo base_url();?>assest/jquery-blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assest/summernote/summernote-lite.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assest/admin/version3/plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assest/admin/version3/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assest/admin/version3/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript"> 
  function removeer(errid){
    $('#'+errid).html('');  
  }
  function loadpage(url){
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
      $("#mainContentdiv").load(url);
      setTimeout($.unblockUI, 1000);
    }
    
    function loadpagedashboard(url,value){
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
        url=url+"/"+value;
        window.location=url;
        setTimeout($.unblockUI, 1000);
    }
    function update(type,formId){
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
      var url='<?php echo base_url();?>index.php?adminController/UpdateInfo/'+type;
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#"+formId).serialize()}; 
      $("#"+formId).ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 
    }
    
    function checkfilesize(file,fileId,errorId,buttonId){
      var val=file.files[0].size/1024/1024,ext=$('#'+fileId).val().split('.').pop();
        if(val > 2){
            $('#'+errorId).html('Your file size should be below 2 mb. your current file size is '+val+' mb');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else if(ext.toUpperCase()!="PNG" && ext.toUpperCase()!="JPG" && ext.toUpperCase()!="JPEG"){
            $('#'+errorId).html('you are not allow to attach this file. only png/jpg/jpeg are allowed ');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else{
            $('#'+errorId).html('');
            $('#'+buttonId).show();
        }
    }

  $('#appendyear').html(<?=$yearselected?>);
  $('#actuveappendyear').html(<?=$yearselected?>);
  $('#actuveappendyearprepaid').html(<?=$yearselected?>);
  $('#postyear').html(<?=$yearselected?>);
  $('#ivoyear').html(<?=$yearselected?>);
$('#selectedyearid').val(<?=$yearselected?>);
var revenueAchievement=[$('#valudasd').val()];
var mnts_revenueAchievement=JSON.parse("[" + revenueAchievement + "]");

var laswerevenueAchievement=[$('#lastmonthAchierev').val()];
var last_mnts_revenueAchievement=JSON.parse("[" + laswerevenueAchievement + "]");

$(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        
        {
          label               : 'Achievement',
          backgroundColor     : 'rgba(10, 14, 122, 1)',
          borderColor         : 'rgba(10, 14, 122, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : mnts_revenueAchievement
        },
        {
          label               : 'Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$targetrev?>, <?=$targetrev?>, <?=$targetrev?>, <?=$targetrev?>, <?=$targetrev?>, <?=$targetrev?>, <?=$targetrev?>,<?=$targetrev?>,<?=$targetrev?>,<?=$targetrev?>,<?=$targetrev?>,<?=$targetrev?>]
        },
        {
          label               : 'Last year Achievement',
          backgroundColor     : 'rgba(50, 233, 22, 1)',
          borderColor         : 'rgba(50, 233, 22, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : last_mnts_revenueAchievement
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
   
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChartactiveusers').get(0).getContext('2d')
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  });

//target active user bar graph
var actveuser=[$('#monthactusr').val()];
var activetotuser=JSON.parse("[" + actveuser + "]");

var lasactveuser=[$('#lastmonthactusr').val()];
var lastactivetotuser=JSON.parse("[" + lasactveuser + "]");


$(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        
        {
          label               : 'Achievement',
          backgroundColor     : 'rgba(10, 14, 122, 1)',
          borderColor         : 'rgba(10, 14, 122, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : activetotuser
        },
        {
          label               : 'Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$targetActiveUser?>, <?=$targetActiveUser?>, <?=$targetActiveUser?>, <?=$targetActiveUser?>, <?=$targetActiveUser?>, <?=$targetActiveUser?>, <?=$targetActiveUser?>,<?=$targetActiveUser?>,<?=$targetActiveUser?>,<?=$targetActiveUser?>,<?=$targetActiveUser?>,<?=$targetActiveUser?>]
        },
        {
          label               : 'Last year Achievement',
          backgroundColor     : 'rgba(50, 233, 22, 1)',
          borderColor         : 'rgba(50, 233, 22, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : lastactivetotuser
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
   
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChartactiveusers').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  });



///arpuprepaid
var arpuprepaid=[$('#montharpuprepaid').val()];
var prepaidarpuval=JSON.parse("[" + arpuprepaid + "]");

var arpulast=[$('#lastmontharpuprepaid').val()];
var arpulastvalue=JSON.parse("[" + arpulast + "]");


$(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        
        {
          label               : 'Achievement',
          backgroundColor     : 'rgba(10, 14, 122, 1)',
          borderColor         : 'rgba(10, 14, 122, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : prepaidarpuval
        },
        {
          label               : 'Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>, <?=$targetActiveUserprepaid?>,<?=$targetActiveUserprepaid?>,<?=$targetActiveUserprepaid?>,<?=$targetActiveUserprepaid?>,<?=$targetActiveUserprepaid?>,<?=$targetActiveUserprepaid?>]
        },
        {
          label               : 'Last year Achievement',
          backgroundColor     : 'rgba(50, 233, 22, 1)',
          borderColor         : 'rgba(50, 233, 22, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : arpulastvalue
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
   
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    
    var barChartCanvas = $('#barChartarpuprepaid').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  });

///arpu post paid

 
var arpposta=[$('#montharpupostpaid').val()];
var prepostrpuval=JSON.parse("[" + arpposta + "]");

var lastpostarpu=[$('#lastmontharpupostpaid').val()];
var lastpostarpuvalue=JSON.parse("[" + lastpostarpu + "]");


$(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        
        {
          label               : 'Achievement',
          backgroundColor     : 'rgba(10, 14, 122, 1)',
          borderColor         : 'rgba(10, 14, 122, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : prepostrpuval
        },
        {
          label               : 'Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>, <?=$targetActivearpupostpaid?>,<?=$targetActivearpupostpaid?>,<?=$targetActivearpupostpaid?>,<?=$targetActivearpupostpaid?>,<?=$targetActivearpupostpaid?>,<?=$targetActivearpupostpaid?>]
        },
        {
          label               : 'Last year Achievement',
          backgroundColor     : 'rgba(50, 233, 22, 1)',
          borderColor         : 'rgba(50, 233, 22, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : lastpostarpuvalue
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
   
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    
    var barChartCanvas = $('#barChartarpupostpaid').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  });


///vivo
var arpposta=[$('#montharpupostpaid').val()];
var prepostrpuval=JSON.parse("[" + arpposta + "]");

var lastpostarpu=[$('#lastmontharpupostpaid').val()];
var lastpostarpuvalue=JSON.parse("[" + lastpostarpu + "]");


$(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        
        {
          label               : 'Achievement',
          backgroundColor     : 'rgba(10, 14, 122, 1)',
          borderColor         : 'rgba(10, 14, 122, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : prepostrpuval
        },
        {
          label               : 'Target',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>, <?=$targetActiveVivophone?>,<?=$targetActiveVivophone?>,<?=$targetActiveVivophone?>,<?=$targetActiveVivophone?>,<?=$targetActiveVivophone?>,<?=$targetActiveVivophone?>]
        },
        {
          label               : 'Last year Achievement',
          backgroundColor     : 'rgba(50, 233, 22, 1)',
          borderColor         : 'rgba(50, 233, 22, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : lastpostarpuvalue
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
   
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    
    var barChartCanvas = $('#barChartvivo').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  });


function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}
</script>
