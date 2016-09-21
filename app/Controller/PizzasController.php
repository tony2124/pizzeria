<?php

class PizzasController extends AppController
{
    public function index()
    {
        // Action logic goes here.
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
        $this->loadModel('Sizes');
        
        $sizes_id = $this->request->data['size_id']; 
        $varieties_id = $this->request->data['variety_id'];
        $i = 0;
        foreach ($sizes_id as $size_id) {
            $sizes[$i++] = $this->Sizes->find()->where(array('size_id'=>$size_id))->first();
        }
        $this->loadModel('Varieties');
        $i = 0;
        foreach ($varieties_id as $variety_id) {
            $varieties[$i++] = $this->Varieties->find()->where(array('variety_id'=>$variety_id))->first();
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
            'customer_id'=>$this->request->data['customer_id'],
            'total'=>$this->request->data['total'],
            'telefono'=>$this->request->data['telefono'],
            'colonia'=>$this->request->data['colonia'],
            'numero'=>$this->request->data['numero'],
            'calle'=>$this->request->data['calle'],
            'referencias'=>$this->request->data['referencias'],
            'date'=>date('Y-m-d H:i:s')
        ];

        $this->loadModel('Sales');
        if( $this->Sales->save(new Sale($data)) ){
            $consulta = $this->Sales->find('all')->last();
            $id = $consulta['sale_id'];
            $i = 0;
            $this->loadModel('SaleDetails');
            foreach ($sizes_id as $size_id) {
                $data_detail = [
                    'sale_id'=>$id,
                    'size_id'=> $size_id,
                    'variety_id'=> $varieties_id[$i++]
                ];
                $this->SaleDetails->save(new SaleDetail($data_detail));
            }
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