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
                    <th><?= __('Gasto mes') ?></th>
 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $results): ?>
                <tr>

                    <td><?php echo ($x=$x+1),('- '),$this->Number->format($results['gasto_mes']) ?></td>   
      

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>