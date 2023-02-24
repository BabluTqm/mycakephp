<?php
declare(strict_types=1);

namespace App\Controller;


class ProductsController  extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->Model = $this->loadModel('UserProfile');
        $this->Model = $this->loadModel('Products');
        
        $this->Model = $this->loadModel('Users');
        
        
        $this->loadModel('ProductCategories');
         //$this->Model = $this->loadModel('ProductComments');
        
    }
    
/****************************** Product Index********************************************/

    public function productIndex()
    {
        $result = $this->Authentication->getIdentity();


        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);


        if ($result->user_type == 0) {
            //    pr($result->email); die;

            $this->paginate = [
                'contain' => ['ProductCategories'],
                'order'  => ['id' => 'DESC'],
            ];
        } else {
            return $this->redirect(['action' => 'home']);
        }
        $products = $this->paginate($this->Products);

        $this->set(compact('products', 'result'));
    }

    /********************************Product View*************************************/

    public function productView($id = null)
    {
        $result = $this->Authentication->getIdentity();

        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductComments'],
        ]);

        $this->set(compact('product', 'result'));
    }

    /*********************************Product Add***********************************/

    public function productAdd()
    {
        $result = $this->Authentication->getIdentity();
        $this->loadModel('ProductCategories');
        $productCategories = $this->Paginate($this->ProductCategories);

        $uid = $result->id;
        $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($result->user_type == 0) {

            $product = $this->Products->newEmptyEntity();
        } else {
            return $this->redirect(['action' => 'productIndex']);
        }
        if ($this->request->is('post')) {

            $product = $this->Products->patchEntity($product, $this->request->getData());
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
        // $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200])->all();

        // dd($productCategories->category_name);
        $this->set(compact('product', 'productCategories', 'result'));
    }

    /********************************Product Edit******************************/
/*
    public function productEdit($id = null)
    {
         $result = $this->Authentication->getIdentity();

        $product = $this->Products->get($id, [
            'contain' => [],
        ]);


        $uid = $result->id;
            $result = $this->Users->get($uid, [
            'contain' => ['UserProfile']
           ]);
           
        $fileName2 = $product['product_image'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("product_image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data["product_image"] = $fileName;
            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["product_image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["product_image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'productIndex']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
         $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200])->all();

        $this->set(compact('product', 'productCategories' , 'result'));

    }
*/

    /********************************Product Delete********************************/

 /*   public function productDelete($id = null)
    {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0) {
            $this->request->allowMethod(['post', 'delete']);
        } else {
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
*/
    /********************************Product Mrthod END********************************/

        /********************************************************************************************/
        public function productStatus($id = null, $status)
        {
            $this->request->allowMethod(['post']);
            $user = $this->Products->get($id);
            if ($status == 1)
                $user->status = 0;
            else
                $user->status = 1;
            if ($this->Products->save($user)) {
                $this->Flash->success(__('The Products has been Change Status')); {
                    return $this->redirect(['action' => 'productIndex']);
                }
            }
        }
        /********************************************************************/

    
   


        public function allactive($id = null){

            $user = $this->ProductCategories->find('all')->where(['id' => $id])->all();

            foreach ($user as $user){
                $user->status = 0;

                $this->ProductCategories->save($user);
            }
                $this->Flash->success(__('The Products Category has been Change Status'));

                return $this->redirect(['action' => 'productcatIndex' , $id , 1]);

        
        }

  
}