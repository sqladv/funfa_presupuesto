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
            <?= $this->Html->link(__('Volver'), ['action' => 'view4',$id3,$id4], ['class' => 'side-nav-item']) ?>
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
                    echo $this->Form->control('item_pres_gasto',['label' => 'Gasto Anual']);
                    /*echo $this->Form->control('item_pres_gasto',['label' => 'Prespuesto Gasto']);*/
                    echo $this->Form->control('gasto_enero',['label' => 'Gasto Enero']);
                    echo $this->Form->control('gasto_febrero',['label' => 'Gasto Febrero']);
                    echo $this->Form->control('gasto_marzo',['label' => 'Gasto Marzo']);
                    echo $this->Form->control('gasto_abril',['label' => 'Gasto Abril']);
                    echo $this->Form->control('gasto_mayo',['label' => 'Gasto Mayo']);
                    echo $this->Form->control('gasto_junio',['label' => 'Gasto Junio']);
                    echo $this->Form->control('gasto_julio',['label' => 'Gasto Julio']);
                    echo $this->Form->control('gasto_agosto',['label' => 'Gasto Agosto']);
                    echo $this->Form->control('gasto_septiembre',['label' => 'Gasto Septiembre']);
                    echo $this->Form->control('gasto_octubre',['label' => 'Gasto Octubre']);
                    echo $this->Form->control('gasto_noviembre',['label' => 'Gasto Noviembre']);
                    echo $this->Form->control('gasto_diciembre',['label' => 'Gasto Diciembre']);
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
