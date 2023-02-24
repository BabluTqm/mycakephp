<?php
declare(strict_types=1);

namespace App\Controller;


class ProductCategoriesController  extends AppController
{

       public function initialize(): void
       {
           parent::initialize();
   
           $this->loadComponent('RequestHandler');
           $this->loadComponent('Flash');
            $this->Model = $this->loadModel('UserProfile');
            
            $this->Model = $this->loadModel('Users');
   
         
            $this->loadModel('ProductCategories');
            $this->loadModel('Products');
           // $this->Model = $this->loadModel('ProductComments');
           
       }
/********************Product Categories Index*******************/

       public function productcatIndex()
       {
           $result = $this->Authentication->getIdentity();
         //   dd($result->email);
   
           $uid = $result->id;
           $result = $this->Users->get($uid, [
               'contain' => ['UserProfile'],
               
           ]);

           $this->paginate = [
            'contain' => ['Products'],
            'order'  => ['id' => 'DESC'],
        ];
      
           if ($result->user_type == 0) {
               $productCategories = $this->paginate($this->ProductCategories);
           } else {
   
               return $this->redirect(['action' => 'home']);
           }
           $this->set(compact('productCategories', 'result'));
       }
   
/*********************Product Categories Add**********************/
       public function productcatAdd()
       {
           $result = $this->Authentication->getIdentity();
   
           $uid = $result->id;
           $result = $this->Users->get($uid, [
               'contain' => ['UserProfile']
           ]);
  
          if ($result->user_type == 0) {
   
               $productCategory = $this->ProductCategories->newEmptyEntity();
            } else {
           return $this->redirect(['action' => '#']);
            }
           $productCategory = $this->ProductCategories->newEmptyEntity();
           if ($this->request->is('post')) {
               $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
               if ($this->ProductCategories->save($productCategory)) {
                   $this->Flash->success(__('The product category has been saved.'));
   
                   return $this->redirect(['action' => 'productcatIndex']);
               }
               $this->Flash->error(__('The product category could not be saved. Please, try again.'));
           }
           $this->set(compact('productCategory'));
           $this->set(compact('productCategory', 'result'));
       }
   
/******************Product Categories Edit*********************/
       public function productcatEdit($id = null)
       {
           $result = $this->Authentication->getIdentity();
           if ($result->user_type == 0) {
               $productCategory = $this->ProductCategories->get($id, [
                   'contain' => [],
               ]);
           } else {
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
/************************Product Categories View************************/
   
       public function productcatView($id = null)
       {
           $result = $this->Authentication->getIdentity();
           $uid = $result->id;
           $result = $this->Users->get($uid, [
               'contain' => ['UserProfile']
           ]);
   
           if ($result->user_type == 0) {
   
               $productCategory = $this->ProductCategories->get($id, [
                   'contain' => ['Products'],
               ]);
           } else {
               return $this->redirect(['action' => 'productIndex']);
           }
           $this->set(compact('productCategory', 'result'));
       }
/***********************Product Categories Delete**************************/
   
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
   
/*******************************Product Categories Status*************************************/
       public function productCatStatus($id = null, $status)
       {

        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['Products'],
        ]);
        $proarray = array();
        foreach($productCategory->products as $products){
            $proarray[] =+ $products->status;
        }
        if(!in_array(1,$proarray)){
           $user = $this->ProductCategories->get($id);
           if ($status == 1)
               $user->status = 0;
           else
               $user->status = 1;
           if ($this->ProductCategories->save($user)) {
               $this->Flash->success(__('The Products Category has been Change Status')); 
                   return $this->redirect(['action' => 'productcatIndex']);      
           }
        }else{
            //$this->set(compact('products'));
            return $this->redirect(['action' => 'allactive',$id]);
        }
       }
/******************************Inactive******************************************/

       public function inactive($id = null){

        $product = $this->Products->find('all')->where(['product_category_id' => $id])->all();

        foreach($product as $product){
            $product->status = 0;

            $this->Products->save($product);
        }
       // $this->Flash->success(__('The Products Category has been Change Status')); 
            return $this->redirect(['action' => 'productCatStatus',$id,1]);

       }
/******************************Active******************************************/

       public function allactive($id = null){

        $result = $this->Authentication->getIdentity();
   
        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['Products'],
        ]);
       // dd($productCategory);
        $this->set(compact('productCategory','id','result'));
   
    }
/****************************************************************************************/

     /*  public function ghf($id = null)
       {
            $user = $this->ProductCategories->find('all')->where(['id' => $id])->all();

            foreach ($user as $user){
                $user->status = 0;

                $this->ProductCategories->save($user);
            }
                $this->Flash->success(__('The Products Category has been Change Status'));

                return $this->redirect(['action' => 'productcatIndex' , $id , 1]);
        
       }
*/

   
   


  
}
