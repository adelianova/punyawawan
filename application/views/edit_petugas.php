<?php
    if(!$this->session->userdata('user'))
    {
    	redirect('home');
    }

    if($this->session->userdata('role') != 'super_admin'){
       	redirect('home/anggota_petugas');
    }
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Petugas</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit Petugas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#upddata" data-toggle="tab" aria-expanded="true">Edit Data Petugas</a>
                                </li>
                                <li>
                                    <a href="#updus" data-toggle="tab" aria-expanded="true">Edit Username & Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            	<div class="tab-pane fade active in" id="upddata">
		                        	<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
				                        <form method="post" action="<?php echo base_url('index.php/home/update_petugas');?>" enctype="multipart/form-data">
					                        <div class="panel-body">
						                        <?php
					                      			if($this->session->flashdata('notifg'))
					                        		{
					                            		echo '<div class="alert alert-danger">';
					                            		echo $this->session->flashdata('notifg');
					                            		echo '</div>';
					                        		}elseif($this->session->flashdata('pendnotifs')){
					                        			echo '<div class="alert alert-success">';
					                            		echo $this->session->flashdata('pendnotifs');
					                            		echo '</div>';
					                        		}elseif($this->session->flashdata('notifw')){
					                        			echo '<div class="alert alert-warning">';
					                            		echo $this->session->flashdata('notifw');
					                            		echo '</div>';
					                        		}
					                    		?>
												<div class="form-group">
													<label>Id Petugas</label>
												    <input type="text" class="form-control" value="<?php echo $petugas->id_petugas;?>" name="id_petugas" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
												    <input type="text" class="form-control" name="nama_petugas" value="<?php echo $petugas->nama_petugas;?>">
												</div>
												<div class="form-group">
													<label>Tempat Tanggal Lahir</label>
												    <input type="text" class="form-control" name="ttl_petugas" value="<?php echo $petugas->ttl_petugas;?>">
												</div>
												<div class="form-group">
													<label>Alamat</label>
												    <input type="text" class="form-control" name="alamat_petugas" value="<?php echo $petugas->alamat_petugas;?>">
												</div>
												<div class="form-group">
													<label>Role</label>
													<?php
													if($petugas->role_petugas == 'admin'){
														?>
													    <select class="form-control" name="role_petugas" >
					                                        <option value="<?php echo $petugas->role_petugas;?>"><?php echo $petugas->role_petugas;?></option>
					                                        <option value="super_admin">Super Admin</option>
					                                    </select>
				                                    	<?php
				                                    }else{
				                                    	?>
				                                    	<select class="form-control" name="role_petugas" >
					                                        <option value="<?php echo $petugas->role_petugas;?>">Super Admin</option>
					                                        <option value="admin">Admin</option>
					                                    </select>
				                                    	<?php
				                                    }
				                                    ?>
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<?php
													if($petugas->jk_petugas == 'Laki-laki'){
														?>
													    <select class="form-control" name="jk_petugas" >
					                                        <option value="<?php echo $petugas->jk_petugas;?>"><?php echo $petugas->jk_petugas;?></option>
					                                        <option value="Perempuan">Perempuan</option>
					                                    </select>
					                                    <?php
				                                    }else{
				                                    	?>
				                                    	<select class="form-control" name="jk_petugas" >
					                                        <option value="<?php echo $petugas->jk_petugas;?>"><?php echo $petugas->jk_petugas;?></option>
					                                        <option value="Laki-laki">Laki-laki</option>
					                                    </select>
				                                    	<?php
				                                    }
				                                    ?>
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_petugas">
												</div>
											</div>
										</form>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
										<div id="foto-petugas">
											<img src="<?php echo base_url('assets/img/petugas/').$petugas->foto_petugas;?>" style="width: 170px;height: 230px;margin-top: 20px">
										</div>
									</div>
								</div>
                            	<div class="tab-pane fade" id="updus">
                            	<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
				                        <form method="post" action="<?php echo base_url('index.php/home/update_usnpass');?>" enctype="multipart/form-data">
					                        <div class="panel-body">
						                        <?php
					                      			if($this->session->flashdata('notifg'))
					                        		{
					                            		echo '<div class="alert alert-danger">';
					                            		echo $this->session->flashdata('notifg');
					                            		echo '</div>';
					                        		}elseif($this->session->flashdata('pendnotifs')){
					                        			echo '<div class="alert alert-success">';
					                            		echo $this->session->flashdata('pendnotifs');
					                            		echo '</div>';
					                        		}elseif($this->session->flashdata('notifw')){
					                        			echo '<div class="alert alert-warning">';
					                            		echo $this->session->flashdata('notifw');
					                            		echo '</div>';
					                        		}
					                    		?>
												<div class="form-group">
													<label>Id Petugas</label>
												    <input type="text" class="form-control" value="<?php echo $petugas->id_petugas;?>" name="id_petugas" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
												    <input type="text" class="form-control" name="nama_petugas" value="<?php echo $petugas->nama_petugas;?>" readonly>
												</div>
												<div class="form-group">
													<label>Username</label>
												    <input type="text" class="form-control" name="username_petugas" value="<?php echo $usepetugas->username;?>">
												</div>
												<div class="form-group">
													<label>Password</label>
												    <input type="text" class="form-control" name="password_petugas" value="<?php echo $usepetugas->password;?>">
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_petugas">
												</div>
											</div>
										</form>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
										<div id="foto-petugas">
											<img src="<?php echo base_url('assets/img/petugas/').$petugas->foto_petugas;?>" style="width: 170px;height: 230px;margin-top: 20px">
										</div>
									</div>
                            	</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>