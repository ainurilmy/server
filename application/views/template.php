
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Video Streaming - Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Admin Panel</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if(!empty($dashboard)) echo 'style="background-color: #000;"'; ?>>
                        <a href="<?php echo base_url();?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1" <?php if(!empty($master)) echo 'class="active"'; ?>>
                            <i class="fa fa-fw fa-arrows-v"></i> Master <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo1" <?php  if(!empty($dashboard) || !empty($pengguna) || !empty($suka) || !empty($pengaturan)) echo 'class="collapse"';  ?> >
                            <li <?php if(!empty($video)) echo 'style="background-color: #000;"'; ?>>
                                <a href="<?php echo base_url();?>master">Video</a>
                            </li>
                            <li <?php if(!empty($category)) echo 'style="background-color: #000;"'; ?>>
                                <a href="<?php echo base_url();?>master/category">Kategori</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if(!empty($pengguna)) echo 'class="active"'; ?>>
                        <a href="<?php echo base_url();?>user"><i class="fa fa-fw fa-users"></i> Pengguna</a>
                    </li>
                    <li <?php if(!empty($suka)) echo 'class="active"'; ?>>
                        <a href="<?php echo base_url();?>user/like"><i class="fa fa-fw fa-heart"></i> Suka</a>
                    </li>
                    <li <?php if(!empty($pengaturan)) echo 'class="active"'; ?>>
                        <a href="<?php echo base_url();?>admin"><i class="fa fa-fw fa-gear"></i> Pengaturan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>login/logout"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <?php echo $contents; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</body>

</html>
