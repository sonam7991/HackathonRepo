<body> 
	<div class="container">
		<span class=""><h2> Import Excel</h2></span><br>
		<div class="row form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              	<input type="file" id="fileToexport" name="fileToexport" class="form-control"  required="">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="btn btn-primary" name="submit" id="importfile"> Import File</button>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="sliderDetails" class="table table-bordered table-striped">
		            <thead>
		              <tr>
		                <th>Sl No#</th>
		                <th>Department Name</th>
	                 	<th>Department Shortname</th>
	                 	<th>Cid Number</th>
		                <th>Action</th>
		              </tr>
		            </thead>
		            <tbody>		            	 	
		            </tbody>
		        </table>
		        <div id="wrapper">
		        </div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo base_url();?>assest/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url();?>assest/xlsx.full.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#importfile').click(function(){
			var fileNameExt = $('#fileToexport').val().substr($('#fileToexport').val().lastIndexOf('.') + 1);
			debugger;
			if(fileNameExt=="csv"){
				var rdr=new FileReader();			
				rdr.onload=function (e){
					//get the row into array
					var therows=e.target.result.split("\n");
					for(var row=1;row<therows.length;row++){
						var columns=therows[row].split(",");
						var allCol="";
						for(var col=0;col<4;col++){
							//alert(columns[col]);
							if(columns[col].trim()==""){
								allCol+='<td class="bg-danger"><input type="hidden" name="licNo" value="'+columns[col]+'">'+columns[col]+'</td>';
							}
							else if(col==0 && !$.isNumeric(columns[col].trim())){
								allCol+='<td class="bg-warning"><input type="hidden" name="licNo" value="'+columns[col]+'">'+columns[col]+'</td>';
							}
							else{
								allCol+='<td><input type="hidden" name="licNo" id="'+row+'licNo'+col+'" value="'+columns[col]+'">'+columns[col]+'</td>';
							}
						}
						//var newrow="<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>"+columns[3]+"</td></tr>";
						var newrow="<tr>"+allCol+"<td><button class='btn btn-info'>Edit</button></td></tr>";
						$("#sliderDetails").append(newrow);

					}
					console.log(therows);
				}
				rdr.readAsText($('#fileToexport')[0].files[0]);
			}
			else{
				/*var reader = new FileReader();
				reader.onload=function (e){
					reader.readAsArrayBuffer(e.target.files[0]);
					var data = new Uint8Array(reader.result);
					var wb = XLSX.read(data,{type:'array'});
					var htmlstr = XLSX.write(wb,{sheet:"doiReport", type:'binary',bookType:'html'});
					$('#wrapper')[0].innerHTML += htmlstr;
				}*/
				$.ajax({
					url:"<?php echo base_url();?>index.php?excelImport/import/",
					method:"POST",
					data:$("#applicationform").serialize(),
					contentType:false,
					cache:false,
					processData:false,
					success:function(data){

					}
				});
			}

			//excel
			
		});
	});
	
</script>
