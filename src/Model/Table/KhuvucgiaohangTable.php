<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Khuvucgiaohang Model
 *
 * @property |\Cake\ORM\Association\HasMany $Donhang
 *
 * @method \App\Model\Entity\Khuvucgiaohang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Khuvucgiaohang findOrCreate($search, callable $callback = null, $options = [])
 */
class KhuvucgiaohangTable extends Table
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

        $this->setTable('khuvucgiaohang');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Donhang', [
            'foreignKey' => 'khuvucgiaohang_id'
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
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
