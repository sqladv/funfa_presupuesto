<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MesDet Entity
 *
 * @property int|null $item_id
 * @property string|null $mes_nombre
 * @property int|null $presupuesto_mensual
 * @property int|null $gasto_mesnual
 * @property int|null $saldo_mensual
 * @property int|null $porcentaje_mes
 * @property string|null $estado_mes
 * @property int|null $solicitado_mes
 * @property int|null $gasto_ren_mes
 * @property int|null $mes_id
 *
 * @property \App\Model\Entity\Item $item
 */
class MesDet extends Entity
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
        'item_id' => true,
        'mes_nombre' => true,
        'presupuesto_mensual' => true,
        'gasto_mesnual' => true,
        'saldo_mensual' => true,
        'porcentaje_mes' => true,
        'estado_mes' => true,
        'solicitado_mes' => true,
        'gasto_ren_mes' => true,
        'mes_id' => true,
        'item' => true,
    ];
}
