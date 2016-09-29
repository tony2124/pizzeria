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
                    <li >
                        <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'portada')) ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Foto de portada</a>
                    
                    </li>
                    <li class="active">
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
                             <small><span class="glyphicon glyphicon-user"></span> Usuarios registrados</small>

                        </h1>
                        
                    </div>
                </div>
               
                 <div class="row">
                    <p>En la siguiente tabla se muestran los usuarios registrados. Utilice los controles para activar o desactivar la actividad de un usuario.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">Id</th>
                                    <th>Usuario</th>
                                    <th>E-mail</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Fech. registro</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clientes as $cliente) { 
                                $id = $cliente['Customer']['customer_id'];
                                $type = ($cliente['Customer']['approved']==false) ? 1 : 0;
                                ?>
                                <tr>
                                    <td><?= $cliente['Customer']['customer_id'] ?></td>
                                    <td><?= $cliente['Customer']['customer_name'] ?></td>
                                    <td><?= $cliente['Customer']['customer_email'] ?></td>
                                    <td><?= $cliente['Customer']['customer_tel'] ?></td>
                                    <td><?= $cliente['Customer']['customer_address'] ?></td>
                                    <td><?= $cliente['Customer']['registered'] ?></td>
                                    <td><?= ($cliente['Customer']['approved']==false) ? '<span class="label label-danger"> Denegado</span>' : '<span class="label label-success"> Aprobado</span>' ?></td>
                                    <td><a href="<?= $this->Html->url(array('action'=>'edit_user/'.$id.'/'.$type)) ?>" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-refresh"></span> </a> </td>
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
                            <?php $i = 1; while ($i <= $clients_count) { ?>
                                <li><a href="<?= $this->Html->url(array('action'=>'users/'.$i)) ?>"><?= $i++ ?></a></li>
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
                                    <span class="label label-danger">Denegado</span>
                                </td>
                                <td>El usuario no tiene ningún tipo de privilegios.</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-success">Aprobado</span>
                                </td>
                                <td>El usuario solo tiene los privilegios: iniciar/cerrar sesión, ordenar una o varias pizzas.</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span>
                                    </span>
                                </td>
                                <td>Permite cambiar el status del usuario registrado.</td>
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
