 <?php
App::uses('AppModel', 'Model');

class Product extends AppModel {	
    var $name = 'Product';
    public $belongsTo = 'Brand';
    public $hasMany = 'Special';
    public $displayField = 'name';

     public $hasAndBelongsToMany = array(
        'Categorie' =>
            array(
                'className'              => 'Categorie',
                'joinTable'              => 'products_to_categories',
                'foreignKey'             => 'product_id',
                'associationForeignKey'  => 'categorie_id',
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
                'rule'     => '/^[a-zA-Z0-9 -".]{1,65}$/i',
        		'required' => true,
                'message'  => 'Caracteres no permitidos'
        ),
        'quantity' => array(
            'rule'    => '/^[0-9]{1,6}$/i',
        	'required' => true,            
            'message' => 'Solo se aceptan numeros positivos'
        ),
        'price' => array(
        	'rule'     => '/^[0-9\.00]{1,15}$/i',   	
        	'required' => true,
            'message' => 'Solo se aceptan numeros positivos'

        )
    );
}
