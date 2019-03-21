<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lienhe Model
 *
 * @method \App\Model\Entity\Lienhe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lienhe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lienhe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lienhe|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lienhe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe findOrCreate($search, callable $callback = null, $options = [])
 */
class LienheTable extends Table
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

        $this->setTable('lienhe');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('HoTen')
            ->maxLength('HoTen', 120)
            ->requirePresence('HoTen', 'create')
            ->allowEmptyString('HoTen', false);

        $validator
            ->scalar('Email')
            ->maxLength('Email', 120)
            ->requirePresence('Email', 'create')
            ->allowEmptyString('Email', false);

        $validator
            ->scalar('NoiDung')
            ->requirePresence('NoiDung', 'create')
            ->allowEmptyString('NoiDung', false);

        return $validator;
    }
}
