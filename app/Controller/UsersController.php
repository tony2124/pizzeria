<?php

class UsersController extends AppController
{
   // public $components = array('Session');

    public function index()
    {
       if( $this->Session->check('email'))
        {
            $this->redirect(array('controller'=>'pizzas','action'=>'ordena'));
        }
    }

    public function admin()
    {
       if( $this->Session->check('admin'))
        {
            $this->redirect(array('controller'=>'admins','action'=>'index'));
        }
    }

	public function auth(){
	    // Aunque los campos username y password tienen validación para que no estén vacíos,
		// volvemos a asegurarnos con el condicional que el campo username del formulario tiene
        //algún valor
		$this->loadModel('Customer');
		//$this->loadComponent('Session');
        if(empty($this->request->data['user']['email'])==false)
        {
		    	 //Consulta SQL para buscar al usuario con sus credenciales en la BD
        		//$pass = md5($this->data['formulario']['clave']);
				$cust = $this->Customer->find('first',array('conditions'=>array(
				                'Customer.customer_email'=>$this->request->data['user']['email'],
				                'Customer.customer_pass'=>$this->request->data['user']['clave'], 
				                'Customer.approved'=>true)));

	        //Si se ha encontrado al usuario en la consulta
	         if($cust)
	         {
		        //Si existe se redirecciona al usuario a la aplicación creando una variable de sesión 
		        $this->Session->write('name',$cust['Customer']['customer_name']);
		        $this->Session->write('id',$cust['Customer']['customer_id']);
		        $this->Session->write('email',$cust['Customer']['customer_email']);
		        $this->Session->write('address',$cust['Customer']['customer_address']);
		        $this->Session->write('tel',$cust['Customer']['customer_tel']);
		         
		        $this->redirect(array('controller'=>'pizzas','action'=>'ordena'));
		        
	         }
	         else
	         {
			  //Si los datos no son correctos se comunica al usuario y se le devuelve al mismo
	          //formulario de login
	          $this->Session->setFlash(__('<p class="label label-danger">Nombre de usuario y/o password incorrectos</p>'));
	          $this->redirect(array('action'=>'index'));
	         }
		}

	}

	public function authAdmin(){
	    // Aunque los campos username y password tienen validación para que no estén vacíos,
		// volvemos a asegurarnos con el condicional que el campo username del formulario tiene
        //algún valor
		$this->loadModel('Admin');
		//$this->loadComponent('Session');
        if(empty($this->request->data['user']['usuario'])==false)
        {
		    	 //Consulta SQL para buscar al usuario con sus credenciales en la BD
        		//$pass = md5($this->data['formulario']['clave']);
				$cust = $this->Admin->find('first',array('conditions'=>array(
				                'Admin.admin_user'=>$this->request->data['user']['usuario'],
				                'Admin.admin_pass'=>$this->request->data['user']['clave'])));

	        //Si se ha encontrado al usuario en la consulta
	         if($cust)
	         {
		        //Si existe se redirecciona al usuario a la aplicación creando una variable de sesión 
		        $this->Session->write('name',$cust['Admin']['admin_name']);
		        $this->Session->write('id',$cust['Admin']['admin_id']);
		        $this->Session->write('user',$cust['Admin']['admin_user']);
		         
		        $this->redirect(array('controller'=>'admins','action'=>'index'));
		        
	         }
	         else
	         {
			  //Si los datos no son correctos se comunica al usuario y se le devuelve al mismo
	          //formulario de login
	          $this->Session->setFlash(__('<p class="label label-danger">Nombre de usuario y/o password incorrectos</p>'));
	          $this->redirect(array('action'=>'admin'));
	         }
		}

	}

	//salir de la sesión
	public function logout(){
		$this->Session->destroy();
		$this->redirect(array('action'=>'index'));
	}

	//funcion para guardar una orden
	public function saveOrder(){
		if(empty($this->request->data['orden'])==false)
        {

        }
	}

}

?>