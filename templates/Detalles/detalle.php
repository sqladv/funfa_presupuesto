<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Programa $programa
 */
use Cake\I18n\Number;
use Cake\I18n\Time;
Time::setDefaultLocale('es_ES');
$x=0;
?>
<div class=" view large-10 medium-8 columns content">

    <h3 class="tabla"><?= __('Item: '),h($id3) ?></h3>
    <h3 class="tabla"><?= __(' Mes: '),h($id2) ?></h3>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Accion') ?></th>
                    <th><?= __('Centro Primario') ?></th>
                    <th><?= __('Codigo Item') ?></th>
                    <th><?= __('Monto') ?></th>
                    <th><?= __('Tipo Comprovante') ?></th>
                    <th><?= __('Nº Comprovante') ?></th>
                    <th><?= __('Fecha Comprovante') ?></th>
                    <th><?= __('Tipo Documento') ?></th>
                    <th><?= __('Proveedor') ?></th>
                    <th><?= __('Rut') ?></th>
                    <th><?= __('Labor') ?></th>
                    <th><?= __('Forma de Pago') ?></th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit2',$detalle->det_id,$id,$id2,$id3]) ?>
                    </td>
                    <td><?= h($detalle->det_centro) ?></td> 
                    <td><?= h($detalle->det_item) ?></td>
                    <td><?= '$',$this->Number->format($detalle->det_monto) ?></td> 
                    <td><?= h($detalle->det_tip_comp) ?></td> 
                    <td><?= h($detalle->det_num_comp) ?></td> 
                    <td><?= $this->Time->format($detalle->det_fecha_comp, 'dd-MM-YYYY') ?></td>
                    <td><?= h($detalle->det_tip_doc) ?></td> 
                    <td><?= h($detalle->det_prov) ?></td> 
                    <td><?= h($detalle->det_rut) ?></td>
                    <td><?= h($detalle->det_labor) ?></td> 
                    <td><?= h($detalle->det_forma_pago) ?></td>   
                    



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