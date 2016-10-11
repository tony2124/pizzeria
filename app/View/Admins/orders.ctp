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
        <?= $this->element('admins_menu') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small><span class="fa fa-fw fa-shopping-cart"></span> Órdenes</small>
                        </h1>
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
                <div class="row">

                    <p>&nbsp;</p>
                    <div class="table-responsive">
                        <table style="font-size: 12px" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">NÚM. ÓRDEN</th>
                                    <th>NOMBRE CLIENTE</th>
                                    <th>TOTAL</th>
                                    <th>TELÉFONO</th>
                                    <th>DIRECCIÓN</th>
                                    <th></th>
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
                                    <td><?= $sale['Customer']['customer_name'] ?></td>
                                    <td><?= '$ '.$sale['Sale']['total'] ?></td>
                                    <td><?= $sale['Sale']['telefono'] ?></td>
                                    <td><?= $sale['Sale']['calle'].', '.$sale['Sale']['numero'].', col. '.$sale['Sale']['colonia'] ?></td>
                                    <td><a href="<?= $this->Html->url(array('controller'=>'admins', 'action'=>'orderdetail/'.$id)) ?>">Ver detalles</a> </td>
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
