    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <?= $this->Html->css('agency.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>

<body id="page-top" class="index">

    <!-- NAVEGACION -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color: #222">
        <div class="container">
            <!-- ESTO ES PARA QUE SE VEA EN MÓVILES -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegación</span> Menú <i class="glyphicon glyphicon-menu-hamburger"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?= $this->Html->image('logo.png', array('width'=>'100', 'style'=>'margin-top:-20px; float: left')) ?>D'Gusta Pizza</a>
            </div>

            <!-- AQUI VAN LOS MENUS -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#tam">Tamaños</a>-->
                        <?= $this->Html->link("Tamaños",array('controller'=>'pizzas', 'action'=>'#services'),array('class'=>'page-scroll')) ?>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#var">Variedades</a>-->
                        <?= $this->Html->link("Variedades",array('controller'=>'pizzas', 'action'=>'#portfolio'),array('class'=>'page-scroll')) ?>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#pro">Promociones</a>-->
                        <?= $this->Html->link("Promociones",array('controller'=>'pizzas', 'action'=>'#team'),array('class'=>'page-scroll')) ?>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#contact">Contacto</a>-->
                        <?= $this->Html->link("Contacto",array('controller'=>'pizzas', 'action'=>'#contact'),array('class'=>'page-scroll')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("¡Ordena!",'#ordena') ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <!-- sección de promociones -->
    <section id="ordena">
        <div class="container">
            <!-- datos de las pizzas -->
            <div class="row">
                <h4>Datos del cliente</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td width="20%">Nombre</td>
                            <td><?= $this->Session->read('name') ?></td>
                        </tr>
                         <tr>
                            <td>Correo</td>
                            <td><?= $this->Session->read('email') ?></td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td><?= $this->Session->read('tel') ?></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><?= $this->Session->read('address') ?></td>
                        </tr>
                    </table>
                </div>
                <h4>Dirección de envío</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td width="20%">Colonia</td>
                            <td><?= $this->request->data['colonia'] ?></td>
                        </tr>
                         <tr>
                            <td>Número</td>
                            <td><?= $this->request->data['numero']  ?></td>
                        </tr>
                        <tr>
                            <td>Calle</td>
                            <td><?= $this->request->data['calle']  ?></td>
                        </tr>
                        <tr>
                            <td>Referencias</td>
                            <td><?= $this->request->data['referencias']  ?></td>
                        </tr>
                         <tr>
                            <td width="20%">Teléfono</td>
                            <td><?= $this->request->data['telefono'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?= $this->Form->create('orden',array('url'=>array('controller'=>'pizzas','action'=>'enviar'))); ?>
            <?= $this->Form->input('customer_id',array( 'type' =>'hidden' , 'value' => $this->Session->read('id'))); ?>
             <?= $this->Form->input('colonia',array( 'type' =>'hidden' , 'value' => $this->request->data['colonia'])); ?>
             <?= $this->Form->input('numero',array( 'type' =>'hidden' , 'value' => $this->request->data['numero'])); ?>
             <?= $this->Form->input('calle',array( 'type' =>'hidden' , 'value' => $this->request->data['calle'])); ?>
             <?= $this->Form->input('referencias',array( 'type' =>'hidden' , 'value' => $this->request->data['referencias'])); ?>
             <?= $this->Form->input('telefono',array( 'type' =>'hidden' , 'value' => $this->request->data['telefono'])); ?>
            <div class="row">
                <h4>Descripción de pizzas</h4>
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <th>No.</th>
                            <th>Tamaño</th>
                            <th>Variedad</th>
                            <th>Ingred. extras</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            $total = 0;
                            foreach ($sizes as $size) { ?>
                                <tr>
                                    <td><?= $i+1 ?></td>
                                    <td>
                                        <?= $size['Size']['size_name'] ?>
                                        
                                        <input name="size_id[]" type="hidden" value="<?= $size['Size']['size_id'] ?>">

                                    </td>
                                    <td>
                                        <?= $varieties[$i]['Variety']['variety_name']." (".$varieties[ $i ]['Variety']['ingredients'].")" ?>
                                        
                                        <input name="variety_id[]" type="hidden" value="<?= $varieties[$i]['Variety']['variety_id'] ?>">
                                    </td>
                                    <td>
                                        <?= $ie[$i]['Ingredient']['nombre']." ( + $".$ie[ $i ]['Ingredient']['costo']." pesos)" ?>
                                        
                                        <input name="ingredient_id[]" type="hidden" value="<?= $ie[$i]['Ingredient']['ingredient_id'] ?>">
                                    </td>
                                    <td align="right"><?= "$".($size['Size']['price'] + $ie[ $i ]['Ingredient']['costo']) ?></td>
                                    <?php $total += ($size['Size']['price'] + $ie[ $i++ ]['Ingredient']['costo'])  ?>
                                </tr>
                            <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><?= "$".$total ?></td>
                                    <?= $this->Form->input('total',array( 'type' =>'hidden' , 'value' => $total)); ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div align="right">
                <?= $this->Html->link('Volver a ordenar',array('action'=>'ordena'),array('class'=>'btn btn-default btn-lg')) ?>
                <?= $this->Form->button("Enviar orden",array('class'=>'btn btn-success btn-lg','type'=>'submit')) ?>
                </div>
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; D'Gusta Pizza <?php print date("Y") ?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                    <p><br>Col. Centro, Apatzingán, Michoacán. Tel: 53 449 99 y 53 769 99.</p>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Políticas de privacidad</a>
                        </li>
                        <li><a href="#">Términos de uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <?= $this->Html->script('jqBootstrapValidation.js') ?>
    <?= $this->Html->script('contact_me.js') ?>
    <?= $this->Html->script('agency.min.js') ?>
</body>