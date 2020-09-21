<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Programa Entity
 *
 * @property int $prog_id
 * @property string|null $prog_nombre
 * @property int|null $sim_total
 * @property int|null $sim_enero
 * @property int|null $sim_febrero
 * @property int|null $sim_marzo
 * @property int|null $sim_abril
 * @property int|null $sim_mayo
 * @property int|null $sim_junio
 * @property int|null $sim_julio
 * @property int|null $sim_agosto
 * @property int|null $sim_septiembre
 * @property int|null $sim_octubre
 * @property int|null $sim_noviembre
 * @property int|null $sim_diciembre
 */
class Programa extends Entity
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
        'prog_nombre' => true,
        'sim_total' => true,
        'sim_enero' => true,
        'sim_febrero' => true,
        'sim_marzo' => true,
        'sim_abril' => true,
        'sim_mayo' => true,
        'sim_junio' => true,
        'sim_julio' => true,
        'sim_agosto' => true,
        'sim_septiembre' => true,
        'sim_octubre' => true,
        'sim_noviembre' => true,
        'sim_diciembre' => true,
    ];
}
