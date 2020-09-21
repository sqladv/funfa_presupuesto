<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('Nuevo Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('item_agru_id','Agrupación') ?></th>
                    <th><?= $this->Paginator->sort('item_nombre','Nombre') ?></th>
                    <th><?= $this->Paginator->sort('item_cod','Codigo') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_total','Presupuesto Anual') ?></th>                 
                    <th><?= $this->Paginator->sort('item_pres_año','Año') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item->has('agrupacione') ? $this->Html->link($item->agrupacione->agru_nombre, ['controller' => 'Agrupaciones', 'action' => 'view', $item->agrupacione->agru_id]) : '' ?></td>
                    <td><?= $this->Html->link($item->item_nombre,['action' => 'view', $item->item_id]) ?></td>
                    <td><?= h($item->item_cod) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_total) ?></td>         
                    <td><?= h($item->item_pres_año) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'editv', $item->item_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $item->item_id], ['confirm' => __('Esta seguro que quiere eliminar el item: {0}?', $item->item_nombre)]) ?>
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
