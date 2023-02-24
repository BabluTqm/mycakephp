<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());


            if(!$user -> getErrors){
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();
                $path = WWW_ROOT.'img'.DS.$name;

                if($name){
                    $image->moveTo($path);
                    $user->image=$name;
                }
            }


            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /*public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
*/

    public function edit($id = null)
    {

            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            $fileName2 = $user["image"];

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            $productImage = $this->request->getData("change_image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }

            $data["image"] = $fileName;
            
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been update successfully .'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
       
        
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login']);
}

public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid email or password'));
    }



}

// in src/Controller/UsersController.php
public function logout()
{
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
         public $paginate = [ 'limit' => 5 ];

// -------------------------------

public function forgetpassword()
    {
        $user = $this->Users->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $users = TableRegistry::get("Users");
            $user = $users->find('all')->where(['email' => $email])->first();
            if ($user) {
                $token = Security::hash(Security::randomBytes(25));
                $user->token = $token;
                if ($users->save($user)) {
                    $mailer = new Mailer('default');
                    $mailer->setTransport('gmail');
                    $mailer->setFrom(['yadavblu381@gmail.com' => 'yadav sabb']);
                    $mailer->setTo($email);
                    $mailer->setEmailFormat('html');
                    $mailer->setSubject('Verify New Account');
                    $mailer->deliver('<a href="http://localhost:8765/users/resetpassword?token=' . $token . '">Click here</a>');

                   // $this->Flash->success(__('Reset email send successfully.'));
                    $this->Flash->success('Reset password link has been sent to your email ('.$email.'), please check your email');
                }
            } else {
                $this->Flash->error(__('email is not exisit in table'));
            }
        }
        $this->set(compact('user'));
    }


    public function resetpassword()
    
    {
        $user = $this->Users->newEmptyEntity();

            $token=$_GET['token'];
            // die($token);

        if($this->request->is('post')){
            $password = $this->request->getData('password');
            // echo $password;
            
            // $newPass = (new DefaultPasswordHasher)->hash($password);
            // echo $newPass;die;
    
            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>$token])->first();
            $user->password = $password;
            $user->token = NULL;
            if ($userTable->save($user)) {
                $this->Flash->success('Password successfully reset. Please login using your new password');
                return $this->redirect(['action'=>'login']);
            }
            $this->Flash->error('Please enter valid password');

        }
        $this->set(compact('user'));

    }

}