<?php
declare(strict_types=1);

namespace App\Controller;
 
use App\Controller\AppController;


class UsersController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->Model = $this->loadModel('Products');
        $this->loadModel('Products');
        $this->loadModel('ProductCategories');
        $this->Model = $this->loadModel('ProductComments');
      
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

/*********************************User Index*************************************/  
    public function index()
    {
        
        $result = $this->Authentication->getIdentity();

        if ($result->user_type == '0') {
            $users = $this->paginate($this->Users,[
                'contain' => ['UserProfile']
            ]);
        $this->set(compact('users', 'result'));
        } else {
            return $this->redirect(['action' => 'home']);
        }

         
    }

/*********************************Login*************************************/  

public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();

    if ($result && $result->isValid()) {
        $user = $this->Authentication->getIdentity();

        if ($user->status == 0) {
            $this->Flash->error(__('Your Account has been Deactivate'));
            $redirect = $this->request->getQuery('redirect', ['controller' => 'Users', 'action' => 'logout']);
        }else{

        if ($user->user_type == 0) {
            $redirect = $this->request->getQuery('redirect', ['controller' => 'Users', 'action' => 'index']);
        }
        if ($user->user_type == 1) {
            $redirect = $this->request->getQuery('redirect', ['controller' => 'Users', 'action' => 'home']);
        }
    }
        return $this->redirect($redirect);

    }

    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}


/**********************************View User********************************/
    public function view($id = null)
    {
        
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == '0') {
            $user = $this->Users->find('all')->where(['id' => $id])->first();
          
        }
        if ($result->user_type == '1') {
            $user = $this->Users->find('all')->where(['id' => $result->id])->first();

        }
        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->set(compact('user', 'result'));
    }

    /**********************************Addd********************************/
    public function add()
    {
        $result = $this->Authentication->getIdentity();

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->user_profile['user_id'] = $user->id;

            $image = $this->request->getData('user_profile.profile_image');
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

/**********************************Add New Useer********************************/
public function adduser()
{
    $result = $this->Authentication->getIdentity();

    $user = $this->Users->newEmptyEntity();

    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $user->user_profile['user_id'] = $user->id;

        // $image = $this->request->getData('user_profile.profile_image');

        //     $image = $this->request->getData('images');
        //     $name = $image->getClientFilename();
        //     $targetPath = WWW_ROOT . 'img' . DS . $name;
        //     if ($name)
        //         $image->moveTo($targetPath);
        //     $user->profile_image = $name;


        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $this->set(compact('user' , 'result'));
}

/**********************************Edit Useer********************************/

    public function edit($id = null)
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

/**********************************Delete Useer********************************/
  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
 
/**********************************User Logout********************************/

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

/********************************************************************************************/
public function userStatus($id = null, $status) { 
     $this->request->allowMethod(['post']);
    $user = $this->Users->get($id);
     if ($status == 1) 
        $user->status = 0 ;
      else 
         $user->status = 1 ; 
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The User has been Change Status'));
        { 
        return $this->redirect(['action' => 'index']); 
        }
}
}
/********************************************************************************************/
public function productStatus($id = null, $status) { 
    $this->request->allowMethod(['post']);
   $user = $this->Products->get($id);
    if ($status == 1) 
       $user->status = 0 ;
     else 
        $user->status = 1 ; 
       if ($this->Products->save($user)) {
           $this->Flash->success(__('The Products has been Change Status'));
       { 
       return $this->redirect(['action' => 'productIndex']); 
       }
}
}
/********************************************************************/
public function productCatStatus($id = null, $status) { 
    $this->request->allowMethod(['post']);
   $user = $this->ProductCategories->get($id);
    if ($status == 1) 
       $user->status = 0 ;
     else 
        $user->status = 1 ; 
       if ($this->ProductCategories->save($user)) {
           $this->Flash->success(__('The Products Category has been Change Status'));
       { 
       return $this->redirect(['action' => 'productcatIndex']); 
       }
}
}


/**************************************Product Categories Index******************************/

    public function productcatIndex()
    {
        $result = $this->Authentication->getIdentity();

        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($result->user_type == 0){ 

        $productCategories = $this->paginate($this->ProductCategories);
        }else{

            return $this->redirect(['action' => 'home']);
        }
        $this->set(compact('productCategories' , 'result'));
    }

    /******************************Product Categories Add******************************/
    public function productcatAdd()
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0){ 

        $productCategory = $this->ProductCategories->newEmptyEntity();
        }else{
            return $this->redirect(['action' => 'home']);
        }
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'productcatIndex']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }
   
    /******************************Product Categories Edit******************************/
    public function productcatEdit($id = null)
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0){ 
            $productCategory = $this->ProductCategories->get($id, [
                'contain' => [],
            ]);

        }else{
            return $this->redirect(['action' => 'home']);
        }
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'productcatIndex']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }
    /******************************Product Categories View******************************/

    public function productcatView($id = null)
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0){ 

        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['Products'],
        ]);
    }else{
        return $this->redirect(['action' => 'productIndex']);
    }
        $this->set(compact('productCategory' , 'result'));
    }
    /******************************Product Categories Delete******************************/


    public function productcatDelete($id = null)
    {
        $result = $this->Authentication->getIdentity();
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'productcatIndex']);
    }
     #                  END CATEGROES METHOD
     
/****************************************************************************************/
/****************************************************************************************/
/****************************** Product Index********************************************/

    public function productIndex()
    {
        $result = $this->Authentication->getIdentity();

    //    pr($result->email); die;
       
        $this->paginate = [
            'contain' => ['ProductCategories'],
            'order'  => ['id' => 'DESC'],
        ];
     
        $products = $this->paginate($this->Products);

        $this->set(compact('products' , 'result'));
    }

    /********************************Product View*************************************/
    
    public function productView($id = null)
    {
        $result = $this->Authentication->getIdentity();
        
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductComments' ],
        ]);
    
        $this->set(compact('product' , 'result'));
    }

    /*********************************Product Add***********************************/

    public function productAdd()
    {
        $result = $this->Authentication->getIdentity();

        if ($result->user_type == 0){ 

        $product = $this->Products->newEmptyEntity();

        }else{
        return $this->redirect(['action' => 'productIndex']);
     }
        if ($this->request->is('post')) {
             
            $product = $this->Products->patchEntity($product , $this->request->getData());
            $image = $this->request->getData('images');
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            if ($name)
                $image->moveTo($targetPath);
            $product->product_image = $name;

       
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'productIndex']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200])->all();

        // dd($productCategories->category_name);
        $this->set(compact('product', 'productCategories' , 'result'));
    }

    /********************************Product Edit******************************/

    public function productEdit($id = null)
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0){ 

        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
    }else{
        return $this->redirect(['action' => 'productIndex']);
    }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'productIndex']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'productCategories'));
    }

    /********************************Product Delete********************************/

    public function productDelete($id = null)
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0){ 
            $this->request->allowMethod(['post', 'delete']);
        }else{
            return $this->redirect(['action' => 'productIndex']);
        }
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'productIndex']);
    }
    
/********************************Product Mrthod END********************************/

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
    public function home(){

        $result = $this->Authentication->getIdentity();

        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->paginate = [
            'contain' => ['ProductCategories', 'ProductComments' ],
            'order'  => ['id' => 'DESC'],
         ];

        $products = $this->paginate($this->Products);
        $productComment = $this->ProductComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $productComment = $this->ProductComments->patchEntity($productComment, $this->request->getData());
            $productComment->user_id = $result['id'];

            if ($this->ProductComments->save($productComment)) {
                $this->Flash->success(__('The product comment has been saved.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('The product comment could not be saved. Please, try again.'));
        }
       
        $this->set(compact('products' , 'result' ,'productComment'));
    
    
    }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////Cooment Controller///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
 
/********************************Index Comment********************************/

    public function indexComment()
    {
        $this->paginate = [
            'contain' => ['Products', 'Users'],
        ];
        $productComments = $this->paginate($this->ProductComments);

        $this->set(compact('productComments'));
    }

/********************************View Comment********************************/

    public function viewComment($id = null)
    {
        $productComment = $this->ProductComments->get($id, [
            'contain' => ['Products', 'Users'],
        ]);

        $this->set(compact('productComment'));
    }

 /********************************Add Comment********************************/

    public function addComment()
    {
        $productComment = $this->ProductComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $productComment = $this->ProductComments->patchEntity($productComment, $this->request->getData());
            if ($this->ProductComments->save($productComment)) {
                $this->Flash->success(__('The product comment has been saved.'));

                return $this->redirect(['action' => 'indexComment']);
            }
            $this->Flash->error(__('The product comment could not be saved. Please, try again.'));
        }
       
        $this->set(compact('productComment', 'products', 'users'));
    }

 /********************************Edit Comment********************************/

    public function editComment($id = null)
    {
        $productComment = $this->ProductComments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productComment = $this->ProductComments->patchEntity($productComment, $this->request->getData());
            if ($this->ProductComments->save($productComment)) {
                $this->Flash->success(__('The product comment has been saved.'));

                return $this->redirect(['action' => 'indexComment']);
            }
            $this->Flash->error(__('The product comment could not be saved. Please, try again.'));
        }
        $products = $this->ProductComments->Products->find('list', ['limit' => 200])->all();
        $users = $this->ProductComments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('productComment', 'products', 'users'));
    }

 /********************************Delete Comment********************************/

    public function deleteComment($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productComment = $this->ProductComments->get($id);
        if ($this->ProductComments->delete($productComment)) {
            $this->Flash->success(__('The product comment has been deleted.'));
        } else {
            $this->Flash->error(__('The product comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'indexComment']);
    }

 public $paginate = [ 'limit' => 5 ];
 
}
