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
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\HasMany $Articles
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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->hasMany('Articles', [
            'foreignKey' => 'user_id',
        ]);
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
                'message' => '**Please enter your name',    
            ],
            'characters' => [
                'rule'    => ['custom', '/^[A-Za-z_]*$/'],
                'allowEmpty' => false,
                'message' => '**Please Enter characters Not Space.'
            ],
            

        ]);

        
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email'  , '**Please fill the Email input');

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
                'characters' => [
                    'rule'    => ['custom', '/[A-Z]/'],
                    'message' => '**Please Enter atleast 1 Upper Case.'
                ],
                'lowercase' => [
                    'rule'    => ['custom', '/[a-z]/'],
                    'message' => '**Please Enter atleast 1 Lower Case.'
                ],
                'specialChar' => [
                    'rule'    => ['custom', '/[!@#$%&*_-]/'],
                    'message' => '**Please Enter atleast 1 Special Char.'
                ],
                'Numberic' => [
                    'rule'    => ['custom', '/[0-9]/'],
                    'message' => '**Please Enter atleast 1 Numeric Value.'
                ],
                'space' => [
                    'rule'    => ['custom', '/^\S+$/'],
                    'message' => '**Space Not Allowed.'
                ],
                
            ]);

            $validator
            ->scalar('cnf_password')
            //->minLength('cnf_password')
           // ->maxLength('cnf_password')
            ->requirePresence('cnf_password', 'create')
            ->notEmptyString('cnf_password' , '**Please enter Confirm Password')
            ->sameAs('cnf_password', 'password', __('**Password Does Not Matching.'));
        

            

            $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone' , '**Please fill the Phone input')
            ->add('phone',[
                'phone' => [
                    'rule' => array('minLength' , 10),
                    'message' => 'Minimum 10 Digit '

                ],
            ]);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 20)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender', '**please select gender');

        $validator
        ->allowEmptyFile('image_file')
        ->add('image_file', [
            'mimeType' => [
                'rule' => [ 'mimeType' , ['image/jpg' , 'image/png' , 'image/jpeg']],
                'message' => 'Please upload only jpg & png',
            ],
            'fileSize' => [
                'rule' => ['fileSize' , '<=' , '1MB'],
                'message' => 'Image file size must be less than 1MB',
            ],
        ]);

        

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
