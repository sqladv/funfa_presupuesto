<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detalle $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Volver'), ['action' => 'detalle',$id2,$id3,$id4], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items form content">
            <?= $this->Form->create($detalle) ?>
            <fieldset>
                <legend><?= __('Editar Detalle') ?></legend>
                <?php
                    echo $this->Form->control('det_centro', ['label' => 'Centro']);
                    echo $this->Form->control('det_item',['label' => 'Item']);

                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
