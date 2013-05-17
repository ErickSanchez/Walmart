<?php

App::uses('AppController', 'Controller');

class ShoppingCartsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'ShoppingCarts';

	public function index($id=0){
		
		$data = array(
			'data'=>array(
				'data'=>$this->request->data,
				'id' =>$id)			
			);
		$this->set($data);
	}
}
