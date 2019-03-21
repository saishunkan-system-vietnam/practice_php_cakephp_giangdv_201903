<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quangcao Model
 *
 * @method \App\Model\Entity\Quangcao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quangcao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quangcao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quangcao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quangcao|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quangcao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quangcao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quangcao findOrCreate($search, callable $callback = null, $options = [])
 */
class QuangcaoTable extends Table
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

        $this->setTable('quangcao');
        $this->setDisplayField('idQC');
        $this->setPrimaryKey('idQC');
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
            ->integer('idQC')
            ->allowEmptyString('idQC', 'create');

        $validator
            ->integer('vitri')
            ->requirePresence('vitri', 'create')
            ->allowEmptyString('vitri', false);

        $validator
            ->scalar('MoTa')
            ->maxLength('MoTa', 255)
            ->requirePresence('MoTa', 'create')
            ->allowEmptyString('MoTa', false);

        $validator
            ->scalar('Url')
            ->maxLength('Url', 255)
            ->requirePresence('Url', 'create')
            ->allowEmptyString('Url', false);

        $validator
            ->scalar('urlHinh')
            ->maxLength('urlHinh', 255)
            ->requirePresence('urlHinh', 'create')
            ->allowEmptyString('urlHinh', false);

        $validator
            ->integer('SoLanClick')
            ->requirePresence('SoLanClick', 'create')
            ->allowEmptyString('SoLanClick', false);

        return $validator;
    }
}
