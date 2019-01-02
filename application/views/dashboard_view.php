<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>&nbsp; Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1>Welcome!</h1>
    <p>Selamat datang di halaman Admin</p>
</div>

<div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $new_user['total'];?></div>
                    <div>Pengguna baru!</div>
                </div>
            </div>
        </div>
        <a href="<?php echo base_url()?>user">
            <div class="panel-footer">
                <span class="pull-left">Lihat</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-bookmark-o fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $new_like['total'];?></div>
                    <div>Like baru!</div>
                </div>
            </div>
        </div>
        <a href="<?php echo base_url()?>user/bookmark">
            <div class="panel-footer">
                <span class="pull-left">Lihat</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>