<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-users"></i> List Users</h3><hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>
                <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        foreach($userslist as $row){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$row->id."</th>" . PHP_EOL;
                            echo "<td>".$row->username."</td>" . PHP_EOL;
                            echo "<td>".$row->created."</td>" . PHP_EOL;
                            echo "<td>".$row->updated."</td>" . PHP_EOL;
                            echo "<td>".$row->name."</td>" . PHP_EOL;
                            echo "<td>".$row->last_name."</td>" . PHP_EOL;
                            echo "<td>".$row->email."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                           <a href='<?php echo base_url('index.php/user/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-list-alt"></i></a>
                           <a href='<?php echo base_url('index.php/user/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-pencil-square-o"></i></a>
                           <a href='<?php echo base_url('index.php/user/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-trash-o"></i></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                            echo "</tr>" . PHP_EOL;
                        }

                        ?>


                        </tbody>
                    </table>

		</div>
	
    </div>
</div>