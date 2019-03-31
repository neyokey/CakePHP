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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('brand_name')
            ->maxLength('brand_name', 50)
            ->requirePresence('brand_name', 'create')
            ->notEmpty('brand_name');

        $validator
            ->numeric('X')
            ->requirePresence('X', 'create')
            ->notEmpty('X');

        $validator
            ->numeric('Y')
            ->requirePresence('Y', 'create')
            ->notEmpty('Y');

        $validator
            ->scalar('link_fb')
            ->maxLength('link_fb', 255)
            ->requirePresence('link_fb', 'create')
            ->notEmpty('link_fb');

        $validator
            ->scalar('link_ins')
            ->maxLength('link_ins', 255)
            ->requirePresence('link_ins', 'create')
            ->notEmpty('link_ins');

        $validator
            ->scalar('link_gl')
            ->maxLength('link_gl', 255)
            ->requirePresence('link_gl', 'create')
            ->notEmpty('link_gl');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
