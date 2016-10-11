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
        <?= $this->element('admins_menu') ?>

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
