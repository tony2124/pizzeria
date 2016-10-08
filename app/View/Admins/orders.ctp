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
                    <li class="active">
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'orders')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Órdenes</a>
                    </li>
                    <li >
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'portada')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Foto de portada</a>
                    
                    </li>
                    <li >
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
                             <small><span class="glyphicon glyphicon-user"></span> Órdenes</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <p>&nbsp;</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th>ID CLIENTE</th>
                                    <th>NOMBRE CLIENTE</th>
                                    <th>TOTAL</th>
                                    <th>TELÉFONO</th>
                                    <th>DIRECCIÓN</th>
                                    <th>FECHA</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sales as $sale) { 
                                $id = $sale['Sale']['sale_id'];
                                $type = ($sale['Sale']['approved']==false) ? 1 : 0;
                                ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $sale['Sale']['customer_id'] ?></td>
                                    <td><?= $sale['Sale']['customer_id'] ?></td>
                                    <td><?= '$ '.$sale['Sale']['total'] ?></td>
                                    <td><?= $sale['Sale']['telefono'] ?></td>
                                    <td><?= $sale['Sale']['calle'].', '.$sale['Sale']['numero'].', col. '.$sale['Sale']['colonia'] ?></td>
                                    <td><?= $sale['Sale']['date'] ?></td>
                                    <td><?=  ($sale['Sale']['approved']==false) ? '<span class="label label-danger"> No aprobado</span>' : '<span class="label label-success"> Aprobado</span>'  ?></td>
                                    <td>
                                        <?php if($type == 1){ ?>
                                        <a href="<?= $this->Html->url(array('action'=>'edit_order/'.$id.'/'.$type)) ?>" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-ok"></span> </a> 
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php $i = 1; while ($i <= $sales_count) { ?>
                                <li><a href="<?= $this->Html->url(array('action'=>'orders/'.$i)) ?>"><?= $i++ ?></a></li>
                            <?php }  ?>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                    <div class="col-lg-5">
                        <h3>Notación</h3>
                        <table class="table">
                            <tr>
                                <td>
                                    <span class="label label-danger">No aprobado</span>
                                </td>
                                <td>La orden no ha sido procesada.</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-success">Aprobado</span>
                                </td>
                                <td>La orden fue enviada.</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </span>
                                </td>
                                <td>Permite cambiar el status de la orden a aprobado.</td>
                            </tr>
                        </table>
                    </div>
                    
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
