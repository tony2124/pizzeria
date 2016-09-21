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

  <div class="col-xs-12 col-sm-12 col-md-12 mparent">
    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 epadding2">
     <h1 class="text-center"><!-- <?php print $this->Html->image("logo.png", array('class'=>'img-circle profile_img','style'=>'width:160px; margin:0')) ?>-->Regístrate<small> en D'Gusta Pizza</small></h1>
    </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 child epadding3">
      <?php echo $this->Form->create('customer',array('class'=>'form-horizontal form-label-left','url'=>array('action'=>'registrar'))); ?>
        <div class="form-group">
          <label for="first-name">Nombre <span class="required">*</span></label>
          <?php echo $this->Form->input('customer_name',array('label'=>'', 'required'=>'required', 'placeholder' => 'Escribe tu nombre', 'class'=>'form-control col-md-7 col-xs-12','empty'=>false)); ?>
        </div>
        <div class="form-group">
          <label for="first-name">Correo electrónico <span class="required">*</span></label>
          <?php echo $this->Form->input('customer_email',array('label'=>'', 'type' => 'email', 'required'=>'required', 'placeholder' => 'email@dominio.com', 'class'=>'form-control col-md-7 col-xs-12','empty'=>false)); ?>   
        </div>
        <div class="form-group">
          <label for="first-name">Contraseña <span class="required">*</span></label>                              
          <?php echo $this->Form->input('customer_pass',array('label'=>'', 'type' => 'password', 'required'=>'required','placeholder' => '*********', 'class'=>'form-control col-md-7 col-xs-12')); ?>                            
        </div>
        <div class="form-group">
              <label for="last-name">Teléfono <span class="required">*</span></label>
              <?php echo $this->Form->input('customer_tel',array('label'=>'', 'type' => 'number', 'required'=>'required', 'placeholder' => '000 000 0000', 'class'=>array('form-control col-md-7 col-xs-12'))); ?>                
        </div>
        <div class="form-group">
              <label for="last-name">Dirección<span class="required">*</span></label>
              <?php echo $this->Form->textarea('customer_address',array(
              'label'=>'', 'required'=>'required','placeholder' => 'Calle, número y colonia...', 'class'=>array('form-control col-md-7 col-xs-12'))); 
              ?>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group form-inline" style="margin: 0 auto">
          <div class="row">
            <div class="col-md-1"></div>
             <div class="col-md-5">
                <?= $this->Html->link( 'Regresar',  array( 'controller'=>'logins','action'=>'index'), array( 'class'=>'btn btn-default', 'style'=>'width:100%')); ?>
            </div>
            <div class="col-md-5">
                <?= $this->Form->submit("Registrarme",array('class'=>'btn btn-success', 'style'=>'width:100%')); 
           ?> 
            </div>
            <div class="col-md-1"></div>
         </div>
        </div>
    </div>
  </div>
<p>&nbsp;</p>
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
 <!-- jQuery -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    
    <!-- Bootstrap Core JavaScript -->
    <!--<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
    
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!--<script src="js/jqBootstrapValidation.js"></script>-->
    <?= $this->Html->script('jqBootstrapValidation.js') ?>
    <!--<script src="js/contact_me.js"></script>-->
    <?= $this->Html->script('contact_me.js') ?>
    <!-- Theme JavaScript -->
    <!--<script src="js/agency.min.js"></script>-->
    <?= $this->Html->script('agency.min.js') ?>
</body>