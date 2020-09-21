<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agrupacione Entity
 *
 * @property int $agru_id
 * @property string|null $agru_nombre
 * @property int|null $agru_prog_id
 * @property string|null $agru_cod
 *
 * @property \App\Model\Entity\Programa $programa
 */
class Agrupacione extends Entity
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
        'agru_nombre' => true,
        'agru_prog_id' => true,
        'agru_cod' => true,
        'programa' => true,
    ];
}
