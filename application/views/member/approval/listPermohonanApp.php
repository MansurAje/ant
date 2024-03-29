<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>
                <li class="active">Data permohonan</li>
            </ul><!-- /.breadcrumb -->

          
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Data Permohonan
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Data semua permohonan approval
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">


                    <!--
                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                    </h4>
                    -->


                    <div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                            </div>
                            <div class="table-header">
                                Menampilkan seluruh data Permohonan menunggu approval
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div class="modal-footer no-margin-top"> 
                           
                            </div>
                            <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Restoran</th>
									<th>Alamat</th>
									<th>No. Telp</th>
									<th>RT / RW</th>
                                    <th>Kecamatan</th>
									<th>Kelurahan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
                            </thead> 
                            <tbody>
                                 <?php
                                $no = 1 ;
                                foreach($listData as $value){
									if($value->status=="0"){
										$status = "Mengajukan";
									}elseif($value->status=="1"){
										$status = "Evaluated";
									}elseif($value->status=="2"){
										$status = "Vertified";
									}elseif($value->status=="3"){
										$status = "Approved";
									}else{
										$status = "Rejected";
									}
									?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $value->nama_pemilik; ?></td>
										<td><?php echo $value->nama_restoran; ?></td>
										<td><?php echo $value->alamat; ?></td>
										<td><?php echo $value->no_telp; ?></td>
										<td><?php echo $value->rt_rw; ?></td>
										<td><?php echo $value->kecamatan; ?></td>
										<td><?php echo $value->kelurahan; ?></td>
										<td><?php echo $status ?></td>
										<td>
											<a href="<?php echo base_url('admin/approval/detail/'.$value->id_pemohon) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i> Detail</a>
											
											<!-- <a href="<?php echo base_url('admin/approval/doDelete/'.$value->id_pemohon) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data petugas ini ? ')"><i class="fa fa-trash"></i> Hapus</a> -->
										</td>
										
									</tr>
									<?php 
                                }
                                ?>   
                            </tbody>
                        </table> 
                            </div>

                           
                    </div><!-- /.modal-dialog -->
                </div><!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
