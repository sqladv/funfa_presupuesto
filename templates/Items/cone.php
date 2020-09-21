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
    <h3 class="tabla"><?= __('Detalle Solicitudes de Pago: ' )?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Programa') ?></th>
                    <th><?= __('Nombre Solicitante') ?></th>
                    <th><?= __('Item') ?></th>
                    <th><?= __('Codigo Item') ?></th>
                    <th><?= __('Monto Total') ?></th>
                    <th><?= __('Fecha Sol. Pago') ?></th>
                    <th><?= __('Estado') ?></th>
                    <th><?= __('Tipo Solicitud') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>

                    <td><?php echo $this->Number->format($data['solicitud_pago_id']) ?></td>   
                    <td><?php echo h($data['programa']) ?></td> 
                    <td><?php echo h($data['nombre']) ?></td>
                    <td><?php echo h($data['item']) ?></td> 
                    <td><?php echo h($data['cod_item']) ?></td> 
                    <td><?php echo $this->Number->format($data['monto']) ?></td> 
                    <td><?= $this->Number->format($data['fecha_solicitud_pago']) ?></td>
                    <td><?php echo h($data['estado']) ?></td> 
                    <td><?php echo h($data['tipo_solicitud']) ?></td> 
                     


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>