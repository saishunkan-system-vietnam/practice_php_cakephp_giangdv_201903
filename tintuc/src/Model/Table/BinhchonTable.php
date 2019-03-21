<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Binhchon Model
 *
 * @method \App\Model\Entity\Binhchon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Binhchon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Binhchon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Binhchon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Binhchon|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Binhchon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Binhchon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Binhchon findOrCreate($search, callable $callback = null, $options = [])
 */
class BinhchonTable extends Table
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

        $this->setTable('binhchon');
        $this->setDisplayField('idBC');
        $this->setPrimaryKey('idBC');
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
            ->integer('idBC')
            ->allowEmptyString('idBC', 'create');

        $validator
            ->scalar('MoTa')
            ->maxLength('MoTa', 255)
            ->requirePresence('MoTa', 'create')
            ->allowEmptyString('MoTa', false);

        return $validator;
    }
}
