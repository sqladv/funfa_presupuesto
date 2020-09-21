<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa[]|\Cake\Collection\CollectionInterface $programas
 */
?>

<div class="programas index content">
    <h3 class="tabla"><?= __('Programas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>           
                    <th><?= $this->Paginator->sort('prog_nombre','Nombre') ?></th>
                    <th class="actions"><?= __('Presupuesto Anual') ?></th>
                    <th class="actions"><?= __('Gasto Real') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($programas as $programa): ?>
                <tr>
                    
                    <td><?= h($programa->prog_nombre) ?></td>

                    <td class="actions">
                        <?= '$',$this->Html->link($this->Number->format($programa->presupuesto_total), ['controller' => 'Items','action' => 'view3', $programa->prog_id,$programa->prog_nombre]) ?>
                        
                    </td>
                    <td class="actions">
                        <?= '$',$this->Html->link($this->Number->format($programa->gasto_total), ['controller' => 'Items','action' => 'view4', 
                        $programa->prog_id,$programa->prog_nombre]) ?>           
                    </td>


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina{{page}} de {{pages}}, mostrando {{current}} dato(s) de {{count}} en total')) ?></p>
    </div>
</div>
