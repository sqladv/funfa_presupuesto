<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro $centro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Centro'), ['action' => 'edit', $centro->cent_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Centro'), ['action' => 'delete', $centro->cent_id], ['confirm' => __('Esta seguro en eliminar el centro: {0}?', $centro->cent_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista Centros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Centro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="centros view content">
            <h3><?= h($centro->cent_nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Programa') ?></th>
                    <td><?= $centro->has('programa') ? $this->Html->link($centro->programa->prog_nombre, ['controller' => 'Programas', 'action' => 'view', $centro->programa->prog_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gestor') ?></th>
                    <td><?= h($centro->cent_gest) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($centro->cent_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
