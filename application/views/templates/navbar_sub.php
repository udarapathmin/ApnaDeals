<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-home fa-2x"></i><span>Dashboard</span> </a> </li>
      	<li class="dropdown <?php if($navbar == 'user'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  ><i class="fa fa-users fa-2x"></i><span>Users</span>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('index.php/user/ListUsers'); ?>">List Users</a></li>
            <li><a href="<?php echo base_url('index.php/user/AddUser'); ?>">Add User</a></li>
          </ul>
        </li>
        <li class="dropdown <?php if($navbar == 'category'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  ><i class="fa fa-th-list fa-2x"></i><span>Category</span>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('index.php/category/ListCategory'); ?>">List Categories</a></li>
            <li><a href="<?php echo base_url('index.php/category/AddCategory'); ?>">Add Category</a></li>
          </ul>
        </li>
         <li class="dropdown <?php if($navbar == 'deals'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" ><i class="glyphicon glyphicon-list-alt"></i><span>Deals</span>
          <ul class="dropdown-menu">
            <li><a href="#">List Deals</a></li>
            <li><a href="#">Add Deal</a></li>
          </ul>
         </li>
        <li class="dropdown <?php if($navbar == 'stores'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building fa-2x"></i><span>Stores</span>
          <ul class="dropdown-menu">
            <li><a href="#">List Stores</a></li>
            <li><a href="#">Add Store</a></li>
          </ul>
        </li>
      	<li class="dropdown <?php if($navbar == 'city'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-taxi fa-2x"></i><span>City</span>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('index.php/city/ListCity'); ?>">List Cities</a></li>
            <li><a href="<?php echo base_url('index.php/category/AddCity'); ?>">Add City</a></li>
          </ul>
        </li>
        <li class="dropdown <?php if($navbar == 'states'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university fa-2x"></i><span>States</span>
          <ul class="dropdown-menu">
            <li><a href="#">List States</a></li>
            <li><a href="#">Add State</a></li>
          </ul>
        </li>
      	<li class="dropdown <?php if($navbar == 'pages'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file fa-2x"></i><span>Pages</span>
          <ul class="dropdown-menu">
            <li><a href="#">List Pages</a></li>
            <li><a href="#">Add Page</a></li>
          </ul>
        </li>
        <li class="dropdown <?php if($navbar == 'flyers'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-picture-o fa-2x"></i><span>Flyers</span>
          <ul class="dropdown-menu">
            <li><a href="#">List Flyers</a></li>
            <li><a href="#">Add Flyer</a></li>
          </ul>
        </li>
        <li class="dropdown <?php if($navbar == 'advertising'){ echo "active";} ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bullhorn fa-2x"></i><span>Advertising</span>
          <ul class="dropdown-menu">
            <li><a href="#">List All</a></li>
            <li><a href="#">Add New</a></li>
          </ul>
        </li>
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