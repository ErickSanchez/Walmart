<?php

App::uses('AppModel', 'Model');

class Department extends AppModel {	
    var $name = 'Department';
        
    //Uno a Muchos 
    public $hasMany = 'Categorie';

    public $displayField = 'name';
    
    var $validate = array(
        'name' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Campo obligatorio'
        ),
        'url' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Campo obligatorio'
        )
    );
}
