<?php

class Producto extends AppModel{
    public $name = 'Producto';       
    public $displayField = 'descripcion';
    public $order = 'Producto.descripcion ASC';
    
    public $belongsTo = array(
        'Rubro' => array(
            'className' => 'Rubro',
            'foreignKey' => 'rubro_id',
        )
    );      
}

?>