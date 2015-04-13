<?php

class Movimiento extends AppModel {
    
    public $name = 'Movimiento';       
    
    public $belongsTo = array(
        'Accion' => array(
            'className' => 'Accion',
            'foreignKey' => 'accion_id',
        ),
        'Producto' => array(
            'className' => 'Producto',
            'foreignKey' => 'producto_id',
        ),
        'Destino' => array(
            'className' => 'Destino',
            'foreignKey' => 'destino_id',
        ),  
        'Sucursal' => array(
            'className' => 'Sucursal',
            'foreignKey' => 'sucursal_id',
        )           
    );    

        
}

?>