<?php

App::uses('AppController', 'Controller');

class CustomersController extends AppController {
    var $scaffold = "admin";
    var $layout = "admin";


	public $name = 'Customers';
    public $uses = array('Customer','AddressCustomer');
    public $helpers = array('Html','Form');

	public function index(){
        $this->layout = "default";

	}

	public   function singup() {
        $this->layout = "default";	
        if (!empty($this->request->data)) {
            $this->request->data['Customer']['password'] = 
                md5($this->request->data['Customer']['password']);
            $customer = $this->Customer->save($this->request->data); 
            if (!empty($customer)) {
                
                $this->request->data['AddressCustomer']['customer_id'] = $this->Customer->id;            
   		        $this->AddressCustomer->save($this->request->data);
                $this->Session->setFlash('Registro realizado correctamente.');
                $this->redirect(array('action' => 'registered'));                
            }
        }
    }

    public   function singin() {
    $this->layout = "default";
        if (!empty($this->data)) {
            if ($this->Customer->saveAll($this->data)) {

                //echo $this->data['Customer']['addre_id'] = $this->Customer->Addre->id;
                //$this->Customer->save($this->data);
                $this->Session->setFlash('Your post has been saved.');
                //$this->redirect(array('action' => 'index'));                
            }
        }
    }

public   function registered() {
    $this->layout = "default";
        if (!empty($this->data)) {
            if ($this->Customer->saveAll($this->data)) {

                //echo $this->data['Customer']['addre_id'] = $this->Customer->Addre->id;
                //$this->Customer->save($this->data);
                $this->Session->setFlash('Your post has been saved.');
                //$this->redirect(array('action' => 'index'));                
            }
        }
    }
}
