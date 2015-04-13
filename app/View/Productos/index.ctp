<div class="form">
<fieldset>
    <legend>Productos</legend>
    
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th>Codigo</th>            
            <th>Descripcion</th>            
            <th>Rubro</th>            
            <th>Precio x Unidad</th>            
            <th>Cantidad Maxima</th>
            <th>Cantidad Minima</th>
            <th></th>             
    </tr>
    <?php        
    foreach ($data as $d):
            echo "<tr>";
                echo "<td>" . $d['Producto']['codigo'] . "</td>";
                echo "<td>" . $d['Producto']['descripcion'] . "</td>";
                echo "<td>" . $d['Producto']['rubro_id'] . "</td>";
                echo "<td>" . $d['Producto']['precio'] . "</td>";
                echo "<td>" . $d['Producto']['cantidad_max'] . "</td>";
                echo "<td>" . $d['Producto']['cantidad_min']. "</td>";

                echo "<td class='actions'>";
                
                $id = $d['Producto']['id'];
                
                echo $this->Html->link(
                        BTN_EDIT, 
                        array('action' => 'edit', $id), 
                        array('title'=>BTN_EDIT,'escape' => false )
                );
                
                echo $this->Form->postLink(
                        BTN_DEL, 
                        array('action' => 'delete', $id),
                        array('title'=>'Eliminar','escape' => false ),
                        MSG_PREG_ELIM_DATO
                );
                
                echo "</td>";
               echo '</tr>';        
    endforeach;

    ?>
    </table>
     <p>
        <?php
        echo $this->Paginator->counter(array(
                'format' => __d('cake', 'Página {:page} de {:pages} - Registros {:count} - Actual [{:start} a {:end}]')
        ));
        ?>
    </p>
    <div class="paging">
        <?php
                echo $this->Paginator->prev('< ' . __d('cake', ''), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__d('cake', '') .' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>       
</fieldset>
</div>




