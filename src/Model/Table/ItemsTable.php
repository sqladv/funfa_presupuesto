<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\AgrupacionesTable&\Cake\ORM\Association\BelongsTo $Agrupaciones
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('item_id');
        $this->setPrimaryKey('item_id');

        $this->belongsTo('Agrupaciones', [
            'foreignKey' => 'item_agru_id',
        ]);
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
            ->integer('item_id')
            ->allowEmptyString('item_id', null, 'create');

        $validator
            ->scalar('item_nombre')
            ->maxLength('item_nombre', 255)
            ->allowEmptyString('item_nombre');

        $validator
            ->allowEmptyString('item_pres_total');

        $validator
            ->allowEmptyString('item_pres_gasto');

        $validator
            ->allowEmptyString('item_pres_enero');

        $validator
            ->allowEmptyString('item_pres_febrero');

        $validator
            ->allowEmptyString('item_pres_marzo');

        $validator
            ->allowEmptyString('item_pres_abril');

        $validator
            ->allowEmptyString('item_pres_mayo');

        $validator
            ->allowEmptyString('item_pres_junio');

        $validator
            ->allowEmptyString('item_pres_julio');

        $validator
            ->allowEmptyString('item_pres_agosto');

        $validator
            ->allowEmptyString('item_pres_septiembre');

        $validator
            ->allowEmptyString('item_pres_octubre');

        $validator
            ->allowEmptyString('item_pres_noviembre');

        $validator
            ->allowEmptyString('item_pres_diciembre');

        $validator
            ->scalar('item_pres_año')
            ->maxLength('item_pres_año', 255)
            ->allowEmptyString('item_pres_año');

        $validator
            ->scalar('item_cod')
            ->maxLength('item_cod', 255)
            ->allowEmptyString('item_cod');

        $validator
            ->allowEmptyString('gasto_enero');

        $validator
            ->allowEmptyString('gasto_febrero');

        $validator
            ->allowEmptyString('gasto_marzo');

        $validator
            ->allowEmptyString('gasto_abril');

        $validator
            ->allowEmptyString('gasto_mayo');

        $validator
            ->allowEmptyString('gasto_junio');

        $validator
            ->allowEmptyString('gasto_julio');

        $validator
            ->allowEmptyString('gasto_agosto');

        $validator
            ->allowEmptyString('gasto_septiembre');

        $validator
            ->allowEmptyString('gasto_octubre');

        $validator
            ->allowEmptyString('gasto_noviembre');

        $validator
            ->allowEmptyString('gasto_diciembre');

        $validator
            ->allowEmptyString('sim_total');

        $validator
            ->allowEmptyString('sim_enero');

        $validator
            ->allowEmptyString('sim_febrero');

        $validator
            ->allowEmptyString('sim_marzo');

        $validator
            ->allowEmptyString('sim_abril');

        $validator
            ->allowEmptyString('sim_mayo');

        $validator
            ->allowEmptyString('sim_junio');

        $validator
            ->allowEmptyString('sim_julio');

        $validator
            ->allowEmptyString('sim_agosto');

        $validator
            ->allowEmptyString('sim_septiembre');

        $validator
            ->allowEmptyString('sim_octubre');

        $validator
            ->allowEmptyString('sim_noviembre');

        $validator
            ->allowEmptyString('sim_diciembre');

        $validator
            ->allowEmptyString('solicitado_total');

        $validator
            ->allowEmptyString('solicitado_enero');

        $validator
            ->allowEmptyString('solicitado_febrero');

        $validator
            ->allowEmptyString('solicitado_marzo');

        $validator
            ->allowEmptyString('solicitado_abril');

        $validator
            ->allowEmptyString('solicitado_mayo');

        $validator
            ->allowEmptyString('solicitado_junio');

        $validator
            ->allowEmptyString('solicitado_julio');

        $validator
            ->allowEmptyString('solicitado_agosto');

        $validator
            ->allowEmptyString('solicitado_septiembre');

        $validator
            ->allowEmptyString('solicitado_octubre');

        $validator
            ->allowEmptyString('solicitado_noviembre');

        $validator
            ->allowEmptyString('solicitado_diciembre');

        $validator
            ->allowEmptyString('gasto_ren_total');

        $validator
            ->allowEmptyString('gasto_ren_enero');

        $validator
            ->allowEmptyString('gasto_ren_febrero');

        $validator
            ->allowEmptyString('gasto_ren_marzo');

        $validator
            ->allowEmptyString('gasto_ren_abril');

        $validator
            ->allowEmptyString('gasto_ren_mayo');

        $validator
            ->allowEmptyString('gasto_ren_junio');

        $validator
            ->allowEmptyString('gasto_ren_julio');

        $validator
            ->allowEmptyString('gasto_ren_agosto');

        $validator
            ->allowEmptyString('gasto_ren_septiembre');

        $validator
            ->allowEmptyString('gasto_ren_octubre');

        $validator
            ->allowEmptyString('gasto_ren_noviembre');

        $validator
            ->allowEmptyString('gasto_ren_diciembre');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['item_agru_id'], 'Agrupaciones'));

        return $rules;
    }
}
