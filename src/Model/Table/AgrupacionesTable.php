<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agrupaciones Model
 *
 * @property \App\Model\Table\ProgramasTable&\Cake\ORM\Association\BelongsTo $Programas
 *
 * @method \App\Model\Entity\Agrupacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agrupacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agrupacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agrupacione|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agrupacione saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agrupacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agrupacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agrupacione findOrCreate($search, callable $callback = null, $options = [])
 */
class AgrupacionesTable extends Table
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

        $this->setTable('agrupaciones');
        $this->setDisplayField('agru_nombre');
        $this->setPrimaryKey('agru_id');

        $this->belongsTo('Programas', [
            'foreignKey' => 'agru_prog_id',
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
            ->integer('agru_id')
            ->allowEmptyString('agru_id', null, 'create');

        $validator
            ->scalar('agru_nombre')
            ->maxLength('agru_nombre', 255)
            ->allowEmptyString('agru_nombre');

        $validator
            ->scalar('agru_cod')
            ->maxLength('agru_cod', 255)
            ->allowEmptyString('agru_cod');

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
        $rules->add($rules->existsIn(['agru_prog_id'], 'Programas'));

        return $rules;
    }
}
