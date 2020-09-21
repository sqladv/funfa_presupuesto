<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detalles Model
 *
 * @method \App\Model\Entity\Detalle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detalle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Detalle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detalle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detalle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detalle findOrCreate($search, callable $callback = null, $options = [])
 */
class DetallesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('detalles');
        $this->setDisplayField('det_id');
        $this->setPrimaryKey('det_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('det_tip_gasto')
            ->allowEmptyString('det_tip_gasto');

        $validator
            ->scalar('det_item')
            ->allowEmptyString('det_item');

        $validator
            ->scalar('det_tip_comp')
            ->allowEmptyString('det_tip_comp');

        $validator
            ->scalar('det_num_comp')
            ->allowEmptyString('det_num_comp');

        $validator
            ->date('det_fecha_comp')
            ->allowEmptyDate('det_fecha_comp');

        $validator
            ->allowEmptyString('det_num_docu');

        $validator
            ->scalar('det_tip_doc')
            ->allowEmptyString('det_tip_doc');

        $validator
            ->scalar('det_prov')
            ->allowEmptyString('det_prov');

        $validator
            ->scalar('det_rut')
            ->allowEmptyString('det_rut');

        $validator
            ->scalar('det_labor')
            ->allowEmptyString('det_labor');

        $validator
            ->scalar('det_forma_pago')
            ->allowEmptyString('det_forma_pago');

        $validator
            ->allowEmptyString('det_monto');

        $validator
            ->scalar('det_mes')
            ->allowEmptyString('det_mes');

        $validator
            ->scalar('det_centro')
            ->allowEmptyString('det_centro');

        $validator
            ->allowEmptyString('det_id', null, 'create');

        return $validator;
    }
}
