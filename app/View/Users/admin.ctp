      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <?= $this->Html->css('agency.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>

<body id="page-top" class="index">

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
    <!-- /.navbar-collapse -->
</nav>
     <!-- sección de promociones -->
    <section id="ordena">
        <div class="container">
  <div class="col-xs-12 col-sm-12 col-md-12 mparent form-group-lg">
    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 epadding2">
      <p align="center">
        <?php print $this->Html->image("logo.png", array('class'=>'','style'=>'width:180px; margin:0')) ?>
      </p>
      <h3 align="center" class="mparent2">Inicia sesión<small> en D'Gusta Pizza</small></h3>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 child">
      <?php echo $this->Form->create('user',array('class'=>'form-horizontal form-label-left','url'=>array('action'=>'authAdmin'))); ?>
        <div class="form-group">
          <label class="control-label" for="first-name">Usuario <span class="required">*</span></label>
          <?php echo $this->Form->input('usuario',array('label'=>'', 'type' => 'text', 'placeholder' => 'user', 'class'=>'form-control col-md-7 col-xs-12','empty'=>false)); ?>   
        </div>
        <div class="form-group">
          <label for="first-name">Contraseña <span class="required">*</span></label>                              
          <?php echo $this->Form->input('clave',array('label'=>'', 'type' => 'password', 'placeholder' => '*********', 'class'=>'form-control col-md-7 col-xs-12')); ?>                            
        </div>
        <div class="ln_solid"></div>
        <div class="form-group form-inline">
          <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                <?php echo $this->Form->submit("Iniciar sesión",array('class'=>'btn btn-success btn-lg', 'style'=>'width:100%')); ?> 
            </div>
            <div class="col-md-2"></div>
         </div>
        </div>
    </div>
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