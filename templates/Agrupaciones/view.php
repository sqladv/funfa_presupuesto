<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agrupacione $agrupacione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Agrupacion'), ['action' => 'edit', $agrupacione->agru_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Agrupacion'), ['action' => 'delete', $agrupacione->agru_id], ['confirm' => __('Esta seguro en eliminar la agrupacion: {0}?', $agrupacione->agru_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista Agrupaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Agrupacion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="agrupaciones view content">
            <h3><?= h($agrupacione->agru_nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Programa') ?></th>
                    <td><?= $agrupacione->has('programa') ? $this->Html->link($agrupacione->programa->prog_nombre, ['controller' => 'Programas', 'action' => 'view', $agrupacione->programa->prog_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= $this->Number->format($agrupacione->agru_cod) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($agrupacione->agru_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
