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
                        <a href="<?= $this->Html->url(array('controller'=>'pizzas')) ?>"></a>
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
            <!-- Apartado para elegir número de pizzas -->
            <div class="row">
            	<div class="col-sm-3"></div>
                <div class="col-lg-6 text-center">
                    <h2 class="section-heading">Orden de pizzas</h2>
                    <h3 class="section-subheading text-muted" style="margin-bottom: 0px">Hola <strong><?= $this->Session->read('name') ?></strong>! Puedes ordenar tu pizza desde este apartado. Ya conocemos tu dirección, pero nos interesa saber a dónde vamos a mandar tu pizza. Sientete feliz de ordenar. <span style="float: right"> <?= $this->Html->link("Cambiar de usuario", array('controller'=>'users', 'action'=>'logout'),array('style'=>'color: #337ab7')) ?></span></h3>

                </div>
                <div class="col-sm-3"></div>
            </div>
            <!-- datos de las pizzas -->
            <div class="row">
            	<div class="col-sm-3"></div>
                <div class="col-sm-6">
                	<form class="form-horizontal" method="post" name="numbers">
                        <hr>
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Número de pizzas</label>
                            <div class="col-sm-4">
                               <select <?php if ($number > 0) { ?> disabled <?php } ?> name="number" id="number" class="form-control">
                                <?php for($i = 0; $i < 7; $i++){ ?>
                                <option <?php if($number == ($i+1)) print "selected" ?> value="<?= $i+1 ?>"><?= $i+1 ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1">
                                &nbsp;
                            </div>
                            <div class="col-sm-2">
                                <?php if ($number > 0) { ?> 
                                <?= $this->Html->link("< Atrás",array('action'=>'ordena'),array('class'=>'btn btn-primary btn-lg')) ?>
                                 <?php }else{ ?>
                                 <?= $this->Form->button("Continuar",array('class'=>'btn btn-primary btn-lg')) ?>
                                 <?php } ?>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php if ($number > 0) { ?>
                    <?= $this->Form->create('orden',array('class'=>'form-horizontal','url'=>array('controller'=>'pizzas','action'=>'procesar'))); ?>
					  
                    <?php for($i = 0; $i < $number; $i++){ ?>
                    <span class="label label-primary">Pizza #<?= $i+1 ?></span>
                    <div class="form-group form-group-lg">
    				    <label class="col-sm-3 control-label">Tamaño</label>
    				    <div class="col-sm-9">
    				      <select name="size_id[]" class="form-control">
                            <?php foreach ($sizes as $size) { ?>
                                <option value="<?= $size['Size']['size_id'] ?>"><?= $size['Size']['size_name'] ?></option>    
                            <?php } ?>
    				      </select>
    				    </div>
    				</div>
    				<div class="form-group form-group-lg">
    				    <label class="col-sm-3 control-label">Variedad</label>
    				    <div class="col-sm-9">
    				      <select name="variety_id[]" class="form-control">
    				      	<?php foreach ($varieties as $var) { ?>
                                <option value="<?= $var['Variety']['variety_id'] ?>"><?= $var['Variety']['variety_name'] ?></option>
                            <?php } ?>
    				      </select>
    				    </div>
    				</div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-3 control-label">Ingrediente extra</label>
                        <div class="col-sm-9">
                          <select name="ingredient_extra[]" class="form-control">
                            <option value="0">Ninguno</option>
                            <?php foreach ($ingredients as $var) { ?>
                                <option value="<?= $var['Ingredient']['ingredient_id'] ?>"><?= $var['Ingredient']['nombre'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <hr>
                      <span class="label label-primary">Datos de envío</span>
					  <div class="form-group form-group-lg">
					    <label class="col-sm-3 control-label">Teléfono / contacto</label>
					    <div class="col-sm-9">
					      <input name="telefono" type="number" minlength="10" required class="form-control" placeholder="ej. 453 105 3456">
					    </div>
					  </div>
					  <div class="form-group form-group-lg">
					    <label class="col-sm-3 control-label">Colonia</label>
					    <div class="col-sm-9">
					      <input name="colonia" type="text" minlength="5" required class="form-control" placeholder="ej. Col. Benito Juárez">
					    </div>
					  </div>
					  <div class="form-group form-group-lg">
					    <label class="col-sm-3 control-label">Número int/ext</label>
					    <div class="col-sm-9">
					      <input name="numero" type="text" required class="form-control" placeholder="ej. Núm. Int. 67, Núm ext. 67">
					    </div>
					  </div>
					  <div class="form-group form-group-lg">
					    <label class="col-sm-3 control-label">Calle</label>
					    <div class="col-sm-9">
					      <input name="calle" type="text" required minlength="5" class="form-control" placeholder="ej. Juan Escutia">
					    </div>
					  </div>
					  <div class="form-group form-group-lg">
					    <label class="col-sm-3 control-label">Referencias</label>
					    <div class="col-sm-9">
					      <textarea name="referencias" required minlength="10" class="form-control" placeholder="ej. Casa verde, está detrás del auditorio, a una cuadra del sitio de taxis Alfa."></textarea>
					    </div>
					  </div>
                      <div class="form-group form-group-lg">
                        <span style="float: right"> <?= $this->Html->link("Cambiar de usuario", array('controller'=>'users', 'action'=>'logout'),array('style'=>'color: #337ab7')) ?></span>
                      </div>
					 <div class="form-group text-center">
					 	<a class="btn btn-default btn-lg" href="../users/logout"><i class="glyphicon glyphicon-remove"></i> Cancelar pedido</a>&nbsp;
                        <button type="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-ok"></i> Procesar pedido</button>
					 </div>
                    <?= $this->Form->end(); ?>
                <?php } ?>
                </div>
                <div class="col-sm-3"></div>
            </div>
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