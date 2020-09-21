<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Item'), ['action' => 'edit', $item->item_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Item'), ['action' => 'delete', $item->item_id], ['confirm' => __('Esta seguro que quiere eliminar el item: {0}?', $item->item_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->item_nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Agrupacion') ?></th>
                    <td><?= $item->has('agrupacione') ? $this->Html->link($item->agrupacione->agru_nombre, ['controller' => 'Agrupaciones', 'action' => 'view', $item->agrupacione->agru_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Año') ?></th>
                    <td><?= h($item->item_pres_año) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= H($item->item_cod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Presupuesto Anual') ?></th>
                    <td><?= $this->Number->format($item->item_pres_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enero') ?></th>
                    <td><?= $this->Number->format($item->item_pres_enero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Febrero') ?></th>
                    <td><?= $this->Number->format($item->item_pres_febrero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marzo') ?></th>
                    <td><?= $this->Number->format($item->item_pres_marzo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abril') ?></th>
                    <td><?= $this->Number->format($item->item_pres_abril) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mayo') ?></th>
                    <td><?= $this->Number->format($item->item_pres_mayo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Junio') ?></th>
                    <td><?= $this->Number->format($item->item_pres_junio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Julio') ?></th>
                    <td><?= $this->Number->format($item->item_pres_julio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agosto') ?></th>
                    <td><?= $this->Number->format($item->item_pres_agosto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Septiembre') ?></th>
                    <td><?= $this->Number->format($item->item_pres_septiembre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Octubre') ?></th>
                    <td><?= $this->Number->format($item->item_pres_octubre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Noviembre') ?></th>
                    <td><?= $this->Number->format($item->item_pres_noviembre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diciembre') ?></th>
                    <td><?= $this->Number->format($item->item_pres_diciembre) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
