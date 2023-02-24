<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    
    
    protected $_accessible = [
        '*' => true,
        // 'password' => true,
        // 'user_type' => true,
        // 'status' => true,
        // 'created_date' => true,
        // 'modified_date' => true,
        // 'product_comments' => true,
        // 'user_profile' => true,
    ];

    
    protected $_hidden = [
        'password',
    ];
    
       protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    
}
