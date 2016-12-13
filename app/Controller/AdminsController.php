<?php

class AdminsController extends AppController
{
   // public $components = array('Session');
    //pagina principal ESTADISTICAS
    public function index()
    {
       $this->authenticateAdmin();
        //SE CARGA LOS MODELOS
       $this->loadModel("Customer");
       $this->loadModel("Sale");
       $this->loadModel("Variety");

       //SE HACEN LAS CONSULTAS
       $clientes = $this->Customer->find('all');
       $sales = $this->Sale->find('count');
       $varieties = $this->Variety->find('count');

       //SE ENVIAN LOS DATOS A LAS VISTAS
       $this->set('clientes', $clientes);
       $this->set('sales', $sales);
       $this->set('varieties', $varieties);
    }

    //METODO PARA CAMBIAR LA IMAGEN DE PORTADA
    public function portada(){
        $this->authenticateAdmin();
        if($this->request->is('post'))
        {
         //   if( $this->request->data['img']['foto'] )
            {
                //AQUI ESTAMOS ADIGANANDO LA RUTA DONDE SE VA A GUARDAR LA IMAGEN
                $ruta_destino = WWW_ROOT.'img/';

                //AQUI ESTAMOS OBTENIENDO EL NOMBRE TEMPORAL DE LA IMAGEN QUE FUE MANDADA IMAGEN 1
                $nombre_temporal = $this->request->data['Img']['foto']['tmp_name'];

                //SI HAY ARCHIVO
                if( is_uploaded_file($nombre_temporal) )
                {
                    //SE MUEVE EL ARCHIVO A LA UBICACIÓN CORRECTA
                    move_uploaded_file($nombre_temporal, $ruta_destino.'/header-bg.jpg');
                }
            }
        }
    }

    public function users($n = NULL)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel("Customer");
        
        //PAGINACION DE USUARIOS REGISTRADOS, SE HACE CONSULTA DE LOS USUARIOS
        if($n == NULL){
            $n = 1;
        }
        $clientes = $this->Customer->find('all', array('limit'=>10, 'offset'=>($n - 1)*10));
        

        //SE CONSULTA NUMERO DE CLIENTES
        $clients_count = $this->Customer->find('count');
        $clients_count = ceil($clients_count / 10);
        
        //SE ENVIA INFORMACION A LA VISTA
        $this->set('clientes', $clientes);
        $this->set('clients_count', $clients_count);
    }

    //MÉTODO PARA EDITAR EL STATUS DEL USUARIO
    public function edit_user($id, $type)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel("Customer");

        //SE PREPARAN LOS DATOS
        $data = array('approved'=>$type);
        
        //SE ACTUALIZA LA INFORMACIÓN DEL CLIENTE
        if($this->Customer->updateAll( array('approved'=>$type),array('customer_id'=>$id) ))
        {
            //SE REDIRECCIONA A LA ACCION DE USUARIOS
          $this->redirect(array('action'=>'users'));
        }
    }

    //ACCION PARA VARIEDADES
    public function varieties()
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
    	$this->loadModel('Variety');

        //SE CONSULTA LA BASE DE DATOS
        $varieties = $this->Variety->find('all', array('conditions'=>array('approved'=>true)));

        //SE ENVÍA LA INFORMACIÓN A LAS VARIEDADES
        $this->set('varieties', $varieties);
    }

    //ACCION QUE PERMITE GUARDAR UNA VARIEDAD
    public function save_variety()
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel('Variety');

        //SI SE ENVIARON DATOS
        if($this->request->is('post'))
        {
            //SE PREPARA LA IMAGEN
            $nombre_temporal = $this->request->data['Variety']['foto']['tmp_name'];
            $imagen = $this->request->data['Variety']['foto']['name'];
            $ext = explode('.', $imagen)[1];
            $name = date("Y_m_d_H_i_s").'.'.$ext;
            $ruta = WWW_ROOT.'img/variedad/';

            //SI SE GUARDA LA IMAGEN
            if(move_uploaded_file($nombre_temporal, $ruta.$name)){
                //SE PREPARAN LOS DATOS
                $data = array(
                  'variety_name'=>$this->request->data['nombre'],
                  'ingredients'=>$this->request->data['ingredientes'],
                  'picture'=>$name
                  );

                //SE GUARDAN LOS DATOS EN LA BASE DE DATOS
                $this->Variety->save( $data );

                //SE REDIRECCIONA  A LA ACCION VARIEDADES
                $this->redirect(array('controller'=>'admins', 'action'=>'varieties'));
            }
        }
    }

    //ACCION QUE PERMITE EDITAR LOS DATOS DE UNA VARIEDAD
    public function edit_variety($id)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel('Variety');

        //SE COSULTAN LA VARIEDAD IDENTIFICADA POR EL ID
        $variety = $this->Variety->find('first', array('conditions'=>array('variety_id'=>$id)));

        //SE ENVIAN LLOS DATOS A LA VISTA
        $this->set('variety', $variety);   
    }

    //ACCION QUE PERMITE EDITAR LOS DATOS DE UNA VARIEDAD
    public function editing_variety($id)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel("Variety");

        //PREPARANDO LA IMAGEN
        $nombre_temporal = $this->request->data['Variety']['foto']['tmp_name'];
        $imagen = $this->request->data['Variety']['foto']['name'];
        $ext = explode('.', $imagen)[1];
        $name = date("Y_m_d_H_i_s").'.'.$ext;
        $ruta = WWW_ROOT.'img/variedad/';

        //SI SE GUARDA LA IMAGEN
        if(move_uploaded_file($nombre_temporal, $ruta.$name)){
            //SE PREPARAN LOS DATOS
            $data = array('variety_name'=>"'".$this->request->data['nombre']."'",
                        'ingredients'=>"'".$this->request->data['ingredientes']."'",
                        'picture'=>"'" . $name . "'");
        }
        else
        {
            //SE PREPARAN LOS DATOS
            $data = array('variety_name'=>"'".$this->request->data['nombre']."'",
                        'ingredients'=>"'".$this->request->data['ingredientes']."'");
        }

        
        
        //SE ACTUALIZA LA INFORMACIÓN DEL CLIENTE
        if($this->Variety->updateAll( $data , array('variety_id'=>$id) ))
        {
            //SE REDIRECCIONA A LA ACCION DE USUARIOS
          $this->redirect(array('action'=>'varieties'));
        } 

    }

    //ACCION QUE PERMITE VISUALIZAR LAS PROMOCIONES
    public function promotions()
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel('Promotion');

        //SE CONSULTAN LOS DATOS
        $promotions = $this->Promotion->find('all', array('conditions'=>array('approved'=>true)));


        //SE ENVIAN LOS DATOS
        $this->set('promotions', $promotions);
    }

    //ACCION QUE PERMITE EDITAR LAS PROMOCIONES
    public function edit_promotion($id)
    {
        $this->authenticateAdmin();
        $this->loadModel('Promotion');
        $promotion = $this->Promotion->find('first', array('conditions'=>array('promotion_id'=>$id)));
        $this->set('promotion', $promotion);   
    }

    //ACCION QUE PERMITE EDITAR LOS DATOS DE UNA VARIEDAD
    public function editing_promotion($id)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel("Promotion");

        //PREPARANDO LA IMAGEN
        $nombre_temporal = $this->request->data['Promotion']['foto']['tmp_name'];
        $imagen = $this->request->data['Promotion']['foto']['name'];
        $ext = explode('.', $imagen)[1];
        $name = date("Y_m_d_H_i_s").'.'.$ext;
        $ruta = WWW_ROOT.'img/promo/';

        //SI SE GUARDA LA IMAGEN
        if(move_uploaded_file($nombre_temporal, $ruta.$name)){
            //SE PREPARAN LOS DATOS
            $data = array('promotion_title'=>"'".$this->request->data['nombre']."'",
                        'promotion_desc'=>"'".$this->request->data['descripcion']."'",
                        'promotion_type'=>$this->request->data['tipo'],
                        'promotion_photo'=>"'" . $name . "'");
        }
        else
        {
            //SE PREPARAN LOS DATOS
            $data = array('promotion_title'=>"'".$this->request->data['nombre']."'",
                        'promotion_desc'=>"'".$this->request->data['descripcion']."'",
                        'promotion_type'=>$this->request->data['tipo']);
        }

        //SE ACTUALIZA LA INFORMACIÓN DEL CLIENTE
        if($this->Promotion->updateAll( $data , array('promotion_id'=>$id) ))
        {
            //SE REDIRECCIONA A LA ACCION DE USUARIOS
          $this->redirect(array('action'=>'promotions'));
        } 

    }

    //ACCION QUE GUARDA UNA PROMOCION
    public function save_promotion()
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel('Promotion');

        //SI SE HAN ENVIADO DATOS
        if($this->request->is('post'))
        {
            //SE PREPARA LA IMAGEN
            $nombre_temporal = $this->request->data['Promotion']['foto']['tmp_name'];
            $imagen = $this->request->data['Promotion']['foto']['name'];
            $ext = explode('.', $imagen)[1];
            $name = date("Y_m_d_H_i_s").'.'.$ext;
            $ruta = WWW_ROOT.'img/promo/';

            //SI SE GUARDA LA IMAGEN
            if(move_uploaded_file($nombre_temporal, $ruta.$name))
            {
                //SE PREPARAN LOS DATOS
                $data = array(
                  'promotion_title'=>$this->request->data['nombre'],
                  'promotion_desc'=>$this->request->data['descripcion'],
                  'promotion_type'=>$this->request->data['tipo'],
                  'promotion_photo'=>$name
                  );

                //SE GUARDAN LOS DATOS
                $this->Promotion->save( $data );

                //SE REDIRECCION A LA ACCION DE PROMOCIONES
                $this->redirect(array('controller'=>'admins', 'action'=>'promotions'));
          }
        }
        
    }

    //ACCION QUE ELIMINA
    //TYPE = 1 ELIMINA UN REGISTRO CON EL ID DE LAS PROMOCIONES
    public function delete( $type , $id)
    {
        $this->authenticateAdmin();
        //SI TIPO ES 1
        if( $type == 1 )
        {
            //CARGA CONTROLADOR
            $this->loadModel("Promotion");
            
            //ELIMINA REGISTRO
            $this->Promotion->updateAll(array('approved'=>'0'),array('promotion_id'=>''.$id));

            //REDIRECCIONA A LA ACCION PROMOCIONES
            $this->redirect(array('controller'=>'admins', 'action'=>'promotions'));
        }
        else //SI NO
        {
            //SE CARGA MODELO
            $this->loadModel("Variety");
            //ELIMINA LA VARIEDAD
            $this->Variety->updateAll(array('approved'=>'0'),array('variety_id'=>''.$id));
            
            //REDIRECCIONA A LA ACCION VARIEDADES
            $this->redirect(array('controller'=>'admins', 'action'=>'varieties'));
        }
    }

    public function orders($n = NULL)
    {
        $this->authenticateAdmin();
        $this->loadModel("Sale");

        //PAGINACION DE USUARIOS REGISTRADOS, SE HACE CONSULTA DE LOS USUARIOS
        if($n == NULL) {
            $n = 1;  
        }

        //$sales = $this->Sale->find('all', array('limit'=>10, 'offset'=>($n - 1)*10));LIMIT 1, '.(($n - 1)*10)
        $sales = $this->Sale->query('SELECT * FROM sales as Sale JOIN customers as Customer WHERE Sale.customer_id = Customer.customer_id ORDER BY Sale.sale_id DESC LIMIT 10 OFFSET '.(($n - 1)*10));

        //SE CONSULTA NUMERO DE CLIENTES
        $sales_count = $this->Sale->find('count');
        $sales_count = ceil($sales_count / 10);

        $this->set('sales', $sales);
        $this->set('sales_count', $sales_count);
    }

    public function orderdetail( $id = NULL )
    {
        $this->authenticateAdmin();
        $this->loadModel('Sale');
        $this->loadModel('SaleDetail');
        $sales = $this->Sale->query('SELECT * FROM sales as Sale JOIN customers as Customer WHERE Sale.customer_id = Customer.customer_id AND Sale.sale_id = '.$id);
        $details = $this->SaleDetail->query("SELECT * FROM sale_details as SaleDetail JOIN varieties as Variety JOIN sizes as Size WHERE SaleDetail.variety_id = Variety.variety_id AND SaleDetail.size_id = Size.size_id AND SaleDetail.sale_id = ".$id);  //find('all', array('conditions'=>array('sale_id'=>$id)));
        $this->set('sales', $sales);
        $this->set('details', $details);
    }

    //MÉTODO PARA EDITAR EL STATUS DEL USUARIO
    public function edit_order( $id, $type)
    {
        $this->authenticateAdmin();
        //SE CARGA EL MODELO
        $this->loadModel("Sale");

        //SE PREPARAN LOS DATOS
        //$data = array('approved'=>$type);
        
        //SE ACTUALIZA LA INFORMACIÓN DEL CLIENTE
        if($this->Sale->updateAll( array('approved'=>$type),array('sale_id'=>$id) ))
        {
            //SE REDIRECCIONA A LA ACCION DE USUARIOS
          $this->redirect(array('action'=>'orders'));
        }
    }

}

?>