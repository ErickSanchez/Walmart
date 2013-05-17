<?php

App::uses('AppController', 'Controller');

class DepartmentsController extends AppController {
	var $scaffold = 'admin';
	var $layout="admin";

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Departments';
    public $uses = array('Department','Categorie','Product');
    public $items = 6;

	public function index($dep = '', $cat = '',$page = 1){
		$this->layout = "default";		

		
		if(isset($_GET['page']) && $_GET['page'] > 0)
			$page= $_GET['page'];

		if($dep)
			$sql= "SELECT * FROM products AS Product LEFT JOIN brands AS Brand ON Product.brand_id=Brand.id LEFT JOIN products_to_categories AS ProductTo ON Product.id=ProductTo.product_id   LEFT JOIN categories AS Categorie ON ProductTo.categorie_id=Categorie.id LEFT JOIN departments ON Categorie.department_id= departments.id WHERE departments.url='".$dep."' GROUP BY ProductTo.product_id";

		if($cat)
			$sql= "SELECT * FROM products AS Product LEFT JOIN products_to_categories AS ProductTo ON Product.id=ProductTo.product_id LEFT JOIN brands AS Brand ON Product.brand_id=Brand.id   WHERE categorie_id = $cat";

		if(!$sql)
			$this->redirect('/');
		$ini = ($page - 1) * $this->items;	

		$products = $this->Product->query($sql);
		$num_prod = count($products);
		unset($products);

		$products = $this->Product->query($sql."  LIMIT $ini,$this->items" );

		$pages = $num_prod / $this->items;
		if($pages < 1)
			$pages = 1;
		elseif($num_prod % $this->items != 0)		
			$pages += 1;

		if($pages < $page)
			$page = $pages;

		$departments = $this->Department->find('all');
		$categories = $this->Categorie->query("SELECT Categorie.id,Categorie.department_id,Categorie.name FROM categories AS Categorie  LEFT JOIN departments AS Department ON Categorie.department_id=Department.id WHERE Department.url = '$dep'");

		

		$data = array(
			'departments' => $departments,		
			'products' 	  => $products,
			'categories'  => $categories,
			'dep'         => $dep,
			'cat'		  => $cat,
			'pages'       => $pages
			);

        $this->set($data);
        
	}

}
