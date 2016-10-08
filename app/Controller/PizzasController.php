<?php

class PizzasController extends AppController
{
    public function index()
    {
        $this->loadModel('Variety');
        $this->loadModel('Promotion');
        $varieties = $this->Variety->find('all');
        $promotions = $this->Promotion->find('all');
        $this->set('varieties',$varieties);
        $this->set('promotions',$promotions);
    }

    //esta funcion permite seleccionar las pizzas y direccion de envio
    public function ordena(){
    	$this->authenticate();
    	
        //calcular el número de pizzas
        $number = 0;
    	if(!empty($this->request->data['number'])){
    		$number = $this->request->data['number'];
    	}

        $this->loadModel('Size');
        $sizes = $this->Size->find('all');

        $this->loadModel('Variety');
        $varieties = $this->Variety->find('all');

        $this->set('sizes',$sizes);
        $this->set('varieties',$varieties);
        $this->set('number',$number);

    }

    //esta accion calcula el costo de las pizzas
    public function procesar(){
        $this->authenticate();

        if($this->request->is('post')){
        //obtener el tamaño de las pizzas
        $this->loadModel('Size');
        
        $sizes_id = $this->request->data['size_id']; 
        $varieties_id = $this->request->data['variety_id'];
        $i = 0;
        foreach ($sizes_id as $size_id) {
            $sizes[$i++] = $this->Size->findBySizeId($size_id); 
            //->where(array('size_id'=>$size_id))->first();
        }
        $this->loadModel('Variety');
        $i = 0;
        foreach ($varieties_id as $variety_id) {
            $varieties[$i++] = $this->Variety->findByVarietyId($variety_id); 
            //->where(array('variety_id'=>$variety_id))->first();
        }

        $this->set('sizes',$sizes);
        $this->set('varieties',$varieties);
    }
    else{
        $this->redirect(array('action'=>'ordena'));
    }

    }

    //esta es la accion que envia los datos a la base de datos
    public function enviar()
    {
        $this->authenticate();

        $sizes_id = $this->request->data['size_id'];
        $varieties_id = $this->request->data['variety_id'];

        $data = [
            'customer_id'=>$this->request->data['orden']['customer_id'],
            'total'=>$this->request->data['orden']['total'],
            'telefono'=>$this->request->data['orden']['telefono'],
            'colonia'=>$this->request->data['orden']['colonia'],
            'numero'=>$this->request->data['orden']['numero'],
            'calle'=>$this->request->data['orden']['calle'],
            'referencias'=>$this->request->data['orden']['referencias'],
            'date'=>date('Y-m-d H:i:s')
        ];

        $this->loadModel('Sale');
        if( $this->Sale->save($data) ){
            
            $consulta = $this->Sale->find('first', array('order'=>array('Sale.sale_id'=>'desc')));
            $id = $consulta['Sale']['sale_id'];
            
            $i = 0;
            $this->loadModel('SaleDetail');
            
            $data_detail = array();
            
            foreach ($sizes_id as $size_id) {
                $data_detail[$i] = array(
                            'sale_id'=>$id,
                            'size_id'=> $size_id,
                            'variety_id'=> $varieties_id[$i++]
                            );
            }

            $this->SaleDetail->saveMany($data_detail, array('deep'=>true));
            
            
            $this->redirect(array('action'=>'congratulations'));
        }
        else
        {
            $this->redirect(array('action'=>'error'));
        }
    }

    //agradecer por el el envío del pedido...
    public function congratulations(){

    }
}

?>