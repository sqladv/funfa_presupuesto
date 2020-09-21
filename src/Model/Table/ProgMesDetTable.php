<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgMesDet Model
 *
 * @property \App\Model\Table\ProgsTable&\Cake\ORM\Association\BelongsTo $Progs
 *
 * @method \App\Model\Entity\ProgMesDet get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProgMesDet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProgMesDet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProgMesDet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProgMesDet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProgMesDet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProgMesDet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProgMesDet findOrCreate($search, callable $callback = null, $options = [])
 */
class ProgMesDetTable extends Table
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

        $this->setTable('prog_mes_det');

        $this->belongsTo('Progs', [
            'foreignKey' => 'prog_id',
        ]);
        $this->belongsTo('Mes', [
            'foreignKey' => 'mes_id',
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
            ->decimal('presupuesto_mensual')
            ->allowEmptyString('presupuesto_mensual');

        $validator
            ->decimal('gasto_mesnual')
            ->allowEmptyString('gasto_mesnual');

        $validator
            ->decimal('saldo_mensual')
            ->allowEmptyString('saldo_mensual');

        $validator
            ->numeric('porcentaje_mes')
            ->allowEmptyString('porcentaje_mes');

        $validator
            ->scalar('estado_mes')
            ->allowEmptyString('estado_mes');

        $validator
            ->decimal('solicitado_mes')
            ->allowEmptyString('solicitado_mes');

        $validator
            ->decimal('gasto_ren_mes')
            ->allowEmptyString('gasto_ren_mes');

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
        $rules->add($rules->existsIn(['prog_id'], 'Progs'));
        $rules->add($rules->existsIn(['mes_id'], 'Mes'));

        return $rules;
    }
}
