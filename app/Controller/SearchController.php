<?php

App::uses('AppController', 'Controller');

class SearchController extends AppController {

	public $name = 'Search';
    public $uses = array('Department','Categorie','Product');
    public $items = 4;

    public function index($dep = '', $s = '',$page = 1) {
    	$sql_s   = '';	
    	$sql_dep = '';
    	$sql_where = '';

			if(isset($_GET['s'])){
				$s= $_GET['s'];
			}
			
			if(isset($_GET['dep']))
				$dep= $_GET['dep'];
			

			if($s || $dep)
				$sql_where = ' WHERE ';		

			if(isset($_GET['page']) && $_GET['page'] > 0)
				$page= $_GET['page'];


			if($dep && $dep != "all"){
				if($s)
					$sql_dep = ' AND ';
				$sql_dep .= " departments.id =  '$dep' ";
			}

			if($s){
				$sql_s = " (Product.name LIKE '%".$s."%' OR Product.description LIKE '%".$s."%') ";
			}

		$ini = ($page - 1) * $this->items;
		
		$sql = "SELECT * FROM products AS Product LEFT JOIN brands AS Brand ON Product.brand_id=Brand.id LEFT JOIN products_to_categories AS ProductTo ON Product.id=ProductTo.product_id   LEFT JOIN categories AS Categorie ON ProductTo.categorie_id=Categorie.id LEFT JOIN departments ON Categorie.department_id = departments.id ".$sql_where.$sql_s.$sql_dep." GROUP BY ProductTo.product_id";

		$products = $this->Product->query($sql );
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

		$departments = $this->Department->find('all',array('fields'=>array('id','name','url')));

		$data = array(
			'departments' => $departments,		
			'products' 	  => $products,
			's'    		  => $s,
			'dep'         => $dep,
			'page'        => $page,
			'pages'        => $pages
			);

        $this->set($data);

	}
}
