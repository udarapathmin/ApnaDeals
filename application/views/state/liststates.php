<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-university"></i> List States</h3><hr>
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        $no=1;
                        foreach($states as $row){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$no."</th>" . PHP_EOL;
                            echo "<td>".$row->name."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                           <a href='<?php echo base_url('index.php/state/EditState/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-pencil-square-o"></i></a>
                           <a href='<?php echo base_url('index.php/state/DeleteState/'.$row->id); ?>' onclick="return confirm('Are you sure you want to permenantly delete this State?   you cannot recover this after you delete');" class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></a>
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