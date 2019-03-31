<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nguoidung Model
 *
 * @property \App\Model\Table\LoainguoidungTable|\Cake\ORM\Association\BelongsTo $Loainguoidung
 * @property |\Cake\ORM\Association\HasMany $Bantin
 * @property \App\Model\Table\DonhangTable|\Cake\ORM\Association\HasMany $Donhang
 *
 * @method \App\Model\Entity\Nguoidung get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nguoidung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nguoidung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nguoidung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nguoidung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nguoidung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nguoidung findOrCreate($search, callable $callback = null, $options = [])
 */
class NguoidungTable extends Table
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

        $this->setTable('nguoidung');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Loainguoidung', [
            'foreignKey' => 'loainguoidung_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bantin', [
            'foreignKey' => 'nguoidung_id'
        ]);
        $this->hasMany('Donhang', [
            'foreignKey' => 'nguoidung_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 50)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('point')
            ->requirePresence('point', 'create')
            ->notEmpty('point');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['loainguoidung_id'], 'Loainguoidung'));

        return $rules;
    }
}
