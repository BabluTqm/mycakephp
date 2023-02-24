<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ProductCommentsTable&\Cake\ORM\Association\HasMany $ProductComments
 * @property \App\Model\Table\UserProfileTable&\Cake\ORM\Association\HasMany $UserProfile
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductComments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserProfile', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('UserProfile');
       

       // $this->hasOne('UserProfile');
        //$this->hasOne('Country');
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
        ->email('email')
        ->requirePresence('email', 'create')
        ->notEmptyString('email', 'Please enter your email')
        ->add('email', 'unique', [
            'rule' => 'validateUnique', 'provider' => 'table',
            'message' => '**Email already exist please enter another email',
        ]);

    $validator
    ->scalar('password')
    ->minLength('password', 6 , 'Atleast password size 6')
    ->maxLength('password', 12 , 'Atleast password size 12')
    ->requirePresence('password', 'create')
    ->notEmptyString('password')
    ->add('password', [
        'notBlank' => [
            'rule'    => ['notBlank'],
            'message' => '**Please enter Password',   
        ],
        // 'characters' => [
        //     'rule'    => ['custom', '/[A-Z]/'],
        //     'message' => '**Please Enter atleast 1 Upper Case.'
        // ],
        // 'lowercase' => [
        //     'rule'    => ['custom', '/[a-z]/'],
        //     'message' => '**Please Enter atleast 1 Lower Case.'
        // ],
        // 'specialChar' => [
        //     'rule'    => ['custom', '/[!@#$%&*_-]/'],
        //     'message' => '**Please Enter atleast 1 Special Char.'
        // ],
        // 'Numberic' => [
        //     'rule'    => ['custom', '/[0-9]/'],
        //     'message' => '**Please Enter atleast 1 Numeric Value.'
        // ],
        // 'space' => [
        //     'rule'    => ['custom', '/^\S+$/'],
        //     'message' => '**Space Not Allowed.'
        // ],
        
    ]);

  

        // $validator
        //     ->email('email')
        //     ->requirePresence('email', 'create')
        //     ->notEmptyString('email')
        //     ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        // $validator
        //     ->scalar('password')
        //     ->maxLength('password', 200)
        //     ->requirePresence('password', 'create')
        //     ->notEmptyString('password');

        // $validator
        //     ->scalar('user_type')
        //     ->notEmptyString('user_type');

        // $validator
        //     ->scalar('status')
        //     ->notEmptyString('status');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->requirePresence('modified_date', 'create')
        //     ->notEmptyDateTime('modified_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
