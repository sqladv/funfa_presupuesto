<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $programa->prog_id],
                ['confirm' => __('Esta seguro en eliminar el programa: {0}?', $programa->prog_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Programas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="programas form content">
            <?= $this->Form->create($programa) ?>
            <fieldset>
                <legend><?= __('Editar Programa') ?></legend>

                <?php
                    echo $this->Form->control('prog_nombre',['label' => 'Nombre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
