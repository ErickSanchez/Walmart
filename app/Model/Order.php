 <?php
App::uses('AppModel', 'Model');

class Order extends AppModel {	
    var $name = 'Order';
    var $belongsTo = 'Customer';
}
