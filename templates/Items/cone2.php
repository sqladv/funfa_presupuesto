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
    <h3 class="tabla"><?= __('Detalle Solicitudes de Fondo: ' )?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Programa') ?></th>
                    <th><?= __('Nombre Solicitante') ?></th>
                    <th><?= __('Codigo Item') ?></th>
                    <th><?= __('Item') ?></th>
                    <th><?= __('Monto') ?></th>
                    <th><?= __('Fecha Transferencia') ?></th>
                    <th><?= __('Fecha Solicitud') ?></th>
                     <th><?= __('Estado') ?></th>
                    <th><?= __('Descripcion') ?></th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>

                    <td><?php echo ($x=$x+1),('- '),$this->Number->format($data['solicitud_fondo_id']) ?></td>   
                    <td><?php echo h($data['programa']) ?></td> 
                    <td><?php echo h($data['usuario_solicitante']) ?></td> 
                    <td><?php echo h($data['codigo']) ?></td> 
                    <td><?php echo h($data['descripcion']) ?></td> 
                    <td><?php echo $this->Number->format($data['monto']) ?></td> 
                    <td><?php echo $this->Number->format($data['fecha_trans']) ?></td> 
                    <td><?= $this->Time->format($data['fecha_solicitud'], 'dd-MM-YYYY') ?></td>
                     <td><?php echo h($data['estado']) ?></td> 
                    <td><?php echo h($data['descripcion_labor']) ?></td> 
                    
                    
         


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>