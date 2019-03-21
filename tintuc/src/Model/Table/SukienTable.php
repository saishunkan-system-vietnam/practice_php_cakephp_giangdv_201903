<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sukien Model
 *
 * @method \App\Model\Entity\Sukien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sukien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sukien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sukien|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sukien|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sukien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sukien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sukien findOrCreate($search, callable $callback = null, $options = [])
 */
class SukienTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sukien');
        $this->setDisplayField('idSK');
        $this->setPrimaryKey('idSK');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idSK')
            ->allowEmptyString('idSK', 'create');

        $validator
            ->scalar('MoTa')
            ->maxLength('MoTa', 50)
            ->requirePresence('MoTa', 'create')
            ->allowEmptyString('MoTa', false);

        return $validator;
    }
}
