<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Donhang Model
 *
 * @property \App\Model\Table\NguoidungTable|\Cake\ORM\Association\BelongsTo $Nguoidung
 * @property \App\Model\Table\NguoigiaohangTable|\Cake\ORM\Association\BelongsTo $Nguoigiaohang
 * @property \App\Model\Table\KhuvucgiaohangTable|\Cake\ORM\Association\BelongsTo $Khuvucgiaohang
 * @property \App\Model\Table\ChitietdonhangTable|\Cake\ORM\Association\HasMany $Chitietdonhang
 *
 * @method \App\Model\Entity\Donhang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Donhang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Donhang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Donhang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Donhang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Donhang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Donhang findOrCreate($search, callable $callback = null, $options = [])
 */
class DonhangTable extends Table
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

        $this->setTable('donhang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Nguoidung', [
            'foreignKey' => 'nguoidung_id'
        ]);
        $this->belongsTo('Nguoigiaohang', [
            'foreignKey' => 'nguoigiaohang_id'
        ]);
        $this->belongsTo('Khuvucgiaohang', [
            'foreignKey' => 'khuvucgiaohang_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Chitietdonhang', [
            'foreignKey' => 'donhang_id'
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
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->integer('discount')
            ->requirePresence('discount', 'create')
            ->notEmpty('discount');

        $validator
            ->integer('ship_price')
            ->requirePresence('ship_price', 'create')
            ->notEmpty('ship_price');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['nguoidung_id'], 'Nguoidung'));
        $rules->add($rules->existsIn(['nguoigiaohang_id'], 'Nguoigiaohang'));
        $rules->add($rules->existsIn(['khuvucgiaohang_id'], 'Khuvucgiaohang'));

        return $rules;
    }
}
