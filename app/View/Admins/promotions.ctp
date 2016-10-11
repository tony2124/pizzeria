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
                             <small><span class="fa fa-fw fa-trophy"></span> Promociones</small>

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
                          <input type="text" name="nombre" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                          <textarea name="descripcion" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                             &nbsp;&nbsp;&nbsp;<label><input type="radio" value="1" name="tipo">&nbsp;Descuento</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" value="2" name="tipo">&nbsp;2 x 1</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" value="3" name="tipo">&nbsp;Gratis</label>
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
                <div class="row">
                <?php foreach ($promotions as $prom) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row" >
                                    <?= $this->Html->image('promo/'.$prom['Promotion']['promotion_photo'], array('class'=>'img-responsive img-circle')) ?>
                                   
                                </div>
                            </div>
                            
                                <div class="panel-footer">
                                    <strong><h4 class="pull-left"><span class="glyphicon glyphicon-cd"></span> <?= $prom['Promotion']['promotion_title'] ?></h4></strong>
                                    <div class="clearfix"></div>
                                        <span class="pull-left"><span class="glyphicon glyphicon-apple"></span> <?= $prom['Promotion']['promotion_desc'] ?></span>
                                    <div class="clearfix"></div>
                                    <a href="<?=  $this->Html->url(array('controller'=>'admins', 'action'=>'delete/1/'.$prom['Promotion']['promotion_id'])) ?>" class="pull-right btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span> </a>
                                    <a href="<?=  $this->Html->url(array('controller'=>'admins', 'action'=>'edit_promotion/'.$prom['Promotion']['promotion_id'])) ?>" class="pull-right btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> </a>
                                    <div class="clearfix"></div>
                                </div>
                            
                        </div>
                    </div>
                <?php } ?>
                    
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
