<div class="form">
<fieldset>
    <legend>Movimientos registrados en los depósitos</legend>
    <br>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th>Nro.</th>            
            <th>Accion</th>            
            <th>Origen/Destino</th>            
            <th>Sucursal</th>            
            <th>Producto</th>
            <th>Cantidad</th>
            <th></th>             
    </tr>
    <?php        
    foreach ($data as $d):
            echo "<tr>";
                echo "<td>" . $d['Movimiento']['id'] . "</td>";
                echo "<td>" . $d['Accion']['descripcion'] . "</td>";
                echo "<td>" . $d['Destino']['descripcion'] . "</td>";
                echo "<td>" . $d['Sucursal']['descripcion'] . "</td>";
                echo "<td>" . $d['Producto']['descripcion'] . "</td>";
                echo "<td>" . $d['Movimiento']['cantidad'] . "</td>";
 
                echo "<td class='actions'>";
                
                $id = $d['Movimiento']['id'];
                                
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




