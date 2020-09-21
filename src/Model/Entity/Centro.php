<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Centro Entity
 *
 * @property int $cent_id
 * @property string|null $cent_nombre
 * @property int|null $cent_prog_id
 * @property string|null $cent_gest
 *
 * @property \App\Model\Entity\Programa $programa
 */
class Centro extends Entity
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
        'cent_nombre' => true,
        'cent_prog_id' => true,
        'cent_gest' => true,
        'programa' => true,
    ];
}
