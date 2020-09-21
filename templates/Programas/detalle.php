<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $datas
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('Descargar Excel'), ['action' => 'export2',$id2,$id],['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Programa:'),h($id2) ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>               
                    <th><?= $this->Paginator->sort('mes_nombre','Mes') ?></th>
                    <th><?= $this->Paginator->sort('presupuesto_mensual','Presupuesto') ?></th>
                    <th><?= $this->Paginator->sort('solicitado_mes','Solicitado') ?></th>
                    <th><?= $this->Paginator->sort('gasto_ren_mes','Gasto Rendicion') ?></th>
                    <th><?= $this->Paginator->sort('gasto_mesnual','Gasto Ministerio') ?></th>
                    <th><?= $this->Paginator->sort('saldo_mensual','Saldo') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_mes','% Saldo') ?></th>
                    <th><?= $this->Paginator->sort('estado_mes','Estado') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    
                    <td><?= h($data->mes_nombre) ?></td>
                    <td><?= $this->Number->format($data->presupuesto_mensual,['before' => '$']) ?></td>
                    <td><?= $this->Number->format($data->solicitado_mes,['before' => '$']) ?></td>
                    <td><?=  $this->Html->link($this->Number->format($data->gasto_ren_mes,['before' => '$']), ['controller' => 'items','action' => 'rendicion', $data->prog_id,$data->mes_id,$data->mes_nombre,$id2])?></td>
                    <td><?=  $this->Html->link($this->Number->format($data->gasto_mesnual,['before' => '$']), ['controller' => 'items','action' => 'centros', $data->prog_id,$data->mes_id,$data->mes_nombre,$id2])?></td>
                    <td><?= $this->Number->format($data->saldo_mensual,['before' => '$']) ?></td>
                    <td><?= $this->Number->toPercentage($data->porcentaje_mes,0) ?></td>
                     <?php
                                                               
                        if ($data->porcentaje_mes>100){                                       
                              $clase='table-responsive rojo';
                            } 
                        else{
                        if ($data->porcentaje_mes==100){
                              $clase='table-responsive verde';
                            }

                        else {if ($data->porcentaje_mes>=90){
                              $clase='table-responsive amarillo';
                            } 

                            else 
                                $clase='table-responsive verde';

                        }
                            }
                         
                
                    ?>
                    <td class="<?php echo $clase?>"><li></li></td>
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
