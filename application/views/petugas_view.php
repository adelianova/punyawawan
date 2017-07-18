<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Petugas</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Data Petugas
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
	                        <form method="post" action="<?php echo base_url('index.php/home/anggota_petugas?query=cari');?>">
	                        	<div class="col-sm-4 col-lg-4 col-md-4 col-xl-4">
	                            	<div class="form-group input-group">
					           	       	<input type="search" class="form-control" name="search_petugas" placeholder="Search by name">
					           	       	<span class="input-group-btn">
					           	    	<input type="submit" name="btn_src_petugas" class="btn btn-default" value="search">
					           	        </span>
					              	</div>
					            </div>
					        </form>
					        <?php
					        	if($this->session->userdata('user'))
					        	{
                                    if($this->session->userdata('role') == 'super_admin'){
					        ?>
            					        <div style="float: right;">
            					        	<a class="btn btn-primary btn-md" role="button" href="<?php echo base_url('index.php/home/add_petugas');?>">+ Tambah</a>
            					        </div>
					        <?php
                                    }
					        	}
					        ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Petugas</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Role</th>
                                        <?php
                                        if ($this->session->userdata('user')) {
                                            # code...
                                            if($this->session->userdata('role') == 'super_admin'){
                                        ?>
                                                <th>Action</th>
                                        <?php
                                            }
                                    	}
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach ($view_petugas as $petugas) {
                                		# code...
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $petugas->id_petugas;?></td>
                                        <td><img src="<?php echo base_url('assets/img/petugas/').$petugas->foto_petugas;?>" style="width: 120px;height: 160px;"></td>
                                        <td><a href="<?php echo base_url('index.php/home/detail_petugas/').$petugas->id_petugas;?>"><?php echo $petugas->nama_petugas;?></a></td>
                                        <td class="center"><?php echo $petugas->alamat_petugas;?></td>
                                        <td class="center"><?php echo $petugas->jk_petugas;?></td>
                                        <td class="center"><?php echo $petugas->role_petugas;?></td>
                                        <?php
                                        if ($this->session->userdata('user')) {
                                            # code...
                                            if($this->session->userdata('role') == 'super_admin'){
                                        ?>
                                                <td class="center">
                                                	<a href="<?php echo base_url('index.php/home/edit_petugas/').$petugas->id_petugas;?>"><i class="fa fa-edit"></i></a> | 
                                                	<a href="<?php echo base_url('index.php/home/delete_petugas/').$petugas->id_petugas;?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                        <?php
                                            }
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