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
                             <small><span class="fa fa-fw fa-shopping-cart"></span> Consulta de orden</small>
                        </h1>
                    </div>
                    

                    <?php $sales = $sales[0]; ?>
                    <div class="col-lg-7">
                    	<a href="<?= $this->Html->url(array('controller'=>'admins', 'action'=>'orders')) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Regresar </a>
                        <h3>Datos de la órden</h3>
                        <table class="table">
                            <tr>
                                <td>
                                    NÚM. DE ÓRDEN
                                </td>
                                <td><?= $sales['Sale']['sale_id'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    NOMBRE DEL CLIENTE
                                </td>
                                <td><?= $sales['Customer']['customer_name'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    TOTAL
                                </td>
                                <td><?= '$ '.$sales['Sale']['total'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    TELÉFONO
                                </td>
                                <td><?= $sales['Sale']['telefono'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    DIRECCIÓN
                                </td>
                                <td><?= $sales['Sale']['calle'].', '.$sales['Sale']['numero'].', col. '.$sales['Sale']['colonia'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    FECHA DE ORDEN
                                </td>
                                <td><?= $sales['Sale']['date'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    STATUS
                                </td>
                                <td><?=  ($sales['Sale']['approved']==false) ? '<span class="label label-danger"> No aprobado</span>' : '<span class="label label-success"> Aprobado</span>'  ?></td>
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
                                    <th>TAMAÑO</th>
                                    <th>VARIEDAD</th>
                                    <th>INGREDIENTE EXTRA</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($details as $detail) { 
                                $id = $detail['SaleDetail']['sale_detail_id'];
                                ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $detail['Size']['size_name'] ?></td>
                                    <td><?= $detail['Variety']['variety_name'] . ' ('.$detail['Variety']['ingredients'].')' ?></td>
                                    <td><?= $detail['SaleDetail']['extra'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
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
