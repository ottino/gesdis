<div class="form">
    <?php echo $this->Form->create('Movimiento',array('action' => 'add')); ?>

    <div class="form-content">
    <fieldset>
    <legend>Resgitrar movimiento de mercaderia</legend>  
         <div class="columns">
                <?php    

                        echo $this->Form->input(
                            'accion_id',
                             array(
                                'options' => $acciones,
                                'label' => 'Accion',
                                'empty' => 'Eliga una opción')
                            );

                        echo $this->Form->input(
                            'destino_id',
                             array(
                                'options' => $destinos,
                                'label' => 'Origen/Destino',
                                'empty' => 'Eliga un destino')
                            );

                        echo $this->Form->input(
                            'sucursal_id',
                             array(
                                'options' => $sucursales,
                                'label' => 'Sucursal',
                                'empty' => 'Eliga una sucursal')
                            );
                ?>             
        </div>
        <div class="columns">
                <?php    
                        echo $this->Form->input(
                            'producto_id',
                             array(
                                'options' => $productos,
                                'label' => 'Producto',
                                'empty' => 'Eliga un producto')
                            );

                        echo $this->Form->input('cantidad',
                            array(
                                   'label' => 'Cantidad'
                                 )
                            );                        
                ?>        
        </div>
    </fieldset>
   </div> 
   <?php  echo $this->Form->end('Guardar'); ?>
</div>