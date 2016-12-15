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
                            <small><span class="glyphicon glyphicon-list-alt"></span> Variedades de pizzas</small>
                        </h1>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-7">
                        <p>Las dimensiones apropiadas para las imágenes son: 720 x 440. Si no se consigue estas dimensiones se recomienda que todas las imágenes tengan las mismas dimensiones.</p>
                    <?= $this->Form->create('Variety', array('type'=>'file', 'class'=>'form-horizontal', 'url'=>array('controller'=>'admins','action'=>'editing_variety/'.$variety['Variety']['variety_id']))) ?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre de la variedad</label>
                        <div class="col-sm-10">
                          <input type="text" name="nombre" class="form-control" value="<?= $variety['Variety']['variety_name'] ?>"  placeholder="Nombre de la variedad">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Ingredientes</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="ingredientes" value="<?= $variety['Variety']['ingredients'] ?>" placeholder="Ingredientes">
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
                          <button type="submit" class="btn btn-default">Guardar</button>
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
