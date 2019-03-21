<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phuongan Model
 *
 * @method \App\Model\Entity\Phuongan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phuongan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phuongan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phuongan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phuongan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phuongan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phuongan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phuongan findOrCreate($search, callable $callback = null, $options = [])
 */
class PhuonganTable extends Table
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

        $this->setTable('phuongan');
        $this->setDisplayField('idPA');
        $this->setPrimaryKey('idPA');
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
            ->integer('idPA')
            ->allowEmptyString('idPA', 'create');

        $validator
            ->scalar('Mota')
            ->maxLength('Mota', 255)
            ->requirePresence('Mota', 'create')
            ->allowEmptyString('Mota', false);

        $validator
            ->integer('SoLanChon')
            ->allowEmptyString('SoLanChon');

        $validator
            ->integer('idBC')
            ->requirePresence('idBC', 'create')
            ->allowEmptyString('idBC', false);

        return $validator;
    }
}
