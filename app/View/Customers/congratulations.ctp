    <style>
        html,body
        {
            height: 100%;
            background: white;
        }
        #parent
        {    
            height: 100%;
        }
        #parent div
        {
            padding-top: 50px;
        }
        .margin
        {
            padding-top: 30px;
        }
        .texto_s
        {
            width: 130px;
            height: 32.5px;
            margin-top: 5px;
            margin-bottom: 20px;
        }
        .btnfont{font-family: time new roman;}
    </style>

    
    <div class="row" id="parent">
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <p align="center">
                    <?php
                    echo  $this->Html->image("logo.png", array('style'=>'width:250px','url' => array('controller' => 'logins')));
                    ?>
                </p>
   
                <h3 align="center">Registro completo<br><small> Estás a un paso de ordenar tu pizza.</small></h3>

                <p align="center" class="margin">
                <?php
                    echo $this->Html->link(
                    'Iniciar sesión',
                    array('controller'=>'pizzas','action'=>'index'),
                    array('class' => 'btn btn-success')
                      );
                ?>
                </p>

            </div>

        </div>

    </div>



