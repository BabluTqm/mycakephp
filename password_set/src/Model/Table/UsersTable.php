<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;
  
class UsersTable extends Table
{
   
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

     
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email' , '**Please enter your Email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'] , '**Please enter your Valid Email');

      /*  $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->requirePresence('password', 'create')
            ->notEmptyString('password' , '**Please Enter your Password');
*/
        $validator
            ->scalar('user_type')
            ->notEmptyString('user_type');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->allowEmptyDateTime('modified_date');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

  
    public function login($email, $password)
    {
        $result = $this->find('all')->where(['email' => $email, 'password' => $password])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExist($email)
    {
        $result = $this->find('all')->where(['email' => $email])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($token, $password)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['password' => $password, 'token' => ''])
            ->where(['token' => $token])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checktokenexist($token)
    {
        $result = $this->find('all')->where(['token' => $token])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToken($email, $token)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['token' => $token])
            ->where(['email' => $email])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
