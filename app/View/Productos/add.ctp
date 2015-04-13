<div class="form">
    <?php  echo $this->Form->create(); ?>

    <div class="form-content">
    <fieldset>
    <legend>Nuevo Producto</legend>  
         <div class="columns">
                <?php    
                        echo $this->Form->input('codigo',
                            array(
                                   'label' => 'Codigo'
                                 )
                            );

                        echo $this->Form->input('descripcion',
                            array(
                                   'label' => 'Descripcion'
                                 )
                            );

                        echo $this->Form->input(
                            'rubro_id',
                             array(
                                'options' => $rubros,
                                'label' => 'Rubro',
                                'empty' => 'Eliga un rubro')
                            );

                        echo $this->Form->input('precio',
                            array(
                                   'label' => 'Precio por unidad'
                                 )
                            );

                ?>             
        </div>
        <div class="columns">
                <?php    
                        echo $this->Form->input('cantidad_max',
                            array(
                                   'label' => 'Cantidad Maxima - Alerta'
                                 )
                            );

                        echo $this->Form->input('cantidad_min',
                            array(
                                   'label' => 'Cantidad Minima - Alerta'
                                 )
                            );                        
                ?>        
        </div>
    </fieldset>
   </div> 
   <?php  echo $this->Form->end('Guardar'); ?>
</div>