<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tin Model
 *
 * @method \App\Model\Entity\Tin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tin findOrCreate($search, callable $callback = null, $options = [])
 */
class TinTable extends Table
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

        $this->setTable('tin');
        $this->setDisplayField('idTin');
        $this->setPrimaryKey('idTin');
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
            ->integer('idTin')
            ->allowEmptyString('idTin', 'create');

        $validator
            ->scalar('TieuDe')
            ->maxLength('TieuDe', 255)
            ->requirePresence('TieuDe', 'create')
            ->allowEmptyString('TieuDe', false);

        $validator
            ->scalar('TieuDe_KhongDau')
            ->maxLength('TieuDe_KhongDau', 255)
            ->requirePresence('TieuDe_KhongDau', 'create')
            ->allowEmptyString('TieuDe_KhongDau', false);

        $validator
            ->scalar('TomTat')
            ->maxLength('TomTat', 1000)
            ->allowEmptyString('TomTat');

        $validator
            ->scalar('urlHinh')
            ->maxLength('urlHinh', 255)
            ->allowEmptyString('urlHinh');

//        $validator
//            ->date('Ngay')
//            ->allowEmptyDate('Ngay');

//        $validator
//            ->integer('idUser')
//            ->requirePresence('idUser', 'create')
//            ->allowEmptyString('idUser', false);

        $validator
            ->scalar('Content')
            ->allowEmptyString('Content');

//        $validator
//            ->integer('idLT')
//            ->requirePresence('idLT', 'create')
//            ->allowEmptyString('idLT', false);
//
//        $validator
//            ->integer('idTL')
//            ->allowEmptyString('idTL');

        $validator
            ->integer('SoLanXem')
            ->allowEmptyString('SoLanXem');

        $validator
            ->boolean('TinNoiBat')
            ->allowEmptyString('TinNoiBat');

//        $validator
//            ->boolean('AnHien')
//            ->allowEmptyString('AnHien');

        return $validator;
    }
}
