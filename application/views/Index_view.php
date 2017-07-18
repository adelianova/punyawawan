<?php
    if($this->session->userdata('user'))
    {
        redirect('home/utama');
    }
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            if($this->session->flashdata('notif')){
                                echo '<div class="alert alert-warning">';
                                echo $this->session->flashdata('notif');
                                echo '</div>';
                            }elseif($this->session->flashdata('notif_login')){
                                echo '<div class="alert alert-danger">';
                                echo $this->session->flashdata('notif_login');
                                echo '</div>';
                            }
                        ?>
                        <form method="post" action="<?php echo base_url('index.php/home/login');?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password"/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="login" name="submit"> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->