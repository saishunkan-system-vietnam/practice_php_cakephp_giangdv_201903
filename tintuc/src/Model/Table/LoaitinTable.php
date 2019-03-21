<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loaitin Model
 *
 * @method \App\Model\Entity\Loaitin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loaitin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loaitin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loaitin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaitin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaitin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loaitin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loaitin findOrCreate($search, callable $callback = null, $options = [])
 */
class LoaitinTable extends Table
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

        $this->setTable('loaitin');
        $this->setDisplayField('idLT');
        $this->setPrimaryKey('idLT');
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
            ->integer('idLT')
            ->allowEmptyString('idLT', 'create');

        $validator
            ->scalar('Ten')
            ->maxLength('Ten', 100)
            ->requirePresence('Ten', 'create')
            ->allowEmptyString('Ten', false);

        $validator
            ->scalar('Ten_KhongDau')
            ->maxLength('Ten_KhongDau', 255)
            ->requirePresence('Ten_KhongDau', 'create')
            ->allowEmptyString('Ten_KhongDau', false);

        $validator
            ->requirePresence('ThuTu', 'create')
            ->allowEmptyString('ThuTu', false);

        $validator
            ->boolean('AnHien')
            ->requirePresence('AnHien', 'create')
            ->allowEmptyString('AnHien', false);

        $validator
            ->integer('idTL')
            ->requirePresence('idTL', 'create')
            ->allowEmptyString('idTL', false);

        return $validator;
    }
}
