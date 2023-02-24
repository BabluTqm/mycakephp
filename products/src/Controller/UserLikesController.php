<?php
declare(strict_types=1);

namespace App\Controller;


class UserLikesController extends AppController
{

/********************************************************************* */
    public function like($id=null)
    {
        $result = $this->Authentication->getIdentity();
        // dd($id);
        $like =$this->UserLikes->find('all')->where(['user_id'=>$result->id, 'product_id'=>$id])->first();
        
        if(empty($like)){
            $userLike = $this->UserLikes->newEmptyEntity();
            // $id= $_GET['id'];
            $userLike->user_id= $result->id;
            $userLike->product_id= $id;
            $userLike->likes= 1;
            $userLike->dislikes= 0;
            $this->UserLikes->save($userLike);
            echo json_encode(array(
                "status" => 0,
                "message" => "success like"
            ));         
        }else{
            if($like->likes== 1){
                $like->likes= 0;
                $like->dislikes= 0;
                $this->UserLikes->save($like);
            }else{
                $like->likes= 1;
                $like->dislikes= 0;
                $this->UserLikes->save($like);
            }
        }
            return $this->redirect(['controller'=>'users','action' => 'home']);
    
    }
/********************************************************************* */
    public function dislike($id=null)
    {
        {
            $result = $this->Authentication->getIdentity();
            $like =$this->UserLikes->find('all')->where(['user_id'=>$result->id, 'product_id'=>$id])->first();
            
            if(empty($like)){
                $userLike = $this->UserLikes->newEmptyEntity();
                $userLike->user_id= $result->id;
                $userLike->product_id= $id;
                $userLike->likes= 0;
                $userLike->dislikes= 1;
                $this->UserLikes->save($userLike);
            }else{
                if($like->dislikes== 1){
                    
                    $like->likes= 0;
                    $like->dislikes= 0;
                    $this->UserLikes->save($like);
                }else{
                    $like->likes= 0;
                    $like->dislikes= 1;
                    $this->UserLikes->save($like);
                }
            }
           
                return $this->redirect(['controller'=>'users','action' => 'home']);
        }
    }
/********************************************************************* */
  
   /* public function edit($id = null)
    {
        $userLike = $this->UserLikes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userLike = $this->UserLikes->patchEntity($userLike, $this->request->getData());
            if ($this->UserLikes->save($userLike)) {
                $this->Flash->success(__('The user like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user like could not be saved. Please, try again.'));
        }
        $users = $this->UserLikes->Users->find('list', ['limit' => 200])->all();
        $products = $this->UserLikes->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('userLike', 'users', 'products'));
    }*/

/********************************************************************* */
  /*  public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userLike = $this->UserLikes->get($id);
        if ($this->UserLikes->delete($userLike)) {
            $this->Flash->success(__('The user like has been deleted.'));
        } else {
            $this->Flash->error(__('The user like could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
*/
    /******************************************************************** */

 /*   public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products'],
        ];
        $userLikes = $this->paginate($this->UserLikes);

        $this->set(compact('userLikes'));
    }*/
/******************************************************************** */
    /*public function view($id = null)
    {
        $userLike = $this->UserLikes->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('userLike'));
    }*/
/********************************************************************* */
}
