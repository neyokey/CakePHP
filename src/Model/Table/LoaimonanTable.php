<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loaimonan Model
 *
 * @property \App\Model\Table\MonanTable|\Cake\ORM\Association\HasMany $Monan
 *
 * @method \App\Model\Entity\Loaimonan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loaimonan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loaimonan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loaimonan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaimonan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loaimonan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loaimonan findOrCreate($search, callable $callback = null, $options = [])
 */
class LoaimonanTable extends Table
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

        $this->setTable('loaimonan');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Monan', [
            'foreignKey' => 'loaimonan_id'
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
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
