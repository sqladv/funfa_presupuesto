<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SimEjecPres Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\ProgsTable&\Cake\ORM\Association\BelongsTo $Progs
 *
 * @method \App\Model\Entity\SimEjecPre get($primaryKey, $options = [])
 * @method \App\Model\Entity\SimEjecPre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SimEjecPre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimEjecPre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SimEjecPre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SimEjecPre findOrCreate($search, callable $callback = null, $options = [])
 */
class SimEjecPresTable extends Table
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

        $this->setTable('sim_ejec_pres');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
        ]);
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
            ->scalar('agrupacion')
            ->maxLength('agrupacion', 255)
            ->allowEmptyString('agrupacion');

        $validator
            ->scalar('agru_cod')
            ->maxLength('agru_cod', 255)
            ->allowEmptyString('agru_cod');

        $validator
            ->scalar('item')
            ->maxLength('item', 255)
            ->allowEmptyString('item');

        $validator
            ->scalar('item_cod')
            ->maxLength('item_cod', 255)
            ->allowEmptyString('item_cod');

        $validator
            ->scalar('item_pres_año')
            ->maxLength('item_pres_año', 255)
            ->allowEmptyString('item_pres_año');

        $validator
            ->allowEmptyString('pres_anual');

        $validator
            ->allowEmptyString('gasto_real');

        $validator
            ->allowEmptyString('saldo_anual');

        $validator
            ->allowEmptyString('porcentaje_anual');

        $validator
            ->scalar('estado_anual')
            ->allowEmptyString('estado_anual');

        $validator
            ->allowEmptyString('sim_enero');

        $validator
            ->allowEmptyString('gasto_enero');

        $validator
            ->allowEmptyString('saldo_enero');

        $validator
            ->allowEmptyString('porcentaje_enero');

        $validator
            ->scalar('estado_enero')
            ->allowEmptyString('estado_enero');

        $validator
            ->allowEmptyString('sim_febrero');

        $validator
            ->allowEmptyString('gasto_febrero');

        $validator
            ->allowEmptyString('saldo_febrero');

        $validator
            ->allowEmptyString('porcentaje_febrero');

        $validator
            ->scalar('estado_febrero')
            ->allowEmptyString('estado_febrero');

        $validator
            ->allowEmptyString('sim_marzo');

        $validator
            ->allowEmptyString('gasto_marzo');

        $validator
            ->allowEmptyString('saldo_marzo');

        $validator
            ->allowEmptyString('porcentaje_marzo');

        $validator
            ->scalar('estado_marzo')
            ->allowEmptyString('estado_marzo');

        $validator
            ->allowEmptyString('sim_abril');

        $validator
            ->allowEmptyString('gasto_abril');

        $validator
            ->allowEmptyString('saldo_abril');

        $validator
            ->allowEmptyString('porcentaje_abril');

        $validator
            ->scalar('estado_abril')
            ->allowEmptyString('estado_abril');

        $validator
            ->allowEmptyString('sim_mayo');

        $validator
            ->allowEmptyString('gasto_mayo');

        $validator
            ->allowEmptyString('saldo_mayo');

        $validator
            ->allowEmptyString('porcentaje_mayo');

        $validator
            ->scalar('estado_mayo')
            ->allowEmptyString('estado_mayo');

        $validator
            ->allowEmptyString('sim_junio');

        $validator
            ->allowEmptyString('gasto_junio');

        $validator
            ->allowEmptyString('saldo_junio');

        $validator
            ->allowEmptyString('porcentaje_junio');

        $validator
            ->scalar('estado_junio')
            ->allowEmptyString('estado_junio');

        $validator
            ->allowEmptyString('sim_julio');

        $validator
            ->allowEmptyString('gasto_julio');

        $validator
            ->allowEmptyString('saldo_julio');

        $validator
            ->allowEmptyString('porcentaje_julio');

        $validator
            ->scalar('estado_julio')
            ->allowEmptyString('estado_julio');

        $validator
            ->allowEmptyString('sim_agosto');

        $validator
            ->allowEmptyString('gasto_agosto');

        $validator
            ->allowEmptyString('saldo_agosto');

        $validator
            ->allowEmptyString('porcentaje_agosto');

        $validator
            ->scalar('estado_agosto')
            ->allowEmptyString('estado_agosto');

        $validator
            ->allowEmptyString('sim_septiembre');

        $validator
            ->allowEmptyString('gasto_septiembre');

        $validator
            ->allowEmptyString('saldo_septiembre');

        $validator
            ->allowEmptyString('porcentaje_septiembre');

        $validator
            ->scalar('estado_septiembre')
            ->allowEmptyString('estado_septiembre');

        $validator
            ->allowEmptyString('sim_octubre');

        $validator
            ->allowEmptyString('gasto_octubre');

        $validator
            ->allowEmptyString('saldo_octubre');

        $validator
            ->allowEmptyString('porcentaje_octubre');

        $validator
            ->scalar('estado_octubre')
            ->allowEmptyString('estado_octubre');

        $validator
            ->allowEmptyString('sim_noviembre');

        $validator
            ->allowEmptyString('gasto_noviembre');

        $validator
            ->allowEmptyString('saldo_noviembre');

        $validator
            ->allowEmptyString('porcentaje_noviembre');

        $validator
            ->scalar('estado_noviembre')
            ->allowEmptyString('estado_noviembre');

        $validator
            ->allowEmptyString('sim_diciembre');

        $validator
            ->allowEmptyString('gasto_diciembre');

        $validator
            ->allowEmptyString('saldo_diciembre');

        $validator
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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['prog_id'], 'Progs'));

        return $rules;
    }
}
