<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employee Model
 *
 * @method \App\Model\Entity\Employee newEmptyEntity()
 * @method \App\Model\Entity\Employee newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmployeeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('employee');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 200 )
            ->requirePresence('name', 'create' )
            ->notEmptyString('name')
            ->add('name', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your  name',
                    
                ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Za-z_]*$/'],
                    'allowEmpty' => false,
                    'message' => 'Please Enter characters only.'
                ],
    
            ]);

         
    
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email'  ,' **Please fill the Email input');


        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone' , '**Please fill the Phone input')
            ->add('phone',[
                'phone' => [
                    'rule' => array('minLength' , 10),
                    'message' => 'Minimum 10 Digit '

                ]
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter Password',   
                ],
                'characters' => [
                    'rule'    => ['custom', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/'],
                    'allowEmpty' => false,
                    'message' => 'Please Enter characters and Special Character.'
                ],
                
            ]);

            


        $validator
            ->scalar('designation')
            ->maxLength('designation', 200)
            ->requirePresence('designation', 'create')
            ->notEmptyString('designation' , '**Please fill the designation input');


            $validator
            ->scalar('gender')
            ->maxLength('gender', 200)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender' , '**Please check the Gender');


        return $validator;
    }

    
}
