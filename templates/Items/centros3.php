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
    <h3 class="tabla"><?= __(' Mes: '),h($id5) ?></h3>
    <h3 class="tabla"><?= __('Centro Primario: ' ),h($id)?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Monto') ?></th>
                    <th><?= __('Tipo Solicitud') ?></th>
                    <th><?= __('Forma de Pago') ?></th>
                    <th><?= __('Justificacion') ?></th>                 
                    <th><?= __('Solicitante') ?></th>
    
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    <td><?php echo h($data['t']) ?></td>
                    <td><?php echo '$',$this->Number->format($data['monto']) ?></td> 
                   <td><?php echo h($data['tipo']) ?></td> 
                    <td><?php echo h($data['descripcion']) ?></td> 
                     <td><?php echo h($data['justificacion']) ?></td> 
                    <td><?php echo h($data['name']) ?></td> 
                     


                </tr>
                <?php endforeach; ?>
                 
            </tbody>
        </table>
    </div>

</div>