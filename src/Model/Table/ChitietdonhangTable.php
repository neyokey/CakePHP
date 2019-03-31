<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chitietdonhang Model
 *
 * @property \App\Model\Table\DonhangTable|\Cake\ORM\Association\BelongsTo $Donhang
 * @property \App\Model\Table\MonanTable|\Cake\ORM\Association\BelongsTo $Monan
 *
 * @method \App\Model\Entity\Chitietdonhang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chitietdonhang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chitietdonhang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chitietdonhang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chitietdonhang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chitietdonhang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chitietdonhang findOrCreate($search, callable $callback = null, $options = [])
 */
class ChitietdonhangTable extends Table
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

        $this->setTable('chitietdonhang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Donhang', [
            'foreignKey' => 'donhang_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Monan', [
            'foreignKey' => 'monan_id',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['donhang_id'], 'Donhang'));
        $rules->add($rules->existsIn(['monan_id'], 'Monan'));

        return $rules;
    }
}
