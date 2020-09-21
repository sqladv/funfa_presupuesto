<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgruPre Entity
 *
 * @property string|null $agru_cod
 * @property int|null $prog_id
 * @property string|null $presupuesto_total
 * @property string|null $gasto_total
 * @property string|null $saldo_total
 * @property float|null $porcentaje_total
 * @property string|null $estado_total
 * @property string|null $agru_nombre
 * @property string|null $presupuesto_enero
 * @property string|null $gasto_enero
 * @property string|null $saldo_enero
 * @property float|null $porcentaje_enero
 * @property string|null $estado_enero
 * @property string|null $presupuesto_febrero
 * @property string|null $gasto_febrero
 * @property string|null $saldo_febrero
 * @property float|null $porcentaje_febrero
 * @property string|null $estado_febrero
 * @property string|null $presupuesto_marzo
 * @property string|null $gasto_marzo
 * @property string|null $saldo_marzo
 * @property float|null $porcentaje_marzo
 * @property string|null $estado_marzo
 * @property string|null $presupuesto_abril
 * @property string|null $gasto_abril
 * @property string|null $saldo_abril
 * @property float|null $porcentaje_abril
 * @property string|null $estado_abril
 * @property string|null $presupuesto_mayo
 * @property string|null $gasto_mayo
 * @property string|null $saldo_mayo
 * @property float|null $porcentaje_mayo
 * @property string|null $estado_mayo
 * @property string|null $presupuesto_junio
 * @property string|null $gasto_junio
 * @property string|null $saldo_junio
 * @property float|null $porcentaje_junio
 * @property string|null $estado_junio
 * @property string|null $presupuesto_julio
 * @property string|null $gasto_julio
 * @property string|null $saldo_julio
 * @property float|null $porcentaje_julio
 * @property string|null $estado_julio
 * @property string|null $presupuesto_agosto
 * @property string|null $gasto_agosto
 * @property string|null $saldo_agosto
 * @property float|null $porcentaje_agosto
 * @property string|null $estado_agosto
 * @property string|null $presupuesto_septiembre
 * @property string|null $gasto_septiembre
 * @property string|null $saldo_septiembre
 * @property float|null $porcentaje_septiembre
 * @property string|null $estado_septiembre
 * @property string|null $presupuesto_octubre
 * @property string|null $gasto_octubre
 * @property string|null $saldo_octubre
 * @property float|null $porcentaje_octubre
 * @property string|null $estado_octubre
 * @property string|null $presupuesto_noviembre
 * @property string|null $gasto_noviembre
 * @property string|null $saldo_noviembre
 * @property float|null $porcentaje_noviembre
 * @property string|null $estado_noviembre
 * @property string|null $presupuesto_diciembre
 * @property string|null $gasto_diciembre
 * @property string|null $saldo_diciembre
 * @property float|null $porcentaje_diciembre
 * @property string|null $estado_diciembre
 * @property string|null $presupuesto_acumulado
 * @property string|null $gasto_acumulado
 * @property string|null $saldo_acumulado
 * @property float|null $porcentaje_acumulado
 * @property string|null $solicitado_total
 * @property string|null $solicitado_enero
 * @property string|null $solicitado_febrero
 * @property string|null $solicitado_marzo
 * @property string|null $solicitado_abril
 * @property string|null $solicitado_mayo
 * @property string|null $solicitado_junio
 * @property string|null $solicitado_julio
 * @property string|null $solicitado_agosto
 * @property string|null $solicitado_septiembre
 * @property string|null $solicitado_octubre
 * @property string|null $solicitado_noviembre
 * @property string|null $solicitado_diciembre
 * @property string|null $gasto_ren_total
 * @property string|null $gasto_ren_enero
 * @property string|null $gasto_ren_febrero
 * @property string|null $gasto_ren_marzo
 * @property string|null $gasto_ren_abril
 * @property string|null $gasto_ren_mayo
 * @property string|null $gasto_ren_junio
 * @property string|null $gasto_ren_julio
 * @property string|null $gasto_ren_agosto
 * @property string|null $gasto_ren_septiembre
 * @property string|null $gasto_ren_octubre
 * @property string|null $gasto_ren_noviembre
 * @property string|null $gasto_ren_diciembre
 * @property string|null $gasto_ren_acumulado
 *
 * @property \App\Model\Entity\Prog $prog
 */
class AgruPre extends Entity
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
        'agru_cod' => true,
        'prog_id' => true,
        'presupuesto_total' => true,
        'gasto_total' => true,
        'saldo_total' => true,
        'porcentaje_total' => true,
        'estado_total' => true,
        'agru_nombre' => true,
        'presupuesto_enero' => true,
        'gasto_enero' => true,
        'saldo_enero' => true,
        'porcentaje_enero' => true,
        'estado_enero' => true,
        'presupuesto_febrero' => true,
        'gasto_febrero' => true,
        'saldo_febrero' => true,
        'porcentaje_febrero' => true,
        'estado_febrero' => true,
        'presupuesto_marzo' => true,
        'gasto_marzo' => true,
        'saldo_marzo' => true,
        'porcentaje_marzo' => true,
        'estado_marzo' => true,
        'presupuesto_abril' => true,
        'gasto_abril' => true,
        'saldo_abril' => true,
        'porcentaje_abril' => true,
        'estado_abril' => true,
        'presupuesto_mayo' => true,
        'gasto_mayo' => true,
        'saldo_mayo' => true,
        'porcentaje_mayo' => true,
        'estado_mayo' => true,
        'presupuesto_junio' => true,
        'gasto_junio' => true,
        'saldo_junio' => true,
        'porcentaje_junio' => true,
        'estado_junio' => true,
        'presupuesto_julio' => true,
        'gasto_julio' => true,
        'saldo_julio' => true,
        'porcentaje_julio' => true,
        'estado_julio' => true,
        'presupuesto_agosto' => true,
        'gasto_agosto' => true,
        'saldo_agosto' => true,
        'porcentaje_agosto' => true,
        'estado_agosto' => true,
        'presupuesto_septiembre' => true,
        'gasto_septiembre' => true,
        'saldo_septiembre' => true,
        'porcentaje_septiembre' => true,
        'estado_septiembre' => true,
        'presupuesto_octubre' => true,
        'gasto_octubre' => true,
        'saldo_octubre' => true,
        'porcentaje_octubre' => true,
        'estado_octubre' => true,
        'presupuesto_noviembre' => true,
        'gasto_noviembre' => true,
        'saldo_noviembre' => true,
        'porcentaje_noviembre' => true,
        'estado_noviembre' => true,
        'presupuesto_diciembre' => true,
        'gasto_diciembre' => true,
        'saldo_diciembre' => true,
        'porcentaje_diciembre' => true,
        'estado_diciembre' => true,
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
