<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('idUser');
        $this->setPrimaryKey('idUser');
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
            ->integer('idUser')
            ->allowEmptyString('idUser', 'create');

        $validator
            ->scalar('HoTen')
            ->maxLength('HoTen', 100)
            ->requirePresence('HoTen', 'create')
            ->allowEmptyString('HoTen', false);

        $validator
            ->scalar('Username')
            ->maxLength('Username', 50)
            ->requirePresence('Username', 'create')
            ->allowEmptyString('Username', false)
            ->add('Username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('Password')
            ->maxLength('Password', 50)
            ->requirePresence('Password', 'create')
            ->allowEmptyString('Password', false);

        $validator
            ->scalar('DiaChi')
            ->maxLength('DiaChi', 255)
            ->allowEmptyString('DiaChi');

        $validator
            ->scalar('Dienthoai')
            ->maxLength('Dienthoai', 255)
            ->allowEmptyString('Dienthoai');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->requirePresence('Email', 'create')
            ->allowEmptyString('Email', false)
            ->add('Email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('NgayDangKy')
            ->requirePresence('NgayDangKy', 'create')
            ->allowEmptyDate('NgayDangKy', false);

        $validator
            ->integer('idGroup')
            ->requirePresence('idGroup', 'create')
            ->allowEmptyString('idGroup', false);

        $validator
            ->date('NgaySinh')
            ->allowEmptyDate('NgaySinh');

        $validator
            ->boolean('GioiTinh')
            ->allowEmptyString('GioiTinh');

        $validator
            ->integer('Active')
            ->allowEmptyString('Active');

        $validator
            ->scalar('RandomKey')
            ->maxLength('RandomKey', 255)
            ->allowEmptyString('RandomKey');

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
        $rules->add($rules->isUnique(['Username']));
        $rules->add($rules->isUnique(['Email']));

        return $rules;
    }
}
