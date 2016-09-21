<?php

class CustomersController extends AppController
{
    public function index()
    {
        // Vista que muestra el formulario de registro de un cliente
    }

    //Funcion que permite registrar un dato
    public function registrar(){
    	if ($this->request->is('post')) {

    		//otenemos la fecha de registro
    		$this->request->data['customer']['registered'] = date('Y-m-d H:i:s');

    		//Convertir el data a un entidad de Customer
    		if($this->Customer->save($this->request->data['customer'])){
    			$this->redirect(array('action'=>'congratulations'));
    		}
            else
             $this->redirect(array('action'=>'error'));   
    	}
    }

    public function congratulations(){
    	//mensaje de felicitaciones por el registro
    }

}

?>