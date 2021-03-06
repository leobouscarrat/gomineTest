<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dlcategory Model
 *
 * @method \App\Model\Entity\Dlcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dlcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dlcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dlcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dlcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dlcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dlcategory findOrCreate($search, callable $callback = null)
 */
class DLCategoryTable extends Table
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

        $this->table('d_l_category');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('contents',[
        		'foreignKey' => 'dlcategory_id',
        		'saveStrategy' =>'replace'
        ]);
        $this->hasMany('folders', [
        		'foreignKey' => 'id_dlcategory'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->requirePresence('icon', 'create')
            ->notEmpty('icon');

        return $validator;
    }
}
