<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Custom CSS -->
    <?= $this->Html->css('sb-admin.css') ?>
    <!-- Morris Charts CSS -->
    <?= $this->Html->css('plugins/morris.css') ?>
    <!-- Custom Fonts -->
    <?= $this->Html->css('font-awesome.min.css') ?>

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
                <a class="navbar-brand" href="index.html">D'Gusta Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrador <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Contraseña</a>
                        </li>
                        <li class="divider"></li>-->
                        <li>
                            <!--<i class="fa fa-fw fa-power-off"></i>-->
                            <?= $this->Html->link("Salir", array('controller'=>'users','action'=>'logoutadmin')) ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                       <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'index')) ?>"><i class="fa fa-fw fa-dashboard"></i> Estadísticas</a>
                        
                    </li>
                    <li>
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'orders')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Órdenes</a>
                    </li>
                    <li class="active">
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'portada')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Foto de portada</a>
                    
                    </li>
                    <li>
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'users')) ?>"><i class="fa fa-fw fa-table"></i> Usuarios</a>
                        
                    </li>
                    <li>
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'varieties')) ?>"><i class="fa fa-fw fa-edit"></i> Variedades</a>
                        
                    </li>
                    <li>
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'promotions')) ?>"><i class="fa fa-fw fa-desktop"></i> Promociones</a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small><span class="glyphicon glyphicon-picture"></span> Foto de portada</small>

                        </h1>
                        
                    </div>
                </div>
               
                 <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <p>Selecciona una nueva foto de portada, las dimensiones recomendadas son: 1440 x 900.</p>
                        </div>
                        <?= $this->Form->create('Img', array('type'=>'file')) ?>
                        <div class="form-group">
                            <?= $this->Form->file('foto'); ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar" class="btn btn-primary" />
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <p>&nbsp;</p>
                        <?= $this->Html->image('header-bg.jpg',array('class'=>'img-responsive')) ?>
                </div>
          
            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- Morris Charts JavaScript -->
    
    <?= $this->Html->script('morris/raphael.min.js') ?>
    
    <?= $this->Html->script('morris/morris.min.js') ?>
    
    <?= $this->Html->script('morris/morris-data.js') ?>

</body>

</html>
