<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centros Model
 *
 * @property \App\Model\Table\ProgramasTable&\Cake\ORM\Association\BelongsTo $Programas
 *
 * @method \App\Model\Entity\Centro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centro findOrCreate($search, callable $callback = null, $options = [])
 */
class CentrosTable extends Table
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

        $this->setTable('centros');
        $this->setDisplayField('cent_id');
        $this->setPrimaryKey('cent_id');

        $this->belongsTo('Programas', [
            'foreignKey' => 'cent_prog_id',
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
            ->integer('cent_id')
            ->allowEmptyString('cent_id', null, 'create');

        $validator
            ->scalar('cent_nombre')
            ->maxLength('cent_nombre', 255)
            ->allowEmptyString('cent_nombre');

        $validator
            ->scalar('cent_gest')
            ->maxLength('cent_gest', 255)
            ->allowEmptyString('cent_gest');

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
        $rules->add($rules->existsIn(['cent_prog_id'], 'Programas'));

        return $rules;
    }
}
