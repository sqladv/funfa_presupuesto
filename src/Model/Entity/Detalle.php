<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detalle Entity
 *
 * @property string|null $det_tip_gasto
 * @property string|null $det_item
 * @property string|null $det_tip_comp
 * @property string|null $det_num_comp
 * @property \Cake\I18n\FrozenDate|null $det_fecha_comp
 * @property int|null $det_num_docu
 * @property string|null $det_tip_doc
 * @property string|null $det_prov
 * @property string|null $det_rut
 * @property string|null $det_labor
 * @property string|null $det_forma_pago
 * @property int|null $det_monto
 * @property string|null $det_mes
 * @property string|null $det_centro
 * @property int $det_id
 */
class Detalle extends Entity
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
        'det_tip_gasto' => true,
        'det_item' => true,
        'det_tip_comp' => true,
        'det_num_comp' => true,
        'det_fecha_comp' => true,
        'det_num_docu' => true,
        'det_tip_doc' => true,
        'det_prov' => true,
        'det_rut' => true,
        'det_labor' => true,
        'det_forma_pago' => true,
        'det_monto' => true,
        'det_mes' => true,
        'det_centro' => true,
    ];
}
