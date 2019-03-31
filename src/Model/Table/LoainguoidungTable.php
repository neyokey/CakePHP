<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loainguoidung Model
 *
 * @property \App\Model\Table\NguoidungTable|\Cake\ORM\Association\HasMany $Nguoidung
 *
 * @method \App\Model\Entity\Loainguoidung get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loainguoidung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loainguoidung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loainguoidung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loainguoidung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loainguoidung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loainguoidung findOrCreate($search, callable $callback = null, $options = [])
 */
class LoainguoidungTable extends Table
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

        $this->setTable('loainguoidung');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Nguoidung', [
            'foreignKey' => 'loainguoidung_id'
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
            ->integer('discount')
            ->requirePresence('discount', 'create')
            ->notEmpty('discount');

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
}
