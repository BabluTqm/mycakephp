<?php
declare(strict_types=1);

namespace App\Controller;


class CartController extends AppController
{
   
/*********************************************************************** */
    public function add($id=null)
    {
        $result = $this->Authentication->getIdentity();
        $carts = $this->Cart->find('all')->where(['user_id'=>$result->id,'product_id'=>$id])->first();

        if(empty($carts)){
        $cart = $this->Cart->newEmptyEntity();
        $cart->user_id = $result->id;
        $cart->product_id = $id;
        $this->Cart->save($cart);
                $this->Flash->success(__('The cart has been saved.'));
            }else{
                $this->Flash->error(__('The Product is already saved in Cart.'));
            }
            return $this->redirect(['controller'=>'Users','action' => 'home']);
       
}

/**************************************************************************/
   
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Users'],
        ];
        $cart = $this->paginate($this->Cart);

        $this->set(compact('cart'));
    }

    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        
        $cart->quantity = $cart->quantity + 1;
            
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));
    
            }else{
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        
        
    }
    public function minus($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        
        if($cart->quantity == 1){
            $this->Flash->error(__('Quantity cant be less then 1 for product in cart.'));
        }else{
        $cart->quantity = $cart->quantity - 1;
            
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));
    
            }else{
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
        
    }
    public function delete($id = null)
    {
        
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
/*
    public function view($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => ['Products', 'Users'],
        ]);

        $this->set(compact('cart'));
    }
 

  
    */
}
