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
            <?= $this->Html->link(__('Volver'), ['action' => 'view6',$id17,$id16], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="programas form content">
            <?= $this->Form->create($programa) ?>
            <fieldset>
                <legend><?= __('Simulación Presupuestaria - Programa: '),h($programa->item_nombre) ?></legend>
                <legend><?= __('Gasto Real: '),'$', $this->Number->format($id3)?></legend>

                <?php
                    echo $this->Form->control('sim_total',['label' => 'Presupuesto Anual']);
                ?>
                <?php
                    echo $this->Form->control('sim_enero',['label' => 'Pres. Enero']);
                ?>
                 <?php
                    echo $this->Form->control('sim_febrero',['label' => 'Pres. Febrero']);
                ?>
                 <?php
                    echo $this->Form->control('sim_marzo',['label' => 'Pres. Marzo']);
                ?>
                 <?php
                    echo $this->Form->control('sim_abril',['label' => 'Pres. Abril']);
                ?>
                 <?php
                    echo $this->Form->control('sim_mayo',['label' => 'Pres. Mayo']);
                ?>
                 <?php
                    echo $this->Form->control('sim_junio',['label' => 'Pres. Junio']);
                ?>
                 <?php
                    echo $this->Form->control('sim_julio',['label' => 'Pres. Julio']);
                ?>
                 <?php
                    echo $this->Form->control('sim_agosto',['label' => 'Pres. Agosto']);
                ?>
                 <?php
                    echo $this->Form->control('sim_septiembre',['label' => 'Pres. Septiembre']);
                ?>
                 <?php
                    echo $this->Form->control('sim_octubre',['label' => 'Pres. Octubre']);
                ?>
                 <?php
                    echo $this->Form->control('sim_noviembre',['label' => 'Pres. Noviembre']);
                ?>
                 <?php
                    echo $this->Form->control('sim_diciembre',['label' => 'Pres. Diciembre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Simular')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
