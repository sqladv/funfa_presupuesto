<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SimEjecPre Entity
 *
 * @property string|null $agrupacion
 * @property string|null $agru_cod
 * @property string|null $item_cod
 * @property string|null $item_pres_año
 * @property int|null $pres_anual
 * @property int|null $gasto_real
 * @property int|null $saldo_anual
 * @property int|null $porcentaje_anual
 * @property string|null $estado_anual
 * @property int|null $sim_enero
 * @property int|null $gasto_enero
 * @property int|null $saldo_enero
 * @property int|null $porcentaje_enero
 * @property string|null $estado_enero
 * @property int|null $sim_febrero
 * @property int|null $gasto_febrero
 * @property int|null $saldo_febrero
 * @property int|null $porcentaje_febrero
 * @property string|null $estado_febrero
 * @property int|null $sim_marzo
 * @property int|null $gasto_marzo
 * @property int|null $saldo_marzo
 * @property int|null $porcentaje_marzo
 * @property string|null $estado_marzo
 * @property int|null $sim_abril
 * @property int|null $gasto_abril
 * @property int|null $saldo_abril
 * @property int|null $porcentaje_abril
 * @property string|null $estado_abril
 * @property int|null $sim_mayo
 * @property int|null $gasto_mayo
 * @property int|null $saldo_mayo
 * @property int|null $porcentaje_mayo
 * @property string|null $estado_mayo
 * @property int|null $sim_junio
 * @property int|null $gasto_junio
 * @property int|null $saldo_junio
 * @property int|null $porcentaje_junio
 * @property string|null $estado_junio
 * @property int|null $sim_julio
 * @property int|null $gasto_julio
 * @property int|null $saldo_julio
 * @property int|null $porcentaje_julio
 * @property string|null $estado_julio
 * @property int|null $sim_agosto
 * @property int|null $gasto_agosto
 * @property int|null $saldo_agosto
 * @property int|null $porcentaje_agosto
 * @property string|null $estado_agosto
 * @property int|null $sim_septiembre
 * @property int|null $gasto_septiembre
 * @property int|null $saldo_septiembre
 * @property int|null $porcentaje_septiembre
 * @property string|null $estado_septiembre
 * @property int|null $sim_octubre
 * @property int|null $gasto_octubre
 * @property int|null $saldo_octubre
 * @property int|null $porcentaje_octubre
 * @property string|null $estado_octubre
 * @property int|null $sim_noviembre
 * @property int|null $gasto_noviembre
 * @property int|null $saldo_noviembre
 * @property int|null $porcentaje_noviembre
 * @property string|null $estado_noviembre
 * @property int|null $sim_diciembre
 * @property int|null $gasto_diciembre
 * @property int|null $saldo_diciembre
 * @property int|null $porcentaje_diciembre
 * @property string|null $estado_diciembre
 * @property int|null $item_id
 * @property int|null $prog_id
 * @property string|null $presupuesto_acumulado
 * @property string|null $gasto_acumulado
 * @property string|null $saldo_acumulado
 * @property float|null $porcentaje_acumulado
 * @property int|null $solicitado_total
 * @property int|null $solicitado_enero
 * @property int|null $solicitado_febrero
 * @property int|null $solicitado_marzo
 * @property int|null $solicitado_abril
 * @property int|null $solicitado_mayo
 * @property int|null $solicitado_junio
 * @property int|null $solicitado_julio
 * @property int|null $solicitado_agosto
 * @property int|null $solicitado_septiembre
 * @property int|null $solicitado_octubre
 * @property int|null $solicitado_noviembre
 * @property int|null $solicitado_diciembre
 * @property int|null $gasto_ren_total
 * @property int|null $gasto_ren_enero
 * @property int|null $gasto_ren_febrero
 * @property int|null $gasto_ren_marzo
 * @property int|null $gasto_ren_abril
 * @property int|null $gasto_ren_mayo
 * @property int|null $gasto_ren_junio
 * @property int|null $gasto_ren_julio
 * @property int|null $gasto_ren_agosto
 * @property int|null $gasto_ren_septiembre
 * @property int|null $gasto_ren_octubre
 * @property int|null $gasto_ren_noviembre
 * @property int|null $gasto_ren_diciembre
 * @property string|null $gasto_ren_acumulado
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Prog $prog
 */
class SimEjecPre extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'agrupacion' => true,
        'agru_cod' => true,
        'item' => true,
        'item_cod' => true,
        'item_pres_año' => true,
        'pres_anual' => true,
        'gasto_real' => true,
        'saldo_anual' => true,
        'porcentaje_anual' => true,
        'estado_anual' => true,
        'sim_enero' => true,
        'gasto_enero' => true,
        'saldo_enero' => true,
        'porcentaje_enero' => true,
        'estado_enero' => true,
        'sim_febrero' => true,
        'gasto_febrero' => true,
        'saldo_febrero' => true,
        'porcentaje_febrero' => true,
        'estado_febrero' => true,
        'sim_marzo' => true,
        'gasto_marzo' => true,
        'saldo_marzo' => true,
        'porcentaje_marzo' => true,
        'estado_marzo' => true,
        'sim_abril' => true,
        'gasto_abril' => true,
        'saldo_abril' => true,
        'porcentaje_abril' => true,
        'estado_abril' => true,
        'sim_mayo' => true,
        'gasto_mayo' => true,
        'saldo_mayo' => true,
        'porcentaje_mayo' => true,
        'estado_mayo' => true,
        'sim_junio' => true,
        'gasto_junio' => true,
        'saldo_junio' => true,
        'porcentaje_junio' => true,
        'estado_junio' => true,
        'sim_julio' => true,
        'gasto_julio' => true,
        'saldo_julio' => true,
        'porcentaje_julio' => true,
        'estado_julio' => true,
        'sim_agosto' => true,
        'gasto_agosto' => true,
        'saldo_agosto' => true,
        'porcentaje_agosto' => true,
        'estado_agosto' => true,
        'sim_septiembre' => true,
        'gasto_septiembre' => true,
        'saldo_septiembre' => true,
        'porcentaje_septiembre' => true,
        'estado_septiembre' => true,
        'sim_octubre' => true,
        'gasto_octubre' => true,
        'saldo_octubre' => true,
        'porcentaje_octubre' => true,
        'estado_octubre' => true,
        'sim_noviembre' => true,
        'gasto_noviembre' => true,
        'saldo_noviembre' => true,
        'porcentaje_noviembre' => true,
        'estado_noviembre' => true,
        'sim_diciembre' => true,
        'gasto_diciembre' => true,
        'saldo_diciembre' => true,
        'porcentaje_diciembre' => true,
        'estado_diciembre' => true,
        'item_id' => true,
        'prog_id' => true,
        'presupuesto_acumulado' => true,
        'gasto_acumulado' => true,
        'saldo_acumulado' => true,
        'porcentaje_acumulado' => true,
        'solicitado_total' => true,
        'solicitado_enero' => true,
        'solicitado_febrero' => true,
        'solicitado_marzo' => true,
        'solicitado_abril' => true,
        'solicitado_mayo' => true,
        'solicitado_junio' => true,
        'solicitado_julio' => true,
        'solicitado_agosto' => true,
        'solicitado_septiembre' => true,
        'solicitado_octubre' => true,
        'solicitado_noviembre' => true,
        'solicitado_diciembre' => true,
        'gasto_ren_total' => true,
        'gasto_ren_enero' => true,
        'gasto_ren_febrero' => true,
        'gasto_ren_marzo' => true,
        'gasto_ren_abril' => true,
        'gasto_ren_mayo' => true,
        'gasto_ren_junio' => true,
        'gasto_ren_julio' => true,
        'gasto_ren_agosto' => true,
        'gasto_ren_septiembre' => true,
        'gasto_ren_octubre' => true,
        'gasto_ren_noviembre' => true,
        'gasto_ren_diciembre' => true,
        'gasto_ren_acumulado' => true,
        'prog' => true,
    ];
}
