<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monan Model
 *
 * @property \App\Model\Table\LoaimonanTable|\Cake\ORM\Association\BelongsTo $Loaimonan
 * @property \App\Model\Table\ChitietdonhangTable|\Cake\ORM\Association\HasMany $Chitietdonhang
 *
 * @method \App\Model\Entity\Monan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monan findOrCreate($search, callable $callback = null, $options = [])
 */
class MonanTable extends Table
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

        $this->setTable('monan');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Loaimonan', [
            'foreignKey' => 'loaimonan_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Chitietdonhang', [
            'foreignKey' => 'monan_id'
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('detail')
            ->maxLength('detail', 255)
            ->requirePresence('detail', 'create')
            ->notEmpty('detail');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

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
        $rules->add($rules->existsIn(['loaimonan_id'], 'Loaimonan'));

        return $rules;
    }
}
