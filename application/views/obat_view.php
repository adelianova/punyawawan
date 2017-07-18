<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Obat</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Data Pengunjung
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
            	                if($this->session->flashdata('t_obat_b_s'))
            	                {
            	                    echo '<div class="alert alert-success alert-dismissable">';
                                    echo $this->session->flashdata('t_obat_b_s');
            	                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                                    echo '</div>';
            	                }elseif($this->session->flashdata('notifs')){
                                    echo '<div class="alert alert-success alert-dismissable">';
                                    echo $this->session->flashdata('notifs');
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                                    echo '</div>';
                                }elseif($this->session->flashdata('notifg')){
                                    echo '<div class="alert alert-danger alert-dismissable">';
                                    echo $this->session->flashdata('notifg');
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                                    echo '</div>';
                                }
                        	?>
            	                        <form method="post" action="<?php echo base_url('index.php/home/obat?query=cari');?>">
            	                        	<div class="col-sm-4 col-lg-4 col-md-4 col-xl-4">
            	                            	<div class="form-group input-group">
            					           	       	<input type="search" class="form-control" name="search_obat" placeholder="Search by name">
            					           	       	<span class="input-group-btn">
            					           	    	<input type="submit" name="btn_src_obat" class="btn btn-default" value="search">
            					           	        </span>
            					              	</div>
            					            </div>
            					        </form>
                            <?php
                                if($this->session->userdata('user'))
                                {
                            ?>
                            <div style="float: right;">
                                <a class="btn btn-primary btn-md" role="button" href="<?php echo base_url('index.php/home/add_obat');?>">+ Tambah</a>
                            </div>
                            <?php
                                }
                            ?>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Role</th>
                                                    <th>Stock</th>
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
                                            	foreach ($obat as $ob) {
                                            		# code...
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $ob->id_obat;?></td>
                                                    <td><?php echo $ob->nama_obat;?></td>
                                                    <td class="center"><?php echo $ob->harga_obat;?></td>
                                                    <td class="center"><?php echo $ob->role_obat;?></td>
                                                    <td class="center"><?php echo $ob->stock_obat;?></td>
                                                    <?php
                                                    if ($this->session->userdata('user')) {
                                                    	# code...
                                                    ?>
                                                    <td class="center">
                                                        <a href="<?php echo base_url('index.php/home/delete_obat/').$ob->id_obat;?>"><i class="glyphicon glyphicon-trash"></i></a>
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