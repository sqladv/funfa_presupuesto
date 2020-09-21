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
            <?= $this->Html->link(__('Lista Agrupaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="agrupaciones form content">
            <?= $this->Form->create($agrupacione) ?>
            <fieldset>
                <legend><?= __('Agregar Agrupacion') ?></legend>
                <?php
                    echo $this->Form->control('agru_nombre',['label' => 'Nombre']);
                    echo $this->Form->control('agru_prog_id', ['label' => 'Programa','options' => $programas, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Agregar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
