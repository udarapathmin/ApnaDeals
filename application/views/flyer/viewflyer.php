<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-picture-o"></i> View Flyer</h3><hr>
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
    <!-- Details -->
	<div class="row" style="margin-bottom:10px">
		<div class="col-md-2">
            <b>Title</b>
		</div>
        <div class="col-md-10">
            <?php echo $flyerdet['title'] ?>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Description</b>
        </div>
        <div class="col-md-10">
            <?php echo $flyerdet['description'] ?>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Category</b>
        </div>
        <div class="col-md-10">
            <?php echo $flyerdet['name'] ?>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Cities</b>
        </div>
        <div class="col-md-10">
            <?php echo $citystring ?> 
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Image</b>
        </div>
        <div class="col-md-10">
            <img src="<?php echo base_url('uploads/images/flyers/'.$flyerdet['image']); ?>" class="img-thumbnail" >
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Website</b>
        </div>
        <div class="col-md-10">
            <a href="<?php echo $flyerdet['website'] ?>"><?php echo $flyerdet['website'] ?></a>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Display</b>
        </div>
        <div class="col-md-10">
            <?php echo $flyerdet['display'] ?>
        </div>
    </div>
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-2">
            <b>Updated</b>
        </div>
        <div class="col-md-10">
            <?php echo $flyerdet['updated'] ?>
        </div>
    </div>

    <!-- Buttobs -->
    <div class="row" style="margin-top:20px">
      <div class="col-md-8">
        <div class="form-inline">
          <div class="form-group">
            <a href='<?php echo base_url('index.php/flyer/EditFlyer/'.$flyerdet['id'] ); ?>' class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Edit Flyer</a>
          </div>
          <div class="form-group">
            <a href='<?php echo base_url('index.php/flyer/DeleteFlyer/'.$flyerdet['id']); ?>' onclick="return confirm('Are you sure you want to permenantly delete this user?   you cannot recover this user profile after you delete');" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete Flyer</a>
          </div>
        </div>
      </div>
    </div>

</div>

    
