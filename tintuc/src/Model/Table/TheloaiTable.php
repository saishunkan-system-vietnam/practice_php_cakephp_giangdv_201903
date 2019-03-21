<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Theloai Model
 *
 * @method \App\Model\Entity\Theloai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Theloai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Theloai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Theloai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Theloai|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Theloai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Theloai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Theloai findOrCreate($search, callable $callback = null, $options = [])
 */
class TheloaiTable extends Table
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

        $this->setTable('theloai');
        $this->setDisplayField('idTL');
        $this->setPrimaryKey('idTL');
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
            ->integer('idTL')
            ->allowEmptyString('idTL', 'create');

        $validator
            ->scalar('TenTL')
            ->maxLength('TenTL', 255)
            ->requirePresence('TenTL', 'create')
            ->allowEmptyString('TenTL', false)
            ->add('TenTL', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('TenTL_KhongDau')
            ->maxLength('TenTL_KhongDau', 255)
            ->requirePresence('TenTL_KhongDau', 'create')
            ->allowEmptyString('TenTL_KhongDau', false);

        $validator
            ->integer('ThuTu')
            ->allowEmptyString('ThuTu');

        $validator
            ->boolean('AnHien')
            ->allowEmptyString('AnHien');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['TenTL']));

        return $rules;
    }
}
