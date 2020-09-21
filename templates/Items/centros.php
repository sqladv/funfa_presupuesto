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
    <h3 class="tabla"><?= __('Programa: '),h($id4),__(' Mes: '),h($id3) ?></h3>
    <h3 class="tabla"><?= __('Gastos por Item: ' )?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Item') ?></th>
                    <th><?= __('Codigo Item') ?></th>
                    <th><?= __('Monto') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    <td><?=  $this->Html->link(h($data['item_nombre']), ['controller' => 'Detalles','action' => 'detalle',$data['item_cod'] ,$id3,$data['item_nombre']])?></td> 
                    <td><?php echo h($data['item_cod']) ?></td> 
                     <td><?php echo '$',$this->Number->format($data['monto']) ?></td> 


                </tr>
                <?php endforeach; ?>
                 
            </tbody>
        </table>
    </div>

</div>