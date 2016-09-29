<?php

class AdminsController extends AppController
{
   // public $components = array('Session');

    public function index()
    {
       $this->loadModel("Customer");
       $this->loadModel("Sale");
       $this->loadModel("Variety");

       $clientes = $this->Customer->find('all');
       $sales = $this->Sale->find('count');
       $varieties = $this->Variety->find('count');

       $this->set('clientes', $clientes);
       $this->set('sales', $sales);
       $this->set('varieties', $varieties);
    }

    public function portada(){
        if($this->request->is('post'))
        {
         //   if( $this->request->data['img']['foto'] )
            {
                //AQUI ESTAMOS ADIGANANDO LA RUTA DONDE SE VA A GUARDAR LA IMAGEN
                $ruta_destino = WWW_ROOT.'img/';

                //AQUI ESTAMOS OBTENIENDO EL NOMBRE TEMPORAL DE LA IMAGEN QUE FUE MANDADA IMAGEN 1
                $nombre_temporal = $this->request->data['Img']['foto']['tmp_name'];

                if( is_uploaded_file($nombre_temporal) ){
                    move_uploaded_file($nombre_temporal, $ruta_destino.'/header-bg.jpg');
                }
            }
        }
    }

    public function users($n = NULL){
        $this->loadModel("Customer");
        
        if($n == NULL){
            $clientes = $this->Customer->find('all');
        }
        else
        {
            $clientes = $this->Customer->find('all', array('limit'=>10, 'offset'=>($n - 1)*10));
        }
        $clients_count = $this->Customer->find('count');
        $clients_count = ceil($clients_count / 10);
        $this->set('clientes', $clientes);
        $this->set('clients_count', $clients_count);
    }

    public function edit_user($id, $type){
        $this->loadModel("Customer");
        $data = array('approved'=>$type);
        $this->Customer->customer_id = $id;
        if($this->Customer->updateAll( array('approved'=>$type),array('customer_id'=>$id) )){
          $this->redirect(array('action'=>'users'));
        }
    }

    public function varieties(){
    	 $this->loadModel('Variety');
       $varieties = $this->Variety->find('all');
       $this->set('varieties', $varieties);
    }

    public function save_variety(){
        $this->loadModel('Variety');
        if($this->request->is('post'))
        {
            $nombre_temporal = $this->request->data['Variety']['foto']['tmp_name'];
            $imagen = $this->request->data['Variety']['foto']['name'];
            $ext = explode('.', $imagen)[1];
            $name = date("Y_m_d_H_i_s").'.'.$ext;

            $ruta = WWW_ROOT.'img/variedad/';

            if(move_uploaded_file($nombre_temporal, $ruta.$name)){
                $data = array(
                  'variety_name'=>$this->request->data['nombre'],
                  'ingredients'=>$this->request->data['ingredientes'],
                  'picture'=>$name
                  );
                $this->Variety->save( $data );
                $this->redirect(array('controller'=>'admins', 'action'=>'varieties'));
          }
        }
        
    }

    public function promotions(){
    	
    }

}

?>