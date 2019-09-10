<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">

        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            
            <!--
            <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
            </button>

            
            <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
            </button>
            -->    

        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <!--
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
            -->
        </div>
    </div>
    <?php 
    $cur1 = $this->uri->segment(2);
    ?>
    <ul class="nav nav-list">
	
	
        <li class="<?php echo ($cur1=="dashboard") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
		
		<!-- START LOGIN DATA SEBAGAI ADMIN -->
		
		
		<li class="<?php echo ($cur1=="depot") ? "active" : ""; ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-tags"></i>
				<span class="menu-text">
					Depot
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url('admin/depot/add') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add
					</a> 

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url('admin/depot/daftar') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List
					</a>
					<b class="arrow"></b>
				</li> 
			</ul>
		</li>
		
		<li class="<?php echo ($cur1=="node") ? "active" : ""; ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-tags"></i>
				<span class="menu-text">
					Pelanggan
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url('admin/pelanggan/add') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add
					</a> 
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url('admin/pelanggan/daftar') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List
					</a>
					<b class="arrow"></b>
				</li> 
			</ul>
		</li>

		<li class="<?php echo ($cur1=="node") ? "active" : ""; ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-tags"></i>
				<span class="menu-text">
					Gudang
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url('admin/node/add') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add
					</a> 
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url('admin/node/daftar') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List
					</a>
					<b class="arrow"></b>
				</li> 
			</ul>
		</li>
		
		<li class="<?php echo ($cur1=="distribusi") ? "active" : ""; ?>">
			<a href="<?php echo base_url('admin/distribusi/') ?>">
				<i class="menu-icon fa fa-tags"></i>
				<span class="menu-text">
					Distribution
				</span>
			</a>
		</li>
		
		<li class="<?php echo ($cur1=="user") ? "active" : ""; ?>">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text">
					User
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url('admin/user/add') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tambah User
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url('admin/user/daftar') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Data User
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		
		<!-- END LOGIN DATA SEBAGAI ADMIN -->
		
    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
