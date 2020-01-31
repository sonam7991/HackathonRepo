<section class="content-header">
  <h1>
    Home
    <small>Acknowledgement</small>
  </h1>
</section>
<section class="content">
  	<div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Message</h3>
	    </div>
	    <div class="box-body">
	    	<?php  
				if($message!='Undefined' && $message!=''){
			?>
			<div class="row">
	          	<div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
	          		<div class="callout callout-success text-center">
	          			<?=$message?>
	          		</div>
	          	</div>
	      	</div>
			<?php
			} if($messagefail!='Undefined' && $messagefail!=''){
			?>
			<div class="row">
	          	<div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
	          		<div class="callout callout-danger text-center">
	          			<?=$messagefail?>
	          		</div>
	          	</div>
	      	</div>
			<?php
			}
			?>
    	</div>
    </div>
</section>
