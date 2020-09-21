<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <legend><?= __('Agregar Item') ?></legend>
                <?php
                    echo $this->Form->control('item_agru_id', ['label' => 'Agrupación','options' => $agrupaciones, 'empty' => true]);
                    echo $this->Form->control('item_nombre',['label' => 'Nombre']);
                    echo $this->Form->control('item_pres_año',['label' => 'Año','options' => $año ]);
                    echo $this->Form->control('item_pres_total',['label' => 'Prespuesto Anual']);
                   /* echo $this->Form->control('item_pres_gasto',['label' => 'Prespuesto Gasto']);
                    echo $this->Form->control('item_pres_enero',['label' => 'Enero']);
                    echo $this->Form->control('item_pres_febrero',['label' => 'Febrero']);
                    echo $this->Form->control('item_pres_marzo',['label' => 'Marzo']);
                    echo $this->Form->control('item_pres_abril',['label' => 'Abril']);
                    echo $this->Form->control('item_pres_mayo',['label' => 'Mayo']);
                    echo $this->Form->control('item_pres_junio',['label' => 'Junio']);
                    echo $this->Form->control('item_pres_julio',['label' => 'Julio']);
                    echo $this->Form->control('item_pres_agosto',['label' => 'Agosto']);
                    echo $this->Form->control('item_pres_septiembre',['label' => 'Septiembre']);
                    echo $this->Form->control('item_pres_octubre',['label' => 'Octubre']);
                    echo $this->Form->control('item_pres_noviembre',['label' => 'Noviembre']);
                    echo $this->Form->control('item_pres_diciembre',['label' => 'Diciembre']); */
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Agregar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
