<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {	
    var $name = 'Category';    
    public $belongsTo = 'Department'; //Muchos a Uno

    public $hasAndBelongsToMany = array(
        'Product' =>
            array(
                'className'              => 'Product',
                'joinTable'              => 'products_to_categories',
                'foreignKey'             => 'categorie_id',
                'associationForeignKey'  => 'product_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );

    var $validate = array(
        'name' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Campo Obligatorio'
        )
    );
}
