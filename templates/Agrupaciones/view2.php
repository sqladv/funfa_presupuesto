<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
use Cake\I18n\Number;
$x=0;
?>
<div class=" view large-10 medium-8 columns content">
    <h3 class="tabla"><?= __('Programa: ' ), h($id2) ?></h3>
   
    <table class="center-table">
         <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('agru_nombre','Agrupación') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agru_cod','Codigo') ?></th>
                <th class="actions"><?= __('Items') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
                            
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($data as $data): ?>     
            <tr>
                <td><?=  ($x=$x+1),('- '),h($data->agru_nombre) ?></td>
                <td><?=  h($data->agru_cod) ?></td>
                <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['controller' => 'Items','action' => 'view2', $data->agru_id,$data->agru_nombre]) ?>
                </td>
                <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $data->agru_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $data->agru_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $data->agru_id], ['confirm' => __('Esta seguro en eliminar la agrupacion: {0}?', $data->agru_nombre)]) ?>
                    </td>
            </tr>  
            <?php endforeach; ?>        
        </tbody>
    </table>
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
