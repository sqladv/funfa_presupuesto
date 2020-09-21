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
    <h3 class="tabla"><?= __('Item: '),h($id4) ?></h3>
    <h3 class="tabla"><?= __('Solicitado Mes: '),h($id3) ?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Centro Primario') ?></th>
                    <th><?= __('Monto') ?></th>
                    <th><?= __('Detalle gasto') ?></th>
                    <th><?= __('Estado') ?></th>
                    <th><?= __('Usuario Solicitante') ?></th>                 
                    <th><?= __('Fecha Transferencia') ?></th>
    
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    <td><?php echo h($data['id']) ?></td>
                    <td><?php echo h($data['centro_primario']) ?></td> 
                    <td><?php echo '$',$this->Number->format($data['monto']) ?></td> 
                   <td><?php echo h($data['detalle']) ?></td> 
                    <td><?php echo h($data['estado']) ?></td> 
                     <td><?php echo h($data['usuario_solicitante']) ?></td> 
                    <td><?php echo h($data['trans']) ?></td> 
                     


                </tr>
                <?php endforeach; ?>
                 
            </tbody>
        </table>
    </div>

</div>