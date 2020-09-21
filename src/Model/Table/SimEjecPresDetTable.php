<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimEjecPresDet Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\SimEjecPresDet get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimEjecPresDet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimEjecPresDet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPresDet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimEjecPresDet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimEjecPresDet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPresDet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPresDet findOrCreate($search, callable $callback = null, $options = [])
 */
class SimEjecPresDetTable extends Table
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

        $this->setTable('sim_ejec_pres_det');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
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
            ->scalar('mes_nombre')
            ->maxLength('mes_nombre', 255)
            ->allowEmptyString('mes_nombre');

        $validator
            ->allowEmptyString('presupuesto_mensual');

        $validator
            ->allowEmptyString('gasto_mesnual');

        $validator
            ->allowEmptyString('saldo_mensual');

        $validator
            ->allowEmptyString('porcentaje_mes');

        $validator
            ->scalar('estado_mes')
            ->allowEmptyString('estado_mes');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
