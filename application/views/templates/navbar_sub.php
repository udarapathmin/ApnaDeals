<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-home fa-2x"></i><span>Dashboard</span> </a> </li>
      	<li class="dropdown <?php if($navbar == 'user'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  ><i class="fa fa-users fa-2x"></i><span>Users</span>
          <ul class="dropdown-menu">
            <li><a href="#">List User</a></li>
            <li><a href="#">Add User</a></li>
          </ul>
        </li>
        <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-th-list fa-2x"></i><span>Category</span> </a> </li>
         <li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Deals</span> </a> </li>
        <li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-building fa-2x"></i><span>Stores</span> </a> </li>
      	<li><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-taxi fa-2x"></i><span>City</span> </a> </li>
        <li><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-university fa-2x"></i><span>States</span> </a> </li>
      	<li><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-file fa-2x"></i><span>Pages</span> </a> </li>
        <li <?php if($navbar == 'admin'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-picture-o fa-2x"></i><span>Flyers</span> </a> </li>
        <li><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-bullhorn fa-2x"></i><span>Advertising</span> </a> </li>
        <!-- <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">List User</a></li>
            <li><a href="#">Add User</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>