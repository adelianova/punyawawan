<?php
    if(!$this->session->userdata('user'))
    {
        redirect('home');
    }
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Pengunjung</h1>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Pengunjung
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#upddata" data-toggle="tab" aria-expanded="true">Edit Data Pengunjung</a>
                                </li>
                                <li>
                                    <a href="#updkartu" data-toggle="tab" aria-expanded="true">Edit Data Kartu Sehat</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            	<div class="tab-pane fade active in" id="upddata">
		                        	<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
				                        <form method="post" action="<?php echo base_url('index.php/home/update_pengunjung');?>" enctype="multipart/form-data">
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
													<label>NIK Pengunjung</label>
												    <input type="text" class="form-control" name="nik_pengunjung" value="<?php echo $pengunjung->nik_pengunjung;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
												    <input type="text" class="form-control" name="nama_pengunjung" value="<?php echo $pengunjung->nama_pengunjung;?>">
												</div>
												<div class="form-group">
													<label>Tempat Tanggal Lahir</label>
												    <input type="text" class="form-control" name="ttl_pengunjung" value="<?php echo $pengunjung->ttl_pengunjung;?>">
												</div>
												<div class="form-group">
													<label>Alamat</label>
												    <input type="text" class="form-control" name="alamat_pengunjung" value="<?php echo $pengunjung->alamat_pengunjung;?>">
												</div>
												<div class="form-group">
													<label>Role</label>
												    <?php
															if($pengunjung->role_pengunjung == 'elder'){
																?>
															    <select class="form-control" name="role_pengunjung" >
							                                        <option value="<?php echo $pengunjung->role_pengunjung;?>"><?php echo $pengunjung->role_pengunjung;?></option>
							                                        <option value="Member">Member</option>
							                                    </select>
						                                    	<?php
						                                    }else{
						                                    	?>
						                                    	<select class="form-control" name="role_pengunjung" >
							                                        <option value="<?php echo $pengunjung->role_pengunjung;?>"><?php echo $pengunjung->role_pengunjung;?></option>
							                                        <option value="Elder">Elder</option>
							                                    </select>
						                                    	<?php
						                                    }
						                                    ?>
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
												    <?php
														if($pengunjung->jk_pengunjung == 'Laki-laki'){
															?>
														    <select class="form-control" name="jk_pengunjung" >
							                                    <option value="<?php echo $pengunjung->jk_pengunjung;?>"><?php echo $pengunjung->jk_pengunjung;?></option>
							                                    <option value="Perempuan">Perempuan</option>
							                                </select>
							                                <?php
						                                }else{
						                                   	?>
						                                  	<select class="form-control" name="jk_pengunjung" >
							                                    <option value="<?php echo $pengunjung->jk_pengunjung;?>"><?php echo $pengunjung->jk_pengunjung;?></option>
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
											<img src="<?php echo base_url('assets/img/pengunjung/').$pengunjung->foto_pengunjung;?>" style="width: 170px;height: 230px;margin-top: 20px">
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="updkartu">
									<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
				                        <form method="post" action="<?php echo base_url('index.php/home/update_kartu');?>" enctype="multipart/form-data">
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
													<label>NIK Pengunjung</label>
												    <input type="text" class="form-control" name="nik_pengunjung" value="<?php echo $pengunjung->nik_pengunjung;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
												    <input type="text" class="form-control" name="nama_pengunjung" value="<?php echo $pengunjung->nama_pengunjung;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nomor Kartu</label>
												    <input type="number" class="form-control" name="no_kartu" value="<?php echo $kartu->no_kartu;?>">
												</div>
												<div class="form-group">
													<label>Faskes Tingak1</label>
												    <input type="text" class="form-control" name="faskes_t1" value="<?php echo $kartu->faskes_t1;?>">
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_petugas">
												</div>
											</div>
										</form>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
										<div id="foto-petugas">
											<img src="<?php echo base_url('assets/img/pengunjung/').$pengunjung->foto_pengunjung;?>" style="width: 170px;height: 230px;margin-top: 20px">
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