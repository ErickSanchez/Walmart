<?php
App::uses('AppModel', 'Model');

class AddressCustomer extends AppModel {
	    var $name = 'AddressCustomer';
	    var $belongsTo = 'Customer';
}
