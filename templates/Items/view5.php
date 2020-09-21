<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $datas
 */
?>
<div class="items index content">
     <?= $this->Html->link(__('Descargar Excel'), ['action' => 'export',$id3,$id2],['class' => 'button float-right']) ?>
    <h3 class="tabla"><?= __('Ejecución Presupuestaria - Programa:'),h($id2) ?></h3>
     <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Acciones') ?></th>
                    <th><?= $this->Paginator->sort('item_cod','Cod.') ?></th>
                    <th><?= $this->Paginator->sort('item','Item') ?></th>                 
                    <th><?= $this->Paginator->sort('pres_anual','Presp. Anual') ?></th>
                    <th><?= $this->Paginator->sort('solicitado_total','Solicitado') ?></th>
                    <th><?= $this->Paginator->sort('gasto_ren_total','Gasto Rendicion') ?></th>
                    <th><?= $this->Paginator->sort('gasto_real','Gasto Ministerio') ?></th>
                    <th><?= $this->Paginator->sort('saldo_anual','Saldo Anual') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_anual','% Saldo') ?></th>
                    <th class="actions"><?= __('Estado') ?></th>
                    <th><?php
                                                               
                        if ( date('m')==1) {                                       
                                            echo $this->Paginator->sort('item_pres_enero','Presp. Enero');
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Paginator->sort('item_pres_febrero','Presp. Febrero');
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Paginator->sort('item_pres_marzo','Presp. Marzo');
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Paginator->sort('item_pres_abril','Presp. Abril');
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Paginator->sort('item_pres_mayo','Presp. Mayo');
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Paginator->sort('item_pres_junio','Presp. Junio');
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Paginator->sort('item_pres_julio','Presp. Julio');
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Paginator->sort('item_pres_agosto','Presp. Agosto');
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Paginator->sort('item_pres_septiembre','Presp. Septiembre');
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Paginator->sort('item_pres_octubre','Presp. Octubre');
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Paginator->sort('item_pres_noviembre','Presp. Noviembre');
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Paginator->sort('item_pres_diciembre','Presp. Diciembre');
                                        } 
                                    ?></th>  

                    <th><?php
                                                               
                        if ( date('m')==1) {                                       
                                            echo $this->Paginator->sort('gasto_ren_enero','Gasto Ren. Enero');
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Paginator->sort('gasto_ren_febrero','Gasto Ren. Febrero');
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Paginator->sort('gasto_ren_marzo','Gasto Ren. Marzo');
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Paginator->sort('gasto_ren_abril','Gasto Ren. Abril');
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Paginator->sort('gasto_ren_mayo','Gasto Ren. Mayo');
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Paginator->sort('gasto_ren_junio','Gasto Ren. Junio');
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Paginator->sort('gasto_ren_julio','Gasto Ren. Julio');
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Paginator->sort('gasto_ren_agosto','Gasto Ren. Agosto');
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Paginator->sort('gasto_ren_septiembre','Gasto Ren. Septiembre');
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Paginator->sort('gasto_ren_octubre','Gasto Ren. Octubre');
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Paginator->sort('gasto_ren_noviembre','Gasto Ren. Noviembre');
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Paginator->sort('gasto_ren_diciembre','Gasto Ren. Diciembre');
                                        } 
                                    ?></th>              
                    <th><?php
                                                               
                        if ( date('m')==1) {                                       
                                            echo $this->Paginator->sort('gasto_enero','Gasto Min.Enero');
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Paginator->sort('gasto_febrero','Gasto Min.Febrero');
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Paginator->sort('gasto_marzo','Gasto Min.Marzo');
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Paginator->sort('gasto_abril','Gasto Min.Abril');
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Paginator->sort('gasto_mayo','Gasto Min.Mayo');
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Paginator->sort('gasto_junio','Gasto Min.Junio');
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Paginator->sort('gasto_julio','Gasto Min.Julio');
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Paginator->sort('gasto_agosto','Gasto Min.Agosto');
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Paginator->sort('gasto_septiembre','Gasto Min.Septiembre');
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Paginator->sort('gasto_octubre','Gasto Min.Octubre');
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Paginator->sort('gasto_noviembre','Gasto Min.Noviembre');
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Paginator->sort('gasto_diciembre','Gasto Min.Diciembre');
                                        } 
                                    ?></th>
                    <th><?php
                                                               
                        if ( date('m')==1) {                                       
                                            echo $this->Paginator->sort('saldo_enero','Saldo Enero');
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Paginator->sort('saldo_febrero','Saldo Febrero');
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Paginator->sort('saldo_marzo','Saldo Marzo');
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Paginator->sort('saldo_abril','Saldo Abril');
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Paginator->sort('saldo_mayo','Saldo Mayo');
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Paginator->sort('saldo_junio','Saldo Junio');
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Paginator->sort('saldo_julio','Saldo Julio');
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Paginator->sort('saldo_agosto','Saldo Agosto');
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Paginator->sort('saldo_septiembre','Saldo Septiembre');
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Paginator->sort('saldo_octubre','Saldo Octubre');
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Paginator->sort('saldo_noviembre','Saldo Noviembre');
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Paginator->sort('saldo_diciembre','Saldo Diciembre');
                                        } 
                                    ?></th>  
                    <th><?php
                                                               
                        if ( date('m')==1) {                                       
                                            echo $this->Paginator->sort('porcentaje_enero','%Saldo Enero');
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Paginator->sort('porcentaje_febrero','%Saldo Febrero');
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Paginator->sort('porcentaje_marzo','%Saldo Marzo');
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Paginator->sort('porcentaje_abril','%Saldo Abril');
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Paginator->sort('porcentaje_mayo','%Saldo Mayo');
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Paginator->sort('porcentaje_junio','%Saldo Junio');
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Paginator->sort('porcentaje_julio','%Saldo Julio');
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Paginator->sort('porcentaje_agosto','%Saldo Agosto');
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Paginator->sort('porcentaje_septiembre','%Saldo Septiembre');
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Paginator->sort('porcentaje_octubre','%Saldo Octubre');
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Paginator->sort('porcentaje_noviembre','%Saldo Noviembre');
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Paginator->sort('porcentaje_diciembre','%Saldo Diciembre');
                                        } 
                                    ?></th>                                                                  
                    <th class="actions"><?= __('Estado Mes') ?></th>
                    <th><?= $this->Paginator->sort('presupuesto_Acumulado','Pres. Acumulado') ?></th>
                    <th><?= $this->Paginator->sort('gasto_ren_acumulado','Gasto Ren. Acumulado') ?></th>
                    <th><?= $this->Paginator->sort('gasto_Acumulado','Gasto Min. Acumulado') ?></th>
                    <th><?= $this->Paginator->sort('saldo_Acumulado','Saldo Acumulado') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_Acumulado','% Saldo Acumulado') ?></th>
                    <th class="actions"><?= __('Estado Acumulado') ?></th>
     
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data): ?>
                <tr>
                    <td class="actions">
                         <?= $this->Html->link(__('Editar'), ['action' => 'edit4', $data->item_id,$id3,$id2,$id]) ?>
                    </td>
                    <td><?= h($data->item_cod) ?></td>
                    <td><?= $this->Html->link($data->item,['action' => 'detalle', $data->item_id,$data->item,$data->item_cod]) ?></td>
                    <td><?= '$',$this->Number->format($data->pres_anual) ?></td>
                    <td><?= '$',$this->Number->format($data->solicitado_total) ?></td>
                    <td><?= '$',$this->Number->format($data->gasto_ren_total) ?></td>
                    <td><?= '$',$this->Number->format($data->gasto_real) ?></td>
                    <td><?= '$',$this->Number->format($data->saldo_anual) ?></td>
                    <td><?= $this->Number->toPercentage($data->porcentaje_anual,0) ?></td>
                    
                    <?php
                                                               
                        if ($data->porcentaje_anual>100){                                       
                              $clase='table-responsive rojo';
                            } 
                        else{
                        if ($data->porcentaje_anual==100){
                              $clase='table-responsive verde';
                            }

                        else {if ($data->porcentaje_anual>=90){
                              $clase='table-responsive amarillo';
                            } 

                            else 
                                $clase='table-responsive verde';

                        }
                            }
                         
                
                    ?>
                    <td class="<?php echo $clase?>"><li></li></td>
                     <td><?php
                                                               
                        if ( date('m')==1) {                                       
                                        echo '$',$this->Number->format($data->item_pres_enero); 
                                        } 
                        if ( date('m')==2) {                                       
                                            echo'$',$this->Number->format($data->item_pres_febrero); 
                                        } 
                        if ( date('m')==3) {                                       
                                            echo'$',$this->Number->format($data->item_pres_marzo); 
                                        }
                        if ( date('m')==4) {                                       
                                            echo'$',$this->Number->format($data->item_pres_abril); 
                                        } 
                        if ( date('m')==5) {                                       
                                            echo'$',$this->Number->format($data->item_pres_mayo); 
                                        } 
                        if ( date('m')==6) {                                       
                                            echo'$',$this->Number->format($data->item_pres_junio); 
                                        } 
                        if ( date('m')==7) {                                       
                                            echo'$',$this->Number->format($data->item_pres_julio); 
                                        } 
                        if ( date('m')==8) {                                       
                                            echo'$',$this->Number->format($data->item_pres_agosto); 
                                        }
                        if ( date('m')==9) {                                       
                                            echo'$',$this->Number->format($data->item_pres_septiembre); 
                                        } 
                        if ( date('m')==10) {                                       
                                            echo'$',$this->Number->format($data->item_pres_octubre); 
                                        }
                        if ( date('m')==11) {                                       
                                            echo'$',$this->Number->format($data->item_pres_noviembre); 
                                        }
                        if ( date('m')==12) {                                       
                                            echo'$',$this->Number->format($data->item_pres_diciembre); 
                                        } 
                                    ?></td> 
                    <td><?php
                                                               
                        if ( date('m')==1) {                                       
                                        echo '$',$this->Number->format($data->gasto_ren_enero); 
                                        } 
                        if ( date('m')==2) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_febrero); 
                                        } 
                        if ( date('m')==3) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_marzo); 
                                        }
                        if ( date('m')==4) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_abril); 
                                        } 
                        if ( date('m')==5) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_mayo); 
                                        } 
                        if ( date('m')==6) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_junio); 
                                        } 
                        if ( date('m')==7) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_julio); 
                                        } 
                        if ( date('m')==8) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_agosto); 
                                        }
                        if ( date('m')==9) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_septiembre); 
                                        } 
                        if ( date('m')==10) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_octubre); 
                                        }
                        if ( date('m')==11) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_noviembre); 
                                        }
                        if ( date('m')==12) {                                       
                                            echo'$',$this->Number->format($data->gasto_ren_diciembre); 
                                        } 
                                    ?></td>                 
                    <td><?php
                                                               
                        if ( date('m')==1) {                                       
                                        echo '$',$this->Number->format($data->gasto_enero); 
                                        } 
                        if ( date('m')==2) {                                       
                                            echo'$',$this->Number->format($data->gasto_febrero); 
                                        } 
                        if ( date('m')==3) {                                       
                                            echo'$',$this->Number->format($data->gasto_marzo); 
                                        }
                        if ( date('m')==4) {                                       
                                            echo'$',$this->Number->format($data->gasto_abril); 
                                        } 
                        if ( date('m')==5) {                                       
                                            echo'$',$this->Number->format($data->gasto_mayo); 
                                        } 
                        if ( date('m')==6) {                                       
                                            echo'$',$this->Number->format($data->gasto_junio); 
                                        } 
                        if ( date('m')==7) {                                       
                                            echo'$',$this->Number->format($data->gasto_julio); 
                                        } 
                        if ( date('m')==8) {                                       
                                            echo'$',$this->Number->format($data->gasto_agosto); 
                                        }
                        if ( date('m')==9) {                                       
                                            echo'$',$this->Number->format($data->gasto_septiembre); 
                                        } 
                        if ( date('m')==10) {                                       
                                            echo'$',$this->Number->format($data->gasto_octubre); 
                                        }
                        if ( date('m')==11) {                                       
                                            echo'$',$this->Number->format($data->gasto_noviembre); 
                                        }
                        if ( date('m')==12) {                                       
                                            echo'$',$this->Number->format($data->gasto_diciembre); 
                                        } 
                                    ?></td> 
 
                    <td><?php
                                                               
                        if ( date('m')==1) {                                       
                                        echo '$',$this->Number->format($data->saldo_enero); 
                                        } 
                        if ( date('m')==2) {                                       
                                            echo'$',$this->Number->format($data->saldo_febrero); 
                                        } 
                        if ( date('m')==3) {                                       
                                            echo'$',$this->Number->format($data->saldo_marzo); 
                                        }
                        if ( date('m')==4) {                                       
                                            echo'$',$this->Number->format($data->saldo_abril); 
                                        } 
                        if ( date('m')==5) {                                       
                                            echo'$',$this->Number->format($data->saldo_mayo); 
                                        } 
                        if ( date('m')==6) {                                       
                                            echo'$',$this->Number->format($data->saldo_junio); 
                                        } 
                        if ( date('m')==7) {                                       
                                            echo'$',$this->Number->format($data->saldo_julio); 
                                        } 
                        if ( date('m')==8) {                                       
                                            echo'$',$this->Number->format($data->saldo_agosto); 
                                        }
                        if ( date('m')==9) {                                       
                                            echo'$',$this->Number->format($data->saldo_septiembre); 
                                        } 
                        if ( date('m')==10) {                                       
                                            echo'$',$this->Number->format($data->saldo_octubre); 
                                        }
                        if ( date('m')==11) {                                       
                                            echo'$',$this->Number->format($data->saldo_noviembre); 
                                        }
                        if ( date('m')==12) {                                       
                                            echo'$',$this->Number->format($data->saldo_diciembre); 
                                        } 
                                    ?></td>  
                <td><?php
                                                               
                        if ( date('m')==1) {                                       
                                        echo $this->Number->toPercentage($data->porcentaje_enero,0); 
                                        } 
                        if ( date('m')==2) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_febrero,0); 
                                        } 
                        if ( date('m')==3) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_marzo,0); 
                                        }
                        if ( date('m')==4) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_abril,0); 
                                        } 
                        if ( date('m')==5) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_mayo,0); 
                                        } 
                        if ( date('m')==6) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_junio,0); 
                                        } 
                        if ( date('m')==7) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_julio,0); 
                                        } 
                        if ( date('m')==8) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_agosto,0); 
                                        }
                        if ( date('m')==9) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_septiembre,0); 
                                        } 
                        if ( date('m')==10) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_octubre,0); 
                                        }
                        if ( date('m')==11) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_noviembre,0); 
                                        }
                        if ( date('m')==12) {                                       
                                            echo $this->Number->toPercentage($data->porcentaje_diciembre,0); 
                                        } 
                                    ?></td> 
                    <?php
                         if ( date('m')==1) {                                       
                                        if ($data->porcentaje_enero>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_enero==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_enero>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==2) {                                       
                                            if ($data->porcentaje_febrero>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_febrero==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_febrero>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==3) {                                       
                                            if ($data->porcentaje_marzo>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_marzo==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_marzo>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        }
                        if ( date('m')==4) {                                       
                                            if ($data->porcentaje_abril>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_abril==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_abril>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==5) {                                       
                                            if ($data->porcentaje_mayo>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_mayo==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_mayo>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==6) {                                       
                                            if ($data->porcentaje_junio>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_junio==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_junio>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==7) {                                       
                                            if ($data->porcentaje_julio>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_julio==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_julio>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==8) {                                       
                                            if ($data->porcentaje_agosto>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_agosto==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_agosto>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        }
                        if ( date('m')==9) {                                       
                                            if ($data->porcentaje_septiembre>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_septiembre==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_septiembre>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        } 
                        if ( date('m')==10) {                                       
                                            if ($data->porcentaje_octubre>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_octubre==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_octubre>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        }
                        if ( date('m')==11) {                                       
                                            if ($data->porcentaje_noviembre>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_noviembre==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_noviembre>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        }
                        if ( date('m')==12) {                                       
                                            if ($data->porcentaje_diciembre>100) {                                       
                              $clase='table-responsive rojo';
                            } 
                        else{    
                        if ($data->porcentaje_diciembre==100){
                              $clase='table-responsive verde';
                            }
                        else {if ($data->porcentaje_diciembre>=90){
                              $clase='table-responsive amarillo';
                            } 
                            else 
                                $clase='table-responsive verde';

                          }
                        }
                                        }                                       
     

                    ?>
                    <td class="<?php echo $clase?>"><li></li></td>
                    <td><?=  '$',$this->Number->format($data->presupuesto_acumulado) ?></td>
                    <td><?=  '$',$this->Number->format($data->gasto_ren_acumulado) ?></td>
                    <td><?=  '$',$this->Number->format($data->gasto_acumulado) ?></td>
                    <td><?=  '$',$this->Number->format($data->saldo_acumulado) ?></td>
                    <td><?=  $this->Number->toPercentage($data->porcentaje_acumulado,0) ?></td>
                     <?php
                                                               
                        if ($data->porcentaje_acumulado>100){                                       
                              $clase='table-responsive rojo';
                            } 
                        else{
                        if ($data->porcentaje_acumulado==100){
                              $clase='table-responsive verde';
                            }

                        else {if ($data->porcentaje_acumulado>=90){
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
