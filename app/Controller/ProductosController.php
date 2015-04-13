<?php

class ProductosController extends AppController{ 

    public $uses = array('Producto', 'Rubro');

        
    public $paginate = array(
        'limit' => 15,
         'order' => array(
            'Producto.codigo' => 'asc'
        )
    );
    
    public function index(){

        $rubros = $this->Rubro->find('list');
        $this->set(compact('rubros'));

        $data = $this->paginate('Producto');                
        $this->set(compact('data'));
    }
    
    public function add(){
        
        $rubros = $this->Rubro->find('list');
        $this->set(compact('rubros'));

        if(!empty($this->data)){
            
            if ($this->Producto->save($this->data)) {
                   
                $this->Session->setFlash( MSG_ADD, 'success' );
                
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash( MSG_ERR );
            }
            
        }
    }    
    
    public function edit($id = null){
   
        $rubros = $this->Rubro->find('list');
        $this->set(compact('rubros'));

        if ($this->request->is('get')) {
            
            $this->Producto->id = $id;
            
            $this->request->data = $this->Producto->read();
            
        } else {
            if ($this->Producto->save($this->request->data)) {
                $this->Session->setFlash( MSG_EDT , 'success');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
      
    public function delete($id = null ){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
                
        if ($this->Producto->delete($id, true)) {
            $this->Session->setFlash( MSG_DEL, 'success' );
            $this->redirect(array('action' => 'index'));
        }        
    }
    
}

?>
