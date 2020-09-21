<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading "><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Programa'), ['action' => 'edit', $programa->prog_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Programa'), ['action' => 'delete', $programa->prog_id], ['confirm' => __('Esta seguro en eliminar el programa: {0}?', $programa->prog_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Programas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Programa'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="programas view content">
            <h3><?= h($programa->prog_nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($programa->prog_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
