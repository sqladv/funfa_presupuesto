<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimPresProg Model
 *
 * @property \App\Model\Table\ProgsTable&\Cake\ORM\Association\BelongsTo $Progs
 *
 * @method \App\Model\Entity\SimPresProg get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimPresProg newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimPresProg[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimPresProg|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimPresProg saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimPresProg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimPresProg[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimPresProg findOrCreate($search, callable $callback = null, $options = [])
 */
class SimPresProgTable extends Table
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

        $this->setTable('sim_pres_prog');

        $this->belongsTo('Progs', [
            'foreignKey' => 'prog_id',
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
            ->decimal('presupuesto_total')
            ->allowEmptyString('presupuesto_total');

        $validator
            ->decimal('gasto_total')
            ->allowEmptyString('gasto_total');

        $validator
            ->decimal('saldo_total')
            ->allowEmptyString('saldo_total');

        $validator
            ->numeric('porcentaje_total')
            ->allowEmptyString('porcentaje_total');

        $validator
            ->scalar('estado_total')
            ->allowEmptyString('estado_total');

        $validator
            ->scalar('prog_nombre')
            ->maxLength('prog_nombre', 255)
            ->allowEmptyString('prog_nombre');

        $validator
            ->decimal('presupuesto_enero')
            ->allowEmptyString('presupuesto_enero');

        $validator
            ->decimal('gasto_enero')
            ->allowEmptyString('gasto_enero');

        $validator
            ->decimal('saldo_enero')
            ->allowEmptyString('saldo_enero');

        $validator
            ->numeric('porcentaje_enero')
            ->allowEmptyString('porcentaje_enero');

        $validator
            ->scalar('estado_enero')
            ->allowEmptyString('estado_enero');

        $validator
            ->decimal('presupuesto_febrero')
            ->allowEmptyString('presupuesto_febrero');

        $validator
            ->decimal('gasto_febrero')
            ->allowEmptyString('gasto_febrero');

        $validator
            ->decimal('saldo_febrero')
            ->allowEmptyString('saldo_febrero');

        $validator
            ->numeric('porcentaje_febrero')
            ->allowEmptyString('porcentaje_febrero');

        $validator
            ->scalar('estado_febrero')
            ->allowEmptyString('estado_febrero');

        $validator
            ->decimal('presupuesto_marzo')
            ->allowEmptyString('presupuesto_marzo');

        $validator
            ->decimal('gasto_marzo')
            ->allowEmptyString('gasto_marzo');

        $validator
            ->decimal('saldo_marzo')
            ->allowEmptyString('saldo_marzo');

        $validator
            ->numeric('porcentaje_marzo')
            ->allowEmptyString('porcentaje_marzo');

        $validator
            ->scalar('estado_marzo')
            ->allowEmptyString('estado_marzo');

        $validator
            ->decimal('presupuesto_abril')
            ->allowEmptyString('presupuesto_abril');

        $validator
            ->decimal('gasto_abril')
            ->allowEmptyString('gasto_abril');

        $validator
            ->decimal('saldo_abril')
            ->allowEmptyString('saldo_abril');

        $validator
            ->numeric('porcentaje_abril')
            ->allowEmptyString('porcentaje_abril');

        $validator
            ->scalar('estado_abril')
            ->allowEmptyString('estado_abril');

        $validator
            ->decimal('presupuesto_mayo')
            ->allowEmptyString('presupuesto_mayo');

        $validator
            ->decimal('gasto_mayo')
            ->allowEmptyString('gasto_mayo');

        $validator
            ->decimal('saldo_mayo')
            ->allowEmptyString('saldo_mayo');

        $validator
            ->numeric('porcentaje_mayo')
            ->allowEmptyString('porcentaje_mayo');

        $validator
            ->scalar('estado_mayo')
            ->allowEmptyString('estado_mayo');

        $validator
            ->decimal('presupuesto_junio')
            ->allowEmptyString('presupuesto_junio');

        $validator
            ->decimal('gasto_junio')
            ->allowEmptyString('gasto_junio');

        $validator
            ->decimal('saldo_junio')
            ->allowEmptyString('saldo_junio');

        $validator
            ->numeric('porcentaje_junio')
            ->allowEmptyString('porcentaje_junio');

        $validator
            ->scalar('estado_junio')
            ->allowEmptyString('estado_junio');

        $validator
            ->decimal('presupuesto_julio')
            ->allowEmptyString('presupuesto_julio');

        $validator
            ->decimal('gasto_julio')
            ->allowEmptyString('gasto_julio');

        $validator
            ->decimal('saldo_julio')
            ->allowEmptyString('saldo_julio');

        $validator
            ->numeric('porcentaje_julio')
            ->allowEmptyString('porcentaje_julio');

        $validator
            ->scalar('estado_julio')
            ->allowEmptyString('estado_julio');

        $validator
            ->decimal('presupuesto_agosto')
            ->allowEmptyString('presupuesto_agosto');

        $validator
            ->decimal('gasto_agosto')
            ->allowEmptyString('gasto_agosto');

        $validator
            ->decimal('saldo_agosto')
            ->allowEmptyString('saldo_agosto');

        $validator
            ->numeric('porcentaje_agosto')
            ->allowEmptyString('porcentaje_agosto');

        $validator
            ->scalar('estado_agosto')
            ->allowEmptyString('estado_agosto');

        $validator
            ->decimal('presupuesto_septiembre')
            ->allowEmptyString('presupuesto_septiembre');

        $validator
            ->decimal('gasto_septiembre')
            ->allowEmptyString('gasto_septiembre');

        $validator
            ->decimal('saldo_septiembre')
            ->allowEmptyString('saldo_septiembre');

        $validator
            ->numeric('porcentaje_septiembre')
            ->allowEmptyString('porcentaje_septiembre');

        $validator
            ->scalar('estado_septiembre')
            ->allowEmptyString('estado_septiembre');

        $validator
            ->decimal('presupuesto_octubre')
            ->allowEmptyString('presupuesto_octubre');

        $validator
            ->decimal('gasto_octubre')
            ->allowEmptyString('gasto_octubre');

        $validator
            ->decimal('saldo_octubre')
            ->allowEmptyString('saldo_octubre');

        $validator
            ->numeric('porcentaje_octubre')
            ->allowEmptyString('porcentaje_octubre');

        $validator
            ->scalar('estado_octubre')
            ->allowEmptyString('estado_octubre');

        $validator
            ->decimal('presupuesto_noviembre')
            ->allowEmptyString('presupuesto_noviembre');

        $validator
            ->decimal('gasto_noviembre')
            ->allowEmptyString('gasto_noviembre');

        $validator
            ->decimal('saldo_noviembre')
            ->allowEmptyString('saldo_noviembre');

        $validator
            ->numeric('porcentaje_noviembre')
            ->allowEmptyString('porcentaje_noviembre');

        $validator
            ->scalar('estado_noviembre')
            ->allowEmptyString('estado_noviembre');

        $validator
            ->decimal('presupuesto_diciembre')
            ->allowEmptyString('presupuesto_diciembre');

        $validator
            ->decimal('gasto_diciembre')
            ->allowEmptyString('gasto_diciembre');

        $validator
            ->decimal('saldo_diciembre')
            ->allowEmptyString('saldo_diciembre');

        $validator
            ->numeric('porcentaje_diciembre')
            ->allowEmptyString('porcentaje_diciembre');

        $validator
            ->scalar('estado_diciembre')
            ->allowEmptyString('estado_diciembre');

        $validator
            ->decimal('presupuesto_acumulado')
            ->allowEmptyString('presupuesto_acumulado');

        $validator
            ->decimal('gasto_acumulado')
            ->allowEmptyString('gasto_acumulado');

        $validator
            ->decimal('saldo_acumulado')
            ->allowEmptyString('saldo_acumulado');

        $validator
            ->numeric('porcentaje_acumulado')
            ->allowEmptyString('porcentaje_acumulado');

        $validator
            ->decimal('solicitado_total')
            ->allowEmptyString('solicitado_total');

        $validator
            ->decimal('solicitado_enero')
            ->allowEmptyString('solicitado_enero');

        $validator
            ->decimal('solicitado_febrero')
            ->allowEmptyString('solicitado_febrero');

        $validator
            ->decimal('solicitado_marzo')
            ->allowEmptyString('solicitado_marzo');

        $validator
            ->decimal('solicitado_abril')
            ->allowEmptyString('solicitado_abril');

        $validator
            ->decimal('solicitado_mayo')
            ->allowEmptyString('solicitado_mayo');

        $validator
            ->decimal('solicitado_junio')
            ->allowEmptyString('solicitado_junio');

        $validator
            ->decimal('solicitado_julio')
            ->allowEmptyString('solicitado_julio');

        $validator
            ->decimal('solicitado_agosto')
            ->allowEmptyString('solicitado_agosto');

        $validator
            ->decimal('solicitado_septiembre')
            ->allowEmptyString('solicitado_septiembre');

        $validator
            ->decimal('solicitado_octubre')
            ->allowEmptyString('solicitado_octubre');

        $validator
            ->decimal('solicitado_noviembre')
            ->allowEmptyString('solicitado_noviembre');

        $validator
            ->decimal('solicitado_diciembre')
            ->allowEmptyString('solicitado_diciembre');

        $validator
            ->decimal('gasto_ren_total')
            ->allowEmptyString('gasto_ren_total');

        $validator
            ->decimal('gasto_ren_enero')
            ->allowEmptyString('gasto_ren_enero');

        $validator
            ->decimal('gasto_ren_febrero')
            ->allowEmptyString('gasto_ren_febrero');

        $validator
            ->decimal('gasto_ren_marzo')
            ->allowEmptyString('gasto_ren_marzo');

        $validator
            ->decimal('gasto_ren_abril')
            ->allowEmptyString('gasto_ren_abril');

        $validator
            ->decimal('gasto_ren_mayo')
            ->allowEmptyString('gasto_ren_mayo');

        $validator
            ->decimal('gasto_ren_junio')
            ->allowEmptyString('gasto_ren_junio');

        $validator
            ->decimal('gasto_ren_julio')
            ->allowEmptyString('gasto_ren_julio');

        $validator
            ->decimal('gasto_ren_agosto')
            ->allowEmptyString('gasto_ren_agosto');

        $validator
            ->decimal('gasto_ren_septiembre')
            ->allowEmptyString('gasto_ren_septiembre');

        $validator
            ->decimal('gasto_ren_octubre')
            ->allowEmptyString('gasto_ren_octubre');

        $validator
            ->decimal('gasto_ren_noviembre')
            ->allowEmptyString('gasto_ren_noviembre');

        $validator
            ->decimal('gasto_ren_diciembre')
            ->allowEmptyString('gasto_ren_diciembre');

        $validator
            ->decimal('gasto_ren_acumulado')
            ->allowEmptyString('gasto_ren_acumulado');

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

        return $rules;
    }
}
