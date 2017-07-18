<?php
if(!$this->session->userdata('user'))
	{
		redirect('home');
	}
?>
<div id="page-wrapper">
	<div class="row">
			<div class="row">
				<div class="col-lg-12 page-header">
        		</div>
			</div>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
					  	<div class="panel panel-info">
							<div class="panel-heading ">Your Profile</div>
					    	<div class="panel-body">
					    		<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="nama" name="nama" autofocus placeholder="Nama Lengkap" class="form-control" value="<?php echo $profile->nama_petugas;?>" disabled />
									</div>
									<br>
						    		<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<textarea id="alamat" name="alamat" placeholder="Alamat Lengkap" class="form-control" disabled
										><?php echo $profile->alamat_petugas;?></textarea>
									</div>
									<br>
						    		<div class="input-group">
						    		<?php
						    			if($profile->jk_petugas == 'Laki-laki'){
						    		?>
											<span class="input-group-addon"><i class="fa fa-male"></i></span>
											<input type="text" id="telp" name="telp" autofocus placeholder="Nomor Telepon" class="form-control" value="<?php echo $profile->jk_petugas;?>" disabled />
									<?php
										}else{
									?>
											<span class="input-group-addon"><i class="fa fa-female"></i></span>
											<input type="text" id="telp" name="telp" autofocus placeholder="Nomor Telepon" class="form-control" value="<?php echo $profile->jk_petugas;?>" disabled />
									<?php
										}
									?>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Jenis Kelamin" class="form-control" value="<?php echo $profile->role_petugas;?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Tempat Tanggal Lahir" class="form-control" value="<?php echo $profile->ttl_petugas ;?>" disabled />
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
									<div id="foto-petugas" class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
										<img src="<?php echo base_url('assets/img/petugas/').$profile->foto_petugas;?>" style="width: 100%;height: 230px">
									</div>
								</div>
								<br>

								<!-- LINK KEMBALI KE TABEL DATA SISWA -->
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
									<a href="<?php echo base_url('index.php/home');?>" class="btn btn-md btn-primary">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
</div>