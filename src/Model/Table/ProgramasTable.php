<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Programas Model
 *
 * @method \App\Model\Entity\Programa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Programa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Programa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Programa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Programa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Programa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Programa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Programa findOrCreate($search, callable $callback = null, $options = [])
 */
class ProgramasTable extends Table
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

        $this->setTable('programas');
        $this->setDisplayField('prog_nombre');
        $this->setPrimaryKey('prog_id');
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
            ->integer('prog_id')
            ->allowEmptyString('prog_id', null, 'create');

        $validator
            ->scalar('prog_nombre')
            ->maxLength('prog_nombre', 255)
            ->allowEmptyString('prog_nombre');

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

        return $validator;
    }
}
