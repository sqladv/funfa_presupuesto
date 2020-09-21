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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $agrupacione->agru_id],
                ['confirm' => __('Esta seguro en eliminar la agrupacion: {0}?', $agrupacione->agru_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista Agrupaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="agrupaciones form content">
            <?= $this->Form->create($agrupacione) ?>
            <fieldset>
                <legend><?= __('Editar Agrupacion') ?></legend>
                <?php
                    echo $this->Form->control('agru_nombre',['label' => 'Nombre']);
                    echo $this->Form->control('agru_prog_id', ['label' => 'Programa','options' => $programas, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
