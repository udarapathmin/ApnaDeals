<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-taxi"></i> Add City</h3><hr>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
           <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
        </div>
    </div>
	<div class="row">
		<div class="col-md-6">
			<?php echo form_open('city/AddCity'); ?>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>  
              <div class="form-group">
                <label>Pin</label>
                <input type="text" class="form-control" name="pin" placeholder="Pin">
              </div>
              <div class="form-group">
                <label>Region</label>
                <input type="text" class="form-control" name="region" placeholder="Region">
              </div>           
              <button type="submit" class="btn btn-success">Add City</button>
            <?php echo form_close(); ?>
		</div>
	
    </div>
</div>

