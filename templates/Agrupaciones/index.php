<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agrupacione[]|\Cake\Collection\CollectionInterface $agrupaciones
 */
?>
<div class="agrupaciones index content">
    <?= $this->Html->link(__('Nueva Agrupacion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Agrupaciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    
                    <th><?= $this->Paginator->sort('agru_nombre','Nombre') ?></th>
                    <th><?= $this->Paginator->sort('agru_cod','Codigo') ?></th>
                    <th><?= $this->Paginator->sort('agru_prog_id','Programa') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agrupaciones as $agrupacione): ?>
                <tr>
                    
                    <td><?= h($agrupacione->agru_nombre) ?></td>
                    <td><?= h($agrupacione->agru_cod) ?></td>
                    <td><?= $agrupacione->has('programa') ? $this->Html->link($agrupacione->programa->prog_nombre, ['controller' => 'Programas', 'action' => 'view', $agrupacione->programa->prog_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $agrupacione->agru_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $agrupacione->agru_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $agrupacione->agru_id], ['confirm' => __('Esta seguro en eliminar la agrupacion: {0}?', $agrupacione->agru_nombre)]) ?>
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
