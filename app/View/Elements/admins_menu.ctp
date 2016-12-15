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
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrador <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <!--<li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Contraseña</a>
                </li>
                <li class="divider"></li>-->
                <li>
                    <!--<i class="fa fa-fw fa-power-off"></i>-->
                    <?= $this->Html->link("Salir", array('controller'=>'users','action'=>'logoutadmin')) ?>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
               <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'index')) ?>"><i class="fa fa-fw fa-line-chart"></i> Estadísticas</a>
                
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'orders')) ?>"><i class="fa fa-fw fa-shopping-cart"></i> Órdenes</a>
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'portada')) ?>"><i class="fa fa-fw fa-picture-o"></i> Foto de portada</a>
            
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'users')) ?>"><i class="fa fa-fw fa-users"></i> Usuarios</a>
                
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'varieties')) ?>"><i class="fa fa-fw fa-list"></i> Variedades</a>
                
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'ingredients')) ?>"><i class="fa fa-fw fa-list"></i> Ingredientes</a>
                
            </li>
            <li>
                <a href="<?= $this->Html->url(array('controller'=>'admins','action'=>'promotions')) ?>"><i class="fa fa-fw fa-trophy"></i> Promociones</a>
                
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>