<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="glyphicon glyphicon-list-alt"></i> List Deals</h3><hr>
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>City</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        $no=1;
                        foreach($dealslist as $row){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$no."</th>" . PHP_EOL;
                            echo "<td>".substr($row->name,0,60)."..."."</td>" . PHP_EOL;
                            echo "<td>".$row->image."</td>" . PHP_EOL;
                            echo "<td>".$row->sale_price."</td>" . PHP_EOL;
                            echo "<td>".$row->category_id."</td>" . PHP_EOL;
                            echo "<td>".$row->city_id."</td>" . PHP_EOL;
                            echo "<td>".$row->created."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                           <a href='<?php echo base_url('index.php/user/ViewUser/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-list-alt"></i></a>
                           <a href='<?php echo base_url('index.php/user/EditUser/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-pencil-square-o"></i></a>
                           <a href='<?php echo base_url('index.php/user/DeleteUser/'.$row->id); ?>' class='btn btn-danger btn-xs' onclick="return confirm('Are you sure you want to permenantly delete this user?   you cannot recover this user profile after you delete');"><i class="fa fa-trash-o"></i></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                            echo "</tr>" . PHP_EOL;

                            $no++;
                        }

                        ?>


                        </tbody>
                    </table>

		</div>
	
    </div>
</div>