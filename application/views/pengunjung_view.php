<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengunjung</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Data Pengunjung
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php
	                      if($this->session->flashdata('notifs'))
	                        {
	                            echo '<div class="alert alert-success alert-dismissable">';
	                            echo $this->session->flashdata('notifs');
	                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	                            echo '</div>';
	                        }elseif ($this->session->flashdata('notifg')) {
	                        	# code...
	                        	echo '<div class="alert alert-danger alert-dismissable">';
	                            echo $this->session->flashdata('notifg');
	                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	                            echo '</div>';
	                        }
                    	?>
	                        <form method="post" action="<?php echo base_url('index.php/home/anggota_pengunjung?query=cari');?>">
	                        	<div class="col-sm-4 col-lg-4 col-md-4 col-xl-4">
	                            	<div class="form-group input-group">
					           	       	<input type="search" class="form-control" name="search_pengunjung" placeholder="Search by name">
					           	       	<span class="input-group-btn">
					           	    	<input type="submit" name="btn_src_pengunjung" class="btn btn-default" value="search">
					           	        </span>
					              	</div>
					            </div>
					        </form>
					        <?php
					        	if($this->session->userdata('user'))
					        	{
					        ?>
					        <div style="float: right;">
					        	<a class="btn btn-primary btn-md" role="button" href="<?php echo base_url('index.php/home/add_pengunjung');?>">+ Tambah</a>
					        </div>
					        <?php
					        	}
					        ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Tempat,Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Role</th>
                                        <?php
                                        if ($this->session->userdata('user')) {
                                        	# code...
                                        ?>
                                        <th>Action</th>
                                        <?php
                                    	}
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach ($view_pengunjung as $pengunjung) {
                                		# code...
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $pengunjung->nik_pengunjung;?></td>
                                        <td><img src="<?php echo base_url('assets/img/pengunjung/').$pengunjung->foto_pengunjung?>" style="width: 120px;height: 140px;"></td>
                                        <td><a href="<?php echo base_url('index.php/home/detail_pengunjung/').$pengunjung->nik_pengunjung;?>"><?php echo $pengunjung->nama_pengunjung;?></a></td>
                                        <td class="center"><?php echo $pengunjung->ttl_pengunjung;?></td>
                                        <td class="center"><?php echo $pengunjung->alamat_pengunjung;?></td>
                                        <td class="center"><?php echo $pengunjung->jk_pengunjung;?></td>
                                        <td class="center"><?php echo $pengunjung->role_pengunjung;?></td>
                                        <?php
                                        if ($this->session->userdata('user')) {
                                        	# code...
                                        ?>
                                        <td class="center">
                                        	<a href="<?php echo base_url('index.php/home/edit_pengunjung/').$pengunjung->nik_pengunjung;?>"><i class="fa fa-edit"></i></a> | 
                                        	<a href="<?php echo base_url('index.php/home/delete_pengunjung/').$pengunjung->nik_pengunjung;?>"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                        <?php
                                    	}
                                        ?>
                                    </tr>
                                <?php
                                	}
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		</div>
	</div>
</div>