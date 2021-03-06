<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'D&tilde;Gusta Pizza';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->css('cargando.css') ?>
    <script type="text/javascript">
        $(window).load(function () {
          // Una vez se cargue al completo la página desaparecerá el div "cargando"
          $('#contenedor').hide();
        });
    </script>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>

   <div id="contenedor">
     <div class="loader" id="loader">Loading...</div>
    <!--<div id="preloader_3"></div>-->
    </div>
   <!-- <div class="container clearfix">-->
        <?= $this->fetch('content') ?>
    <!--</div>-->


    <footer>
    </footer>
</body>
</html>
