<?php
declare(strict_types=1);

namespace App\Controller;
use App\Form\ContactForm;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\View\View;




class UsersController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
         $this->Model = $this->loadModel('UserProfile');

        // $this->Model = $this->loadModel('Products');
         //$this->loadModel('Products');
         $this->loadModel('ProductCategories');
        // $this->Model = $this->loadModel('ProductComments');
        
    }

public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // for all controllers in our application, make index and view
    // actions public, skipping the authentication check
    $this->Authentication->addUnauthenticatedActions(['login', 'signup' , 'setpassword' ]);


}

/****************************************************/
public function contact()
{
    $contact = new ContactForm();
    // dd($contact);
    if ($this->request->is('post')) {
        if ($contact->execute($this->request->getData())) {
            $this->Flash->success('We will get back to you soon.');
        } else {
            $this->Flash->error('There was a problem submitting your form.');
        }
    }
    $this->set('contact', $contact);
}

/**************************************************/
    
    public function index($id= null)
    {
           // $users = $this->paginate($this->Users);

        /*    $result = $this->Authentication->getIdentity();

            $uid = $result->id;
            $result = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);

          //  dd($result->user_profile->first_name);
            dd($result->user_profile->first_name.' '.$result->user_profile->last_name);*/
     
        
    }


/**************************************************/
    public function abc()
    {
        $result = $this->Authentication->getIdentity();

            $uid = $result->id;
            $result = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);

            //dd($result->user_profile->first_name);
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->user_profile['user_id'] = $user->id;

            //$image = $this->request->getData('user_profile.profile_image');

            if (!$user->getErrors) {
                $image = $this->request->getData('user_profile.images');
                // dd($image);
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img' . DS . $name;
                if ($name)
                    $image->moveTo($targetPath);
                $user->user_profile->profile_image = $name;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

            $this->set(compact('user' , 'result'));

            
    }
/***********************************SignUp User**********************************/

        public function signup()
        {
    
        $result = $this->Authentication->getIdentity();

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->user_profile['user_id'] = $user->id;

        //$image = $this->request->getData('user_profile.profile_image');

        if (!$user->getErrors) {
            $image = $this->request->getData('user_profile.images');
            // dd($image);
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            if ($name)
                $image->moveTo($targetPath);
            $user->user_profile->profile_image = $name;
        }

        if ($this->Users->save($user)) {

            $email =$user->email;
            //die($email);
            $result1 = $this->Users->checkEmailExist($email);
            if ($result1) {

                $enc = rand();
                $token = sha1('$enc');
              
                $result = $this->Users->insertToken($email, $token);
                if ($result) {

                    $user->email = $email;
                    $mailer = new Mailer('default');
                    $mailer->setTransport('gmail'); //your email configuration name
                    $mailer->setFrom(['yadavblu381@gmail.com' => 'Bablu']);
                    $mailer->setTo($email);
                    $mailer->setEmailFormat('html');
                    $mailer->setSubject('Verify New Account');
                    $mailer->deliver('<a href="http://localhost:8765/users/setpassword/' . $token . '">Click here & Set Passowrd</a>');
                  
                    $this->Flash->success(__('Regitration successfully , Open Mail and Set Password'));

                    return $this->redirect(['action' => 'login']);
                }
            
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    
    }

    $this->set(compact('user'));


    }
    
/**************************************************************************************/

    public function setpassword($token){

    
        //$user->user_profile['user_id'] = $user->id;
        
        $user = $this->Users->find('all')->where(['token'=>$token])->first();
        //  dd($user);
        if ($this->request->is(['patch', 'post', 'put'])) {

        $user = $this->Users->patchEntity($user, $this->request->getData());

        $user->token = null;

        if ($this->Users->save($user)) {
            
        $this->Flash->success(__('The Password has been saved.'));
        return $this->redirect(['action' => 'login']);
    }
    $this->Flash->error(__('The Password not be saved. Please, try again.'));
    }
     

        // 



    $this->set(compact('user'));



}


/***********************************Add User By Admin**********************************/
            public function adduser()
            {
            $result = $this->Authentication->getIdentity();
            
            $uid = $result->id;
            $result = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);

            //dd($result->user_profile->first_name);

            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->user_profile['user_id'] = $user->id;

            //$image = $this->request->getData('user_profile.profile_image');


            if (!$user->getErrors) {
                $image = $this->request->getData('user_profile.images');
                // dd($image);
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img' . DS . $name;
                if ($name)
                    $image->moveTo($targetPath);
                $user->user_profile->profile_image = $name;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

            $this->set(compact('user' , 'result'));

            }
/***********************************All List User**********************************/
    public function tables(){  

        // $this->loadComponent('Time');
        // //$cre_time = Date('d-m-Y H:i:a');  
        // $data = $this->Time->mydata();
        // // echo $data;
        // echo $data;
        // die;

        $this->viewBuilder()->setLayout('admin');
        $result = $this->Authentication->getIdentity();
        $users=$this->Users->find('all');
        $users=$this->Users->find('all')->contain(['UserProfile']);
        
        $users = $this->paginate($this->Users, [
            'contain' => ['UserProfile'],
            'order'  => ['id' => 'DESC'],
        ]);
        
        
        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);
        
        // dd($result->user_profile->first_name);
        
        $this->set(compact('users', 'result'));
        
    }

        
/*********************************************************************/
   /*     public function login()
        {
            $this->request->allowMethod(['get', 'post']);
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in

            if ($result && $result->isValid()) {
               // dd($result);
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', ['controller' => 'Users','action' => 'index']);
        
                return $this->redirect($redirect);
            }
            // display error if user submitted and authentication failed
            if ($this->request->is('post') && !$result->isValid()) {
                $this->Flash->error(__('Invalid username or password'));
            }
        }
*/

        public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();

            if ($user->status == 0) {
                $this->Flash->error(__('Your Account has been Deactivate'));
                $redirect = $this->request->getQuery('redirect', ['controller' => 'Users', 'action' => 'logout']);
            } else {

                if ($user->user_type == 0) {
                    $redirect = $this->request->getQuery('redirect', ['controller' => 'Users', 'action' => 'index']);
                }
                if ($user->user_type == 1) {
                    $redirect = $this->request->getQuery('redirect', ['controller' => 'Dashboard', 'action' => 'dashboard']);
                }
            }
            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

/*********************************************************************/
    public function userStatus($id = null, $status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($status == 1)
            $user->status = 0;
        else
            $user->status = 1;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The User has been Change Status')); {
                return $this->redirect(['action' => 'tables']);
            }
        }
    }
/********************************************************************************************/
        public function view($id = null)
        {

            $result = $this->Authentication->getIdentity();
            $uid = $result->id;
            $result = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);

            //   dd($result);

            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);

            $this->set(compact('user' , 'result'));
        }

/********************************************************************************************/
   /*     public function delete($id = null)
        {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'tables']);
        }
*/
/***************************************************************************/
        public function profile($id = null)
        {
            $result = $this->Authentication->getIdentity();
          //  dd($result->email);

        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);
            
            $this->set(compact( 'result'));
        }
/************************************************************************/

        public function edit($id = null)
        {
            $result = $this->Authentication->getIdentity();

            $uid = $result->id;
            $result = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);
            // $res = $this->Users->get($id, [
            //     'contain' => ['UserProfile']
            // ]);

        $user = $this->Users->get($id, ['contain' => ['UserProfile'],]);
        //$user->user_profile['user_id'] = $user->id;
        
        $filename=$user->user_profile['profile_image'];
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data=$this->request->getData();
           $image = $this->request->getData('user_profile.image');

           $name = $image->getClientFilename();
        //    $targetPath = WWW_ROOT . 'img' . DS . $name;
        //    $image->moveTo($targetPath);

           if ($name=='')
               $name=$filename;
          
            $user->user_profile->profile_image = $name;

            $user = $this->Users->patchEntity($user,$data );
            if ($this->Users->save($user)) {
                
            $this->Flash->success(__('The user has been saved.'));
            return $this->redirect(['action' => 'tables']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $this->set(compact('user', 'result'));
}

/************************************************************************/
        public function logout()
        {
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result && $result->isValid()) {
                $this->Authentication->logout();
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }
/************************************************************************/
 
        public function userType($id = null, $user_type)
        {
            $this->request->allowMethod(['post']);
            $user = $this->Users->get($id);
            if ($user_type == 1)
                $user->user_type = 0;
            else
                $user->user_type = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The User has been Change Status')); {
                    return $this->redirect(['action' => 'tables']);
                }
            }
        }

/********************************************************************************************/


            public function delete($id=null)
            {
                if ($this->request->is('ajax')) {
                
                    $user = $this->Users->get($id);
                   
                    if($user->delete_status == '1')
                            $user->delete_status = '0';
                     else
                           $user->delete_status = '1';
                    if ($this->Users->save($user)) {
                        // $this->Flash->success(__('The User has been deleted.'));
                        echo json_encode(array(
                            "status" => 1,
                            "message" => "The User has been deleted."
                        )); 
                        exit;
                    } else {
                        // $this->Flash->error(__('The User could not be deleted. Please, try again.'));

                        echo json_encode(array(
                            "status" => 0,
                            "message" => "The User could not be deleted. Please, try again."
                        )); 
                        exit;
                    }   
                }
            }
/************************************************************************/
                public function updateProfile($id = null)
                {
                    $this->Model = $this->loadModel('UserProfile');
                    $id = $_GET['id'];
                    $user = $this->Users->get($id, [
                        'contain' => ['UserProfile']
                    ]);
                    echo json_encode($user);
                    exit;
                }
    /************************************************************************/

    public function editProfile($id = null)
    {
        $this->Model = $this->loadModel('UserProfile');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            // print_r($data);
            // die;
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $productImage = $this->request->getData('user_profile.profile_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data['user_profile']["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data['user_profile']["profile_image"]= "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data['user_profile']["profile_image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        $users = $this->Users->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('user', 'users'));
    }
/************************************************************************/

            //public $paginate = [ 'limit' => 5 ];
}
