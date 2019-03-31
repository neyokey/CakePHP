<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bantin Model
 *
 * @property \App\Model\Table\LoaibantinTable|\Cake\ORM\Association\BelongsTo $Loaibantin
 * @property |\Cake\ORM\Association\BelongsTo $Nguoidung
 *
 * @method \App\Model\Entity\Bantin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bantin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bantin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bantin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bantin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bantin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bantin findOrCreate($search, callable $callback = null, $options = [])
 */
class BantinTable extends Table
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

        $this->setTable('bantin');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Loaibantin', [
            'foreignKey' => 'loaibantin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Nguoidung', [
            'foreignKey' => 'nguoidung_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['loaibantin_id'], 'Loaibantin'));
        $rules->add($rules->existsIn(['nguoidung_id'], 'Nguoidung'));

        return $rules;
    }
}
