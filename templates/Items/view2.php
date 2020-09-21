<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
use Cake\I18n\Number;
$x=0;
?>
<div class=" view large-10 medium-8 columns content">
    <h3 class="tabla"><?= __('Agrupacion: ' ), h($id2) ?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('item_nombre','Item') ?></th>
                    <th><?= $this->Paginator->sort('item_cod','Codigo') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_total','Presupuesto Anual') ?></th>                 
                    <th><?= $this->Paginator->sort('item_pres_año','Año') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    <td><?= ($x=$x+1),('- '),$this->Html->link($data->item_nombre,['action' => 'view', $data->item_id]) ?></td>
                    <td><?= h($data->item_cod) ?></td>
                    <td><?= '$',$this->Number->format($data->item_pres_total) ?></td>         
                    <td><?= h($data->item_pres_año) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $data->item_id,$id2,$id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $data->item_id], ['confirm' => __('Esta seguro que quiere eliminar el item: {0}?', $data->item_nombre)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina{{page}} de {{pages}}, mostrando {{current}} dato(s) de {{count}} en total')) ?></p>
    </div>
</div>