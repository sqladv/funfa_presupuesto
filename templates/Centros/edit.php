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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $centro->cent_id],
                ['confirm' => __('Esta seguro en eliminar el centro: {0}?', $centro->cent_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista Centros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="centros form content">
            <?= $this->Form->create($centro) ?>
            <fieldset>
                <legend><?= __('Editar Centro') ?></legend>
                <?php
                    echo $this->Form->control('cent_nombre',['label' => 'Nombre']);
                    echo $this->Form->control('cent_prog_id', ['label' => 'Programa','options' => $programas, 'empty' => true]);
                    echo $this->Form->control('cent_gest',['label' => 'Gestor']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
