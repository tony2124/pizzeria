

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
    <div class="row" id="parent">
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <p align="center">
                    <?php
                    echo  $this->Html->image("logo.png", array('style'=>'width:250px','url' => array('controller' => 'logins')));
                    ?>
                </p>
   
                <h3 align="center">Pedido procesado<br><small> Estaremos en tu dirección en un promedio de 30 a 40 minutos.</small></h3>

                <p align="center" class="margin">
                <?php
                    echo $this->Html->link(
                    'Ir al inicio',
                    array('action'=>'index'),
                    array('class' => 'btn btn-success')
                      );
                ?>
                </p>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <?= $this->Html->script('jqBootstrapValidation.js') ?>
    <?= $this->Html->script('contact_me.js') ?>
    <?= $this->Html->script('agency.min.js') ?>
</body>

