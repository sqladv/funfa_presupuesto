<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
use Cake\I18n\Number;
$x=0;
?>
<div class="centros index content">
    <?= $this->Html->link(__('Descargar Excel'), ['action' => 'export',$id2],['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Programa: ' ), h($id2) ?></h3>
  
    <table class="center-table">
         <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cent_nombre','Centros') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cent_gest','Gestor Encargado') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
                            
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($data as $data): ?>     
            <tr>
                <td><?=  ($x=$x+1),('- '),h($data->cent_nombre) ?></td>
                <td><?= h($data->cent_gest) ?></td>
                <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $data->cent_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $data->cent_id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $data->cent_id], ['confirm' => __('Esta seguro en eliminar el centro: {0}?', $data->cent_nombre)]) ?>
                    </td>
                
              
            </tr>  
            <?php endforeach; ?>        
        </tbody>
    </table>
</div>