<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Danhmuc Model
 *
 * @property \App\Model\Table\DanhmucTable|\Cake\ORM\Association\BelongsTo $ParentDanhmuc
 * @property \App\Model\Table\DanhmucTable|\Cake\ORM\Association\HasMany $ChildDanhmuc
 *
 * @method \App\Model\Entity\Danhmuc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Danhmuc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Danhmuc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Danhmuc|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Danhmuc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc findOrCreate($search, callable $callback = null, $options = [])
 */
class DanhmucTable extends Table
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

        $this->setTable('danhmuc');
        $this->setDisplayField('id_danhmuc');
        $this->setPrimaryKey('id_danhmuc');

        $this->belongsTo('ParentDanhmuc', [
            'className' => 'Danhmuc',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildDanhmuc', [
            'className' => 'Danhmuc',
            'foreignKey' => 'parent_id'
        ]);
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
            ->integer('id_danhmuc')
            ->allowEmptyString('id_danhmuc', 'create');

        $validator
            ->scalar('ten_danhmuc')
            ->maxLength('ten_danhmuc', 100)
            ->requirePresence('ten_danhmuc', 'create')
            ->allowEmptyString('ten_danhmuc', false);

        $validator
            ->integer('thu_tu')
            ->requirePresence('thu_tu', 'create')
            ->allowEmptyString('thu_tu', false);

        $validator
            ->requirePresence('an_hien', 'create')
            ->allowEmptyString('an_hien', false);

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentDanhmuc'));

        return $rules;
    }
}
