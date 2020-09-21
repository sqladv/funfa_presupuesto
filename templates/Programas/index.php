<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa[]|\Cake\Collection\CollectionInterface $programas
 */
?>

<div class="programas index content">
    <?= $this->Html->link(__('Nuevo Programa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Programas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>           
                    <th><?= $this->Paginator->sort('prog_nombre','Nombre') ?></th>
                    <th class="actions"><?= __('Centros/Agrupaciónes') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($programas as $programa): ?>
                <tr>
                    
                    <td><?= h($programa->prog_nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Centros'), ['controller' => 'Centros','action' => 'view2', $programa->prog_id,$programa->prog_nombre]) ?>
                        <?= $this->Html->link(__('Agrupaciones'), ['controller' => 'Agrupaciones','action' => 'view2', $programa->prog_id,$programa->prog_nombre]) ?>
                        
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $programa->prog_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $programa->prog_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $programa->prog_id], ['confirm' => __('Esta seguro en eliminar el programa: {0}?', $programa->prog_nombre)]) ?>
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
