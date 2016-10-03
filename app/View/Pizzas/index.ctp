<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <?= $this->Html->css('agency.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
</head>

<body id="page-top" class="index">

    <!-- NAVEGACION -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
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
                        <a class="page-scroll" href="#services">Tamaños</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Variedades</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Promociones</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                    <li>
                        <?= $this->Html->link("¡Ordena!",array('controller'=>'users'),array('class'=>'page-scroll')) ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- ENCABEZADO -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">&nbsp;</div>
                <div class="intro-heading">&nbsp;</div>
                <a href="<?= $this->Html->url(array('controller'=>'users', 'action'=>'index')) ?>" class="page-scroll btn btn-xl">Quiero una pizza</a>
            </div>
        </div>
    </header>

    <!-- SECCIÓN DE TAMAÑOS DE LAS PIZZAS -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tamaños</h2>
                    <h3 class="section-subheading text-muted">Conoce nuestra variedad de pizzas, en sus diferentes tamaños: individual, mediana y familiar.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                       <?= $this->Html->image('tam/individual.jpg',array('class'=>'img-rounded img-responsive')) ?>
                    <h4 class="service-heading">Pizza Individual</h4>
                    <p class="text-muted">Una pizza ideal para una persona, puede ordenarla de cualquier especialidad. A tan sólo <span class="label label-success">$30.00 pesos </span> </p>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->image('tam/mediana.jpg',array('class'=>'img-rounded img-responsive')) ?>
                    <h4 class="service-heading">Pizza Mediana</h4>
                    <p class="text-muted">Ideal para dos personas, ordenala con tan sólo <span class="label label-success">$79.00 pesos</span></p>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->image('tam/grande.jpg',array('class'=>'img-rounded img-responsive')) ?>
                    <h4 class="service-heading">Pizza Familiar</h4>
                    <p class="text-muted">Una pizza para toda la familia, de cualquier especialidad. A tan sólo <span class="label label-success">$99.00 pesos</span></p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE VARIEDADES -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">VARIEDADES</h2>
                    <h3 class="section-subheading text-muted">Nuestras variedades se distingues en Especialidades y D' La Casa.</h3>
                </div>
            </div>
            <div class="row">
                <?php $cont = 1;
                    foreach ($varieties as $variety ) { ?>
                        <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#portfolioModal<?= $cont++ ?>" class="portfolio-link" data-toggle="modal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <!--<img src="img/variedad/alemana.jpg" class="img-responsive" alt="">-->
                                  <?= $this->Html->image('variedad/'.$variety['Variety']['picture'],array('class'=>'img-responsive')) ?>
                            </a>
                            <div class="portfolio-caption">
                                <h4><?= $variety['Variety']['variety_name'] ?></h4>
                                <p class="text-muted"><?= $variety['Variety']['ingredients'] ?></p>
                            </div>
                        </div>        
                <?php  }  ?>
                
            </div>
        </div>
    </section>

  

    <!-- sección de promociones -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Promociones</h2>
                    <h3 class="section-subheading text-muted">¡Conoce nuestras promociones vigentes!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/promo/cocacola.png" class="img-responsive img-circle" alt="">
                        <h4>Un refresco 2L GRATIS</h4>
                        <p class="text-muted">LLévate un refresco gratis de 2L en la compra de una pizza mediana o familiar. Cualquier sabor, incluyendo Coca Cola.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/promo/dos.jpg" class="img-responsive img-circle" alt="">
                        <h4>Lunes de 2 x 1</h4>
                        <p class="text-muted">Visita nuestro estabelcimiento los días lunes y disfruta de la promoción que tenemos especialmente para ti. ¡Ordena dos pizzas y paga sólamente una!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Todas las promociones están sujetas a disponibilidad de producto. La vigencia de estas promociones es el 30 de noviembre del 2016.</p>
                </div>
            </div>
        </div>
    </section>

   
    <!-- SECCIÓN DE CONTACTO -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contáctanos</h2>
                    <h3 class="section-subheading text-muted">Envíanos un comentario, sugerencia o queja de nuestro servicio. Te recordamos que estamos para servirte.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tu nombre *" id="name" required data-validation-required-message="Por favor ingresa tu nombre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Tu E-mail *" id="email" required data-validation-required-message="Por favor ingresa tu dirección de correo electrónico.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Tu teléfono *" id="phone" required data-validation-required-message="Por favor ingresa tu número de teléfono.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Tu mensaje *" id="message" required data-validation-required-message="Por favor ingresa tu mensaje."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
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


<!-- LOS SIGUIENTES MODAL SON PARA MOSTRAR INFORMACIÓN DE LA PIZZA. -->
    <!-- Portfolio Modal 1 -->
    <?php $cont = 1;
    foreach ($varieties as $variety ) { ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?= $cont++ ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2><?= $variety['Variety']['variety_name'] ?></h2>
                                    <p class="item-intro text-muted"><?= $variety['Variety']['ingredients'] ?></p>
                                    <!--<img class="img-responsive img-centered" src="img/variedad/alemana.jpg" alt="">-->
                                    <?= $this->Html->image('variedad/'.$variety['Variety']['picture'],array('class'=>'img-responsive')) ?>
                                    <!--<button type="button" class="btn btn-success"><i class="glyphicon glyphicon-heart-empty"></i> Ordenar</button>-->
                                    <?= $this->Html->link('¡Quiero esta pizza!',array('controller'=>'users'),array('class'=>'btn btn-success')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- jQuery -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    
    <!-- Bootstrap Core JavaScript -->
    <!--<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
    
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <?= $this->Html->script('jqBootstrapValidation.js') ?>
    <?= $this->Html->script('contact_me.js') ?>
    <!-- Theme JavaScript -->
    <?= $this->Html->script('agency.min.js') ?>

</body>

</html>
