<?php

class MovimientosController extends AppController{ 

    public $uses = array('Producto' , 'Accion' , 'Movimiento' , 'Sucursal' , 'Destino' , 'Stock');

        
    public $paginate = array(
        'limit' => 15
    );
    
    public function index(){

        $acciones   = $this->Accion->find('list');
        $productos  = $this->Producto->find('list');
        $sucursales = $this->Sucursal->find('list');
        $destinos   = $this->Destino->find('list');
        
        $this->set(compact('acciones'));
        $this->set(compact('productos'));
        $this->set(compact('sucursales'));
        $this->set(compact('destinos'));

        $data = $this->paginate('Movimiento');                
        $this->set(compact('data'));
    }
    
    public function add(){
        
        $acciones   = $this->Accion->find('list');
        $productos  = $this->Producto->find('list');
        $sucursales = $this->Sucursal->find('list');
        $destinos   = $this->Destino->find('list');
        
        $this->set(compact('acciones'));
        $this->set(compact('productos'));
        $this->set(compact('sucursales'));
        $this->set(compact('destinos'));

        if(!empty($this->data)){

            if ($this->Movimiento->save($this->data)) {
                
                // Modificar existencia en Stock
                $stock = $this->Stock->find('all', array('conditions'=>array('producto_id'=> $this->data['Movimiento']['producto_id'] )) );
                                
                $stock_id       = $stock['0']['Stock']['id'];
                $stock_cantidad = $stock['0']['Stock']['existencia'];

                if($this->data['Movimiento']['accion_id'] == 3 )
                    $existencia = $this->data['Movimiento']['cantidad'] + $stock_cantidad;
                else $existencia = $stock_cantidad - $this->data['Movimiento']['cantidad'];        
                
                $stock_array = array('Stock' => array ('id' => $stock_id , 'existencia' => $existencia) );
                $this->Stock->save($stock_array);


                $this->Session->setFlash( MSG_ADD, 'success' );
                
                //$this->redirect($this->referer());
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
                
        if ($this->Movimiento->delete($id, true)) {
            $this->Session->setFlash( MSG_DEL, 'success' );
            $this->redirect(array('action' => 'index'));
        }        
    }
    
}

?>
