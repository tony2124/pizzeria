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
        <?= $this->element('admins_menu') ?>
        <!-- Navigation -->
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small>Registro de ingredientes</small>

                        </h1>
                        
                    </div>
                </div>
               
                 <div class="row">
                    <div class="col-sm-7">
                        <p>En el siguiente formulario registra el nuevo ingrediente y el costo extra en la pizza.</p>
                    <?= $this->Form->create('Ingrediente', array('type'=>'file', 'class'=>'form-horizontal', 'url'=>array('controller'=>'admins','action'=>'saving_ingredient'))) ?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del ingrediente</label>
                        <div class="col-sm-10">
                          <input type="text" name="nombre" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Costo</label>
                        <div class="col-sm-10">
                          <input type="text" name="costo" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Guardar</button>
                        </div>
                      </div>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
                <hr>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small><span class="fa fa-fw fa-users"></span> Ingredientes registrados</small>

                        </h1>
                        
                    </div>
                </div>
               
                 <div class="row">
                    <p>En la siguiente tabla se muestran los ingredientes registrados. </p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" style="width: 50%">
                            <thead>
                                <tr>
                                    <th width="10%">Id</th>
                                    <th>Ingrediente</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ingredients as $ingredient) { 
                                $id = $ingredient['Ingredient']['ingredient_id']; ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $ingredient['Ingredient']['nombre'] ?></td>
                                    <td><?= $ingredient['Ingredient']['costo'] ?></td>
                                    <td width="10%" align="right">
                                        <a class="btn btn-danger" href="<?= $this->Html->url(array('action'=>'delete/3/'.$id)) ?>">Eliminar</a>
                                    </td>
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
