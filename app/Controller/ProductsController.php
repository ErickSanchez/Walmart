
<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {
	var $scaffold = "admin";
	var $layout = "admin";

/**
 * Controller name
 *
 * @var string
 */

	public $name = 'Products';
	public $uses = array('Product','Brand','Categorie');

	public function index($id = 0){
		$this->layout = "default";
		if(!$sql)
			$this->redirect('/');      
	}

    public function admin_add() {
        if($this->request->data) {
            $this->Product->create();

            $this->request->data['Product']['image'] = $this->_uploadFile($this->request->data);//UPLOAD IMAGE
            if ($this->Product->saveAll($this->request->data)) {            	
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }

        	$data = array(
			     'brands'=>$this->Brand->find('all'),
                 'categories'=> $this->Categorie->find('all',array('fields' => array('id', 'name'))));
        	$this->set($data);

    }

        public function admin_edit($id) {
        	if (!$id) {
        		throw new NotFoundException(__('Invalid product'));
    		}

        	$product = $this->Product->findById($id);
        	if (!$product) {
            	throw new NotFoundException(__('Invalid product'));
        	}

            if ($this->request->data || $this->request->is('put')) {
                $this->Product->id = $id;
                
                $image = $this->_uploadFile($this->request->data);
                if($image == null)
                    $image = $this->request->data['Product']['img'];                
                $this->request->data['Product']['image'] = $image;  

                if ($this->Product->save($this->request->data)) {
                    $this->Session->setFlash('Your post has been updated.');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Unable to update your product.');
                }
            }

            if (!$this->request->data) {
                    $this->request->data = $product;
                }
                    $data = array(
        			 'brands'     => $this->Brand->find('all'),
        			 'brand_id'   => $this->request->data['Product']['brand_id'],
                        'categories' => $this->Categorie->find('all',array('fields' => array('id', 'name'))));
                    $this->set($data);
    
    }


    function _uploadFile($data) {
  		$file = $data['Product']['image'];
  		    if($file['error'] === UPLOAD_ERR_OK) {
    		  $ext = explode('.', $file['name']);
              $ext=$ext[1];
             
              if(strtolower($ext) == "gif" || strtolower($ext) == "jpg" || strtolower($ext) == "jpeg" || strtolower($ext) == "png"){
        		  $id = String::uuid();
        		  $image = $id.'.'.$ext[1];
        		if(move_uploaded_file($file['tmp_name'], WWW_ROOT.'img/products'.DS.$image)) {
                    chmod(WWW_ROOT.'img/products'.DS.$image, '777');      	
          		return $image;
            }
    }
  }
  return null;
}
}
