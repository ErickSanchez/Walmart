<?php
App::uses('AppModel', 'Model');
class Customer extends AppModel {
	var $name = 'Customer';
    var $hasOne  = 'AddressCustomer';
    //Uno a Muchos id->>>>>  
    var $hasMany = array(
        'Order' => array(
            'className'     => 'Order',
            'foreignKey'    => 'customer_id',
            'dependent'=> true
        ),
        'AddressCustomer' => array(
            'className'     => 'AddressCustomer',
            'foreignKey'    => 'customer_id',
            'dependent'=> true
        )
    );
    var $validate = array(

        'rfc' => array(
                'rule'     => 'alphaNumeric',                
                'message'  => 'Solo se aceptan numeros y letras'
        ),

        'curp' => array(
            'rule'    => 'alphaNumeric',
            'message' => 'Solo se aceptan numeros y letras'
        ),

        'email' => array(
        	'rule'=>'email',
        	'required' => true
        ),
        'password' => array(
        	'rule' => array('minLength', 4),
        	'required' => true,
        	'message' => 'La contraseña es muy pequeña'
        )
    );

    
}
