<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-th-list"></i> Edit Category</h3><hr>
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
			<?php echo form_open('category/EditCategory/'.$catid); ?>
              <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" name="category" placeholder="Category" value="<?php echo $categorydet ?>">
              </div>             
              <button type="submit" class="btn btn-success">Edit Category</button>
            <?php echo form_close(); ?>
		</div>
	
    </div>
</div>

