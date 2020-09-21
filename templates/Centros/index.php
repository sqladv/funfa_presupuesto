<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro[]|\Cake\Collection\CollectionInterface $centros
 */
?>
<div class="centros index content">
    <?= $this->Html->link(__('Nuevo Centro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Centros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('cent_nombre','Centros') ?></th>
                    <th><?= $this->Paginator->sort('cent_prog_id','Programa') ?></th>
                    <th><?= $this->Paginator->sort('cent_gest','Gestor') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($centros as $centro): ?>
                <tr>
                    <td><?= h($centro->cent_nombre) ?></td>
                    <td><?= $centro->has('programa') ? $this->Html->link($centro->programa->prog_nombre, ['controller' => 'Programas', 'action' => 'view', $centro->programa->prog_id]) : '' ?></td>
                    <td><?= h($centro->cent_gest) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $centro->cent_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $centro->cent_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $centro->cent_id], ['confirm' => __('Esta seguro en eliminar el centro: {0}?', $centro->cent_nombre)]) ?>
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
