<?php
    if(!$this->session->userdata('user'))
    {
        redirect('home');
    }
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <?php
                      if($this->session->flashdata('notif_login'))
                        {
                            echo '<div class="alert alert-success alert-dismissible">';
                            echo $this->session->flashdata('notif_login');
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <?php
                    if($this->session->flashdata('notif_login'))
                    {
                ?>
                <h1 class="page-header">Welcome <?php echo $this->session->userdata('user');?></h1>
                <?php
                    }else{ 
                ?>
                <h1 class="page-header">DashBoard</h1>   
                <?php
                    }
                ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo count($jum_petugas);?></div>
                                        <div>Petugas</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/home/anggota_petugas');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo count($jum_pengunjung);?></div>
                                        <div>Pengunjung</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/home/anggota_pengunjung');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-glass fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo count($jum_obat);?></div>
                                        <div>Obat</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/home/obat');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-transfer fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo count($jum_transaksi);?></div>
                                        <div>Transaksi</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/home/transaksi_form');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->