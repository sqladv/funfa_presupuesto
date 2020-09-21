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
            <?= $this->Html->link(__('Volver'), ['action' => 'view5',$id4,$id2,$id3], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <h3><?= __('Agrupacion: '),' ',h($item->agrupacione->agru_nombre)?></h3>
                <h3><?= __('Nombre:'),' ',h($item->item_nombre) ?></h3>
                <legend><?= __('Editar Item') ?></legend>
                <?php
                    
                    /*echo $this->Form->control('item_pres_año',['label' => 'Año']);*/
                    echo $this->Form->control('item_pres_total',['label' => 'Presupuesto Anual']);
                    /*echo $this->Form->control('item_pres_gasto',['label' => 'Prespuesto Gasto']);*/
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
                    echo $this->Form->control('item_pres_diciembre',['label' => 'Diciembre']);
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
