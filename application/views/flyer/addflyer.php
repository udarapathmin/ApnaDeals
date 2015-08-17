<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-picture-o"></i> Add Flyer</h3><hr>
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
			<?php echo form_open_multipart('flyer/AddFlyer'); ?>
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div>  
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
              </div>
               <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="userfile" accept="image/*">
                <p class="help-block">Attach Flyer Image</p>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category">
                  <?php foreach($categorylist as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Display</label>
                <select class="form-control" name="display">
                  <option value="1">Front page</option>
                  <option value="2">All Pages</option>
                </select>
              </div>
              <div class="form-group">
                <label>City</label>
                <select class="form-control" multiple  name="city[]">
                  <?php foreach($citylist as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                  <?php } ?>
                </select>
                <p class="help-block">Hold Control Button (CTRL) to select multiple cities.</p>
              </div>   
              <div class="form-group">
                <label>Website</label>
                <input type="url" class="form-control" name="link" placeholder="Link">
              </div>   
               <div class="checkbox">
                <label>
                  <input type="checkbox"> Redirect
                </label>
              </div>      
              <button type="submit" class="btn btn-success">Add Flyer</button>
            <?php echo form_close(); ?>
		</div>
	
    </div>
</div>

