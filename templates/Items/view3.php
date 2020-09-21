<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="items index content">
     <?= $this->Html->link(__('Descargar Excel'), ['action' => 'export3',$id,$id2],['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Presupuesto Anual - Programa: '),h($id2) ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Acciones') ?></th>
                    <th><?= $this->Paginator->sort('item_agru_id','Agrupación') ?></th>
                    <th><?= $this->Paginator->sort('agru_cod','Cod.') ?></th>
                    <th><?= $this->Paginator->sort('item_nombre','Item') ?></th>
                    <th><?= $this->Paginator->sort('item_cod','Cod.') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_total','Total') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_enero','Enero') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_febrero','Febrero') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_marzo','Marzo') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_abril','Abril') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_mayo','Mayo') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_junio','Junio') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_julio','Julio') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_agosto','Agosto') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_septiembre','Septiembre') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_octubre','Octubre') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_noviembre','Noviembre') ?></th>
                    <th><?= $this->Paginator->sort('item_pres_diciembre','Diciembre') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit2', $item->item_id,$id,$id2]) ?>
                    </td>
                    <td><?= $item->has('agrupacione') ? $this->Html->link($item->agrupacione->agru_nombre, ['controller' => 'Agrupaciones', 'action' => 'view', $item->agrupacione->agru_id]) : '' ?></td>
                    <td><?= h($item->agrupacione->agru_cod) ?></td>
                    <td><?= $this->Html->link($item->item_nombre,['action' => 'view', $item->item_id]) ?></td>
                    <td><?= h($item->item_cod) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_total) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_enero) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_febrero) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_marzo) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_abril) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_mayo) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_junio) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_julio) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_agosto) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_septiembre) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_octubre) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_noviembre) ?></td>
                    <td><?= '$',$this->Number->format($item->item_pres_diciembre) ?></td>
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
