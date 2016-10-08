<!DOCTYPE html>
<html lang="en">
<head>
    <title>SB Admin - Bootstrap Admin Template</title>

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
                    <li >
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'portada')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Foto de portada</a>
                    
                    </li>
                    <li >
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'users')) ?>"><i class="fa fa-fw fa-table"></i> Usuarios</a>
                        
                    </li>
                    <li >
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'varieties')) ?>"><i class="fa fa-fw fa-edit"></i> Variedades</a>
                        
                    </li>
                    <li class="active">
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
                             <small>Promociones</small>

                        </h1>
                        
                    </div>
                </div>
               
                 <div class="row">
                    <div class="col-sm-7">
                        <p>Las dimensiones apropiadas para las imágenes son: 500 x 500. Si no se consigue estas dimensiones se recomienda que todas las imágenes tengan las mismas dimensiones cuadradas.</p>
                    <?= $this->Form->create('Promotion', array('type'=>'file', 'class'=>'form-horizontal', 'url'=>array('controller'=>'admins','action'=>'save_promotion'))) ?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Título de la promoción</label>
                        <div class="col-sm-10">
                          <input type="text" name="nombre" value="<?= $promotion['Promotion']['promotion_title'] ?>" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                          <textarea name="descripcion" class="form-control"><?= $promotion['Promotion']['promotion_desc'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                             &nbsp;&nbsp;&nbsp;<label><input <?php if( $promotion['Promotion']['promotion_type'] == 1) print 'checked' ?> type="radio" value="1" name="tipo">&nbsp;Descuento</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input <?php if( $promotion['Promotion']['promotion_type'] == 2) print 'checked' ?> type="radio" value="2" name="tipo">&nbsp;2 x 1</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input <?php if( $promotion['Promotion']['promotion_type'] == 3) print 'checked' ?> type="radio" value="3" name="tipo">&nbsp;Gratis</label>
                         </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-10">
                          <?= $this->Form->input('foto',array('type'=>'file')) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Agregar</button>
                        </div>
                      </div>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
                <hr>
                
          
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
