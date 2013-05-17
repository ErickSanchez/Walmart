<?php
App::uses('AppModel', 'Model');

class Special extends AppModel {	
    var $name = 'Special';
    public $belongsTo = 'Product';

}
