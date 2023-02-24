<?php
namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\Security;



class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('name', 4)
            ->email('email');

        return $validator;
    }

    protected function _execute(array $data): bool
    {
        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        if($mailer->setFrom(['yadavblu381@gmail.com' => 'Bablu'])
            ->SetTo('yadavblu381@gmail.com')
            ->setSubject('Verify New Account')
            ->deliver(implode('/n',$data)));
           
        return true;
    }
}

?>