<?php
if(!$this->session->userdata('user'))
	{
		redirect('home');
	}

if (!isset($transaksi->nama_pengunjung)) {
	# code...
	$nama_pengunjung = $transaksi->nik_pengunjung;
	$alamat_pengunjung = '-';
	$jk_pengunjung = '-';
}else{
	$nama_pengunjung = $transaksi->nama_pengunjung;
	$alamat_pengunjung = $transaksi->alamat_pengunjung;
	$jk_pengunjung = $transaksi->jk_pengunjung;
}
?>
<div id="page-wrapper">
	<div class="row">
			<div class="row">
				<div class="col-lg-12">
           			<h1 class="page-header">Detail Transaksi</h1>
        		</div>
			</div>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
					  	<div class="panel panel-info">
							<div class="panel-heading ">Transaksi</div>
					    	<div class="panel-body">
					    		<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="nama" name="nama" autofocus placeholder="Nama Pembeli" class="form-control" value="<?php echo $nama_pengunjung;?>" disabled />
									</div>
									<br>
						    		<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<textarea id="alamat" name="alamat" placeholder="Alamat Pembeli" class="form-control" disabled
										><?php echo $alamat_pengunjung;?></textarea>
									</div>
									<br>
						    		<div class="input-group">
						    		<?php
						    			if($jk_pengunjung == 'Laki-laki'){
						    		?>
											<span class="input-group-addon"><i class="fa fa-male"></i></span>
											<input type="text" id="telp" name="telp" autofocus placeholder="Jenis Kelamin" class="form-control" value="<?php echo $transaksi->jk_pengunjung;?>" disabled />
									<?php
										}elseif($jk_pengunjung == 'Perempuan'){
									?>
											<span class="input-group-addon"><i class="fa fa-female"></i></span>
											<input type="text" id="telp" name="telp" autofocus placeholder="Jenis Kelamin" class="form-control" value="<?php echo $transaksi->jk_pengunjung;?>" disabled />
									<?php
										}else{
									?>
											<span class="input-group-addon"><i class="fa fa-male"></i></span>
											<input type="text" id="telp" name="telp" autofocus placeholder="Jenis Kelamin" class="form-control" value="<?php echo $jk_pengunjung;?>" disabled />
									<?php
										}
									?>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-medkit"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Nama Obat" class="form-control" value="<?php echo $transaksi->nama_obat;?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Jenis Obat" class="form-control" value="<?php echo $transaksi->role_obat;?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-bar-chart-o"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Jumlah Pembelian" class="form-control" value="<?php echo $transaksi->jumlah_obat ;?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Harga" class="form-control" value="Rp. @<?php echo $transaksi->harga_obat ;?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Total Harga" class="form-control" value="Rp. <?php echo $transaksi->total_harga ;?>" disabled />
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
									<div id="foto-petugas">
										<?php
										if ($transaksi->foto_resep != '-') {
											# code...
										?>
											<img src="<?php echo base_url('assets/img/resep/').$transaksi->foto_resep;?>" style="width: 100%;height: 230px"><br>
											<div class="alert alert-info" role="alert">Menggunakan Resep</div>
										<?php
										}else{
										?>
											<img src="<?php echo base_url('assets/img/resep/');?>resep.png" style="width: 100%;height: 230px"><br>
											<div class="alert alert-info" role="alert">Tidak Menggunakan Resep</div>
										<?php
										}
										?>
									</div>
								</div>
								<br>

								<!-- LINK KEMBALI KE TABEL DATA SISWA -->
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
									<a href="<?php echo base_url('index.php/home/transaksi_form');?>" class="btn btn-md btn-primary">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
</div>