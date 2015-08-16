<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-users"></i> View User</h3><hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } else { ?>

            <div class="panel panel-info">
            <?php
                foreach($user as $row){ ?>
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row->name . " " . $row->last_name ; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://icons.iconarchive.com/icons/dryicons/simplistica/128/user-icon.png" class="img-circle"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Username:</b></td>
                        <td><?php echo $row->username; ?></td>
                      </tr>
                      <tr>
                        <td><b>First Name:</b></td>
                        <td><?php echo $row->name; ?></td>
                      </tr>
                      <tr>
                        <td><b>Last Name:</b></td>
                        <td><?php echo $row->last_name; ?></td>
                      <tr>
                        <td><b>Email:</b></td>
                        <td><?php echo $row->email; ?></td>
                      </tr>
                      <tr>
                        <td><b>Status:</b></td>
                        <td><?php echo $row->status; ?></td>
                      </tr>

                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div> 
            


            <?php } ?>
            </div>
		</div>
	
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="form-inline">
          <div class="form-group">
            <a href='' class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Edit User</a>
          </div>
          <div class="form-group">
            <a href='' class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete User</a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>