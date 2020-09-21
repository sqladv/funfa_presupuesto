<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $item_id
 * @property int|null $item_agru_id
 * @property string|null $item_nombre
 * @property int|null $item_pres_total
 * @property int|null $item_pres_gasto
 * @property int|null $item_pres_enero
 * @property int|null $item_pres_febrero
 * @property int|null $item_pres_marzo
 * @property int|null $item_pres_abril
 * @property int|null $item_pres_mayo
 * @property int|null $item_pres_junio
 * @property int|null $item_pres_julio
 * @property int|null $item_pres_agosto
 * @property int|null $item_pres_septiembre
 * @property int|null $item_pres_octubre
 * @property int|null $item_pres_noviembre
 * @property int|null $item_pres_diciembre
 * @property string|null $item_pres_año
 * @property string|null $item_cod
 * @property int|null $gasto_enero
 * @property int|null $gasto_febrero
 * @property int|null $gasto_marzo
 * @property int|null $gasto_abril
 * @property int|null $gasto_mayo
 * @property int|null $gasto_junio
 * @property int|null $gasto_julio
 * @property int|null $gasto_agosto
 * @property int|null $gasto_septiembre
 * @property int|null $gasto_octubre
 * @property int|null $gasto_noviembre
 * @property int|null $gasto_diciembre
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
 *
 * @property \App\Model\Entity\Agrupacione $agrupacione
 */
class Item extends Entity
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
        'item_agru_id' => true,
        'item_nombre' => true,
        'item_pres_total' => true,
        'item_pres_gasto' => true,
        'item_pres_enero' => true,
        'item_pres_febrero' => true,
        'item_pres_marzo' => true,
        'item_pres_abril' => true,
        'item_pres_mayo' => true,
        'item_pres_junio' => true,
        'item_pres_julio' => true,
        'item_pres_agosto' => true,
        'item_pres_septiembre' => true,
        'item_pres_octubre' => true,
        'item_pres_noviembre' => true,
        'item_pres_diciembre' => true,
        'item_pres_año' => true,
        'item_cod' => true,
        'gasto_enero' => true,
        'gasto_febrero' => true,
        'gasto_marzo' => true,
        'gasto_abril' => true,
        'gasto_mayo' => true,
        'gasto_junio' => true,
        'gasto_julio' => true,
        'gasto_agosto' => true,
        'gasto_septiembre' => true,
        'gasto_octubre' => true,
        'gasto_noviembre' => true,
        'gasto_diciembre' => true,
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
        'agrupacione' => true,
    ];
}
