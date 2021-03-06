<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-users"></i> Edit User</h3><hr>
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
			<?php echo form_open('user/EditUser/'.$uid); ?>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email"  value="<?php echo $userdet['email'] ?>">
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $userdet['name'] ?>">
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $userdet['last_name'] ?>">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" readonly name="username" placeholder="Username" value="<?php echo $userdet['username'] ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
              </div>
             
              <button type="submit" class="btn btn-success">Edit User</button>
            <?php echo form_close(); ?>
		</div>
	
    </div>
</div>

