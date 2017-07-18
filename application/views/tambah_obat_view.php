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
				<h1 class="page-header">Tambah Obat</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Penambahan Obat
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#formobat" data-toggle="tab" aria-expanded="true">Penambahan Stock</a>
                                </li>
                                <li>
                                    <a href="#formobatb" data-toggle="tab" aria-expanded="true">Penambahan Obat Baru</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="formobat">
                                    <form method="post" action="<?php echo base_url('index.php/home/add_stock');?>" enctype="multipart/form-data">
                                        <div class="panel-body">
                                            <?php
                                                if($this->session->flashdata('t_obat_b_g'))
                                                    {
                                                        echo '<div class="alert alert-danger">';
                                                        echo $this->session->flashdata('t_obat_b_g');
                                                        echo '</div>';
                                                    }
                                            ?>
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <select class="form-control" name="nik_suplier" >
                                                    <option value="">---- Pilih Suplier ----</option>
                                                <?php
                                                    foreach ($suplier as $supl) {
                                                        # code...
                                                ?>
                                                    <option value="<?php echo $supl->nama_suplier;?>"><?php echo $supl->nama_suplier;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Obat</label>
                                                <select class="form-control" name="obat_transaksi" >
                                                    <option value="">---- Pilih Obat ----</option>
                                                <?php
                                                    foreach ($obat as $lihat) {
                                                        # code...
                                                ?>
                                                    <option value="<?php echo $lihat->nama_obat;?>"><?php echo $lihat->nama_obat;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input type="number" class="form-control" name="jum_obat">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_transaksi">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="formobatb">
                                    <form method="post" action="<?php echo base_url('index.php/home/add_obat');?>" enctype="multipart/form-data">
                                        <div class="panel-body">
                                            <?php
                                                if($this->session->flashdata('t_obat_b_g'))
                                                {
                                                    echo '<div class="alert alert-danger">';
                                                    echo $this->session->flashdata('t_obat_b_g');
                                                    echo '</div>';
                                                }
                                            ?>
                                            <div class="form-group">
                                                <label>Id Obat</label>
                                                <input type="number" class="form-control" name="id_obat_b">
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <select class="form-control" name="nik_suplier_b" >
                                                    <option value="">---- Pilih Suplier ----</option>
                                                <?php
                                                    foreach ($suplier as $supl) {
                                                        # code...
                                                ?>
                                                    <option value="<?php echo $supl->nama_suplier;?>"><?php echo $supl->nama_suplier;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Obat</label>
                                                <input type="text" class="form-control" name="nama_obat_b">
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah_obat_b">
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role_obat_b" >
                                                    <option value="">---- Pilih Category ----</option>
                                                    <option value="Bebas">Obat Bebas</option>
                                                    <option value="Bebas Terbatas">Obat Bebas Terbatas</option>
                                                    <option value="Keras">Obat Keras</option>
                                                    <option value="Psikotropika dan Narkotika">Obat Psikotropika dan Narkotika</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" name="harga_obat_b">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-lg" value="submit" name="sub_obat">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		</div>
	</div>
</div>