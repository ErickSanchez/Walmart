<?php
App::uses('AppModel', 'Model');

class Brand extends AppModel {
	var $name = 'Brand';
	public $hasMany = 'Product';
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
