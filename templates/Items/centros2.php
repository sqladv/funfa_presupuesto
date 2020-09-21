<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
use Cake\I18n\Number;
use Cake\I18n\Time;
Time::setDefaultLocale('es_ES');
$x=0;
?>
<div class=" view large-10 medium-8 columns content">
    <h3 class="tabla"><?= __('Item: '),h($id4) ?></h3>
    <h3 class="tabla"><?= __(' Mes: '),h($id3) ?></h3>
    <h3 class="tabla"><?= __('Gasto de los Centros: ' )?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Centro Primario') ?></th>
                    <th><?= __('Codigo Item') ?></th>
                    <th><?= __('Item') ?></th>
                    <th><?= __('Monto') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
 
                    <td><?= $this->Html->link( $data['centro_primario'], ['action' => 'centros3', $data['centro_primario'],$data['fecha_pago'],$data['cod_item'],$id4,$id3]) ?></td> 
                    <td><?php echo h($data['cod_item']) ?></td> 
                    <td><?php echo h($data['item']) ?></td> 
                     <td><?php echo '$',$this->Number->format($data['monto']) ?></td> 


                </tr>
                <?php endforeach; ?>
                 
            </tbody>
        </table>
    </div>

</div>